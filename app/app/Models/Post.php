<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Post extends Model
{
    use HasFactory, AsSource, Filterable;

    protected $fillable = [
        'title',
        'body',
        'is_draft',
    ];

    protected $hidden = [
        'id',
        'user_id',
        'is_publicated',
        'publicated_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $allowedFilters = [
        'id',
        'title',
        'user_id',
        'is_draft',
        'is_publicated',
        'publicated_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $allowedSorts = [
        'id',
        'title',
        'user_id',
        'is_draft',
        'is_publicated',
        'publicated_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
