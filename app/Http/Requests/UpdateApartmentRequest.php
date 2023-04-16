<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApartmentRequest extends FormRequest
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
            'title' => 'required|string|max:30',
            'description' => 'required|string|max:4096',
            // img file
            // 'main_img' => 'nullable|image|max:2048',
            // img url
            'main_img' => 'required|url|max:255',
            'services' => 'nullable|array|exists:services,id',
            'max_guests' => 'required|numeric|max:30',
            'rooms' => 'required|numeric|max:30',
            'beds' => 'required|numeric|max:30',
            'baths' => 'required|numeric|max:30',
            'mq' => 'required|numeric|max:65535',
            'address' => 'required|string|max:50',
            'price' => 'required|numeric|decimal:0,2|max:9999.99',
            'visible' => 'nullable|boolean',
        ];
    }
}
