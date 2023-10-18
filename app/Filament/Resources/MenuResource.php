<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Filament\Resources\MenuResource\RelationManagers;
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Textarea;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-bars-4';
    public static ?string $navigationLabel = 'Menu Builder';
    public static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        $count = Menu::count() + 1;
        return $form
        ->schema([
            Grid::make()->schema([
                TextInput::make('name')->autofocus()->required(),
                Select::make('page_id')
                        ->relationship('page', 'title')
                        ->preload()
                        ->required(),
                TextInput::make('url')
                ->helperText('Auto generates url after saving. You may put a unique url or leave it blank.'),
                TextInput::make('order')->default($count)->nullable(),
                Textarea::make('svg')->nullable()->helperText('Please input a svg icon'),
                Checkbox::make('new_window')
                    ->default(false)
                    ->autofocus()
                    ->label('Diplay Page to new window'),
            ])->columns(1)->columnSpan('full')
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Columns\TextColumn::make('order'),
                Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }    
}
