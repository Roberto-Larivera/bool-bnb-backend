<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApartmentRequest extends FormRequest
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

            'title' => 'required|string|max:70',
            'description' => 'required|string|max:4096',
            // img file
            'main_img' => 'required|image|max:5000',
            // img url
            // 'main_img' => 'required|url|max:255',
            'services' => 'nullable|array|exists:services,id',
            'max_guests' => 'required|numeric|min:0|max:30',
            'rooms' => 'required|numeric|min:0|max:30',
            'beds' => 'required|numeric|min:0|max:30',
            'baths' => 'required|numeric|min:0|max:30',
            'mq' => 'required|numeric|min:0|max:65535',
            'address' => 'required|string|max:255',
            'price' => 'required|numeric|decimal:0,2|min:0|max:9999.99',
            'visible' => 'nullable|boolean',
            'latitude' => 'required',
            'longitude' => 'required'
            
            // validazione img
            // image|max:2048
        ];
    }
}
