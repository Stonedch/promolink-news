<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Post;

use App\Models\Post;
use App\Models\User;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PostListLayout extends Table
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
            TD::make('id', '#')
                ->filter(TD::FILTER_NUMERIC)
                ->sort()
                ->defaultHidden()
                ->width(100),

            TD::make('title', 'Title')
                ->filter(TD::FILTER_TEXT)
                ->sort()
                ->width(200),

            TD::make('user_id', 'Author')
                ->filter(TD::FILTER_TEXT)
                ->sort()
                ->render(function (Post $post): Link|null {
                    if ($user_id = $post->user_id) {
                        $user = User::find($user_id);
                        $user_name = $user->name;
                        return Link::make($user_name)->route('platform.systems.users.edit', $user);
                    } else {
                        return null;
                    }
                })
                ->width(200),

            TD::make('is_draft', 'Is draft')
                ->filter(TD::FILTER_SELECT, [true => 'Yes', false => 'No'])
                ->sort()
                ->render(function (Post $post) {
                    return $post->is_draft ? 'Yes' : 'No';
                })
                ->width(100),

            TD::make('is_publicated', 'Is publicated')
                ->filter(TD::FILTER_SELECT, [true => 'Yes', false => 'No'])
                ->sort()
                ->render(function (Post $post) {
                    return $post->is_publicated ? 'Yes' : 'No';
                })
                ->width(100),

            TD::make('publicated_at', 'Publicated at')
                ->filter(TD::FILTER_DATE_RANGE)
                ->render(function (Post $post) {
                    return date('d.m.Y H:i', strtotime($post->publicated_at));
                })
                ->sort(),

            TD::make('created_at', 'Created at')
                ->filter(TD::FILTER_DATE_RANGE)
                ->render(function (Post $post) {
                    return date('d.m.Y H:i', strtotime($post->created_at->toString()));
                })
                ->sort(),

            TD::make('updated_at', 'Updated at')
                ->filter(TD::FILTER_DATE_RANGE)
                ->render(function (Post $post) {
                    return date('d.m.Y H:i', strtotime($post->updated_at->toString()));
                })
                ->sort(),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Post $post) => DropDown::make()
                    ->icon('options-vertical')
                    ->list([
                        Link::make(__('Edit'))
                            ->route('platform.post.edit', $post->id)
                            ->icon('pencil'),

                        Button::make(__('Delete'))
                            ->icon('trash')
                            ->confirm(__('Are you sure?'))
                            ->method('remove', [
                                'id' => $post->id,
                            ]),
                    ])),
        ];
    }
}
