<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Seccion;

class CUSeccionRequest extends FormRequest
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
        $rules = Seccion::$rules;
        $rules['nombre'] = str_replace('{:id}', $this->get('id') , $rules['nombre']); 
        $rules['nombre'] = str_replace('{:categoria_id}', $this->get('categoria_id') , $rules['nombre']); 
        return $rules;
    }
}
