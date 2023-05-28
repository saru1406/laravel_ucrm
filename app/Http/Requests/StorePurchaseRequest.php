<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePurchaseRequest extends FormRequest
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
            'customer_id' => ['required']
        ];
    }

    public function getCustomerById()
    {
        return $this->input('customer_id');
    }

    public function getDate()
    {
        return $this->input('date');
    }

    public function  getStatus()
    {
        return $this->input('status');
    }

    public function getItems()
    {
        return $this->input('items');
    }

    public function getSearch()
    {
        return $this->input('search');
    }
}
