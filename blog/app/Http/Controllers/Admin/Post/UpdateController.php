<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();

        if(!empty($data['tag_ids'])) {
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
        }
        
        if(!empty($data['preview_image'])) {
            $data['preview_image'] = Storage::put('/images', $data['preview_image']);
        }
        
        if (!empty($data['main_image'])) {
            $data['main_image'] = Storage::put('/images', $data['main_image']);
        }
        
        try{
            $post->update($data);
            if (isset($tagIds)) {
                $post->tags()->sync($tagIds);
            }
        } catch (\Exception $e) {
            abort(404);
        }

        return redirect()->route('admin.post.show', compact('post'));
    }
}
