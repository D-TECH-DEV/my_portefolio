<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name("index");


Route::prefix("/admin")->group(function() {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name("admin");

    Route::get('/profile', function () {
        return view('admin.profile.index');
    })->name("admin.profile");

    Route::get('/projects', function () {
        return view('admin.projects.index');
    })->name("admin.projects");

     Route::get('/projects/create', function () {
        return view('admin.projects.create');
    })->name("admin.projects.create");

     Route::get('/competences', function () {
        return view('admin.skills.index');
    })->name("admin.skills");

    Route::get('/services', function () {
        return view('admin.services.index');
    })->name("admin.services");

    Route::get('/messages', function () {
        return view('admin.messages.index');
    })->name("admin.messages");

    Route::get('/settings', function () {
        return view('admin.settings.index');
    })->name("admin.settings");
});

