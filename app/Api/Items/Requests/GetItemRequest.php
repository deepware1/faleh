<?php

namespace App\Api\Items\Requests;

use Illuminate\Validation\Rule;
use App\Api\Base\Requests\ApiRequest;

class GetItemRequest extends ApiRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category' => ['string', 'exists:categories,id'],
            'country' => ['string', 'exists:countries,id'],
            'city' => ['string', 'exists:cities,id'],
            'type' => ['string', Rule::in(['sell', 'rent'])],
            'condition' => ['string', Rule::in(['new', 'used'])],
            'stock' => ['string', Rule::in(['in_stock', 'out_of_stock'])],
            'section' => ['string', Rule::in(['latest', 'featured', 'promoted'])],
            'min_price' => ['regex:/^\d+(\.\d{1,2})?$/'],
            'max_price' => ['regex:/^\d+(\.\d{1,2})?$/'],
            'sort' => ['string', Rule::in(['old', 'recent'])]
        ];
    }
}
