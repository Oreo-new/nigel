<?php

namespace App\Filament\Resources\MoreVideoResource\Pages;

use App\Filament\Resources\MoreVideoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMoreVideo extends EditRecord
{
    protected static string $resource = MoreVideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
