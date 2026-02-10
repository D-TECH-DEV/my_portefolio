@extends('layouts.admin')

@section('title', 'Services')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Services</li>
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
            <h2 style="color: var(--admin-text-heading);">Gestion des Services</h2>
            <p style="color: var(--admin-text-base);">Gérez les services que vous proposez</p>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ url('/admin/services/create') }}" class="btn btn-admin-primary">
                <i class="bi bi-plus-circle me-2"></i>Nouveau Service
            </a>
        </div>
    </div>

    <!-- Services Table -->
    <div class="admin-card">
        <div class="table-responsive">
            <table id="servicesTable" class="admin-table table" style="width:100%">
                <thead>
                    <tr>
                        <th style="width: 80px;">N°</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th style="width: 120px;">Statut</th>
                        <th style="width: 150px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div
                                style="width: 50px; height: 50px; border-radius: 10px; background: var(--admin-lighter); display: flex; align-items: center; justify-content: center; color: var(--admin-accent); font-size: 20px; font-weight: 700;">
                                01
                            </div>
                        </td>
                        <td>
                            <strong style="color: var(--admin-text-heading);">Programmation & Développement</strong>
                        </td>
                        <td style="max-width: 400px;">Sites vitrines pro, applications web sur mesure et systèmes de gestion
                            adaptés.</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked style="cursor: pointer;">
                                <label class="form-check-label"
                                    style="color: var(--admin-text-base); font-size: 13px;">Actif</label>
                            </div>
                        </td>
                        <td>
                            <a href="{{ url('/admin/services/edit/1') }}" class="btn btn-sm btn-admin-secondary me-1"
                                title="Modifier">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button class="btn btn-sm btn-danger" title="Supprimer" data-bs-toggle="modal"
                                data-bs-target="#deleteModal">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div
                                style="width: 50px; height: 50px; border-radius: 10px; background: var(--admin-lighter); display: flex; align-items: center; justify-content: center; color: var(--admin-accent); font-size: 20px; font-weight: 700;">
                                02
                            </div>
                        </td>
                        <td>
                            <strong style="color: var(--admin-text-heading);">Maintenance Informatique</strong>
                        </td>
                        <td style="max-width: 400px;">Maintenance système et logicielle, dépannage, optimisation et sécurité
                            assurée.</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked style="cursor: pointer;">
                                <label class="form-check-label"
                                    style="color: var(--admin-text-base); font-size: 13px;">Actif</label>
                            </div>
                        </td>
                        <td>
                            <a href="{{ url('/admin/services/edit/2') }}" class="btn btn-sm btn-admin-secondary me-1"
                                title="Modifier">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button class="btn btn-sm btn-danger" title="Supprimer" data-bs-toggle="modal"
                                data-bs-target="#deleteModal">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div
                                style="width: 50px; height: 50px; border-radius: 10px; background: var(--admin-lighter); display: flex; align-items: center; justify-content: center; color: var(--admin-accent); font-size: 20px; font-weight: 700;">
                                03
                            </div>
                        </td>
                        <td>
                            <strong style="color: var(--admin-text-heading);">Design & Identité Visuelle</strong>
                        </td>
                        <td style="max-width: 400px;">Design web moderne, supports digitaux et interfaces claires et
                            impactantes.</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked style="cursor: pointer;">
                                <label class="form-check-label"
                                    style="color: var(--admin-text-base); font-size: 13px;">Actif</label>
                            </div>
                        </td>
                        <td>
                            <a href="{{ url('/admin/services/edit/3') }}" class="btn btn-sm btn-admin-secondary me-1"
                                title="Modifier">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button class="btn btn-sm btn-danger" title="Supprimer" data-bs-toggle="modal"
                                data-bs-target="#deleteModal">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div
                                style="width: 50px; height: 50px; border-radius: 10px; background: var(--admin-lighter); display: flex; align-items: center; justify-content: center; color: var(--admin-accent); font-size: 20px; font-weight: 700;">
                                04
                            </div>
                        </td>
                        <td>
                            <strong style="color: var(--admin-text-heading);">Automatisation & DevOps</strong>
                        </td>
                        <td style="max-width: 400px;">Automatisation des déploiements avec Git, GitHub et Docker pour une
                            mise en production fluide.</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked style="cursor: pointer;">
                                <label class="form-check-label"
                                    style="color: var(--admin-text-base); font-size: 13px;">Actif</label>
                            </div>
                        </td>
                        <td>
                            <a href="{{ url('/admin/services/edit/4') }}" class="btn btn-sm btn-admin-secondary me-1"
                                title="Modifier">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button class="btn btn-sm btn-danger" title="Supprimer" data-bs-toggle="modal"
                                data-bs-target="#deleteModal">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div
                                style="width: 50px; height: 50px; border-radius: 10px; background: var(--admin-lighter); display: flex; align-items: center; justify-content: center; color: var(--admin-accent); font-size: 20px; font-weight: 700;">
                                05
                            </div>
                        </td>
                        <td>
                            <strong style="color: var(--admin-text-heading);">Création d'API RESTful</strong>
                        </td>
                        <td style="max-width: 400px;">Développement d'interfaces robustes pour interconnecter vos services
                            numériques.</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked style="cursor: pointer;">
                                <label class="form-check-label"
                                    style="color: var(--admin-text-base); font-size: 13px;">Actif</label>
                            </div>
                        </td>
                        <td>
                            <a href="{{ url('/admin/services/edit/5') }}" class="btn btn-sm btn-admin-secondary me-1"
                                title="Modifier">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button class="btn btn-sm btn-danger" title="Supprimer" data-bs-toggle="modal"
                                data-bs-target="#deleteModal">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div
                                style="width: 50px; height: 50px; border-radius: 10px; background: var(--admin-lighter); display: flex; align-items: center; justify-content: center; color: var(--admin-accent); font-size: 20px; font-weight: 700;">
                                06
                            </div>
                        </td>
                        <td>
                            <strong style="color: var(--admin-text-heading);">Conseil & Stratégie</strong>
                        </td>
                        <td style="max-width: 400px;">Accompagnement stratégique pour renforcer votre crédibilité et générer
                            de vrais résultats.</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked style="cursor: pointer;">
                                <label class="form-check-label"
                                    style="color: var(--admin-text-base); font-size: 13px;">Actif</label>
                            </div>
                        </td>
                        <td>
                            <a href="{{ url('/admin/services/edit/6') }}" class="btn btn-sm btn-admin-secondary me-1"
                                title="Modifier">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button class="btn btn-sm btn-danger" title="Supprimer" data-bs-toggle="modal"
                                data-bs-target="#deleteModal">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content"
                style="background: var(--admin-bg-secondary); border: 1px solid var(--admin-border);">
                <div class="modal-header" style="border-bottom: 1px solid var(--admin-border);">
                    <h5 class="modal-title" style="color: var(--admin-text-heading);">Confirmer la suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" style="filter: invert(1);"></button>
                </div>
                <div class="modal-body" style="color: var(--admin-text-base);">
                    Êtes-vous sûr de vouloir supprimer ce service ? Cette action est irréversible.
                </div>
                <div class="modal-footer" style="border-top: 1px solid var(--admin-border);">
                    <button type="button" class="btn btn-admin-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-danger">Supprimer</button>
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
            $('#servicesTable').DataTable({
                responsive: true,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
                },
                columnDefs: [
                    { orderable: false, targets: [4] } // Disable sorting on Actions column
                ]
            });
        });
    </script>
@endsection