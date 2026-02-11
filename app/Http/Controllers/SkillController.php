<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('order')->get();
        return view("admin.skills.index", compact('skills'));
    }

    public function create()
    {
        return view("admin.skills.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'proficiency' => 'required|integer|min:0|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required|string',
            'order' => 'nullable|integer',
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/skills'), $imageName);
            $input['image'] = 'images/skills/' . $imageName;
        }

        Skill::create($input);

        return redirect()->route('admin.skills')->with('success', 'Compétence créée avec succès.');
    }

    public function show(Skill $skill)
    {
        return view('admin.skills.show', compact('skill'));
    }

    public function edit(Skill $skill)
    {
        return view("admin.skills.edit", compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'proficiency' => 'required|integer|min:0|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required|string',
            'order' => 'nullable|integer',
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($skill->image && file_exists(public_path($skill->image))) {
                unlink(public_path($skill->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/skills'), $imageName);
            $input['image'] = 'images/skills/' . $imageName;
        } else {
            unset($input['image']);
        }

        $skill->update($input);

        return redirect()->route('admin.skills')->with('success', 'Compétence mise à jour avec succès.');
    }

    public function detail (Project $project) {

        $data = [
            "project" => $project
        ];
        return view("project-details");
    }

    public function destroy(Skill $skill)
    {
        if ($skill->image && file_exists(public_path($skill->image))) {
            unlink(public_path($skill->image));
        }

        $skill->delete();

        return redirect()->route('admin.skills')->with('success', 'Compétence supprimée avec succès.');
    }
}
