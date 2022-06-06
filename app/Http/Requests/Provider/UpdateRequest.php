<?php

namespace App\Http\Requests\Provider;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name'=>'required|string|max:255',

            'email'=>'required|email|string|unique:providers,email,'.
            $this->route('provider')->id.'|max:255',
            
            'ruc_number'=>'required|string|min:11|unique:providers,ruc_number,'.
            $this->route('provider')->id.'|max:11',
            
            'address'=>'nullable|string|max:255',
            
            'phone'=>'required|string|min:9|unique:providers,phone,'.
            $this->route('provider')->id.'|max:9',
            
        ];
    }

    public function messages()
    {
        return[
            'name.required'=>'Este campo es requerido',
            'name.string'=>'El valor no es correcto, verifique porfavor',
            'name.max'=>'solo se permiten 255 caracteres',

            'email.required'=>'El valor no es correcto, verifique porfavor',
            'email.email'=>'El correo electronico no es valido',
            'email.string'=>'El valor no es el correcto',
            'email.max'=>'Solo se permiten 255 caracteres',
            'email.unique'=>'Ya se encuentra registrado',

            'ruc_number.required'=>'El valor no es correcto, verifique porfavor',
            'ruc_number.string'=>'El valor no es el correcto',
            'ruc_number.max'=>'Solo se permiten 11 caracteres',
            'ruc_number.max'=>'Se requiere 11 caracteres',
            'ruc_number.unique'=>'Ya se encuentra registrado',

            'phone.required'=>'El valor no es correcto, verifique porfavor',
            'phone.string'=>'El valor no es el correcto',
            'phone.max'=>'Solo se permiten 9 caracteres',
            'phone.max'=>'Se requiere 9 caracteres',
            'phone.unique'=>'Ya se encuentra registrado',

        ];
    }
}
