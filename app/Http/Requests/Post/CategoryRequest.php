<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     */
    public function rules(): array
    {
        switch ($this->method()) {
            case 'POST': {
                return [
                    'title' => 'required|min:5|max:500',
                    'slug' => 'required|min:5|max:500|unique:posts',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'title' => 'required|min:5|max:500',
                ];
            }
            case 'DELETE': {
                return [
                    'id' => 'required|integer|exists:posts,id',
                ];
            }
            default:
                return [];
        }
    }

    /**
     * Custom messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'El título es obligatorio.',
            'title.min' => 'El título debe tener al menos 5 caracteres.',
            'title.max' => 'El título no puede exceder los 500 caracteres.',
            'slug.required' => 'El slug es obligatorio.',
            'slug.min' => 'El slug debe tener al menos 5 caracteres.',
            'slug.max' => 'El slug no puede exceder los 500 caracteres.',
            'slug.unique' => 'El slug ya está en uso.',
            'id.required' => 'El ID es obligatorio para eliminar un post.',
            'id.integer' => 'El ID debe ser un número válido.',
            'id.exists' => 'El ID del post no existe.',
           
        ];
    }
}
