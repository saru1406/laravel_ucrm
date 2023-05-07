<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreItemRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','max:30','string'],
            'memo' => ['required', 'max:255', 'string'],
            'price' => ['required', 'numeric', 'int']
        ];
    }

    public function getName()
    {
        return $this->input('name');
    }

    public function getMemo()
    {
        return $this->input('memo');
    }

    public function getPrice()
    {
        return $this->input('price');
    }
}
