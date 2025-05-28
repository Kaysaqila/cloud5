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
        // Validasi data
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // Cek apakah email ada di tabel siswa
        if (!Siswa::where('email', $input['email'])->exists()) {
            throw ValidationException::withMessages([
                'email' => 'Email tidak terdaftar sebagai siswa',
            ]);
        }

        // Buat user baru
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        // Assign role siswa secara otomatis ke user yang baru dibuat
        $user->assignRole('siswa');

        return $user;
    }
}