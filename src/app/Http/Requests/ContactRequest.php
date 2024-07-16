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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'tell1' => ['required', 'numeric'],
            'tell2' => ['required', 'numeric'],
            'tell3' => ['required', 'numeric'],
            'address' => ['required', 'string', 'max:255'],
            'category_id' => ['required'],
            'detail' => ['required', 'string','max:120'],
        ];
    }

    public function messages()
    {
        return [
            'last_name.required' => '姓を入力してください',
            'first_name.required' => '名を入力してください',
            'gender.required' => '性別を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            // 'tel.required' => '電話番号を入力してください',
            // 'tel.digits' => '電話番号は５桁までの数字で入力してください',
            'address.required' => '住所を入力してください',
            'category_id.required' => '問い合わせの種類を選択してください',
            'detail.required' => '問い合わせの内容を入力してください',
            'detail.max' => '問い合わせは120文字以内で入力してください',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $tell1 = $this->input('tell1');
            $tell2 = $this->input('tell2');
            $tell3 = $this->input('tell3');

            $fullTell = $tell1 . $tell2 . $tell3;

            if (empty($tell1) && empty($tell2) && empty($tell3)) {
                $validator->errors()->add('tel', '電話番号を入力してください');
            } else

            if (!preg_match('/^\d{10,15}$/', $fullTell)) {
                $validator->errors()->add('tel', '電話番号は5桁までの数字で入力してください');
            }
        });
    }
}
