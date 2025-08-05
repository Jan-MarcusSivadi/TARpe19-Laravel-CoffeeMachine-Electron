<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DrinkCreateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            // reeglid
            'jooginimi' => 'required|max:255',
            'topsepakis' => 'numeric|min:0',
        ];
    }
    public function messages()
    {
        return [
            // reeglite rikkumise sõnumid kasutajale
            'jooginimi.required' => 'Joogi nimi väli peab olema täidetud.',
            'jooginimi.max' => 'Joogi nimi ei saa olla suurem kui 255 märki.',

            'topsepakis.min' => 'Topse pakis väli ei saa olla väiksem kui 0.',
            'topsepakis.numeric' => 'Topse pakis väljal peab olema arv.',
        ];
    }
}
