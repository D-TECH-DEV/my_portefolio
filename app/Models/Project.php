<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
