<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use App\Models\Category;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use LaraZeus\Sky\SkyPlugin;
use Filament\Resources\Resource;
use Filament\Forms\Components\Tabs;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ViewColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Placeholder;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Forms\Components\DateTimePicker;
use Filament\Resources\Concerns\Translatable;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\RestoreBulkAction;
use App\Filament\Resources\CategoryResource\Pages;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Wallo\FilamentSelectify\Components\ButtonGroup;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Resources\CategoryResource\RelationManagers;

class CategoryResource extends Resource
{
    use Translatable;

    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = "Entry";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('category_tabs')->schema([
                    Tabs\Tab::make(__('Basic Info'))->schema([
                        TextInput::make('title')
                            ->label(__('Category Title'))
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
                            ->unique(ignorable: fn (?Category $record): ?Category => $record)
                            ->required()
                            ->maxLength(255)
                            ->label(__('Category Slug')),

                        Textarea::make('description')
                            ->maxLength(500)
                            ->label(__('Description'))
                            ->rows(4)
                            ->hint(__('Write an excerpt for your post')),
                    ]),

                    Tabs\Tab::make(__('Visibility'))->schema([
                        Placeholder::make(__('Visibility Options')),
                        Select::make('status')
                            ->label(__('status'))
                            ->default('publish')
                            ->required()
                            ->live()
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
                        Placeholder::make(__('Featured Image')),
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
                            ->collection('posts')
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
                ViewColumn::make('title_card')
                    ->label(__('Title'))
                    ->sortable(['title'])
                    ->searchable(['title'])
                    ->toggleable()
                    ->view('entry.category-name'),

                ViewColumn::make('status_desc')
                    ->label(__('Status'))
                    ->sortable(['status'])
                    ->searchable(['status'])
                    ->toggleable()
                    ->view('zeus::filament.columns.status-desc')
                    ->tooltip(fn (Category $record): string => $record->published_at->format('Y/m/d | H:i A')),
            ])
            ->defaultSort('id', 'desc')
            ->filters([
                TrashedFilter::make(),
            ])
            ->actions([
                ActionGroup::make([
                    EditAction::make('edit')->label(__('Edit')),
                    DeleteAction::make('delete'),
                    ForceDeleteAction::make(),
                    RestoreAction::make(),
                ]),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
                ForceDeleteBulkAction::make(),
                RestoreBulkAction::make(),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
