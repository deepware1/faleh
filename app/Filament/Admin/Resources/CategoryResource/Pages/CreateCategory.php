<?php

namespace App\Filament\Admin\Resources\CategoryResource\Pages;

use Filament\Actions;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Admin\Resources\CategoryResource;

class CreateCategory extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = CategoryResource::class;

    protected function getActions(): array
    {
        return [
            LocaleSwitcher::make(),
        ];
    }
}
