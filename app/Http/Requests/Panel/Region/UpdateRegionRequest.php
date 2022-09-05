<?php

namespace App\Http\Requests\Panel\Region;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRegionRequest extends FormRequest
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
            'code' => ['required', 'string', 'max:4', 'unique:regions,code,' . $this->route('region') . ',id'],
            'name' => ['required', 'string', 'max:64', 'unique:regions,name,' . $this->route('region') . ',id']
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'code' => __('content.panel.regions.labels.code'),
            'name' => __('content.panel.regions.labels.name')
        ];
    }
}
