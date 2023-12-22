<?php

namespace App\Http\Requests;

use App\Rules\Delimiter;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|unique:posts|max:100',
            'content' => 'required',
            'publication_date' => 'required|after_or_equal:today',
            'allow_comments' => 'nullable',
            'tags' => [
                'required',
                (new Delimiter())->separatedBy(':')->minimum(2),
            ],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Oye tienes que poner un título',
        ];
    }
}
