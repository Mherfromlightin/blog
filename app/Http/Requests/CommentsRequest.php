<?php
/**
 * Created by PhpStorm.
 * User: Mher
 * Date: 19.02.2018
 * Time: 15:48
 */

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class CommentsRequest extends FormRequest
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
            'body' => 'required|string|min:1|max:10000'
        ];
    }
}