<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'         => 'nullable|string',
            'content'       => 'nullable|string',
            'main_image'    => 'nullable|file',
            'preview_image' => 'nullable|file',
            'category_id'   => 'nullable|exists:categories,id',
            'tag_ids'       => 'nullable|array',
            'tag_ids.*'     => 'nullable|integer|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения',
            'title.string' => 'Данные должны соответсвовать строчному типу',
            'preview_image.required' => 'Это поле необходимо для заполнения',
            'preview_image.file' => 'Файл не найден',
            'main_image.required' => 'Это поле необходимо для заполнения',
            'main_image.file' => 'Файл не найден',
            'category_id.required' => 'Это поле необходимо для заполнения',
            'caregory_id.integer' => 'Id категории должен быть целым числом',
            'caregory_id.exists' => 'Id категории должен существовать в базе данных',
        ];
    }
}
