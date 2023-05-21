<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'first-name' => ['required', 'string', 'max:177'],
            'last-name' => ['required', 'string', 'max:177'],
            'email' => ['required', 'string', 'email','max:255'],
            'postcode' => ['required', 'min:8','max:8'],
            'address' => ['required', 'string', 'max:255'],
            'building_name' => ['nullable','max:255'],
            'opinion' => ['required'],

        ];
    }

    public function messages()
    {
        return [
            'first-name.required' => '姓を入力してください.',
            'first-name.string' => '名前を文字列で入力してください.',
            'first-name.max' => '名前を177文字以下で入力してください.',
            'last-name.required' => '名を入力してください.',
            'last-name.string' => '名前を文字列で入力してください.',
            'last-name.max' => '名前を177文字以下で入力してください.',
            'email.required' => 'メールアドレスを入力してください.',
             'email.string' => 'メールアドレスを文字列で入力してください.',
             'email.email' => '有効なメールアドレス形式を入力してください.',
             'email.max' => 'メールアドレスを255文字以下で入力してください.',
             'postcode.required' => '郵便番号を入力してください.',
             'postcode.min' => '郵便番号をハイフンを使用した８文字で入力してください.',
             'postcode.max' => '郵便番号をハイフンを使用した８文字で入力してください.',
             'address.required' => '住所を入力してください.',
             'address.string' => '住所を文字列で入力してください.',
             'address.max' => '名前を255文字以下で入力してください.',
             'building_name.max' => '名前を255文字以下で入力してください.',
             'opinion.required' => 'ご意見をお願いします.',     
        ];
    }
}

        
