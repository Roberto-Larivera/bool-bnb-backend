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

            'title' => 'required|string|max:30',
            'description' => 'required|string|max:4096',
            'main_img' => 'required|image|max:2048',
            'technologies' => 'nullable|array|exists:technologies,id',
            'max_guests' => 'required|numeric|max:30',
            'max_rooms' => 'required|numeric|max:30',
            'max_beds' => 'required|numeric|max:30',
            'max_baths' => 'required|numeric|max:30',
            'mq' => 'required|numeric|max:65535',
            'andress' => 'required|string|max:50',
            'price' => 'required|numeric|decimal:0,2|max:9999.99',
            'visible' => 'required|boolean',
            // 'type_id' => 'nullable|exists:types,id',
            // 'name_repo' => 'required|unique:projects,name_repo|max:98',
            
            // validazione img
            // image|max:2048
        ];
    }
}
