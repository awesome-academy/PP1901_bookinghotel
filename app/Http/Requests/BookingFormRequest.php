<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class BookingFormRequest extends FormRequest
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
            //
            'check_in' => 'required|date|after_or_equal:' . Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y'),
            'check_out' => 'required|date|after:' . Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y'),
        ];
    }

    public function messages()
    {
        return [
            'check_in.required' => 'Vui lòng nhập vào Form.',
            'check_in.after_or_equal' => 'Vui lòng chọn ngày sau hoặc bằng ' . Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y') .'.',
            'check_out.required' => 'Vui lòng nhập vào Form.',
            'check_out.after' => 'Vui lòng trả phòng sau ngày ' . Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y') .  '.',
        ];
    }
}
