<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use App\Models\Service;
use App\Models\Skill;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $data = [
            "projects" => Project::getProjetService()
        ];

        // dd(Project::getProjetService());
        return view("admin.projects.index", $data);
    }

    public function create()
    {
        $data = [
            "categories" => Category::Where("type", "project")->get(),
            "services" => Service::where("deleted", 0)->get(),
            "skills" => Skill::orderBy('name')->get(),
        ];
        return view("admin.projects.create", $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'start_date' => 'nullable|date',
            'completion_date' => 'nullable|date',
            'status' => 'required|in:draft,published,archived',
        ]);

        $input = $request->all();
        $input['slug'] = \Illuminate\Support\Str::slug($request->title);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/projects'), $imageName);
            $input['image'] = 'uploads/projects/' . $imageName;
        }

        $project = Project::create($input);

        if ($request->has('services')) {
            foreach ($request->services as $service_id) {
                \DB::table('services_projects')->insert([
                    'projects_id' => $project->id,
                    'services_id' => $service_id,
                ]);
            }
        }

        if ($request->has('skills')) {
            foreach ($request->skills as $skill_id) {
                \DB::table('projects_skills')->insert([
                    'projects_id' => $project->id,
                    'skills_id' => $skill_id,
                ]);
            }
        }

        return redirect()->route('admin.projects')->with('success', 'Projet créé avec succès.');
    }

    public function show(Project $project)
    {
        return view("admin.projects.show", compact('project'));
    }

    public function edit(Project $project)
    {
        $data = [
            "project" => $project,
            "categories" => Category::Where("type", "project")->get(),
            "services" => Service::where("deleted", 0)->get(),
            "skills" => Skill::orderBy('name')->get(),
            "projectServices" => \DB::table('services_projects')->where('projects_id', $project->id)->pluck('services_id')->toArray(),
            "projectSkills" => \DB::table('projects_skills')->where('projects_id', $project->id)->pluck('skills_id')->toArray()
        ];
        return view("admin.projects.edit", $data);
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'start_date' => 'nullable|date',
            'completion_date' => 'nullable|date',
            'status' => 'required|in:draft,published,archived',
        ]);

        $input = $request->all();
        $input['slug'] = \Illuminate\Support\Str::slug($request->title);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($project->image && file_exists(public_path($project->image))) {
                unlink(public_path($project->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/projects'), $imageName);
            $input['image'] = 'uploads/projects/' . $imageName;
        }

        $project->update($input);

        // Sync Services
        \DB::table('services_projects')->where('projects_id', $project->id)->delete();
        if ($request->has('services')) {
            foreach ($request->services as $service_id) {
                \DB::table('services_projects')->insert([
                    'projects_id' => $project->id,
                    'services_id' => $service_id,
                ]);
            }
        }

        // Sync Skills
        \DB::table('projects_skills')->where('projects_id', $project->id)->delete();
        if ($request->has('skills')) {
            foreach ($request->skills as $skill_id) {
                \DB::table('projects_skills')->insert([
                    'projects_id' => $project->id,
                    'skills_id' => $skill_id,
                ]);
            }
        }

        return redirect()->route('admin.projects')->with('success', 'Projet mis à jour avec succès.');
    }

    public function destroy(Project $project)
    {
        if ($project->image && file_exists(public_path($project->image))) {
            unlink(public_path($project->image));
        }

        \DB::table('services_projects')->where('projects_id', $project->id)->delete();
        \DB::table('projects_skills')->where('projects_id', $project->id)->delete();
        $project->delete();

        return redirect()->route('admin.projects')->with('success', 'Projet supprimé avec succès.');
    }
}
