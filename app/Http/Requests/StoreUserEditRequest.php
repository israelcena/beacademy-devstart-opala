<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\FullName;

class StoreUserEditRequest extends FormRequest
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
            'name' => ['required', 'max:255', new FullName],
            'birth_date' => 'required|date',
            'phone' => 'required|max:15|celular_com_ddd',
            'place' => 'required|max:255',
            'residence_number' => 'required|max:255',
            'city' => 'required|max:255',
            'district' => 'required|max:255',
            'country' => 'required|max:255',
            'cep' => 'required|max:255',
    ];
    }
}
