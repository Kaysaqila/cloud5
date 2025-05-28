<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiswaResource\Pages;
use App\Filament\Resources\SiswaResource\RelationManagers;
use App\Models\Siswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    protected static ?string $navigationLabel = 'Data Siswa';
    protected static ?string $pluralLabel = 'Daftar Data Siswa';

    protected static ?string $navigationIcon = 'heroicon-o-identification'; //ganti icon

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(2) 
                    ->schema([
                        Forms\Components\FileUpload::make('foto') 
                            ->label('Foto Siswa')         
                            ->image()
                            ->directory('siswa')
                            ->columnspan(2)
                            ->required(),        

                        Forms\Components\TextInput::make('nama') 
                            ->label('Nama')                 
                            ->placeholder('Nama Siswa')  
                            ->required(),                   
                        
                        Forms\Components\TextInput::make('nis') //nis
                            ->label('NIS')
                            ->placeholder('NIS Siswa')
                            ->unique(ignoreRecord: true)
                            ->validationMessages([      //error message
                                'unique' => 'NIS sudah digunakan'
                            ])
                            ->required(),

                        Forms\Components\Select::make('gender')
                            ->label('Jenis Kelamin')
                            ->options([
                                'Laki-Laki' => 'Laki-Laki',
                                'Perempuan' => 'Perempuan',
                            ])
                            ->native(false)
                            ->required(),

                        Forms\Components\Select::make('rombel') //Select untuk dropdown
                            ->label('Rombel Kelas')
                            ->options([             //pilihan dropdown
                                'SIJA A' => 'SIJA A',
                                'SIJA B' => 'SIJA B',
                            ])
                            ->native(false)         //nonactive dropdown default browser
                            ->required(),                                                  
                            
                        Forms\Components\TextInput::make('kontak') 
                            ->label('Kontak')                 
                            ->placeholder('Kontak Siswa')  
                            ->required(),                   
                            
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->placeholder('Email Siswa')
                            ->email()               //mengatur input type="email" dan validasi email otomatis
                            ->unique(ignoreRecord: true)
                            ->validationMessages([
                                'unique' => 'Email sudah digunakan',
                            ])
                            ->required(),  
                            
                        Forms\Components\TextInput::make('alamat') 
                            ->label('Alamat')                 
                            ->placeholder('Alamat Siswa')  
                            ->columnspan(2)
                            ->required(),
                    ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                ->label('ID')
                ->getStateUsing(fn ($record) => siswa::orderBy('id')->pluck('id') //ambil semua id dari tabel guru
                ->search($record->id) + 1),

                Tables\Columns\ImageColumn::make('foto')
                ->label('Foto'),

                Tables\Columns\TextColumn::make('nama')
                ->label('Nama')
                ->searchable()
                ->sortable(),

                Tables\Columns\TextColumn::make('gender')
                ->label('Jenis Kelamin')
                ->formatStateUsing(fn ($state) => [ //ubah tampilan supaya yang tampil di tabel itu Laki, bukan L doang
                    'Laki-Laki' => 'Laki-Laki', 
                    'Perempuan' => 'Perempuan',
                ][$state] ?? '-')
                ->searchable()
                ->sortable(),

                Tables\Columns\TextColumn::make('nis')
                ->label('NIS')
                ->searchable()
                ->sortable(),

                Tables\Columns\TextColumn::make('rombel')
                ->label('Rombel Kelas')
                ->searchable()
                ->sortable(),

                Tables\Columns\TextColumn::make('email')
                ->label('Email')
                ->searchable()
                ->sortable(),

                Tables\Columns\TextColumn::make('kontak')
                ->label('Kontak')
                ->searchable()
                ->sortable(),

                Tables\Columns\BadgeColumn::make('status_lapor_pkl')
                ->label('Status PKL')
                ->formatStateUsing(fn ($state) => $state ? 'Aktif' : 'Tidak Aktif')
                ->color(fn ($state) => $state ? 'success' : 'danger'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('gender')
                    ->label('Gender')
                    ->options([
                        'Laki-Laki' => 'Laki-Laki',
                        'Perempuan' => 'Perempuan',
                    ]),

                Tables\Filters\SelectFilter::make('rombel')
                    ->label('Rombel Kelas')
                    ->options([
                        'SIJA A' => 'SIJA A',
                        'SIJA B' => 'SIJA B',
                    ]),

                Tables\Filters\TernaryFilter::make('status_lapor_pkl') //menyaring status_pkl berdasarkan status
                    ->trueLabel('Aktif') //hanya menampilkan yang aktif
                    ->falseLabel('Non-aktif'), //hanya menampilkan yang tidak aktif
            ])
            ->actions([
                \Filament\Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                ]),
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
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'view' => Pages\ViewSiswa::route('/{record}'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
        ];
    }
}