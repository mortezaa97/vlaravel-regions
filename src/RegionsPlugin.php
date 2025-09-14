<?php

declare(strict_types=1);

namespace Mortezaa97\Sliders;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Mortezaa97\Bookmarks\Filament\Resources\Bookmarks\BookmarkResource;
use Mortezaa97\Regions\Filament\Resources\Counties\CountyResource;
use Mortezaa97\Regions\Filament\Resources\Provinces\ProvinceResource;
use Mortezaa97\Reviews\Filament;
use Mortezaa97\Sliders\Filament\Resources\Sliders\SliderResource;
use Mortezaa97\Sliders\Filament\Resources\Slides\SlideResource;

class RegionsPlugin implements Plugin
{
    public static function make(): static
    {
        return app(static::class);
    }

    public function getId(): string
    {
        return 'regions';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                'ProvinceResource' => ProvinceResource::class,
                'CountyResource' => CountyResource::class,
            ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
