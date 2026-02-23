<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
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
            "projects" => Project::where("deleted", 0)->where("status", "published")->limit(4)->get(),
            "testimonials" => Testimonial::where("is_active", 1)->get(),
        ];
        return view("index", $data);
    }

    public function about()
    {

    }

    public function portfolio()
    {
        $data = [
            "services" => Service::where("deleted", 0)->orderBy('order')->get(),
            "projects" => Project::getFrontProjetService(),
        ];

        // dd(Project::getProjetService());
        return view("projects", $data);
    }

    public function portfolioShow($slug)
    {

        // dd($slug);
        $data = [
            "project" => Project::getOneProjetService($slug)
        ];

        // dd(Project::getOneProjetService($slug));
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
