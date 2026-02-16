<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $data = [
            "services" => Service::where("deleted", 0)->orderBy('order')->get(),
            "skills" => Skill::where("deleted", 0)->orderBy('order')->get(),
            "projects" => Project::where("deleted", 0)->limit(4)->get(),
            "testimonials" => Testimonial::where("is_active", 1)->get(),
        ];
        return view("index", $data);
    }

    public function about()
    {
        // About page
    }

    public function portfolio()
    {
        $data = [
            "services" => Service::where("deleted", 0)->orderBy('order')->get(),
            "projects" => Project::getProjetService(),
        ];

        // dd(Project::getProjetService());
        return view("projects", $data);
    }

    public function portfolioShow($project)
    {

    // dd($project);
        $data = [
            "project" => Project::getOneProjetService($project)
        ];

        // dd(Project::getOneProjetService($project));
        return view("project-details", $data);
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
