<?php

namespace App\Filament\Admin\Resources\CityResource\Pages;

use Filament\Actions;
use Filament\Actions\LocaleSwitcher;
use App\Filament\Admin\Resources\CityResource;
use Filament\Resources\Pages\ManageRecords;

class ManageCities extends ManageRecords
{
    use ManageRecords\Concerns\Translatable;

    protected static string $resource = CityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            LocaleSwitcher::make(),
        ];
    }
}
