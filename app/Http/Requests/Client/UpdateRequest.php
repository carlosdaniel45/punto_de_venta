<?php

namespace App\Http\Requests\Client;

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

    
    public function rules()
    {
        return [
            'name'=>'string|required|max:255',

            'dni'=>'string|required|unique:clients,dni,'.
            $this->route('client')->id.'|min:8|max:8',

            'ruc'=>'string|nullable|unique:clients,ruc,'.
            $this->route('client')->id.'|min:11|max:11',
            
            'address' =>'nullable|string|max:255', 
            
            'phone'=>'string|nullable|unique:clients,phone,'.
            $this->route('client')->id.'|max:9',
            
            'email'=>'string|nullable|unique:clients,email,'.
            $this->route('client')->id.'|max:255|email:rfc,dns',


        ];
    }

    public function messages()
    {
        return[
            'name.required'=>'Este campo es requerido',
            'name.string'=>'El valor no es correcto, verifique porfavor',
            'name.max'=>'solo se permiten 255 caracteres',
        
            'image.required'=>'Este campo es requerido',
            'image.dimensions'=>'Solo se permite imagenes de 100x200 px',
            
            'dni.required'=>'Este campo es requerido',
            'dni.string'=>'El valor no es correcto, verifique porfavor',
            'dni.unique'=>'Este DNI ya se encuentra registrado',
            'dni.min'=>'Se requiere de 8 caracteres',
            'dni.max'=>'Solo se permite 8 caracteres',
            
            
            'ruc.string'=>'El valor no es correcto, verifique porfavor',
            'ruc.unique'=>'El numero de RUC ya se encuentra registrado',
            'ruc.min'=>'Se requiere de 11 caracteres',
            'ruc.max'=>'Solo se permite 11 caracteres',

            'address.string'=>'El valor no es correcto, verifique porfavor',
            'address.max'=>'Solo se permite 255 caracteres',

            'phone.string'=>'El valor no es correcto, verifique porfavor',
            'phone.unique'=>'El numero de celular ya se encuentra registrado',
            'phone.min'=>'Se requiere de 9 caracteres',
            'phone.max'=>'Solo se permite 9 caracteres',
            
            'email.string'=>'El valor no es correcto, verifique porfavor',
            'email.unique'=>'La direccion de correo electronico ya se encuentra registrado',
            'email.max'=>'Solo se permite 255 caracteres',
            'email.email'=>'No es un correo electronico'
        ];
    }

}
