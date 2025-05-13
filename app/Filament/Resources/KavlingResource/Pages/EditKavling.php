<?php

namespace App\Filament\Resources\KavlingResource\Pages;

use App\Filament\Resources\KavlingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKavling extends EditRecord
{
    protected static string $resource = KavlingResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
