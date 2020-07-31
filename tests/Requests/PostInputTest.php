<?php

namespace Tests\Requests;

use App\Models\Post;
use App\Http\Requests\PostInput;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Tests\ValidationTestCase;

class PostInputTest extends ValidationTestCase
{
    protected function request(): FormRequest
    {
        return new PostInput();
    }

    protected function baseInput(): array
    {
        return [
            'user_id' => '1',
            'title' => 'ホゲ',
            'content' => 'ホゲホゲ',
        ];
    }

    public function formData()
    {
        return [
            'All ok' => [
                true,
            ],

            // 'user_idは存在しない' => [
            //     false, [], 'user_id',
            // ],

            'titleが存在しない' => [
                false, [], 'title',
            ],

            'contentが存在しない' => [
                false, [], 'content',
            ],
        ];
    }
}
