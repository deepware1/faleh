<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use Filament\Widgets;
use Filament\PanelProvider;
use LaraZeus\Sky\SkyPlugin;
use Filament\Support\Colors\Color;
use LaraZeus\Sky\Editors\TipTapEditor;
use Filament\Navigation\NavigationGroup;
use Filament\Http\Middleware\Authenticate;
use Filament\SpatieLaravelTranslatablePlugin;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use RyanChandler\FilamentNavigation\FilamentNavigation;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
            ])
            ->navigationGroups([
                NavigationGroup::make()
                    ->label('Entry'),
                NavigationGroup::make()
                    ->label('CMS'),
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->databaseNotifications()
            ->colors([
                'primary' => Color::Lime,
            ])
            ->plugins([
                SpatieLaravelTranslatablePlugin::make()
                    ->defaultLocales(['en', 'ar']),
                FilamentNavigation::make(),
                SkyPlugin::make()
                    ->skyPrefix('')
                    ->skyMiddleware(['web'])
                    ->uriPrefix([
                        'post' => 'post',
                        'page' => 'page',
                        'library' => 'library',
                        'faq' => 'faq',
                    ])

                    // enable or disable the resources
                    ->postResource()
                    ->pageResource()
                    ->faqResource(false)
                    ->libraryResource(false)

                    ->navigationGroupLabel('CMS')

                    // uploading config
                    ->uploadDisk("public")
                    ->uploadDirectory("cms")

                    // the default models
                    ->skyModels([
                        'Faq' => \LaraZeus\Sky\Models\Faq::class,
                        'Post' => \App\Models\Post::class,
                        'PostStatus' => \LaraZeus\Sky\Models\PostStatus::class,
                        'Tag' => \LaraZeus\Sky\Models\Tag::class,
                        'Library' => \LaraZeus\Sky\Models\Library::class,
                    ])

                    ->editor(TipTapEditor::class)
                    ->parsers([\LaraZeus\Sky\Classes\BoltParser::class])
                    ->recentPostsLimit(5)
                    ->searchResultHighlightCssClass('highlight')
                    ->skipHighlightingTerms(['iframe'])
                    ->defaultFeaturedImage('url/to/image')
                    ->libraryTypes([
                        'FILE' => 'File',
                        'IMAGE' => 'Image',
                        'VIDEO' => 'Video',
                    ])
                    ->tagTypes([
                        'tag' => 'Tag',
                        'category' => 'Category',
                    ])
            ]);
    }
}
