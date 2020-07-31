<?php

namespace Tests\Requests;

use App\Models\User;
use App\Http\Requests\UserUpdated;
use Illuminate\Foundation\Http\FormRequest;
use Tests\ValidationTestCase;

class UserUpdatedTest extends ValidationTestCase
{
    public function request(): FormRequest
    {
        return new UserUpdated();
    }

    public function baseInput(): array
    {
        return [
            'name' => 'ホゲ',
            'email' => 'aaa@aa.aa',
        ];
    }

    public function formData()
    {
        return [
            'All ok' => [
                true,
            ],

            'nameが存在しない' => [
                false, [], 'name',
            ],

            'emailが存在しない' => [
                false, [], 'email',
            ],
        ];
    }
}
