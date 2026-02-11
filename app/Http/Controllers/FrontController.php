<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\Skill;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $data = [
            "services" => Service::where("deleted", 0)->orderBy('order')->get(),
            "skills" => Skill::where("deleted", 0)->orderBy('order')->get(),
            "projects" => Project::where("deleted", 0)->orderBy('order')->get()
        ];
        return view("index", $data);
    }

    public function about()
    {
        // About page
    }

    public function portfolio()
    {
        // Portfolio list
    }

    public function portfolioShow($slug)
    {
        // Project detail
    }

    public function blog()
    {
        // Blog list
    }

    public function blogShow($slug)
    {
        // Post detail
    }

    public function contact()
    {
        // Contact page
    }
}
