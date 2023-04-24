<?php

namespace App\Http\Requests;
use App\Models\Clients;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateClientsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'client_number' => 'required|min:5|max:10',
            'client_name' => 'required|min:5|max:100',
            'country_id' => 'required',
            'categories_id' => 'required',
            
        ];
    }
    public function messages()
    {
        return [
            'client_number.required' => 'Client Serial required!',
            'client_number.min' => 'Client Serial must be at least 5 characters!',
            'client_number.max' => 'Client Serial must not be greater than 10 characters!',
            'client_number.unique' => 'Client Serial has already been taken!',
            'client_name.required' => 'Client Name required!',
            'client_name.min' => 'Client Name must be at least 5 characters!',
            'client_name.max' => 'Client Name must not be greater than 10 characters!',
            'client_name.unique' => 'Client Name has already been taken!',
            'country_id.required' => 'Country is required!',
            'categories_id.required' => 'Category is required!',
        ];
    }
}
