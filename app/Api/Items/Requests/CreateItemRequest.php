<?php

namespace App\Api\Items\Requests;

use Illuminate\Validation\Rule;
use App\Api\Base\Requests\ApiRequest;

class CreateItemRequest extends ApiRequest
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
            'title' => ['required', 'string', 'max:255'],
            'slug' =>  ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'category_id' => ['required', 'string'],
            'subcategory_id' => [],
            'country_id' => ['required', 'string', 'exists:countries,id'],
            'city_id' => ['required', 'string', 'exists:cities,id'],
            'currency_id' => ['required', 'string', 'exists:currencies,id'],
            'contact_number' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', Rule::in(['sell', 'rent'])],
            'condition' => ['required', 'string', Rule::in(['new', 'used'])],
            'stock' => ['required', 'string', Rule::in(['in_stock', 'out_of_stock'])],
            'section' => ['required', 'string', Rule::in(['latest', 'featured'])],
            'published_at' => ['required', 'string', 'max:255'],
            'image_file' => ['required_without:image_url', 'file'],
            'image_url' => ['required_without:image_file', 'string', 'max:255'],
        ];
    }
}
