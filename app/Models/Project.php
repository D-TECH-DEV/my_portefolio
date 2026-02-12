<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'description',
        'content',
        'image',
        'gallery',
        'client',
        'link',
        'repo_link',
        'start_date',
        'completion_date',
        'status',
        'meta_title',
        'meta_description',
        'order',
    ];

    protected $casts = [
        'gallery' => 'array',
        'start_date' => 'date',
        'completion_date' => 'date',
    ];
    

    // public function services()
    // {
    //     return $this->belongsToMany(Service::class, 'project_service');
    // }


    public static function getProjetService() {
        return static::query()->select("p.*", "s.title as sevices", "s.tag as service_tag")
            ->from("projects as p")
            ->leftjoin("services_projects as sp", "sp.projects_id", "=", "p.id")
            ->leftjoin("services as s", "s.id", "=", "sp.services_id")
            ->get();
    }

    public static function getOneProjetService($id) {
        return static::query()->select("p.*", "s.title as sevices", "s.tag as service_tag")
            ->from("projects as p")
            ->leftjoin("services_projects as sp", "sp.projects_id", "=", "p.id")
            ->leftjoin("services as s", "s.id", "=", "sp.services_id")
            ->where("p.id", $id)
            ->first();
    }
}
