<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PostService
{
    public static function store(array $data)
    {
        try {
            DB::beginTransaction();
            if (!empty($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            if (!empty($data['preview_image'])) {
                $data['preview_image'] = Storage::put('/images', $data['preview_image']);
            }

            if (!empty($data['main_image'])) {
                $data['main_image'] = Storage::put('/images', $data['main_image']);
            }

            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tagIds ?: 0);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            abort(500);
        }
    }

    public static function update(array $data, Post $post): ?Post
    {
        try {
            DB::beginTransaction();
            if (!empty($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            if (!empty($data['preview_image'])) {
                $data['preview_image'] = Storage::put('/images', $data['preview_image']);
            }

            if (!empty($data['main_image'])) {
                $data['main_image'] = Storage::put('/images', $data['main_image']);
            }

            $post->update($data);
            // if (isset($tagIds)) {
                $post->tags()->sync($tagIds);
            // }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            abort(500);
        }

        return $post;
    }
}
