<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Post;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Layouts\Rows;

class PostEditLayout extends Rows
{
    /**
     * Views.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('post.title')
                ->type('text')
                ->max(256)
                ->required()
                ->title(__('Title')),

            Relation::make('post.category_id')
                ->fromModel(Category::class, 'name')
                ->required()
                ->title(__('Category')),

            SimpleMDE::make('post.body')
                ->required()
                ->title(__('Post body')),

            Group::make([
                Relation::make('post.user_id')
                    ->value(Auth::id())
                    ->fromModel(User::class, 'name')
                    ->searchColumns('name')
                    ->title(__('Author')),

                DateTimer::make('post.publicated_at')
                    ->value(now())
                    ->format24hr()
                    ->enableTime()
                    ->title(__('Publicated at')),
            ]),

            Group::make([
                CheckBox::make('post.is_draft')
                    ->value(1)
                    ->sendTrueOrFalse()
                    ->title(__('Is draft')),

                CheckBox::make('post.is_publicated')
                    ->value(0)
                    ->sendTrueOrFalse()
                    ->title(__('Is publicated')),
            ]),
        ];
    }
}
