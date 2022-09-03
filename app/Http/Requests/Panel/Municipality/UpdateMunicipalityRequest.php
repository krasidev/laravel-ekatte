<?php

namespace App\Http\Requests\Panel\Municipality;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMunicipalityRequest extends FormRequest
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
            'code' => ['required', 'string', 'max:5', 'unique:municipalities,code,' . $this->route('municipality') . ',id'],
            'ekatte' => ['required', 'string', 'max:5'],
            'name' => ['required', 'string', 'max:64', 'unique:municipalities,name,' . $this->route('municipality') . ',id,district_id,' . $this->district_id],
            'district_id' => ['required', 'integer']
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
            'code' => __('content.panel.municipalities.labels.code'),
            'ekatte' => __('content.panel.municipalities.labels.ekatte'),
            'name' => __('content.panel.municipalities.labels.name'),
            'district_id' => __('content.panel.municipalities.labels.district_id')
        ];
    }
}
