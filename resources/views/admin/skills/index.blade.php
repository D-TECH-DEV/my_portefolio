@extends('layouts.admin')

@section('title', 'Compétences')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Compétences</li>
@endsection

@section('styles')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">

    <style>
        /* Shared DataTable Styles */
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

        /* Card Styles */
        .skill-card {
            background: var(--admin-bg-secondary);
            border: 1px solid var(--admin-border);
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            transition: all 0.3s ease;
            height: 100%;
        }

        .skill-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(220, 167, 58, 0.2);
            border-color: var(--admin-accent);
        }

        .skill-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--admin-lighter);
            font-size: 40px;
        }

        .skill-icon img {
            max-width: 60px;
            max-height: 60px;
        }

        .skill-name {
            color: var(--admin-text-heading);
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .skill-category {
            color: var(--admin-text-base);
            font-size: 13px;
            margin-bottom: 15px;
        }

        .skill-level {
            margin-bottom: 15px;
        }

        .skill-level-bar {
            height: 8px;
            background: var(--admin-lighter);
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 5px;
        }

        .skill-level-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--admin-accent), #c99632);
            border-radius: 10px;
            transition: width 0.3s ease;
        }

        .skill-level-text {
            color: var(--admin-accent);
            font-size: 14px;
            font-weight: 600;
        }

        .skill-actions {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .view-toggle {
            display: flex;
            gap: 10px;
            background: var(--admin-lighter);
            padding: 5px;
            border-radius: 10px;
        }

        .view-toggle button {
            background: transparent;
            border: none;
            color: var(--admin-text-base);
            padding: 8px 15px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .view-toggle button.active {
            background: var(--admin-accent);
            color: var(--admin-bg-secondary);
        }
    </style>
@endsection

@section('content')
    <div class="row mb-4">
        <div class="col-md-4">
            <h2 style="color: var(--admin-text-heading);">Gestion des Compétences</h2>
            <p style="color: var(--admin-text-base);">Gérez vos compétences techniques</p>
        </div>
        <div class="col-md-8 text-end d-flex justify-content-end align-items-center gap-3">
            <div class="view-toggle">
                <button id="btnGrid" onclick="switchView('grid')">
                    <i class="bi bi-grid-3x3-gap"></i>
                </button>
                <button id="btnList" class="active" onclick="switchView('list')">
                    <i class="bi bi-list-ul"></i>
                </button>
            </div>
            <a href="{{ route('admin.skills.create') }}" class="btn btn-admin-primary">
                <i class="bi bi-plus-circle me-2"></i>Nouvelle Compétence
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert"
            style="background: rgba(40, 167, 69, 0.2); border: 1px solid #28a745; color: #28a745;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                style="filter: invert(1);"></button>
        </div>
    @endif

    <!-- Grid View -->
    <div id="gridView" style="display: none;">
        <div class="row">
            @foreach($skills as $skill)
                <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                    <div class="skill-card">
                        <div class="skill-icon">
                            @if($skill->image)
                                <img src="{{ asset($skill->image) }}" alt="{{ $skill->name }}">
                            @else
                                <i class="bi bi-code-slash" style="font-size: 40px; color: var(--admin-accent);"></i>
                            @endif
                        </div>
                        <div class="skill-name">{{ $skill->name }}</div>
                        <div class="skill-category">{{ $skill->category }}</div>
                        <div class="skill-level">
                            <div class="skill-level-bar">
                                <div class="skill-level-fill" style="width: {{ $skill->proficiency }}%;"></div>
                            </div>
                            <div class="skill-level-text">{{ $skill->proficiency }}%</div>
                        </div>
                        <div class="skill-actions">
                            <a href="{{ route('admin.skills.edit', $skill->id) }}" class="btn btn-sm btn-admin-secondary">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                onclick="prepareDelete('{{ route('admin.skills.destroy', $skill->id) }}')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- List View (DataTable) -->
    <div id="listView" class="admin-card">
        <div class="table-responsive">
            <table id="skillsTable" class="admin-table" style="width:100%">
                <thead>
                    <tr>
                        <th style="width: 60px;">Icone</th>
                        <th>Nom</th>
                        <th>Catégorie</th>
                        <th>Niveau</th>
                        <th style="display:none;">%</th>
                        <th style="width: 150px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($skills as $skill)
                        <tr>
                            <td>
                                @if($skill->image)
                                    <img src="{{ asset($skill->image) }}" style="width: 40px; height: 40px; object-fit: contain;"
                                        alt="{{ $skill->name }}">
                                @else
                                    <div
                                        style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; background: var(--admin-lighter); border-radius: 5px;">
                                        <i class="bi bi-code-slash" style="color: var(--admin-accent);"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <strong style="color: var(--admin-text-heading);">{{ $skill->name }}</strong>
                            </td>
                            <td>{{ $skill->category }}</td>
                            <td style="width: 30%;">
                                <div class="d-flex align-items-center">
                                    <div class="skill-level-bar flex-grow-1 mb-0 me-3">
                                        <div class="skill-level-fill" style="width: {{ $skill->proficiency }}%;"></div>
                                    </div>
                                    <span class="skill-level-text">{{ $skill->proficiency }}%</span>
                                </div>
                            </td>
                            <td style="display:none;">{{ $skill->proficiency }}</td>
                            <td>
                                <a href="{{ route('admin.skills.edit', $skill->id) }}"
                                    class="btn btn-sm btn-admin-secondary me-1" title="Modifier">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button class="btn btn-sm btn-danger" title="Supprimer" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"
                                    onclick="prepareDelete('{{ route('admin.skills.destroy', $skill->id) }}')">
                                    <i class="bi bi-trash"></i>
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
                <div class="modal-header" style="border-bottom: 1px solid var(--admin-border);">
                    <h5 class="modal-title" style="color: var(--admin-text-heading);">Confirmer la suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" style="filter: invert(1);"></button>
                </div>
                <div class="modal-body" style="color: var(--admin-text-base);">
                    Êtes-vous sûr de vouloir supprimer cette compétence ? Cette action est irréversible.
                </div>
                <div class="modal-footer" style="border-top: 1px solid var(--admin-border);">
                    <button type="button" class="btn btn-admin-secondary" data-bs-dismiss="modal">Annuler</button>
                    <form id="deleteForm" action="" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
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
            var table = $('#skillsTable').DataTable({
                responsive: true,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
                },
                columnDefs: [
                    { orderable: false, targets: [0, 5] }
                ],
                order: [[4, 'desc']] // Order by hidden % column
            });
        });

        function switchView(view) {
            // Toggle active state on buttons
            document.querySelectorAll('.view-toggle button').forEach(btn => {
                btn.classList.remove('active');
            });

            if (view === 'grid') {
                document.getElementById('gridView').style.display = 'block';
                document.getElementById('listView').style.display = 'none';
                document.getElementById('btnGrid').classList.add('active');
            } else {
                document.getElementById('gridView').style.display = 'none';
                document.getElementById('listView').style.display = 'block';
                document.getElementById('btnList').classList.add('active');
            }
        }

        function prepareDelete(action) {
            document.getElementById('deleteForm').action = action;
        }
    </script>
@endsection