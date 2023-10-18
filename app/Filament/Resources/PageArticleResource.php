<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageArticleResource\Pages;
use App\Filament\Resources\PageArticleResource\RelationManagers;
use App\Models\PageArticle;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;

class PageArticleResource extends Resource
{
    protected static ?string $model = PageArticle::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static ?string $navigationLabel = 'Page Articles';
    public static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Tabs::make('Label')
            ->tabs([
                Tabs\Tab::make('Page Info')
                ->schema([
                    Grid::make()->schema([
                        TextInput::make('title')->autofocus()->required(),
                        Select::make('page_id')
                            ->relationship('page', 'title')
                            ->preload()
                            ->required(),
                        TextInput::make('slug')
                            ->helperText('Auto generates slug after saving. You may put a unique slug or leave it blank.'),
                        TextInput::make('mini_title')->nullable(),
                        RichEditor::make('description')->nullable(),
                        FileUpload::make('main_image')->nullable(),
                       
                    ])->columns(1)
                ]),

                Tabs\Tab::make('Additional Settings')
                ->schema([
                    Grid::make()->schema([
                        TextInput::make('video_link')->nullable()->label('Please add link for the video'),
                        FileUpload::make('pdf_file')->nullable()
                            ->acceptedFileTypes(['application/pdf'])
                            ->label('Upload PDF file'),
                        TextInput::make('link')->nullable()->label('External Link'),
                        Checkbox::make('status')
                            ->default(true)
                            ->autofocus()
                            ->label('Enable / Disable'),
                    ])->columns(1)
                    ]),
        ])->columns(1)->columnSpan('full')
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Columns\TextColumn::make('title'),
                Columns\TextColumn::make('slug'),
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
            'index' => Pages\ListPageArticles::route('/'),
            'create' => Pages\CreatePageArticle::route('/create'),
            'edit' => Pages\EditPageArticle::route('/{record}/edit'),
        ];
    }    
}
