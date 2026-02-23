<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SkillController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\TestimonialController;

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;

use App\Http\Controllers\Auth\LoginController;

Route::get('/', [FrontController::class, "index"])->name("index");
// Route::post("/{slug}", [FrontController::class, "portfolioShow"])->name("blog.detail");
Route::post("/contact", [\App\Http\Controllers\ContactController::class, "store"])->name("contact.store");

Route::get('/avis', [TestimonialController::class, "create"])->name("avis");
Route::post('/avis', [TestimonialController::class, "store"])->name("avis.store");

Route::get('/you-soft-projet', [FrontController::class, "portfolio"])->name("portfolio");
Route::get('/project/{slug}', [FrontController::class, "portfolioShow"])->name("project.detail");

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix("/admin")->middleware('auth')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name("admin");

    Route::get('/profile', [ProfileController::class, 'index'])->name("admin.profile");
    Route::post('/profile', [ProfileController::class, 'update'])->name("admin.profile.update");
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name("admin.profile.password");

    // Les projets 
    Route::get('/projects', [ProjectController::class, 'index'])->name("admin.projects");
    Route::get('/projects/create', [ProjectController::class, "create"])->name("admin.projects.create");
    Route::post('/projects', [ProjectController::class, 'store'])->name("admin.projects.store");
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name("admin.projects.edit");
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name("admin.projects.update");
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name("admin.projects.destroy");

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


    // Route::get('/blogs/create', function () {
    //     return view('admin.blogs.create');
    // })->name("admin.blog.create");

    Route::get('/blogs/edit', function () {
        return view('admin.blogs.edit');
    })->name("admin.blog.edit");

    Route::get('/messages', [MessageController::class, 'index'])->name("admin.messages");
    Route::get('/messages/{message}', [MessageController::class, 'show'])->name("admin.messages.show");
    Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name("admin.messages.destroy");

    // Témoignages
    Route::get('/testimonials', [TestimonialController::class, 'index'])->name("admin.testimonials");
    Route::post('/testimonials/{testimonial}/toggle', [TestimonialController::class, 'toggleStatus'])->name("admin.testimonials.toggle");
    Route::delete('/testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name("admin.testimonials.destroy");

    Route::get('/settings', [SettingController::class, 'index'])->name("admin.settings");
    Route::post('/settings', [SettingController::class, 'update'])->name("admin.settings.update");
});

