<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Category extends Model
{
    use HasFactory, AsSource, Filterable;

    protected $fillable = [
        'name',
        'slug',
    ];

    protected $hidden = [
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
        return $this->hasMany(Post::class)
            ->where('is_draft', false)
            ->where('is_publicated', true)
            ->where('publicated_at', '<=', now());
    }

    protected static function boot() {
        parent::boot();

        static::creating(function (Category $category) {
            $category->slug = Str::slug($category->name);
        });
    }
}
