<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Project;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects' => Project::count(),
            'skills' => Skill::count(),
            'services' => Service::count(),
            'messages' => Message::count(),
            'testimonials' => Testimonial::count(),
            'unread_messages' => Message::where('is_read', false)->count(),
        ];

        $recent_projects = Project::latest()->take(5)->get();
        $recent_messages = Message::latest()->take(5)->get();

        // Data for chart (last 6 months projects)
        $chart_data = $this->getChartData();

        return view('admin.dashboard', compact('stats', 'recent_projects', 'recent_messages', 'chart_data'));
    }

    private function getChartData()
    {
        $months = [];
        $counts = [];

        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $months[] = $date->translatedFormat('F');

            $counts[] = Project::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
        }

        return [
            'labels' => $months,
            'data' => $counts,
        ];
    }
}
