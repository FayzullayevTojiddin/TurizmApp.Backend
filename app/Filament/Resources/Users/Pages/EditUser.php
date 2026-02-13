<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Hash;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('changePassword')
                ->label('Parolni o\'zgartirish')
                ->icon('heroicon-o-key')
                ->color('warning')
                ->form([
                    TextInput::make('new_password')
                        ->label('Yangi parol')
                        ->password()
                        ->required()
                        ->minLength(8),

                    TextInput::make('new_password_confirmation')
                        ->label('Parolni tasdiqlang')
                        ->password()
                        ->required()
                        ->same('new_password'),
                ])
                ->action(function (array $data) {
                    $this->record->update([
                        'password' => Hash::make($data['new_password']),
                    ]);

                    Notification::make()
                        ->title('Parol muvaffaqiyatli o\'zgartirildi')
                        ->success()
                        ->send();
                }),

            DeleteAction::make(),
        ];
    }
}