<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Category;

use App\Models\Category;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class CategoryListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'categories';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('id', __('#'))
                ->filter(TD::FILTER_NUMERIC)
                ->sort()
                ->defaultHidden()
                ->width(100),

            TD::make('name', __('Name'))
                ->filter(TD::FILTER_TEXT)
                ->sort()
                ->width(200),

            TD::make('slug', __('Slug'))
                ->filter(TD::FILTER_TEXT)
                ->sort()
                ->width(200),

            TD::make('created_at', __('Created at'))
                ->filter(TD::FILTER_DATE_RANGE)
                ->defaultHidden()
                ->render(function (Category $category) {
                    return date('d.m.Y H:i', strtotime($category->created_at->toString()));
                })
                ->sort(),

            TD::make('updated_at', __('Updated at'))
                ->filter(TD::FILTER_DATE_RANGE)
                ->defaultHidden()
                ->render(function (Category $category) {
                    return date('d.m.Y H:i', strtotime($category->updated_at->toString()));
                })
                ->sort(),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Category $category) => DropDown::make()
                    ->icon('options-vertical')
                    ->list([
                        Link::make(__('Edit'))
                            ->route('platform.category.edit', $category->id)
                            ->icon('pencil'),

                        Button::make(__('Delete'))
                            ->icon('trash')
                            ->confirm(__('Are you sure?'))
                            ->method('remove', [
                                'id' => $category->id,
                            ]),
                    ])),
        ];
    }
}
