@extends('layouts.admin')

@section('title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('styles')
    <style>
        .stat-card {
            background: linear-gradient(135deg, var(--admin-bg-secondary) 0%, var(--admin-lighter) 100%);
            border: 1px solid var(--admin-border);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 25px;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(220, 167, 58, 0.2);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            background: var(--admin-accent);
            opacity: 0.1;
            border-radius: 50%;
            transform: translate(30%, -30%);
        }

        .stat-card-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin-bottom: 15px;
        }

        .stat-card-icon.primary {
            background: rgba(220, 167, 58, 0.2);
            color: var(--admin-accent);
        }

        .stat-card-icon.success {
            background: rgba(40, 167, 69, 0.2);
            color: #28a745;
        }

        .stat-card-icon.info {
            background: rgba(23, 162, 184, 0.2);
            color: #17a2b8;
        }

        .stat-card-icon.warning {
            background: rgba(255, 193, 7, 0.2);
            color: #ffc107;
        }

        .stat-card-value {
            font-size: 32px;
            font-weight: 700;
            color: var(--admin-text-heading);
            margin: 10px 0;
        }

        .stat-card-label {
            color: var(--admin-text-base);
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-card-trend {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 12px;
            margin-top: 10px;
            padding: 4px 10px;
            border-radius: 20px;
        }

        .stat-card-trend.up {
            background: rgba(40, 167, 69, 0.2);
            color: #28a745;
        }

        .stat-card-trend.down {
            background: rgba(220, 53, 69, 0.2);
            color: #dc3545;
        }

        .chart-container {
            position: relative;
            height: 300px;
            margin-top: 20px;
        }

        .project-img {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            object-fit: cover;
        }

        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }

        .quick-action-btn {
            background: var(--admin-lighter);
            border: 1px solid var(--admin-border);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            color: var(--admin-text-base);
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .quick-action-btn:hover {
            background: var(--admin-accent);
            color: var(--admin-bg-secondary);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(220, 167, 58, 0.3);
        }

        .quick-action-btn i {
            font-size: 32px;
        }
    </style>
@endsection

@section('content')
    <div class="row mb-4">
        <div class="col-12">
            <h2 style="color: var(--admin-text-heading); margin-bottom: 5px;">Bienvenue, Youssouf 👋</h2>
            <p style="color: var(--admin-text-base);">Voici un aperçu de votre activité</p>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="stat-card-icon primary">
                    <i class="bi bi-folder"></i>
                </div>
                <div class="stat-card-value">12</div>
                <div class="stat-card-label">Projets</div>
                <span class="stat-card-trend up">
                    <i class="bi bi-arrow-up"></i> +3 ce mois
                </span>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="stat-card-icon success">
                    <i class="bi bi-star"></i>
                </div>
                <div class="stat-card-value">18</div>
                <div class="stat-card-label">Compétences</div>
                <span class="stat-card-trend up">
                    <i class="bi bi-arrow-up"></i> +2 ce mois
                </span>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="stat-card-icon info">
                    <i class="bi bi-briefcase"></i>
                </div>
                <div class="stat-card-value">6</div>
                <div class="stat-card-label">Services</div>
                <span class="stat-card-trend">
                    <i class="bi bi-dash"></i> Stable
                </span>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="stat-card-icon warning">
                    <i class="bi bi-envelope"></i>
                </div>
                <div class="stat-card-value">24</div>
                <div class="stat-card-label">Messages</div>
                <span class="stat-card-trend up">
                    <i class="bi bi-arrow-up"></i> +8 cette semaine
                </span>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="quick-actions">
        <a href="{{ url('/admin/projects/create') }}" class="quick-action-btn">
            <i class="bi bi-plus-circle"></i>
            <span>Nouveau Projet</span>
        </a>
        <a href="{{ url('/admin/skills/create') }}" class="quick-action-btn">
            <i class="bi bi-plus-circle"></i>
            <span>Nouvelle Compétence</span>
        </a>
        <a href="{{ url('/admin/services/create') }}" class="quick-action-btn">
            <i class="bi bi-plus-circle"></i>
            <span>Nouveau Service</span>
        </a>
        <a href="{{ url('/admin/messages') }}" class="quick-action-btn">
            <i class="bi bi-envelope-open"></i>
            <span>Voir Messages</span>
        </a>
    </div>

    <!-- Charts and Tables Row -->
    <div class="row">
        <!-- Chart -->
        <div class="col-lg-8">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5>Activité des Projets</h5>
                    <select class="form-select form-select-sm admin-form-control" style="width: auto;">
                        <option>6 derniers mois</option>
                        <option>12 derniers mois</option>
                        <option>Cette année</option>
                    </select>
                </div>
                <div class="chart-container">
                    <canvas id="projectsChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Recent Projects -->
        <div class="col-lg-4">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5>Projets Récents</h5>
                    <a href="{{ url('/admin/projects') }}"
                        style="color: var(--admin-accent); font-size: 14px; text-decoration: none;">Voir tout</a>
                </div>
                <div class="list-group" style="background: transparent;">
                    <div class="list-group-item"
                        style="background: var(--admin-lighter); border: 1px solid var(--admin-border); margin-bottom: 10px; border-radius: 10px;">
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/50/dca73a/0a1128?text=DRH" class="project-img me-3"
                                alt="Project">
                            <div class="flex-grow-1">
                                <h6 style="color: var(--admin-text-heading); margin: 0; font-size: 14px;">Projet DRH INP-HB
                                </h6>
                                <small style="color: var(--admin-text-base);">Développement Web</small>
                            </div>
                            <span class="badge-admin-success">Publié</span>
                        </div>
                    </div>

                    <div class="list-group-item"
                        style="background: var(--admin-lighter); border: 1px solid var(--admin-border); margin-bottom: 10px; border-radius: 10px;">
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/50/dca73a/0a1128?text=PSR" class="project-img me-3"
                                alt="Project">
                            <div class="flex-grow-1">
                                <h6 style="color: var(--admin-text-heading); margin: 0; font-size: 14px;">Plateforme PSR
                                </h6>
                                <small style="color: var(--admin-text-base);">Back-office</small>
                            </div>
                            <span class="badge-admin-success">Publié</span>
                        </div>
                    </div>

                    <div class="list-group-item"
                        style="background: var(--admin-lighter); border: 1px solid var(--admin-border); margin-bottom: 10px; border-radius: 10px;">
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/50/dca73a/0a1128?text=BAC" class="project-img me-3"
                                alt="Project">
                            <div class="flex-grow-1">
                                <h6 style="color: var(--admin-text-heading); margin: 0; font-size: 14px;">Concours BAC</h6>
                                <small style="color: var(--admin-text-base);">Migration Laravel</small>
                            </div>
                            <span class="badge-admin-warning">Brouillon</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Messages -->
    <div class="row">
        <div class="col-12">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5>Messages Récents</h5>
                    <a href="{{ url('/admin/messages') }}"
                        style="color: var(--admin-accent); font-size: 14px; text-decoration: none;">Voir tout</a>
                </div>
                <div class="table-responsive">
                    <table class="admin-table table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Sujet</th>
                                <th>Date</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="color: var(--admin-text-heading); font-weight: 600;">Jean Kouassi</td>
                                <td>jean.kouassi@example.com</td>
                                <td>Demande de devis site web</td>
                                <td>08 Fév 2026</td>
                                <td><span class="badge-admin-info">Non lu</span></td>
                                <td>
                                    <button class="btn btn-sm btn-admin-secondary">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td style="color: var(--admin-text-heading); font-weight: 600;">Marie Diabaté</td>
                                <td>marie.diabate@example.com</td>
                                <td>Collaboration projet mobile</td>
                                <td>07 Fév 2026</td>
                                <td><span class="badge-admin-success">Lu</span></td>
                                <td>
                                    <button class="btn btn-sm btn-admin-secondary">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td style="color: var(--admin-text-heading); font-weight: 600;">Abdoul Traoré</td>
                                <td>abdoul.traore@example.com</td>
                                <td>Question sur vos services</td>
                                <td>06 Fév 2026</td>
                                <td><span class="badge-admin-success">Lu</span></td>
                                <td>
                                    <button class="btn btn-sm btn-admin-secondary">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        // Projects Activity Chart
        const ctx = document.getElementById('projectsChart').getContext('2d');
        const projectsChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Septembre', 'Octobre', 'Novembre', 'Décembre', 'Janvier', 'Février'],
                datasets: [{
                    label: 'Projets créés',
                    data: [2, 3, 1, 4, 2, 3],
                    borderColor: '#dca73a',
                    backgroundColor: 'rgba(220, 167, 58, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#dca73a',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 7
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#0d1b3e',
                        titleColor: '#ffffff',
                        bodyColor: '#aab8c5',
                        borderColor: '#dca73a',
                        borderWidth: 1,
                        padding: 12,
                        displayColors: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: '#aab8c5',
                            stepSize: 1
                        },
                        grid: {
                            color: 'rgba(220, 167, 58, 0.1)',
                            drawBorder: false
                        }
                    },
                    x: {
                        ticks: {
                            color: '#aab8c5'
                        },
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    </script>
@endsection