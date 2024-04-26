<?php

namespace App\Http\Controllers\Request;

use Illuminate\Http\Request;

class UpdateCategoryRequest extends Request
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:categories|alpha_num',
        ];
    }

}