@extends('layouts.admin')

@section('title', 'Tableau de bord')

@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('styles')
    <style>
        .dashboard-container {
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Stats Cards - Premium Glassmorphism */
        .stat-card-premium {
            background: var(--admin-lighter);
            /* border: 1px solid var(--admin-border); */
            /* background: rgba(13, 27, 62, 0.4); */
            backdrop-filter: blur(10px);
            border: 1px solid rgba(220, 167, 58, 0.1);
            border-radius: 20px;
            padding: 25px;
            position: relative;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            overflow: hidden;
            height: 100%;
        }

        .stat-card-premium:hover {
            transform: translateY(-10px);
            border-color: rgba(220, 167, 58, 0.4);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3), 0 0 20px rgba(220, 167, 58, 0.1);
        }

        .stat-card-premium .icon-box {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 20px;
            background: rgba(220, 167, 58, 0.1);
            color: var(--admin-accent);
            transition: all 0.3s ease;
        }

        .stat-card-premium:hover .icon-box {
            background: var(--admin-accent);
            color: #0a1128;
            transform: scale(1.1) rotate(5deg);
        }

        .stat-value {
            font-size: 36px;
            font-weight: 800;
            margin-bottom: 5px;
            color: #fff;
            letter-spacing: -1px;
        }

        .stat-label {
            font-size: 14px;
            color: var(--admin-text-base);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Ambient Glow */
        .stat-card-premium::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(220, 167, 58, 0.05) 0%, transparent 70%);
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .stat-card-premium:hover::after {
            opacity: 1;
        }

        /* Quick Actions Grid */
        .quick-actions-premium {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
            margin: 40px 0;
        }

        .stat-card {
            background: var(--admin-lighter);
            border: 1px solid var(--admin-border);
            border-radius: 18px;
            padding: 24px;
            text-align: center;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card:hover {
            background: var(--admin-accent);
            transform: scale(1.05);
            box-shadow: 0 15px 30px rgba(220, 167, 58, 0.2);
        }

        .stat-card i {
            font-size: 28px;
            color: var(--admin-accent);
            margin-bottom: 12px;
            display: block;
        }

        .stat-card:hover i, .stat-card:hover span {
            color: #0a1128;
        }

        .stat-card span {
            font-weight: 600;
            color: var(--admin-text-heading);
            font-size: 14px;
        }

        /* Modern Table & Lists */
        .premium-card {
            background: rgba(13, 27, 62, 0.6);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(220, 167, 58, 0.1);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
        }

        .premium-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .premium-card-title {
            font-size: 20px;
            font-weight: 700;
            color: #fff;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .premium-card-title::before {
            content: '';
            width: 4px;
            height: 20px;
            background: var(--admin-accent);
            border-radius: 2px;
        }

        .view-all-link {
            color: var(--admin-accent);
            font-size: 14px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .view-all-link:hover {
            opacity: 0.8;
            padding-right: 5px;
        }

        .project-item {
            display: flex;
            align-items: center;
            padding: 15px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.03);
            margin-bottom: 12px;
            transition: all 0.3s ease;
        }

        .project-item:hover {
            background: rgba(255, 255, 255, 0.08);
            transform: translateX(5px);
        }

        .project-icon {
            width: 45px;
            height: 45px;
            border-radius: 10px;
            background: var(--admin-lighter);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: var(--admin-accent);
            margin-right: 15px;
        }

        .message-row:hover {
            background: rgba(220, 167, 58, 0.05) !important;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 8px;
        }

        .unread-badge {
            background: var(--admin-accent);
            color: #0a1128;
            padding: 2px 8px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
        }
    </style>
@endsection

@section('content')
    <div class="dashboard-container">
        <!-- Greetings -->
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h1 class="h2 mb-1" style="color: #fff; font-weight: 800;">Bonjour, {{ explode(' ', auth()->user()->name)[0] }} ✨</h1>
                <p style="color: var(--admin-text-base); font-size: 16px;">Prêt à transformer vos idées en réalité aujourd'hui ?</p>
            </div>
            <div class="d-none d-md-block text-end">
                <div style="font-size: 14px; color: var(--admin-text-base);">{{ now()->translatedFormat('l d F Y') }}</div>
                <div style="font-size: 24px; font-weight: 700; color: var(--admin-accent);">{{ now()->translatedFormat('H:i') }}</div>
            </div>
        </div>

        <!-- Stats Overview -->
        <div class="row g-4">
            <a href="{{ route('admin.projects') }}" class="col-xl-3 col-sm-6">
                <div class="stat-card-premium">
                    <div class="icon-box">
                        <i class="bi bi-grid-1x2"></i>
                    </div>
                    <div class="stat-value">{{ $stats['projects'] }}</div>
                    <div class="stat-label">Projets créés</div>
                </div>
            </a>
            <a href="{{ route('admin.skills') }}" class="col-xl-3 col-sm-6">
                <div class="stat-card-premium">
                    <div class="icon-box">
                        <i class="bi bi-lightning-charge"></i>
                    </div>
                    <div class="stat-value">{{ $stats['skills'] }}</div>
                    <div class="stat-label">Compétences</div>
                </div>
            </a>
            <a href="{{ route('admin.messages') }}" class="col-xl-3 col-sm-6">
                <div class="stat-card-premium">
                    <div class="icon-box">
                        <i class="bi bi-chat-left-text"></i>
                    </div>
                    <div class="stat-value">{{ $stats['messages'] }}</div>
                    <div class="stat-label">Messages totaux</div>
                    @if($stats['unread_messages'] > 0)
                        <div class="mt-2 unread-badge">{{ $stats['unread_messages'] }} Non lus</div>
                    @endif
                </div>
            </a>
            <a href="{{ route('admin.testimonials') }}" class="col-xl-3 col-sm-6">
                <div class="stat-card-premium">
                    <div class="icon-box">
                        <i class="bi bi-quote"></i>
                    </div>
                    <div class="stat-value">{{ $stats['testimonials'] }}</div>
                    <div class="stat-label">Avis clients</div>
                </div>
            </a>
        </div>


        <div class="row">
            <!-- Analytics Chart -->
            <div class="col-lg-8">
                <div class="premium-card">
                    <div class="premium-card-header">
                        <h3 class="premium-card-title">Progression Portfolio</h3>
                        <div class="badge bg-dark-subtle text-accent border border-accent-subtle px-3 py-2 rounded-pill">
                            Derniers 6 mois
                        </div>
                    </div>
                    <div style="height: 350px;">
                        <canvas id="portfolioChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Recent Items Side -->
            <div class="col-lg-4">
                <div class="premium-card h-100 mb-0">
                    <div class="premium-card-header">
                        <h3 class="premium-card-title">Derniers Projets</h3>
                        <a href="{{ route('admin.projects') }}" class="view-all-link">Voir tout <i class="bi bi-arrow-right"></i></a>
                    </div>
                    <div class="recent-list mt-4">
                        @forelse($recent_projects as $project)
                            <div class="project-item">
                                @if($project->image)
                                    <div class="project-icon" style="background-image: url('{{ asset('storage/'.$project->image) }}'); background-size: cover;"></div>
                                @else
                                    <div class="project-icon"><i class="bi bi-image"></i></div>
                                @endif
                                <div class="flex-grow-1">
                                    <div style="color: #fff; font-weight: 600; font-size: 14px;">{{ Str::limit($project->title, 25) }}</div>
                                    <div style="color: var(--admin-text-base); font-size: 12px;">{{ $project->category ?? 'Web Design' }}</div>
                                </div>
                                <div class="status-dot {{ $project->status == 'published' ? 'bg-success' : 'bg-warning' }}"></div>
                            </div>
                        @empty
                            <p class="text-center py-4" style="color: var(--admin-text-base);">Aucun projet récent</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Messages Full Width -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="premium-card">
                    <div class="premium-card-header">
                        <h3 class="premium-card-title">Messages Récents</h3>
                        <a href="{{ route('admin.messages') }}" class="view-all-link">Détails <i class="bi bi-arrow-right"></i></a>
                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table admin-table" style="--bs-table-bg: transparent;">
                            <thead>
                                <tr>
                                    <th class="ps-4">Expéditeur</th>
                                    <th>Sujet</th>
                                    <th>Date</th>
                                    <th>Statut</th>
                                    <th class="text-end pe-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recent_messages as $message)
                                    <tr class="message-row align-middle border-transparent">
                                        <td class="ps-4">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-initial small me-3" style="width: 35px; height: 35px; font-size: 14px;">
                                                    {{ strtoupper(substr($message->name, 0, 1)) }}
                                                </div>
                                                <div>
                                                    <div style="color: #fff; font-weight: 600;">{{ $message->name }}</div>
                                                    <div style="font-size: 12px; opacity: 0.6;">{{ $message->email }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="color: var(--admin-text-base);">{{ Str::limit($message->subject, 30) }}</td>
                                        <td style="font-size: 13px;">{{ $message->created_at->diffForHumans() }}</td>
                                        <td>
                                            @if($message->is_read)
                                                <span class="badge border border-success-subtle text-success bg-success-subtle rounded-pill" style="font-size: 10px;">LU</span>
                                            @else
                                                <span class="badge border border-warning-subtle text-warning bg-warning-subtle rounded-pill" style="font-size: 10px;">NON LU</span>
                                            @endif
                                        </td>
                                        <td class="text-end pe-4">
                                            <a href="{{ route('admin.messages.show', $message->id) }}" class="btn btn-sm btn-admin-secondary p-2 rounded-3">
                                                <i class="bi bi-eye m-0"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-5" style="color: var(--admin-text-base);">Félicitations ! Votre boîte de réception est vide.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('portfolioChart').getContext('2d');
            
            // Create Gradient
            const gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, 'rgba(220, 167, 58, 0.4)');
            gradient.addColorStop(1, 'rgba(220, 167, 58, 0)');

            const chartData = @json($chart_data);

            const portfolioChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: chartData.labels,
                    datasets: [{
                        label: 'Projets créés',
                        data: chartData.data,
                        borderColor: '#dca73a',
                        backgroundColor: gradient,
                        borderWidth: 4,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#dca73a',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 3,
                        pointRadius: 6,
                        pointHoverRadius: 8,
                        pointHoverBorderWidth: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#0d1b3e',
                            titleColor: '#fff',
                            bodyColor: '#aab8c5',
                            borderColor: 'rgba(220, 167, 58, 0.5)',
                            borderWidth: 1,
                            padding: 15,
                            cornerRadius: 12,
                            displayColors: false,
                            callbacks: {
                                label: function(context) {
                                    return context.parsed.y + ' Projets ajoutés';
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { color: 'rgba(255, 255, 255, 0.05)', drawBorder: false },
                            ticks: { 
                                color: '#aab8c5',
                                font: { size: 12 },
                                stepSize: 1
                            }
                        },
                        x: {
                            grid: { display: false },
                            ticks: { 
                                color: '#aab8c5',
                                font: { size: 12 }
                            }
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    }
                }
            });
        });
    </script>
@endsection