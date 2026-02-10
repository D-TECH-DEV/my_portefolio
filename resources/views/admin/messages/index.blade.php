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
            <table id="messagesTable" class="admin-table table" style="width:100%">
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
                    <tr style="background-color: rgba(220, 167, 58, 0.05);">
                        <td>
                            <input class="form-check-input message-checkbox" type="checkbox">
                        </td>
                        <td>
                            <div style="font-weight: 600; color: var(--admin-text-heading);">John Doe</div>
                            <div style="font-size: 12px; color: var(--admin-text-base);">john.doe@example.com</div>
                        </td>
                        <td>
                            <strong style="color: var(--admin-text-heading);">Devis pour un site E-commerce</strong>
                            <div
                                style="font-size: 13px; color: var(--admin-text-base); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 300px;">
                                Bonjour, j'aimerais avoir un devis pour la création d'un site de vente en ligne...
                            </div>
                        </td>
                        <td>10 Fév 2024</td>
                        <td><span class="badge unread">Non lu</span></td>
                        <td>
                            <button class="btn btn-sm btn-admin-secondary" title="Voir">
                                <i class="bi bi-eye"></i>
                            </button>
                        </td>
                    </tr>

                    <tr style="background-color: rgba(220, 167, 58, 0.05);">
                        <td>
                            <input class="form-check-input message-checkbox" type="checkbox">
                        </td>
                        <td>
                            <div style="font-weight: 600; color: var(--admin-text-heading);">Sarah Connor</div>
                            <div style="font-size: 12px; color: var(--admin-text-base);">sarah.c@skynet.com</div>
                        </td>
                        <td>
                            <strong style="color: var(--admin-text-heading);">Problème avec l'API</strong>
                            <div
                                style="font-size: 13px; color: var(--admin-text-base); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 300px;">
                                Hello, je rencontre des soucis d'authentification sur l'API que vous avez livrée...
                            </div>
                        </td>
                        <td>09 Fév 2024</td>
                        <td><span class="badge unread">Non lu</span></td>
                        <td>
                            <button class="btn btn-sm btn-admin-secondary" title="Voir">
                                <i class="bi bi-eye"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input class="form-check-input message-checkbox" type="checkbox">
                        </td>
                        <td>
                            <div style="font-weight: 600; color: var(--admin-text-heading);">Michael Scott</div>
                            <div style="font-size: 12px; color: var(--admin-text-base);">m.scott@dundermifflin.com</div>
                        </td>
                        <td>
                            <span style="color: var(--admin-text-heading);">Partenariat possible ?</span>
                            <div
                                style="font-size: 13px; color: var(--admin-text-base); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 300px;">
                                J'aimerais discuter d'une opportunité de partenariat concernant nos fournitures...
                            </div>
                        </td>
                        <td>08 Fév 2024</td>
                        <td><span class="badge read">Lu</span></td>
                        <td>
                            <button class="btn btn-sm btn-admin-secondary" title="Voir">
                                <i class="bi bi-eye"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input class="form-check-input message-checkbox" type="checkbox">
                        </td>
                        <td>
                            <div style="font-weight: 600; color: var(--admin-text-heading);">Bruce Wayne</div>
                            <div style="font-size: 12px; color: var(--admin-text-base);">bruce@wayneent.com</div>
                        </td>
                        <td>
                            <span style="color: var(--admin-text-heading);">Refonte du site Wayne Enterprises</span>
                            <div
                                style="font-size: 13px; color: var(--admin-text-base); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 300px;">
                                Notre site actuel est vieillissant. Nous avons besoin de quelque chose de plus... sombre.
                            </div>
                        </td>
                        <td>05 Fév 2024</td>
                        <td><span class="badge read">Lu</span></td>
                        <td>
                            <button class="btn btn-sm btn-admin-secondary" title="Voir">
                                <i class="bi bi-eye"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input class="form-check-input message-checkbox" type="checkbox">
                        </td>
                        <td>
                            <div style="font-weight: 600; color: var(--admin-text-heading);">Peter Parker</div>
                            <div style="font-size: 12px; color: var(--admin-text-base);">spidey@nyc.com</div>
                        </td>
                        <td>
                            <span style="color: var(--admin-text-heading);">Bug sur la version mobile</span>
                            <div
                                style="font-size: 13px; color: var(--admin-text-base); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 300px;">
                                Le menu burger ne s'ouvre pas quand je suis accroché au plafond...
                            </div>
                        </td>
                        <td>01 Fév 2024</td>
                        <td><span class="badge read">Lu</span></td>
                        <td>
                            <button class="btn btn-sm btn-admin-secondary" title="Voir">
                                <i class="bi bi-eye"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- View Message Modal (Mockup) -->
    <div class="modal fade" id="viewMessageModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content"
                style="background: var(--admin-bg-secondary); border: 1px solid var(--admin-border);">
                <div class="modal-header" style="border-bottom: 1px solid var(--admin-border);">
                    <h5 class="modal-title" style="color: var(--admin-text-heading);">Détails du message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" style="filter: invert(1);"></button>
                </div>
                <div class="modal-body">
                    <!-- Message details content would go here -->
                </div>
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