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
        return static::query()
            ->select("p.*", "s.title as sevices", "s.tag as service_tag", "c.name as categorie")
            ->from("projects as p")
            ->leftjoin("services_projects as sp", "sp.projects_id", "=", "p.id")
            ->leftjoin("services as s", "s.id", "=", "sp.services_id")
            ->leftjoin("categories as c", "c.id", "=", "p.category_id")
            ->get();
    }

    public static function getOneProjetService($id)
    {
        $project = \DB::table('projects as p')
            ->select(
                'p.*',
                'c.name as categorie',
                \DB::raw('GROUP_CONCAT(DISTINCT s.title) as services'),
                \DB::raw('GROUP_CONCAT(DISTINCT sk.name) as skills')
            )
            ->leftJoin('services_projects as sp', 'sp.projects_id', '=', 'p.id')
            ->leftJoin('services as s', 's.id', '=', 'sp.services_id')
            ->leftJoin('categories as c', 'c.id', '=', 'p.category_id')
            ->leftJoin('projects_skills as spk', 'spk.projects_id', '=', 'p.id')
            ->leftJoin('skills as sk', 'sk.id', '=', 'spk.skills_id')
            ->where('p.id', $id)
            ->groupBy('p.id')
            ->first();

        // ✅ Transformer skills en tableau
        if ($project && $project->skills) {
            $project->skills = explode(',', $project->skills);
        } else {
            $project->skills = [];
        }

        return $project;
    }

}
