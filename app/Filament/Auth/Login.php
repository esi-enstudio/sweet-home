<?php

namespace App\Filament\Auth;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Filament\Pages\Auth\Login as BaseLogin;
use Illuminate\Validation\ValidationException;

class Login extends BaseLogin
{
    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('phone')
                ->label('Phone Number')
                ->tel()
                ->required(),

            $this->getPasswordFormComponent(),
            $this->getRememberFormComponent(),
        ]);
    }

    protected function getCredentialsFromFormData(array $data): array
    {
        return [
            'phone' => $data['phone'],
            'password' => $data['password'],
        ];
    }

    /**
     * Authenticate the user.
     * আমরা ডিফল্ট authenticate মেথডটিকে ওভাররাইড করছি।
     *
     * @return LoginResponse|null
     * @throws ValidationException
     */
    public function authenticate(): ?LoginResponse
    {
        try {
            // বেস ক্লাসের authenticate মেথডটিকে কল করুন, যা getCredentialsFromFormData ব্যবহার করে
            return parent::authenticate();
        } catch (ValidationException $e) {
            // যদি অথেন্টিকেশন ব্যর্থ হয়, তাহলে ValidationException ধরা পড়বে

            // --- এখানে মূল পরিবর্তনটি করা হয়েছে ---
            // আমরা একটি নতুন ValidationException থ্রো করছি, কিন্তু এবার এররটি 'phone' ফিল্ডের জন্য
            throw ValidationException::withMessages([
                // 'data.email'-এর পরিবর্তে 'data.phone' ব্যবহার করা হচ্ছে
                'data.phone' => __('filament-panels::pages/auth/login.messages.failed'),
            ]);
        }
    }
}
