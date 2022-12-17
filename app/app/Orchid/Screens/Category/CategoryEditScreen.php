<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Category;

use App\Models\Category;
use App\Orchid\Layouts\Category\CategoryEditLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class CategoryEditScreen extends Screen
{
    public $category;

    public function query(Category $category): iterable
    {
        return [
            'category' => $category,
        ];
    }

    public function name(): ?string
    {
        return __('Manage category');
    }

    public function permission(): ?iterable
    {
        return [
            'platform.posts',
        ];
    }

    public function commandBar(): iterable
    {
        return [
            Button::make(__('Save'))
                ->icon('check')
                ->method('save'),

            Button::make(__('Remove'))
                ->icon('trash')
                ->method('remove')
                ->canSee($this->category->exists),
        ];
    }

    public function layout(): iterable
    {
        return [
            CategoryEditLayout::class,
        ];
    }

    public function save(Request $request, Category $category)
    {
        $category->fill($request->get('category'));

        $category->save();

        Toast::info(__('Category was saved'));

        return redirect()->route('platform.category.list');
    }

    public function remove(Category $category)
    {
        $category->delete();

        Toast::info(__('Category was removed'));

        return redirect()->route('platform.category.list');
    }
}
