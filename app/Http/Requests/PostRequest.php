<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'post.image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
            'post.name' => 'required|string|max:50',
            'post.sex_id' => 'required|integer',
            'post.age' => 'required|integer|max:10',
            'post.breed_id' => 'required|integer',
            'post.area_id' => 'required|integer',
            'post.size_id' => 'required|integer',
            'post.period' => 'required|date',
            'post.backgrooud' => 'required|string|max:100',
            'post.personality' => 'required|string|max:300',
            'post.condition' => 'required|string|max:300',
            'post.adopt' => 'required|string|max:300',
        ];
    }
    
    public function messages()
    {
        return [
            "required" => "必須項目です。",
            "integer" => "数字で入力してください。",
            "post.image_path.image" => "指定されたファイルが画像ではありません。",
            "post.image_path.mimes" => "指定された拡張子（PNG/JPG/GIF）ではありません。",
            "post.image_path.max" => "１Ｍを超えています。",
            "post.name.max" => " 50文字以内で入力してください。",
            "post.age.max" => " 10文字以内で入力してください。",
            "post.period.date" => "正しい日付ではありません",
            "post.backgrooud.max" => "募集経緯は100文字以内で入力してください。",
            "post.personality.max" => "性格・特徴は300文字以内で入力してください。",
            "post.condition.max" => "性格・特徴は300文字以内で入力してください。",
            "post.adopt.max" => "性格・特徴は300文字以内で入力してください。",
            
        ];
    }
}
