<?php

namespace App\Http\Requests\Panel\TownHall;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTownHallRequest extends FormRequest
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
            'code' => ['required', 'string', 'max:8', 'unique:town_halls,code,' . $this->route('town_hall') . ',id'],
            'ekatte' => ['required', 'string', 'max:5'],
            'name' => ['required', 'string', 'max:64', 'unique:town_halls,name,' . $this->route('town_hall') . ',id,municipality_id,' . $this->municipality_id],
            'municipality_id' => ['required', 'integer']
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
            'code' => __('content.panel.town-halls.labels.code'),
            'ekatte' => __('content.panel.town-halls.labels.ekatte'),
            'name' => __('content.panel.town-halls.labels.name'),
            'municipality_id' => __('content.panel.town-halls.labels.municipality_id')
        ];
    }
}
