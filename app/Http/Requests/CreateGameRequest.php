<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateGameRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'game_date' => 'required|date',
            'default_setup' => 'sometimes|boolean',
        ];
    }
}
