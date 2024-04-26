<?php

namespace App\Http\Controllers\Request;

use Illuminate\Http\Request;

class UpdateProductRequest extends Request
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:categories|alpha_num',
            'description' => 'required|string|max:255|alpha_num',
            'code' => 'required|string|max:50|alpha_num',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'askForPrice' => 'required|integer',
        ];
    }
}