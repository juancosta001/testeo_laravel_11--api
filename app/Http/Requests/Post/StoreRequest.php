<?php

namespace App\Http\Requests\Post;


use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
                    'content' => 'required|min:7',
                    'category_id' => 'required|integer',
                    'description' => 'required|min:7',
                    'posted' => 'required|in:yes,not',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'title' => 'required|min:5|max:500',
                    'content' => 'required|min:7',
                    'category_id' => 'required|integer',
                    'description' => 'required|min:7',
                    'posted' => 'required|in:yes,not',
                    'image' => 'mimes:jpeg,jpg,png|max:10240',
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
            'content.required' => 'El contenido es obligatorio.',
            'content.min' => 'El contenido debe tener al menos 7 caracteres.',
            'category_id.required' => 'La categoría es obligatoria.',
            'category_id.integer' => 'La categoría debe ser un número válido.',
            'description.required' => 'La descripción es obligatoria.',
            'description.min' => 'La descripción debe tener al menos 7 caracteres.',
            'posted.required' => 'El estado de publicación es obligatorio.',
            'posted.in' => 'El estado de publicación debe ser "Yes" o "Not".',
            'id.required' => 'El ID es obligatorio para eliminar un post.',
            'id.integer' => 'El ID debe ser un número válido.',
            'id.exists' => 'El ID del post no existe.',
            'image.mimes'=> 'La imagen no esta en el formato correcto, debe ser JPEG, JPG O PNG',
            'image.max'=> 'La imagen excede el espacio máximo',
        ];
    }
}
