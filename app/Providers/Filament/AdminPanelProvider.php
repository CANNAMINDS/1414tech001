<?php

namespace App\Providers\Filament;
use Filament\Navigation\NavigationItem;
use Filament\Panel;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;

use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

class AdminPanelProvider extends PanelProvider
{
public function panel(Panel $panel): Panel
{
    return $panel
        ->id('admin')
        ->path('admin')
        ->login()
        ->brandName('Welcome 1414-Technology')
        ->darkMode(true) // ✅ Dark mode toggle
        // Optional color customization
        // ->colors([
        //     'primary' => 'blue',
        // ])
        ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
        ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
        ->pages([
            Dashboard::class,
        ])
        ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
        ->widgets([
            AccountWidget::class,
            FilamentInfoWidget::class,
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
        ->navigationItems([
            NavigationItem::make('Go-To-1414')
                ->url(url('/index'))
                ->icon('heroicon-o-document')
                ->openUrlInNewTab(),
        ])
        ->navigationItems([
            NavigationItem::make('Go-To-')
                ->url(url('/index'))
                ->icon('heroicon-o-document')
                ->openUrlInNewTab(),
        ])
        ->default(); // ✅ must be last
}

}
