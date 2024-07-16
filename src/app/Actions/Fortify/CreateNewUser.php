<?php

namespace App\Actions\Fortify;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    //use PasswordValidationRules;

    public function create(array $input)
    {
        // フォームリクエストのインスタンスを作成し、バリデーションルールとカスタムメッセージを取得
        $request = new RegisterRequest();

        $validator = Validator::make($input, $request->rules(), $request->messages());

        // バリデーションが失敗した場合の処理
        if ($validator->fails()) {
            throw new \Illuminate\Validation\ValidationException($validator);
        }

         // 検証済みのデータを取得
        $validated = $validator->validated();

        return User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
    }

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    // public function create(array $input): User
    // {
    //     Validator::make($input, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => [
    //             'required',
    //             'string',
    //             'email',
    //             'max:255',
    //             Rule::unique(User::class),
    //         ],
    //         'password' => $this->passwordRules(),
    //     ])->validate();

    //     return User::create([
    //         'name' => $input['name'],
    //         'email' => $input['email'],
    //         'password' => Hash::make($input['password']),
    //     ]);
    // }
}
