<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\PostResource\Pages;
use App\Filament\User\Resources\PostResource\RelationManagers;
use App\Filament\User\Resources\PostResource\RelationManagers\CommentsRelationManager;
use App\Models\Post;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Blog';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Group::make()->schema([
                Section::make('Post Details')->schema([
                    TextInput::make('title')
                        ->required(),

                    RichEditor::make('content')
                        ->required()
                        ->columnSpanFull()
                        ->fileAttachmentsDisk('public')->fileAttachmentsDirectory('post-content'),

                    Textarea::make('excerpt')
                        ->rows(3)
                        ->maxLength(255)
                        ->columnSpanFull(),
                ]),

                Section::make('SEO Details')->schema([
                    TextInput::make('meta_title')
                        ->label('Meta Title'),

                    Textarea::make('meta_description')
                        ->label('Meta Description')
                        ->rows(3),
                ]),
            ])->columnSpan(2),

            Group::make()->schema([
                Section::make('Status & Associations')->schema([
                    FileUpload::make('featured_image')
                        ->image()
                        ->disk('public')
                        ->directory('post-images')
                        ->required(),

                    Select::make('post_category_id')
                        ->label('Category')
                        ->relationship('category', 'name')->searchable()
                        ->preload()
                        ->required(),

                    Select::make('user_id')
                        ->label('Author')
                        ->relationship('user', 'name')
                        ->searchable()
                        ->preload()
                        ->required()
                        ->default(auth()->id()),

                    Select::make('tags')
                        ->label('Tags')
                        ->relationship('tags', 'name')
                        ->multiple()
                        ->preload()
                        ->searchable(),

                    Toggle::make('is_published')->default(true),
                    DateTimePicker::make('published_at')->default(now()),
                ]),
            ])->columnSpan(1),
        ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('featured_image'),
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->description(fn (Post $record): string => 'By ' . $record->user->name),
                TextColumn::make('category.name')->sortable(),
                ToggleColumn::make('is_published'),
                TextColumn::make('published_at')
                    ->formatStateUsing(fn($state) => Carbon::parse($state)->diffForHumans())
                    ->description(fn($state) => Carbon::parse($state)->toFormattedDayDateString())
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            CommentsRelationManager::class,
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
}
