<?php

declare(strict_types=1);

namespace App\Orchid\Screens;

use App\Models\Post;
use App\Orchid\Layouts\Post\PostLastListLayout;
use App\Orchid\Layouts\Post\PostListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class PlatformScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'posts' => Post::filters()->where('is_draft', false)->where('is_publicated', true)->paginate(),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return __('Promolink News');
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make(__('Website'))
                ->href('/')
                ->icon('globe-alt'),

            Link::make(__('GitHub'))
                ->href('https://github.com/stonedch/')
                ->icon('social-github'),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            PostLastListLayout::class,
        ];
    }
}
