<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUrlRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'url_address' => 'required|url|unique:urls,url_address',
            'frequency' => 'required|integer|in:1,5,10', // 1, 5, 10 minutes
            'fail_repeat_count' => 'required|integer|between:1,10'
        ];
    }
}
