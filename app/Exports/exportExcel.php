<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class exportExcel implements FromView, WithColumnWidths {
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($tgl_awal, $tgl_akhir) {
        $this->awal = $tgl_awal;
        $this->akhir = $tgl_akhir;
    }

    public function columnWidths(): array{
        return [
            'A' => 4,
            'C' => 30,
            'D' => 15,
            'E' => 15,
            'F' => 15,
            'G' => 40,
        ];
    }

    public function view(): View{
        $getData = DB::table('tabungan_santri')->where('tgl', '>=', $this->awal)->where('tgl', '<=', $this->akhir)->get();
//        dd($getData);
        foreach ($getData as $data_santri) {
            $data_santri->nama = DB::table('data_santri')->where('kode_santri', $data_santri->kode_santri)->first()->nama;
        }

        return view('nara.unduh-excel')->with(['data' => $getData]);
    }

}
