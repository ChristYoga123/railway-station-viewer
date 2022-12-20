<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TrainStationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check() && Auth::user()->is_admin === 0;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'train_id' => 'required|integer|exists:trains,id',
            'station_id' => 'required|integer|exists:stations,id',
            'arrival_time' => 'required',
            'late_time' => 'required',
            'delay_time' => 'required'
        ];
    }
}
