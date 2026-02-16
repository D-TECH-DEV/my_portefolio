@extends('layouts.admin')

@section('title', 'Messages')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Messages</li>
@endsection

@section('styles')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">

    <style>
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_processing,
        .dataTables_wrapper .dataTables_paginate {
            color: var(--admin-text-base);
            margin-bottom: 20px;
        }

        .dataTables_wrapper .dataTables_filter input {
            background: var(--admin-lighter);
            border: 1px solid var(--admin-border);
            color: var(--admin-text-heading);
            border-radius: 5px;
            padding: 5px 10px;
        }

        .dataTables_wrapper .dataTables_length select {
            background: var(--admin-lighter);
            border: 1px solid var(--admin-border);
            color: var(--admin-text-heading);
            border-radius: 5px;
            padding: 5px;
        }

        .page-item.active .page-link {
            background-color: var(--admin-accent);
            border-color: var(--admin-accent);
            color: var(--admin-bg-secondary);
        }

        .page-link {
            background-color: var(--admin-lighter);
            border-color: var(--admin-border);
            color: var(--admin-text-base);
        }

        .page-link:hover {
            background-color: var(--admin-bg-secondary);
            border-color: var(--admin-accent);
            color: var(--admin-accent);
        }

        .page-item.disabled .page-link {
            background-color: var(--admin-bg-secondary);
            border-color: var(--admin-border);
            color: rgba(255, 255, 255, 0.3);
        }

        table.dataTable tbody tr {
            background-color: transparent !important;
        }

        .admin-table tbody tr:hover {
            background-color: var(--admin-lighter) !important;
        }

        .admin-table td {
            vertical-align: middle;
        }

        /* Message Status Badges */
        .badge.unread {
            background-color: rgba(220, 167, 58, 0.1);
            color: var(--admin-accent);
            border: 1px solid rgba(220, 167, 58, 0.2);
        }

        .badge.read {
            background-color: rgba(255, 255, 255, 0.05);
            color: var(--admin-text-base);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
@endsection

@section('content')
    <div class="row mb-4">
        <div class="col-md-6">
            <h2 style="color: var(--admin-text-heading);">Messagerie</h2>
            <p style="color: var(--admin-text-base);">Gérez les messages de contact</p>
        </div>
        <div class="col-md-6 text-end">
            <button class="btn btn-admin-secondary me-2">
                <i class="bi bi-envelope-open me-2"></i>Tout marquer comme lu
            </button>
            <button class="btn btn-danger">
                <i class="bi bi-trash me-2"></i>Supprimer la sélection
            </button>
        </div>
    </div>

    <!-- Messages Table -->
    <div class="admin-card">
        <div class="table-responsive">
            <table id="messagesTable" class="admin-table" style="width:100%">
                <thead>
                    <tr>
                        <th style="width: 40px;">
                            <input class="form-check-input" type="checkbox" id="selectAll">
                        </th>
                        <th style="width: 200px;">Expéditeur</th>
                        <th>Sujet</th>
                        <th style="width: 150px;">Date</th>
                        <th style="width: 100px;">Statut</th>
                        <th style="width: 100px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $message)
                        <tr style="{{ !$message->is_read ? 'background-color: rgba(220, 167, 58, 0.05);' : '' }}">
                            <td>
                                <input class="form-check-input message-checkbox" type="checkbox" value="{{ $message->id }}">
                            </td>
                            <td>
                                <div style="font-weight: 600; color: var(--admin-text-heading);">{{ $message->name }}</div>
                                <div style="font-size: 12px; color: var(--admin-text-base);">{{ $message->email }}</div>
                            </td>
                            <td>
                                <strong
                                    style="color: var(--admin-text-heading);">{{ $message->subject ?? 'Sans sujet' }}</strong>
                                <div
                                    style="font-size: 13px; color: var(--admin-text-base); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 300px;">
                                    {{ $message->message }}
                                </div>
                            </td>
                            <td>{{ $message->created_at->format('d M Y') }}</td>
                            <td>
                                @if(!$message->is_read)
                                    <span class="badge unread">Non lu</span>
                                @else
                                    <span class="badge read">Lu</span>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-sm btn-admin-secondary" title="Voir"
                                    onclick="viewMessage({{ $message->id }})">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" title="Supprimer"
                                    onclick="confirmDelete('{{ route('admin.messages.destroy', $message->id) }}')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- View Message Modal -->
    <div class="modal fade" id="viewMessageModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content"
                style="background: var(--admin-bg-secondary); border: 1px solid var(--admin-border);">
                <div class="modal-header" style="border-bottom: 1px solid var(--admin-border);">
                    <h5 class="modal-title" id="modalSubject" style="color: var(--admin-text-heading);">Détails du message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" style="filter: invert(1);"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="text-muted small">De :</label>
                        <div id="modalSender" style="color: var(--admin-text-heading); font-weight: 600;"></div>
                        <div id="modalEmail" style="color: var(--admin-text-base); font-size: 13px;"></div>
                    </div>
                    <div class="mb-3">
                        <label class="text-muted small">Date :</label>
                        <div id="modalDate" style="color: var(--admin-text-base);"></div>
                    </div>
                    <hr style="border-top: 1px solid var(--admin-border);">
                    <div class="mb-3">
                        <label class="text-muted small">Message :</label>
                        <div id="modalBody" style="color: var(--admin-text-heading); white-space: pre-line; line-height: 1.6;"></div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 1px solid var(--admin-border);">
                    <button type="button" class="btn btn-admin-secondary" data-bs-dismiss="modal">Fermer</button>
                    <a id="modalReply" href="#" class="btn btn-admin-primary">
                        <i class="bi bi-reply me-1"></i>Répondre
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background: var(--admin-bg-secondary); border: 1px solid var(--admin-border);">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header" style="border-bottom: 1px solid var(--admin-border);">
                        <h5 class="modal-title" id="deleteModalLabel" style="color: var(--admin-text-heading);">Confirmer la suppression</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: invert(1);"></button>
                    </div>
                    <div class="modal-body" style="color: var(--admin-text-base);">
                        Êtes-vous sûr de vouloir supprimer ce message ? Cette action est irréversible.
                    </div>
                    <div class="modal-footer" style="border-top: 1px solid var(--admin-border);">
                        <button type="button" class="btn btn-admin-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

    <script>
        function confirmDelete(url) {
            $('#deleteForm').attr('action', url);
            var myModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            myModal.show();
        }

        function viewMessage(id) {
            $.get('/admin/messages/' + id, function(message) {
                $('#modalSubject').text(message.subject || 'Détails du message');
                $('#modalSender').text(message.name);
                $('#modalEmail').text(message.email);
                $('#modalDate').text(new Date(message.created_at).toLocaleDateString('fr-FR', {
                    day: 'numeric', month: 'long', year: 'numeric', hour: '2-digit', minute: '2-digit'
                }));
                $('#modalBody').text(message.message);
                $('#modalReply').attr('href', 'mailto:' + message.email + '?subject=Re: ' + (message.subject || 'Votre message'));
                
                var myModal = new bootstrap.Modal(document.getElementById('viewMessageModal'));
                myModal.show();

                // Mark row as read in UI
                const row = $('button[onclick="viewMessage(' + id + ')"]').closest('tr');
                row.css('background-color', 'transparent');
                row.find('.badge').removeClass('unread').addClass('read').text('Lu');
            });
        }

        $(document).ready(function () {
            var table = $('#messagesTable').DataTable({
                responsive: true,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
                },
                columnDefs: [
                    { orderable: false, targets: [0, 5] } // Disable sorting on Checkbox and Actions columns
                ],
                order: [[3, 'desc']] // Default sort by Date
            });

            // Handle Select All Checkbox
            $('#selectAll').on('click', function () {
                var rows = table.rows({ 'search': 'applied' }).nodes();
                $('input[type="checkbox"]', rows).prop('checked', this.checked);
            });

            // Handle individual checkboxes to update Select All state
            $('#messagesTable tbody').on('change', 'input[type="checkbox"]', function () {
                if (!this.checked) {
                    var el = $('#selectAll').get(0);
                    if (el && el.checked && ('indeterminate' in el)) {
                        el.indeterminate = true;
                    }
                }
            });
        });
    </script>
@endsection