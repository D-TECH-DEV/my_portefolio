<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $data = [
            "services" => Service::where("deleted", 0)->orderBy('order')->get()
        ];
        return view("admin.services.index", $data);
    }

    public function create()
    {
        return view("admin.services.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'icon' => 'required|string',
            'order' => 'nullable|integer',
        ]);

        $input = $request->only(['title', 'description', 'icon', 'order']);

        Service::create($input);

        return redirect()->route('admin.services')->with('success', 'Service créé avec succès.');
    }

    public function edit(Service $service)
    {
        $data = [
            "service" => $service
        ];
        return view("admin.services.edit", $data);
    }

    public function update(Request $request, Service $service)
    {
        // @dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'icon' => 'required|string',
            'order' => 'nullable|integer',
        ]);

        $input = $request->only(['title', 'description', 'icon', 'order']);

        $service->update($input);

        return redirect()->route('admin.services')->with('success', 'Service mis à jour avec succès.');
    }

    public function destroy(Service $service)
    {
        $service->update([
            "deleted" => 1
        ]);

        return redirect()->route('admin.services')->with('success', 'Service supprimé avec succès.');
    }
}
