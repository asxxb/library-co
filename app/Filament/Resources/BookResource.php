<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use App\Filament\Resources\BookResource\RelationManagers;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Schema;
use Str;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([





                TextInput::make('title')->required()->live(
                    debounce: 500
                )->afterStateUpdated(function ($set, $state) {
                    $set('slug', Str::slug($state));
                }),
                TextInput::make('slug')->required()->readOnly()->unique(ignoreRecord: true),
                TextInput::make('author'),
                // Select::make('user_id')->options(User::all()->pluck('name', 'id'))->required(),
                Hidden::make('user_id')->default(auth()->id()),
                Select::make('category_id')->label('Category')->options(Category::all()->pluck('name', 'id'))->required(),
                Select::make('tags')->multiple()->relationship('tags', 'name'),



                TextInput::make('price'),
                FileUpload::make('image'),
                MarkdownEditor::make('description'),



            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('image'),
                TextColumn::make('title')->searchable(),
                TextColumn::make('author')->searchable(),
                TextColumn::make('description')->searchable(),
                TextColumn::make('slug')->searchable(),
                TextColumn::make('price')->searchable(),



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
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}
