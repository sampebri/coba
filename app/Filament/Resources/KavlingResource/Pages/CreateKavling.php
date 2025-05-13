<?php

namespace App\Filament\Resources\KavlingResource\Pages;

use App\Filament\Resources\KavlingResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKavling extends CreateRecord
{
    protected static string $resource = KavlingResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
