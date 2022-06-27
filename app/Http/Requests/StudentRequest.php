<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            
            'program_id' =>'required',
            'scholarship_id' => 'required',
            'stat_id' => 'required',
            'tahun_beasiswa' => 'nullable',
            'nama_rekening' => 'nullable',
            'no_rekening' => 'nullable|numeric',
            'alamat' => 'nullable',
            'no_handphone' => 'nullable',
            'ip_one' => 'nullable|numeric',
            'ip_two' => 'nullable|numeric',
            'ip_three' => 'nullable|numeric',
            'ip_four' => 'nullable|numeric',
            'ip_five' => 'nullable|numeric',
            'ip_six' => 'nullable|numeric',
            'ip_seven' => 'nullable|numeric',
            'ip_eight' => 'nullable|numeric',
            'note' => 'nullable',
        ];
    }
}
