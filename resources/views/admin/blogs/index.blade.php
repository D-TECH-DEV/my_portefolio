@extends('layouts.admin')

@section('title', 'Blog')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Blog</li>
@endsection

@section('styles')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">

    <style>
        /* Custom DataTable styling for Premium Dark Theme */
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_processing,
        .dataTables_wrapper .dataTables_paginate {
            color: var(--admin-text-base);
            margin-bottom: 1.5rem;
        }

        .dataTables_wrapper .dataTables_filter input {
            background: rgba(20, 40, 80, 0.6);
            border: 1px solid var(--admin-border);
            color: var(--admin-text-heading);
            border-radius: 8px;
            padding: 8px 15px;
            transition: all 0.3s ease;
        }

        .dataTables_wrapper .dataTables_filter input:focus {
            outline: none;
            border-color: var(--admin-accent);
            box-shadow: 0 0 0 3px rgba(220, 167, 58, 0.2);
        }

        .dataTables_wrapper .dataTables_length select {
            background: rgba(20, 40, 80, 0.6);
            border: 1px solid var(--admin-border);
            color: var(--admin-text-heading);
            border-radius: 8px;
            padding: 5px 10px;
        }

        /* Table Styling */
        table.dataTable {
            border-collapse: separate !important;
            border-spacing: 0 8px !important;
            margin-top: 0 !important;
        }

        table.dataTable thead th {
            border-bottom: none !important;
            color: var(--admin-accent) !important;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            padding: 15px 15px !important;
        }

        table.dataTable tbody tr {
            background-color: rgba(20, 40, 80, 0.3) !important;
            transition: all 0.3s ease;
            box-shadow: none;
        }

        table.dataTable tbody tr:hover {
            transform: translateY(-2px);
            background-color: rgba(220, 167, 58, 0.05) !important;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        table.dataTable td {
            color: var(--admin-text-base);
            padding: 15px !important;
            vertical-align: middle;
            border-top: 1px solid transparent;
            border-bottom: 1px solid transparent;
        }

        table.dataTable tbody tr td:first-child {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        table.dataTable tbody tr td:last-child {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        /* Pagination Styling */
        .page-item .page-link {
            background-color: transparent;
            border: 1px solid var(--admin-border);
            color: var(--admin-text-base);
            border-radius: 8px;
            margin: 0 3px;
            transition: all 0.3s ease;
        }

        .page-item.active .page-link {
            background-color: var(--admin-accent);
            border-color: var(--admin-accent);
            color: var(--admin-bg-secondary);
            font-weight: bold;
        }

        .page-item .page-link:hover {
            background-color: rgba(220, 167, 58, 0.2);
            color: var(--admin-accent);
            border-color: var(--admin-accent);
        }

        .page-item.disabled .page-link {
            background-color: transparent;
            border-color: rgba(255, 255, 255, 0.05);
            color: rgba(255, 255, 255, 0.2);
        }
    </style>
@endsection

@section('content')
    <div class="row mb-4">
        <div class="col-md-6">
            <h2 style="color: var(--admin-text-heading);">Gestion du Blog</h2>
            <p style="color: var(--admin-text-base);">Gérez vos articles et publications</p>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ url('/admin/blogs/create') }}" class="btn btn-admin-primary">
                <i class="bi bi-plus-circle me-2"></i>Nouvel Article
            </a>
        </div>
    </div>

    <!-- Blog Table -->
    <div class="admin-card">
        <div class="table-responsive">
            <table id="blogTable" class="admin-table table" style="width:100%">
                <thead>
                    <tr>
                        <th style="width: 80px;">Image</th>
                        <th>Titre</th>
                        <th>Catégorie</th>
                        <th>Auteur</th>
                        <th>Date</th>
                        <th style="width: 150px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="background-color: rgba(220, 167, 58, 0.05);">
                        <td>
                            <img src="https://via.placeholder.com/60" alt="Blog Thumb" class="rounded" width="50"
                                height="50" style="object-fit: cover;">
                        </td>
                        <td>
                            <strong style="color: var(--admin-text-heading);">Tips For Conducting Usability Studies</strong>
                            <div style="font-size: 12px; color: var(--admin-text-base);">Design, Figma</div>
                        </td>
                        <td><span class="badge bg-primary">Design</span></td>
                        <td>Martin D. Rubio</td>
                        <td>25 Sep 2023</td>
                        <td>
                            <button class="btn btn-sm btn-admin-secondary me-1" title="Voir">
                                <i class="bi bi-eye"></i>
                            </button>
                            <a href="{{ url('/admin/blogs/1/edit') }}" class="btn btn-sm btn-admin-secondary me-1"
                                title="Modifier">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button class="btn btn-sm btn-danger" title="Supprimer">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <img src="https://via.placeholder.com/60" alt="Blog Thumb" class="rounded" width="50"
                                height="50" style="object-fit: cover;">
                        </td>
                        <td>
                            <strong style="color: var(--admin-text-heading);">Online Environment Work For Older
                                Users</strong>
                            <div style="font-size: 12px; color: var(--admin-text-base);">Web, UX</div>
                        </td>
                        <td><span class="badge bg-info text-dark">UX Desgin</span></td>
                        <td>Sara Smith</td>
                        <td>24 Sep 2023</td>
                        <td>
                            <button class="btn btn-sm btn-admin-secondary me-1" title="Voir">
                                <i class="bi bi-eye"></i>
                            </button>
                            <a href="{{ url('/admin/blogs/2/edit') }}" class="btn btn-sm btn-admin-secondary me-1"
                                title="Modifier">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button class="btn btn-sm btn-danger" title="Supprimer">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <img src="https://via.placeholder.com/60" alt="Blog Thumb" class="rounded" width="50"
                                height="50" style="object-fit: cover;">
                        </td>
                        <td>
                            <strong style="color: var(--admin-text-heading);">How to improve your coding skills</strong>
                            <div style="font-size: 12px; color: var(--admin-text-base);">Development</div>
                        </td>
                        <td><span class="badge bg-success">Dev</span></td>
                        <td>John Doe</td>
                        <td>20 Sep 2023</td>
                        <td>
                            <button class="btn btn-sm btn-admin-secondary me-1" title="Voir">
                                <i class="bi bi-eye"></i>
                            </button>
                            <a href="{{ url('/admin/blogs/3/edit') }}" class="btn btn-sm btn-admin-secondary me-1"
                                title="Modifier">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button class="btn btn-sm btn-danger" title="Supprimer">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
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
            $('#blogTable').DataTable({
                responsive: true,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
                },
                columnDefs: [
                    { orderable: false, targets: [0, 5] } // Disable sorting on Image and Actions columns
                ],
                order: [[4, 'desc']] // Update default sort to Date column
            });
        });
    </script>
@endsection