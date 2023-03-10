<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Post extends Model
{
    use HasFactory, AsSource, Filterable;

    protected $fillable = [
        'title',
        'body',
        'user_id',
        'is_draft',
        'is_publicated',
        'publicated_at',
        'category_id',
    ];

    protected $hidden = [
        'user_id',
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

    public function user() {
        return User::find($this->user_id);
    }

    public function date() {
        return $this->publicated_at ? date('d.m.Y H:i', strtotime($this->publicated_at)) : null;
    }

    public function category() {
        return Category::find($this->category_id);
    }

    protected static function boot() {
        parent::boot();

        static::creating(function (Post $post) {
            $post->slug = Str::slug($post->title);
        });
    }
}
