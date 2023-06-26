<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize() { return true; }
    public function rules() { return ['image' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048', ]; }
}
