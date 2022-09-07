<?php

namespace App\Http\Requests\Partner;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePartnerRequest extends FormRequest
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

            'dni'      => 'required|string|unique:partners, "dni",' . $this->partner->id,
            'name'     => 'required|string',
            'surnames' => 'required|string',
            'date'     => 'required'
        ];
    }
}
