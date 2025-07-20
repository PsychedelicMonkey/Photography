<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $slug = 'blog/posts';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationGroup = 'Blog';

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->maxLength(255)
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Forms\Set $set, ?string $state) => $set('slug', Str::slug($state))),

                        Forms\Components\TextInput::make('slug')
                            ->disabled()
                            ->dehydrated()
                            ->maxLength(255)
                            ->required()
                            ->unique(Post::class, 'slug', ignoreRecord: true),

                        Forms\Components\Select::make('author_id')
                            ->relationship('author', 'name')
                            ->required()
                            ->searchable(),

                        Forms\Components\Select::make('category_id')
                            ->relationship('category', 'name')
                            ->required()
                            ->searchable(),

                        Forms\Components\DatePicker::make('published_at'),

                        Forms\Components\SpatieTagsInput::make('tags'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Image')
                    ->schema([
                        Forms\Components\SpatieMediaLibraryFileUpload::make('image')
                            ->collection('post-images')
                            ->hiddenLabel()
                            ->image()
                            ->imageEditor()
                            ->imageCropAspectRatio('3:2')
                            ->imageResizeMode('cover')
                            ->imageResizeTargetWidth('1200')
                            ->imageResizeTargetHeight('900')
                            ->required()
                            ->responsiveImages(),
                    ]),

                Forms\Components\Section::make('Body')
                    ->schema([
                        Forms\Components\RichEditor::make('body')
                            ->columnSpanFull()
                            ->hiddenLabel()
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('author.name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('category.name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('published_at')
                    ->date()
                    ->sortable(),

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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title', 'slug', 'author.name'];
    }

    public static function getGlobalSearchEloquentQuery(): Builder
    {
        return parent::getGlobalSearchEloquentQuery()->with('author');
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        /** @var Post $record */

        return [
            'Author' => optional($record->author)->name,
        ];
    }
}
