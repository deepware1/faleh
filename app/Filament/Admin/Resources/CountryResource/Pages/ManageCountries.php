<?php

namespace App\Filament\Admin\Resources\CountryResource\Pages;

use Filament\Actions;
use Filament\Actions\LocaleSwitcher;
use App\Filament\Admin\Resources\CountryResource;
use Filament\Resources\Pages\ManageRecords;

class ManageCountries extends ManageRecords
{
    use ManageRecords\Concerns\Translatable;

    protected static string $resource = CountryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            LocaleSwitcher::make(),
        ];
    }
}
