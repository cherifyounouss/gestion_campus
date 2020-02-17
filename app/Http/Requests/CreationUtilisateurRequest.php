<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreationUtilisateurRequest extends FormRequest
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
            'prenom' => 'required|alpha',
            'nom' => 'required|alpha',
            'date_naissance' => 'date',
            'numero_telephone' => 'numeric',
            'profil' => 'in:Caissier,Responsable buanderie, Responsable pavillon'
        ];
    }
}
