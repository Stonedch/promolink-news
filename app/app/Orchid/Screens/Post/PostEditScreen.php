<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Post;

use App\Models\Post;
use App\Orchid\Layouts\Post\PostEditLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class PostEditScreen extends Screen
{
    /**
     * @var Post
     */
    public $post;

    /**
     * Query data.
     *
     * @param Post $role
     *
     * @return array
     */
    public function query(Post $post): iterable
    {
        return [
            'post' => $post,
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return __('Manage posts');
    }

    /**
     * @return iterable|null
     */
    public function permission(): ?iterable
    {
        return [
            'platform.posts',
        ];
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make(__('Save'))
                ->icon('check')
                ->method('save'),

            Button::make(__('Remove'))
                ->icon('trash')
                ->method('remove')
                ->canSee($this->post->exists),
        ];
    }

    /**
     * Views.
     *
     * @return string[]|\Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            PostEditLayout::class,
        ];
    }

    /**
     * @param Request $request
     * @param Post $post
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request, Post $post)
    {
        $post->fill($request->get('post'));

        $post->save();

        Toast::info(__('Post was saved'));

        return redirect()->route('platform.post.list');
    }

    /**
     * @param Post $post
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove(Post $post)
    {
        $post->delete();

        Toast::info(__('Post was removed'));

        return redirect()->route('platform.post.list');
    }
}
