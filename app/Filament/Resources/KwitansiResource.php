<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KwitansiResource\Pages;
use App\Filament\Resources\KwitansiResource\RelationManagers;
use App\Models\Kwitansi;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Forms;
use Filament\Notifications\Http\Livewire\Notifications;
use Filament\Notifications\Notification;
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
                Tables\Actions\Action::make('Print')
                ->action(function ($record, array $data) {
                    // dd($record->subkegiatan->kegiatan);
                    $pa_pptk = $record->pa_pptk->toArray();
                    $kadis = $record->kadis->toArray();
                    $bendahara = $record->bendahara->toArray();
                    $subkegiatan = $record->subkegiatan->toArray();
                    $kegiatan['kegiatan'] = $record->subkegiatan->kegiatan->toArray();
                    $program['program'] = $record->subkegiatan->kegiatan->program->toArray();
                    $belanja = $record->belanja->toArray();
                    $kwitansi = $record->toArray();
                    $datas = array_merge(array('terbilang'=>self::terbilang($record->uang)),$kwitansi, $pa_pptk, $kadis, $bendahara,  $subkegiatan, $kegiatan, $program, $belanja);
                    // dd($record, $kegiatan,  $datas);
                    $pdfContent = Pdf::loadView('pdf.pdf', $datas)->setPaper('A4', 'portrait')->output();
                    return response()->streamDownload(fn () => print($pdfContent), "filename.pdf");
                }),
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
    public static function terbilang($bilangan) {

        $angka = array('0','0','0','0','0','0','0','0','0','0',
                       '0','0','0','0','0','0');
        $kata = array('','satu','dua','tiga','empat','lima',
                      'enam','tujuh','delapan','sembilan');
        $tingkat = array('','ribu','juta','milyar','triliun');
      
        $panjang_bilangan = strlen($bilangan);
      
        /* pengujian panjang bilangan */
        if ($panjang_bilangan > 15) {
          $kalimat = "Diluar Batas";
          return $kalimat;
        }
      
        /* mengambil angka-angka yang ada dalam bilangan,
           dimasukkan ke dalam array */
        for ($i = 1; $i <= $panjang_bilangan; $i++) {
          $angka[$i] = substr($bilangan,-($i),1);
        }
      
        $i = 1;
        $j = 0;
        $kalimat = "";
      
      
        /* mulai proses iterasi terhadap array angka */
        while ($i <= $panjang_bilangan) {
      
          $subkalimat = "";
          $kata1 = "";
          $kata2 = "";
          $kata3 = "";
      
          /* untuk ratusan */
          if ($angka[$i+2] != "0") {
            if ($angka[$i+2] == "1") {
              $kata1 = "seratus";
            } else {
              $kata1 = $kata[$angka[$i+2]] . " ratus";
            }
          }
      
          /* untuk puluhan atau belasan */
          if ($angka[$i+1] != "0") {
            if ($angka[$i+1] == "1") {
              if ($angka[$i] == "0") {
                $kata2 = "sepuluh";
              } elseif ($angka[$i] == "1") {
                $kata2 = "sebelas";
              } else {
                $kata2 = $kata[$angka[$i]] . " belas";
              }
            } else {
              $kata2 = $kata[$angka[$i+1]] . " puluh";
            }
          }
      
          /* untuk satuan */
          if ($angka[$i] != "0") {
            if ($angka[$i+1] != "1") {
              $kata3 = $kata[$angka[$i]];
            }
          }
      
          /* pengujian angka apakah tidak nol semua,
             lalu ditambahkan tingkat */
          if (($angka[$i] != "0") OR ($angka[$i+1] != "0") OR
              ($angka[$i+2] != "0")) {
            $subkalimat = "$kata1 $kata2 $kata3 " . $tingkat[$j] . " ";
          }
      
          /* gabungkan variabe sub kalimat (untuk satu blok 3 angka)
             ke variabel kalimat */
          $kalimat = $subkalimat . $kalimat;
          $i = $i + 3;
          $j = $j + 1;
      
        }
      
        /* mengganti satu ribu jadi seribu jika diperlukan */
        if (($angka[5] == "0") AND ($angka[6] == "0")) {
          $kalimat = str_replace("satu ribu","seribu",$kalimat);
        }
      
        return trim($kalimat);
      
      } 
}
