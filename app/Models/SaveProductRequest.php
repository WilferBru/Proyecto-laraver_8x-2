<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaveProductRequest extends Model
{
    use HasFactory;

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
                'name'        => 'required',
	            'description' => 'required',
	            'category'    => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'        => 'El campo nombre es obligatoria',
            'description.required' => 'El campo descripcion es obligatorio',
            'category.required'    => 'El campo categoria es obligatorio',
        ];
    }
}
