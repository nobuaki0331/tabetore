<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostInput extends FormRequest
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
            'user_id' => 'required',
            'title' => 'required',
            'content' => 'required',
        ];
    }

    /**
     * バリデーションエラーのカスタム属性の取得
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'user_id' => '登録ID',
            'title' => 'タイトル',
            'content' => '投稿内容',
        ];
    }
}
