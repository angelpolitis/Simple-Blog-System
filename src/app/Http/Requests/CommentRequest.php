<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize () : bool {
        # We give authorisation here and the policy will handle the matter of the ownership of the post.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules () : array {
        return [
            'comment' => 'required|string|max:1000',
        ];
    }
}