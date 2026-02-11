<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SkillController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\FrontController;

Route::get('/', [FrontController::class, "index"])->name("index");
Route::get("/blog-details", function () {
    return view("blog-details");
})->name("blog.detail");

Route::get('/detail-projet/{project}', [SkillController::class, "detail"])->name("project.detail");

Route::prefix("/admin")->group(function () {
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

    // le skills 
    Route::get('/competences', [SkillController::class, "index"])->name("admin.skills");
    Route::get('/competences/create', [SkillController::class, "create"])->name("admin.skills.create");
    Route::post('/competences', [SkillController::class, "store"])->name("admin.skills.store");
    Route::get('/competences/{skill}/edit', [SkillController::class, "edit"])->name("admin.skills.edit");
    Route::put('/competences/{skill}', [SkillController::class, "update"])->name("admin.skills.update");
    Route::delete('/competences/{skill}', [SkillController::class, "destroy"])->name("admin.skills.destroy");

    // les servies 
    Route::get('/services', [ServiceController::class, "index"])->name("admin.services");
    Route::get('/services/create', [ServiceController::class, "create"])->name("admin.services.create");
    Route::post('/services', [ServiceController::class, "store"])->name("admin.services.store");
    Route::get('/services/{service}/edit', [ServiceController::class, "edit"])->name("admin.services.edit");
    Route::put('/services/{service}', [ServiceController::class, "update"])->name("admin.services.update");
    Route::delete('/services/{service}', [ServiceController::class, "destroy"])->name("admin.services.destroy");

    //les routes du blog
    Route::get('/blogs', function () {
        return view('admin.blogs.index');
    })->name("admin.blog");
    Route::get('/blogs/show', function () {
        return view('admin.blogs.show');
    })->name("admin.blog.show");
    Route::get('/blogs/edit', function () {
        return view('admin.blogs.edit');
    })->name("admin.blog.edit");
    Route::get('/blogs/delete', function () {
        return view('admin.blogs.delete');
    })->name("admin.blog.delete");

    Route::get("/blog/create", function () {
        return view("admin.blogs.create");
    })->name("admin.blog.create");


    Route::get('/blogs/create', function () {
        return view('admin.blogs.create');
    })->name("admin.blog.create");

    Route::get('/blogs/edit', function () {
        return view('admin.blogs.edit');
    })->name("admin.blog.edit");

    Route::get('/messages', function () {
        return view('admin.messages.index');
    })->name("admin.messages");

    Route::get('/settings', function () {
        return view('admin.settings.index');
    })->name("admin.settings");
});

