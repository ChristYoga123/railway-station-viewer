<?php

namespace App\Http\Requests;

use App\Models\Station;
use App\Models\StationFacility;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StationFacilityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check() && Auth::user()->role_id === 2;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'station_id' => 'integer',
            'name' => 'required|string',
            'image' => 'image|max:1028',
            'description' => 'required'
        ];
    }
}
