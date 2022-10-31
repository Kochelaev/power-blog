<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        
        if (!empty($data['tag_ids'])) {
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
        }
        
        if(!empty($data['preview_image'])) {
            $data['preview_image'] = Storage::put('/images', $data['preview_image']);
        }
        
        if (!empty($data['main_image'])) {
            $data['main_image'] = Storage::put('/images', $data['main_image']);
        }
        
        $post = Post::firstOrCreate($data);

        $post->tags()->attach($tagIds ?: 0);


        return redirect()->route('admin.post.index');
    }
}
