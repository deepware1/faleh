<?php

namespace App\Filament\Admin\Resources\CurrencyResource\Pages;

use Filament\Actions;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\ManageRecords;
use App\Filament\Admin\Resources\CurrencyResource;

class ManageCurrencies extends ManageRecords
{
    use ManageRecords\Concerns\Translatable;

    protected static string $resource = CurrencyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            LocaleSwitcher::make(),
        ];
    }
}
