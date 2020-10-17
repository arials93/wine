<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\StoreUser;

class UpdateUser extends StoreUser
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = parent::rules();
        // cập nhật rules cho password
        $rules['password'] = 'nullable|between:8,30';
        $rules['re-password'] = 'same:password';
        // xóa rule của email
        unset($rules['email']);
        return $rules;
    }
}
