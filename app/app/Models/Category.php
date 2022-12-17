<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Category extends Model
{
    use HasFactory, AsSource, Filterable;

    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $allowedFilters = [
        'id',
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $allowedSorts = [
        'id',
        'name',
        'created_at',
        'updated_at',
        'deleted_at',

    ];

    public function posts()
    {
        return $this->hasMany(Post::class)->where('is_publicated', true)->where('is_draft', false);
    }
}
