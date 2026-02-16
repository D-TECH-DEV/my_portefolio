@extends('layouts.admin')

@section('title', 'Projets')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Projets</li>
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
    </style>
@endsection

@section('content')
    <div class="row mb-4">
        <div class="col-md-6">
            <h2 style="color: var(--admin-text-heading);">Gestion des Projets</h2>
            <p style="color: var(--admin-text-base);">Gérez tous vos projets portfolio</p>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ url('/admin/projects/create') }}" class="btn btn-admin-primary">
                <i class="bi bi-plus-circle me-2"></i>Nouveau Projet
            </a>
        </div>
    </div>

    <!-- Projects Table -->
    <div class="admin-card">
        <div class="table-responsive">
            <table id="projectsTable" class="admin-table " style="width:100%">
                <thead>
                    <tr>
                        <th style="width: 80px;">Image</th>
                        <th>Titre</th>
                        <th>Service</th>
                        <th>Catégaries</th>
                        <th>Date</th>
                        <th>Statut</th>
                        <th style="width: 150px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td>
                                <img src="{{ asset($project->image) }}"
                                    style="width: 60px; height: 60px; border-radius: 10px; object-fit: cover;" alt="Project">
                            </td>
                            <td>
                                <strong style="color: var(--admin-text-heading);">{{ $project->title }}</strong><br>
                                <small
                                    style="color: var(--admin-text-base);">{{ Str::limit($project->description, 50) }}</small>
                            </td>
                            <td>{{ $project->sevices }}</td>
                            <td>
                                @if(isset($project->categorie))
                                    <span class="badge bg-secondary me-1">{{ $project->categorie }}</span>
                                @endif
                            </td>
                            <td>{{ $project->completion_date ? $project->completion_date->format('d M Y') : 'N/A' }}</td>
                            <td>
                                @if($project->status == 'published')
                                    <span class="badge-admin-success">Publié</span>
                                @elseif($project->status == 'draft')
                                    <span class="badge bg-warning text-dark">Brouillon</span>
                                @else
                                    <span class="badge bg-secondary">Archivé</span>
                                @endif
                            </td>
                            <td class="text-nowrap">
                                <a href="{{ route('project.detail', $project->id) }}"
                                    class="btn btn-xs btn-admin-secondary me-1 px-2 py-1"
                                    title="Voir" target="_blank">
                                    <i class="bi bi-eye small"></i>
                                </a>

                                <a href="{{ route('admin.projects.edit', $project->id) }}"
                                    class="btn btn-xs btn-admin-secondary me-1 px-2 py-1"
                                    title="Modifier">
                                    <i class="bi bi-pencil small"></i>
                                </a>

                                <button class="btn btn-xs btn-danger px-2 py-1"
                                    title="Supprimer"
                                    onclick="confirmDelete('{{ route('admin.projects.destroy', $project->id) }}')">
                                    <i class="bi bi-trash small"></i>
                                </button>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content"
                style="background: var(--admin-bg-secondary); border: 1px solid var(--admin-border);">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header" style="border-bottom: 1px solid var(--admin-border);">
                        <h5 class="modal-title" style="color: var(--admin-text-heading);">Confirmer la suppression</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" style="filter: invert(1);"></button>
                    </div>
                    <div class="modal-body" style="color: var(--admin-text-base);">
                        Êtes-vous sûr de vouloir supprimer ce projet ? Cette action est irréversible.
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
            $('#projectsTable').DataTable({
                responsive: true,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
                },
                columnDefs: [
                    { orderable: false, targets: [0, 6] } // Disable sorting on Image and Actions columns
                ],
                order: [[4, 'desc']] // Update default sort to Date column
            });
        });
    </script>
@endsection