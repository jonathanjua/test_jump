<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceOrderUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'vehiclePlate' => ['required', 'max:7', 'string'],
            'entryDateTime' => ['required', 'date'],
            'exitDateTime' => ['required', 'date'],
            'priceType' => ['required', 'max:55', 'string'],
            'price' => ['required', 'numeric'],
        ];
    }

      public function attributes()
    {
        return [
            'user_id' => 'Id do Usuario',
            'vehiclePlate' => 'Placa do veiculo',
            'entryDateTime' => 'Data de entrada',
            'exitDateTime' => 'Data de saida',
            'priceType' => 'Tipo do preço',
            'price' => 'Preço',
        ];
    }
}
