@extends('layouts.admin')

@section('title', 'Témoignages')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Témoignages</li>
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

        table.dataTable tbody tr {
            background-color: transparent !important;
        }

        .admin-table tbody tr:hover {
            background-color: var(--admin-lighter) !important;
        }

        .admin-table td {
            vertical-align: middle;
        }

        .badge-active {
            background-color: rgba(25, 135, 84, 0.1);
            color: #198754;
            border: 1px solid rgba(25, 135, 84, 0.2);
        }

        .badge-inactive {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            border: 1px solid rgba(220, 53, 69, 0.2);
        }
    </style>
@endsection

@section('content')
    <div class="row mb-4">
        <div class="col-md-6">
            <h2 style="color: var(--admin-text-heading);">Témoignages</h2>
            <p style="color: var(--admin-text-base);">Gérez les avis clients affichés sur le site</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert"
            style="background: rgba(25, 135, 84, 0.1); border: 1px solid rgba(25, 135, 84, 0.2); color: #198754;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                style="filter: invert(1);"></button>
        </div>
    @endif

    <!-- Testimonials Table -->
    <div class="admin-card">
        <div class="table-responsive">
            <table id="testimonialsTable" class="admin-table" style="width:100%">
                <thead>
                    <tr>
                        <th style="width: 200px;">Client</th>
                        <th>Profession</th>
                        <th>Témoignage</th>
                        <th style="width: 150px;">Date</th>
                        <th style="width: 120px;">Statut</th>
                        <th style="width: 150px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($testimonials as $testimonial)
                        <tr>
                            <td>
                                <div style="font-weight: 600; color: var(--admin-text-heading);">{{ $testimonial->name }}</div>
                            </td>
                            <td>{{ $testimonial->profession ?? '-' }}</td>
                            <td>
                                <div
                                    style="font-size: 13px; color: var(--admin-text-base); max-width: 400px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                    {{ $testimonial->message }}
                                </div>
                            </td>
                            <td>{{ $testimonial->created_at->format('d M Y') }}</td>
                            <td>
                                @if($testimonial->is_active)
                                    <span class="badge badge-active">Visible</span>
                                @else
                                    <span class="badge badge-inactive">En attente</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <form action="{{ route('admin.testimonials.toggle', $testimonial->id) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="btn btn-sm {{ $testimonial->is_active ? 'btn-admin-secondary' : 'btn-admin-primary' }}"
                                            title="{{ $testimonial->is_active ? 'Masquer' : 'Approuver' }}">
                                            <i
                                                class="bi {{ $testimonial->is_active ? 'bi-eye-slash' : 'bi-check-circle' }}"></i>
                                        </button>
                                    </form>
                                    <button class="btn btn-sm btn-danger" title="Supprimer"
                                        onclick="confirmDelete('{{ route('admin.testimonials.destroy', $testimonial->id) }}')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content"
                style="background: var(--admin-bg-secondary); border: 1px solid var(--admin-border);">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header" style="border-bottom: 1px solid var(--admin-border);">
                        <h5 class="modal-title" id="deleteModalLabel" style="color: var(--admin-text-heading);">Confirmer la
                            suppression</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            style="filter: invert(1);"></button>
                    </div>
                    <div class="modal-body" style="color: var(--admin-text-base);">
                        Êtes-vous sûr de vouloir supprimer ce témoignage ?
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

        $(document).ready(function () {
            $('#testimonialsTable').DataTable({
                responsive: true,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
                },
                order: [[3, 'desc']]
            });
        });
    </script>
@endsection