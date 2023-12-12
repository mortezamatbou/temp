<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

/**
 * @property int status_id
 * @property string title
 * @property string body
 * @property string slug
 */
class StoreArticleRequest extends FormRequest
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
            'title' => 'bail|required|max:100|string',
            'body' => 'bail|required|max:5000|string',
            'slug' => "bail|required|max:100|unique:App\Models\Article,slug",
            'status_id' => 'bail|required|integer|exists:articles_status,id'
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $slug = Str::lower(Str::slug($this->slug));
        $this->merge([
            'slug' => $slug
        ]);
    }
}
