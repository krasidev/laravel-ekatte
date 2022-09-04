<?php

namespace App\Http\Requests\Panel\Settlement;

use Illuminate\Foundation\Http\FormRequest;

class StoreSettlementRequest extends FormRequest
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
            'ekatte' => ['required', 'string', 'max:5'],
            'name' => ['required', 'string', 'max:64', 'unique:settlements,name,NULL,id,town_hall_id,' . $this->town_hall_id],
            'settlement_kind_id' => ['required', 'integer'],
            'district_id' => ['required', 'integer'],
            'municipality_id' => ['required', 'integer'],
            'town_hall_id' => ['required', 'integer']
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
            'ekatte' => __('content.panel.settlements.labels.ekatte'),
            'name' => __('content.panel.settlements.labels.name'),
            'settlement_kind_id' => __('content.panel.settlements.labels.settlement_kind_id'),
            'district_id' => __('content.panel.settlements.labels.district_id'),
            'municipality_id' => __('content.panel.settlements.labels.municipality_id'),
            'town_hall_id' => __('content.panel.settlements.labels.town_hall_id')
        ];
    }
}
