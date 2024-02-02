<?php

namespace App\Http\Requests;

use App\Models\Car;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CarFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if ($this->user()?->role == 'admin') {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = (int) $this->input('id');
        $routeName =  $this->route()->getName();
        return [
            'title' => [
                'string',
                Rule::unique('cars')->ignore($id)
            ],
            'brand' => 'string|max:35',
            'model' => [
                'string',
                Rule::unique('cars')->ignore($id),
                'max:150'
            ],
            'top_speed' => 'numeric|min:1|max:350',
            'image' => [
                $routeName == 'car.store'? 'required': '',
                'image',
                'max:3000'
            ],
            'description' => ''
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'title' => ($this->brand && $this->model) ? $this->brand . ' ' . $this->model : '',
            'description' => is_null($this->description) ? 'Aucune description' : $this->description,
        ]);
    }
}
