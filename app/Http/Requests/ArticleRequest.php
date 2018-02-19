<?php
/**
 * Created by PhpStorm.
 * User: Mher
 * Date: 19.02.2018
 * Time: 15:40
 */

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title' => 'required|string|min:5|max:2000',
            'text' => 'required|string|min:15|max:2000'
        ];
    }
}