<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Mahasiswa;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\MahasiswaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MahasiswaResource\RelationManagers;

class MahasiswaResource extends Resource
{
    protected static ?string $model = Mahasiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->label('Nama Lengkap'),
                Forms\Components\TextInput::make('nim')
                    ->required()
                    ->unique()
                    ->label('Nomor Induk Mahasiswa'),
                Forms\Components\Select::make('jurusan')
                    ->label('Jurusan')
                    ->options([
                        'TI' => 'Teknik Informatika',
                        'SI' => 'Sistem Informasi',
                        // Tambahkan pilihan jurusan lainnya
                    ])
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_lahir')
                    ->label('Tanggal Lahir'),
                Forms\Components\Textarea::make('alamat')
                    ->label('Alamat'),
            ]);
    }

    public static function table(Table $table): Table
    {
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('nama')
                ->label('Nama')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('nim')
                ->label('NIM')
                ->sortable(),
            Tables\Columns\TextColumn::make('jurusan')
                ->label('Jurusan')
                ->sortable(),
            TextColumn::make('tanggal_lahir')
                ->label('Tanggal Lahir')
                ->sortable(),
        ])
        ->filters([
            Tables\Filters\Filter::make('nama')
                ->query(fn (Builder $query, string $search) => $query->where('nama', 'like', "%{$search}%")),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMahasiswas::route('/'),
            'create' => Pages\CreateMahasiswa::route('/create'),
            'edit' => Pages\EditMahasiswa::route('/{record}/edit'),
        ];
    }
}
