<?php

namespace App\Filament\Admin\Resources;

use Filament\Forms;
use App\Models\Item;
use Filament\Tables;
use App\Models\Country;
use Filament\Forms\Get;
use Filament\Forms\Set;
use App\Models\Category;
use App\Models\Currency;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use LaraZeus\Sky\SkyPlugin;
use Filament\Resources\Resource;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Admin\Resources\ItemResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Wallo\FilamentSelectify\Components\ButtonGroup;
use App\Filament\Admin\Resources\ItemResource\RelationManagers;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Filters\Filter;

class ItemResource extends Resource
{
    protected static ?string $model = Item::class;

    protected static ?string $navigationIcon = 'heroicon-o-bolt';

    protected static ?string $navigationGroup = "Entry";

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('category_tabs')->schema([
                    Tabs\Tab::make(__('Basic Info'))->schema([
                        Hidden::make('user_id')
                            ->default(auth()->user()->id)
                            ->required(),

                        TextInput::make('title')
                            ->label(__('Item Title'))
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Set $set, $state, $context) {
                                if ($context === 'edit') {
                                    return;
                                }

                                $set('slug', Str::slug($state));
                            }),

                        TextInput::make('slug')
                            ->unique(ignorable: fn (?Item $record): ?Item => $record)
                            ->required()
                            ->maxLength(255)
                            ->label(__('Item Slug')),

                        TextInput::make("price")
                            ->label(__('Item Price'))
                            ->numeric()
                            ->required(),

                        SkyPlugin::get()->getEditor()::component()
                            ->make("description")
                            ->profile('default')
                            ->output(\FilamentTiptapEditor\Enums\TiptapOutput::Html)
                            ->extraInputAttributes(['style' => 'min-height: 24rem;'])
                            ->required()
                            ->label(__('Item Description')),
                    ]),

                    Tabs\Tab::make(__('More Details'))->columns(2)->schema([

                        Select::make('category_id')
                            ->label(__('Category'))
                            ->required()
                            ->live()
                            ->options(Category::whereNull("parent_id")->pluck("title", "id")),

                        Select::make('subcategory_id')
                            ->label(__('Sub Category'))
                            ->options(function (Get $get) {
                                if (!$get("category_id")) {
                                    return [];
                                }

                                $category = Category::find($get("category_id"));

                                return $category->subcategories()->pluck("title", "id");
                            }),

                        Select::make('country_id')
                            ->label(__('Country'))
                            ->required()
                            ->live()
                            ->options(Country::pluck("name", "id")),

                        Select::make('city_id')
                            ->label(__('City'))
                            ->required()
                            ->options(function (Get $get) {
                                if (!$get("country_id")) {
                                    return [];
                                }

                                $country = Country::find($get("country_id"));

                                return $country->cities()->pluck("name", "id");
                            }),

                        Select::make('currency_id')
                            ->label(__('Currency'))
                            ->required()
                            ->live()
                            ->options(Currency::pluck("name", "id")),

                        TextInput::make("contact_number")
                            ->label(__('Contact Number'))
                            ->tel(),
                    ]),

                    Tabs\Tab::make(__('Visibility'))->schema([

                        Select::make('status')
                            ->label(__('status'))
                            ->default('publish')
                            ->required()
                            ->options([
                                "publish" => "Publish",
                                "draft" => "Draft",
                            ]),

                        DateTimePicker::make('published_at')
                            ->label(__('published at'))
                            ->native(false)
                            ->default(now()),
                    ]),

                    Tabs\Tab::make(__('Image'))->schema([
                        ButtonGroup::make('featured_image_type')
                            ->live()
                            ->label('')
                            ->dehydrated(false)
                            ->afterStateHydrated(function (Set $set, Get $get) {
                                $setVal = ($get('featured_image') === null) ? 'upload' : 'url';
                                $set('featured_image_type', $setVal);
                            })
                            ->options([
                                'upload' => __('upload'),
                                'url' => __('url'),
                            ])
                            ->default('upload'),

                        SpatieMediaLibraryFileUpload::make('featured_image_upload')
                            ->collection('items')
                            ->disk(SkyPlugin::get()->getUploadDisk())
                            ->directory(SkyPlugin::get()->getUploadDirectory())
                            ->visible(fn (Get $get) => $get('featured_image_type') === 'upload')
                            ->label(''),

                        TextInput::make('featured_image')
                            ->label(__('featured image url'))
                            ->visible(fn (Get $get) => $get('featured_image_type') === 'url')
                            ->url(),
                    ]),
                ])->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('avatar')
                    ->collection("items"),
                TextColumn::make("title")
                    ->searchable(),
                TextColumn::make("slug"),
                TextColumn::make("price"),
                TextColumn::make("currency.code"),
                IconColumn::make("status")
                    ->icon(fn(string $state): string => match($state) {
                        'publish' => 'heroicon-o-check-circle',
                        'draft' => 'heroicon-o-clock'
                    })
                    ->color(fn(string $state): string => match($state) {
                        'publish' => 'success',
                        'draft' => 'info'
                    }),
                TextColumn::make("category.title"),
                TextColumn::make("subcategory.title"),
                TextColumn::make("country.code"),
                TextColumn::make("city.name"),
                TextColumn::make("published_at"),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                Filter::make("status"),
                SelectFilter::make('country')
                    ->multiple()
                    ->translateLabel()
                    ->relationship('country', 'code')
                    ->label(__('country')),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListItems::route('/'),
            'create' => Pages\CreateItem::route('/create'),
            'edit' => Pages\EditItem::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
