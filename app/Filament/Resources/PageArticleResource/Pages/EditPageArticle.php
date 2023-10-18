<?php

namespace App\Filament\Resources\PageArticleResource\Pages;

use App\Filament\Resources\PageArticleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPageArticle extends EditRecord
{
    protected static string $resource = PageArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
