<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Post;

use App\Models\Post;
use App\Models\User;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PostLastListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'posts';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('title', 'Title')
                ->filter(TD::FILTER_TEXT)
                ->render(function (Post $post): string|null {
                    if ($post_id = $post->id) {
                        return "<a data-turbo=\"true\" class=\"btn btn-link\" href=\"/news/$post->id\">$post->title</a>";
                    }
                })
                ->sort(),

            TD::make('user_id', 'Author')
                ->filter(TD::FILTER_TEXT)
                ->sort()
                ->render(function (Post $post): string|null {
                    if ($user_id = $post->user_id) {
                        $user = User::find($user_id);
                        $user_name = $user->name;
                        return $user_name;
                    } else {
                        return null;
                    }
                }),

            TD::make('publicated_at', 'Publicated at')
                ->filter(TD::FILTER_DATE_RANGE)
                ->render(function (Post $post) {
                    return date('d.m.Y H:i', strtotime($post->publicated_at));
                })
                ->sort(),
        ];
    }
}
