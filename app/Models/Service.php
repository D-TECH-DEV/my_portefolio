<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public $table = "services"; 

    protected $fillable = [
        'title',
        'description',
        'icon',
        'order',
        'deleted'
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'projects_has_services');
    }
}
