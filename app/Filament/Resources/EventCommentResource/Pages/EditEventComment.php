<?php

namespace App\Filament\Resources\EventCommentResource\Pages;

use App\Filament\Resources\EventCommentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEventComment extends EditRecord
{
    protected static string $resource = EventCommentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
