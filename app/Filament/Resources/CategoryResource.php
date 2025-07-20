<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $slug = 'blog/categories';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationGroup = 'Blog';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->maxLength(255)
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Forms\Set $set, ?string $state) => $set('slug', Str::slug($state))),

                Forms\Components\TextInput::make('slug')
                    ->disabled()
                    ->dehydrated()
                    ->maxLength(255)
                    ->required()
                    ->unique(Category::class, 'slug', ignoreRecord: true),

                Forms\Components\Toggle::make('is_visible')
                    ->default(true)
                    ->label('Visibile to public'),

                Forms\Components\RichEditor::make('description')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\IconColumn::make('is_visible')
                    ->boolean()
                    ->label('Visibility'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCategories::route('/'),
        ];
    }
}
