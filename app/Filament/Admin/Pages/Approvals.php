<?php

namespace App\Filament\Admin\Pages;

use App\Models\Item;
use Filament\Pages\Page;
use Filament\Tables\Table;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class Approvals extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.admin.pages.approvals';


    public function table(Table $table): Table
    {
        return $table
            ->query(Item::query()->whereNot("status", "publish"))
            ->columns([
                SpatieMediaLibraryImageColumn::make('avatar')
                    ->collection("items"),
                TextColumn::make("title")
                    ->searchable(),
                TextColumn::make("slug"),
                TextColumn::make("price"),
                TextColumn::make("currency.code"),
                SelectColumn::make("status")
                ->options([
                    "draft" => "Draft",
                    "publish" => "Publish",
                ]),
               
                TextColumn::make("category.title"),
                TextColumn::make("subcategory.title"),
                TextColumn::make("country.code"),
                TextColumn::make("city.name"),
                TextColumn::make("published_at"),
            ]);
    }
}
