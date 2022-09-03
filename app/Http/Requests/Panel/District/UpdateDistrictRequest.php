<?php

namespace App\Http\Requests\Panel\District;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDistrictRequest extends FormRequest
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
            'code' => ['required', 'string', 'max:4', 'unique:districts,code,' . $this->route('district') . ',id'],
            'ekatte' => ['required', 'string', 'max:5'],
            'name' => ['required', 'string', 'max:64', 'unique:districts,name,' . $this->route('district') . ',id'],
            'region_id' => ['required', 'integer']
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
            'code' => __('content.panel.districts.labels.code'),
            'ekatte' => __('content.panel.districts.labels.ekatte'),
            'name' => __('content.panel.districts.labels.name'),
            'region_id' => __('content.panel.districts.labels.region_id')
        ];
    }
}
