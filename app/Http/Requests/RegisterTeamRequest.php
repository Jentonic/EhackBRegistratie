<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterTeamRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email|unique:pendingInvites,email',
            'firstname' => 'required',
            'lastname' => 'required',
            'password' => 'required',
            'teamname' => 'required|required',
            'gameid' => 'required|integer|exists:games,id',
            'teammembers' => 'required|array',
            'teammembers.*' => 'distinct|email|unique:users,email',
        ];
    }
}
