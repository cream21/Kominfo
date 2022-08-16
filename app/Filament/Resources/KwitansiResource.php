<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KwitansiResource\Pages;
use App\Filament\Resources\KwitansiResource\RelationManagers;
use App\Models\Kwitansi;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KwitansiResource extends Resource
{
    protected static ?string $model = Kwitansi::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('kadis_id')
                    ->relationship('kadis', 'nama_lengkap')
                    ->required(),
                Forms\Components\Select::make('pa_pptk_id')
                    ->relationship('pa_pptk', 'nama_lengkap')
                    ->required(),
                Forms\Components\Select::make('bendahara_id')
                    ->relationship('bendahara', 'nama_lengkap')
                    ->required(),
                Forms\Components\Textarea::make('uraian_pembayaran')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\TextInput::make('uang')
                    ->required(),
                Forms\Components\select::make('belanja_id')
                    ->relationship('belanja', 'uraian_belanja')
                    ->required(),
                Forms\Components\select::make('subkegiatan_id')
                    ->relationship('subkegiatan', 'nama_sub_kegiatan')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kadis.nama_lengkap'),
                Tables\Columns\TextColumn::make('pa_pptk.nama_lengkap'),
                Tables\Columns\TextColumn::make('bendahara.nama_lengkap'),
                Tables\Columns\TextColumn::make('uraian_pembayaran'),
                Tables\Columns\TextColumn::make('uang'),
                Tables\Columns\TextColumn::make('belanja.uraian_belanja'),
                Tables\Columns\TextColumn::make('subkegiatan.nama_sub_kegiatan'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListKwitansis::route('/'),
            'create' => Pages\CreateKwitansi::route('/create'),
            'view' => Pages\ViewKwitansi::route('/{record}'),
            'edit' => Pages\EditKwitansi::route('/{record}/edit'),
        ];
    }
}
