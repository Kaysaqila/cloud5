<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Siswa; //+ini
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException; //+ini
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        //utk validasi data
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            //tambahkan email unique:users -> unique:users,email
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        //cek apakah input email ada di database atau ga
        //jika user regis dengan email yg tidak ada di tabel maka
        if (!Siswa::where('email', $input['email'])->exists()){
            throw ValidationException::withMessages([
                'email' => 'Email tidak terdaftar sebagai siswa',
            ]);
        }
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}