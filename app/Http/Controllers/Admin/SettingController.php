<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        // dd($settings);
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', 'logo']);

        // dd($request->all());
        foreach ($data as $key => $value) {
            Setting::set($key, $value);
        }

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('settings', 'public');
            Setting::set('site_logo', $path);
        }

        if ($request->hasFile('cv')) {
            $file = $request->file('cv');
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('settings', $filename, 'public');
            Setting::set('site_cv', $path);
        }

        // Clear settings cache
        \Illuminate\Support\Facades\Cache::forget('site_settings');

        return redirect()->back()->with('success', 'Paramètres mis à jour avec succès.');
    }
}
