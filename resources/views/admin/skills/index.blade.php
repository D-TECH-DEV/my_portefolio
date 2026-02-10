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
            <a href="{{ url('/admin/skills/create') }}" class="btn btn-admin-primary">
                <i class="bi bi-plus-circle me-2"></i>Nouvelle Compétence
            </a>
        </div>
    </div>

    <!-- Grid View -->
    <div id="gridView" style="display: none;">
        <div class="row">
            <!-- Skill Card 1 -->
            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                <div class="skill-card">
                    <div class="skill-icon">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/flutter/flutter-original.svg"
                            alt="Flutter">
                    </div>
                    <div class="skill-name">Flutter</div>
                    <div class="skill-category">Mobile</div>
                    <div class="skill-level">
                        <div class="skill-level-bar">
                            <div class="skill-level-fill" style="width: 90%;"></div>
                        </div>
                        <div class="skill-level-text">90%</div>
                    </div>
                    <div class="skill-actions">
                        <a href="{{ url('/admin/skills/edit/1') }}" class="btn btn-sm btn-admin-secondary">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Skill Card 2 -->
            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                <div class="skill-card">
                    <div class="skill-icon">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-plain.svg"
                            alt="Laravel">
                    </div>
                    <div class="skill-name">Laravel</div>
                    <div class="skill-category">Backend</div>
                    <div class="skill-level">
                        <div class="skill-level-bar">
                            <div class="skill-level-fill" style="width: 95%;"></div>
                        </div>
                        <div class="skill-level-text">95%</div>
                    </div>
                    <div class="skill-actions">
                        <a href="{{ url('/admin/skills/edit/2') }}" class="btn btn-sm btn-admin-secondary">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Skill Card 3 -->
            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                <div class="skill-card">
                    <div class="skill-icon">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/spring/spring-original.svg"
                            alt="Spring Boot">
                    </div>
                    <div class="skill-name">Spring Boot</div>
                    <div class="skill-category">Backend</div>
                    <div class="skill-level">
                        <div class="skill-level-bar">
                            <div class="skill-level-fill" style="width: 85%;"></div>
                        </div>
                        <div class="skill-level-text">85%</div>
                    </div>
                    <div class="skill-actions">
                        <a href="{{ url('/admin/skills/edit/3') }}" class="btn btn-sm btn-admin-secondary">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Skill Card 4 -->
            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                <div class="skill-card">
                    <div class="skill-icon">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg" alt="React">
                    </div>
                    <div class="skill-name">React JS</div>
                    <div class="skill-category">Frontend</div>
                    <div class="skill-level">
                        <div class="skill-level-bar">
                            <div class="skill-level-fill" style="width: 80%;"></div>
                        </div>
                        <div class="skill-level-text">80%</div>
                    </div>
                    <div class="skill-actions">
                        <a href="{{ url('/admin/skills/edit/4') }}" class="btn btn-sm btn-admin-secondary">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Skill Card 5 -->
            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                <div class="skill-card">
                    <div class="skill-icon">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/figma/figma-original.svg" alt="Figma">
                    </div>
                    <div class="skill-name">Figma</div>
                    <div class="skill-category">Design</div>
                    <div class="skill-level">
                        <div class="skill-level-bar">
                            <div class="skill-level-fill" style="width: 85%;"></div>
                        </div>
                        <div class="skill-level-text">85%</div>
                    </div>
                    <div class="skill-actions">
                        <a href="{{ url('/admin/skills/edit/5') }}" class="btn btn-sm btn-admin-secondary">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Skill Card 6 -->
            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                <div class="skill-card">
                    <div class="skill-icon">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/docker/docker-original.svg"
                            alt="Docker">
                    </div>
                    <div class="skill-name">Docker</div>
                    <div class="skill-category">DevOps</div>
                    <div class="skill-level">
                        <div class="skill-level-bar">
                            <div class="skill-level-fill" style="width: 75%;"></div>
                        </div>
                        <div class="skill-level-text">75%</div>
                    </div>
                    <div class="skill-actions">
                        <a href="{{ url('/admin/skills/edit/6') }}" class="btn btn-sm btn-admin-secondary">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Skill Card 7 -->
            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                <div class="skill-card">
                    <div class="skill-icon">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/postgresql/postgresql-original.svg"
                            alt="PostgreSQL">
                    </div>
                    <div class="skill-name">PostgreSQL</div>
                    <div class="skill-category">Base de données</div>
                    <div class="skill-level">
                        <div class="skill-level-bar">
                            <div class="skill-level-fill" style="width: 85%;"></div>
                        </div>
                        <div class="skill-level-text">85%</div>
                    </div>
                    <div class="skill-actions">
                        <a href="{{ url('/admin/skills/edit/7') }}" class="btn btn-sm btn-admin-secondary">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Skill Card 8 -->
            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                <div class="skill-card">
                    <div class="skill-icon">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/git/git-original.svg" alt="Git">
                    </div>
                    <div class="skill-name">Git / GitHub</div>
                    <div class="skill-category">DevOps</div>
                    <div class="skill-level">
                        <div class="skill-level-bar">
                            <div class="skill-level-fill" style="width: 95%;"></div>
                        </div>
                        <div class="skill-level-text">95%</div>
                    </div>
                    <div class="skill-actions">
                        <a href="{{ url('/admin/skills/edit/8') }}" class="btn btn-sm btn-admin-secondary">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- List View (DataTable) -->
    <div id="listView" class="admin-card">
        <div class="table-responsive">
            <table id="skillsTable" class="admin-table table" style="width:100%">
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
                    <!-- Item 1 -->
                    <tr>
                        <td>
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/flutter/flutter-original.svg"
                                style="width: 40px; height: 40px;" alt="Flutter">
                        </td>
                        <td>
                            <strong style="color: var(--admin-text-heading);">Flutter</strong>
                        </td>
                        <td>Mobile</td>
                        <td style="width: 30%;">
                            <div class="d-flex align-items-center">
                                <div class="skill-level-bar flex-grow-1 mb-0 me-3">
                                    <div class="skill-level-fill" style="width: 90%;"></div>
                                </div>
                                <span class="skill-level-text">90%</span>
                            </div>
                        </td>
                        <td style="display:none;">90</td>
                        <td>
                            <a href="{{ url('/admin/skills/edit/1') }}" class="btn btn-sm btn-admin-secondary me-1"
                                title="Modifier">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button class="btn btn-sm btn-danger" title="Supprimer" data-bs-toggle="modal"
                                data-bs-target="#deleteModal">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <!-- Item 2 -->
                    <tr>
                        <td>
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-plain.svg"
                                style="width: 40px; height: 40px;" alt="Laravel">
                        </td>
                        <td>
                            <strong style="color: var(--admin-text-heading);">Laravel</strong>
                        </td>
                        <td>Backend</td>
                        <td style="width: 30%;">
                            <div class="d-flex align-items-center">
                                <div class="skill-level-bar flex-grow-1 mb-0 me-3">
                                    <div class="skill-level-fill" style="width: 95%;"></div>
                                </div>
                                <span class="skill-level-text">95%</span>
                            </div>
                        </td>
                        <td style="display:none;">95</td>
                        <td>
                            <a href="{{ url('/admin/skills/edit/2') }}" class="btn btn-sm btn-admin-secondary me-1"
                                title="Modifier">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button class="btn btn-sm btn-danger" title="Supprimer" data-bs-toggle="modal"
                                data-bs-target="#deleteModal">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <!-- Item 3 -->
                    <tr>
                        <td>
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/spring/spring-original.svg"
                                style="width: 40px; height: 40px;" alt="Spring">
                        </td>
                        <td>
                            <strong style="color: var(--admin-text-heading);">Spring Boot</strong>
                        </td>
                        <td>Backend</td>
                        <td style="width: 30%;">
                            <div class="d-flex align-items-center">
                                <div class="skill-level-bar flex-grow-1 mb-0 me-3">
                                    <div class="skill-level-fill" style="width: 85%;"></div>
                                </div>
                                <span class="skill-level-text">85%</span>
                            </div>
                        </td>
                        <td style="display:none;">85</td>
                        <td>
                            <a href="{{ url('/admin/skills/edit/3') }}" class="btn btn-sm btn-admin-secondary me-1"
                                title="Modifier">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button class="btn btn-sm btn-danger" title="Supprimer" data-bs-toggle="modal"
                                data-bs-target="#deleteModal">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <!-- Item 4 -->
                    <tr>
                        <td>
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg"
                                style="width: 40px; height: 40px;" alt="React">
                        </td>
                        <td>
                            <strong style="color: var(--admin-text-heading);">React JS</strong>
                        </td>
                        <td>Frontend</td>
                        <td style="width: 30%;">
                            <div class="d-flex align-items-center">
                                <div class="skill-level-bar flex-grow-1 mb-0 me-3">
                                    <div class="skill-level-fill" style="width: 80%;"></div>
                                </div>
                                <span class="skill-level-text">80%</span>
                            </div>
                        </td>
                        <td style="display:none;">80</td>
                        <td>
                            <a href="{{ url('/admin/skills/edit/4') }}" class="btn btn-sm btn-admin-secondary me-1"
                                title="Modifier">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button class="btn btn-sm btn-danger" title="Supprimer" data-bs-toggle="modal"
                                data-bs-target="#deleteModal">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <!-- Item 5 -->
                    <tr>
                        <td>
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/figma/figma-original.svg"
                                style="width: 40px; height: 40px;" alt="Figma">
                        </td>
                        <td>
                            <strong style="color: var(--admin-text-heading);">Figma</strong>
                        </td>
                        <td>Design</td>
                        <td style="width: 30%;">
                            <div class="d-flex align-items-center">
                                <div class="skill-level-bar flex-grow-1 mb-0 me-3">
                                    <div class="skill-level-fill" style="width: 85%;"></div>
                                </div>
                                <span class="skill-level-text">85%</span>
                            </div>
                        </td>
                        <td style="display:none;">85</td>
                        <td>
                            <a href="{{ url('/admin/skills/edit/5') }}" class="btn btn-sm btn-admin-secondary me-1"
                                title="Modifier">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button class="btn btn-sm btn-danger" title="Supprimer" data-bs-toggle="modal"
                                data-bs-target="#deleteModal">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <!-- Item 6 -->
                    <tr>
                        <td>
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/docker/docker-original.svg"
                                style="width: 40px; height: 40px;" alt="Docker">
                        </td>
                        <td>
                            <strong style="color: var(--admin-text-heading);">Docker</strong>
                        </td>
                        <td>DevOps</td>
                        <td style="width: 30%;">
                            <div class="d-flex align-items-center">
                                <div class="skill-level-bar flex-grow-1 mb-0 me-3">
                                    <div class="skill-level-fill" style="width: 75%;"></div>
                                </div>
                                <span class="skill-level-text">75%</span>
                            </div>
                        </td>
                        <td style="display:none;">75</td>
                        <td>
                            <a href="{{ url('/admin/skills/edit/6') }}" class="btn btn-sm btn-admin-secondary me-1"
                                title="Modifier">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button class="btn btn-sm btn-danger" title="Supprimer" data-bs-toggle="modal"
                                data-bs-target="#deleteModal">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <!-- Item 7 -->
                    <tr>
                        <td>
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/postgresql/postgresql-original.svg"
                                style="width: 40px; height: 40px;" alt="PostgreSQL">
                        </td>
                        <td>
                            <strong style="color: var(--admin-text-heading);">PostgreSQL</strong>
                        </td>
                        <td>Base de données</td>
                        <td style="width: 30%;">
                            <div class="d-flex align-items-center">
                                <div class="skill-level-bar flex-grow-1 mb-0 me-3">
                                    <div class="skill-level-fill" style="width: 85%;"></div>
                                </div>
                                <span class="skill-level-text">85%</span>
                            </div>
                        </td>
                        <td style="display:none;">85</td>
                        <td>
                            <a href="{{ url('/admin/skills/edit/7') }}" class="btn btn-sm btn-admin-secondary me-1"
                                title="Modifier">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button class="btn btn-sm btn-danger" title="Supprimer" data-bs-toggle="modal"
                                data-bs-target="#deleteModal">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <!-- Item 8 -->
                    <tr>
                        <td>
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/git/git-original.svg"
                                style="width: 40px; height: 40px;" alt="Git">
                        </td>
                        <td>
                            <strong style="color: var(--admin-text-heading);">Git / GitHub</strong>
                        </td>
                        <td>DevOps</td>
                        <td style="width: 30%;">
                            <div class="d-flex align-items-center">
                                <div class="skill-level-bar flex-grow-1 mb-0 me-3">
                                    <div class="skill-level-fill" style="width: 95%;"></div>
                                </div>
                                <span class="skill-level-text">95%</span>
                            </div>
                        </td>
                        <td style="display:none;">95</td>
                        <td>
                            <a href="{{ url('/admin/skills/edit/8') }}" class="btn btn-sm btn-admin-secondary me-1"
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
                    Êtes-vous sûr de vouloir supprimer cette compétence ? Cette action est irréversible.
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
    </script>
@endsection