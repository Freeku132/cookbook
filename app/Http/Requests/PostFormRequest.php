<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PostFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3',
            'body' => 'required|min:5'
        ];
    }

    public function updateOrCreate(Post $post)
    {
        $post->user_id = 1;
        $post->title = $this->title;
        $post->body = $this->body;
        $post->slug = Str::slug($this->title);
        $post->excerpt = Str::words($this->body, 5);

        $post->save();
    }
}
