<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\exportExcel;
use Illuminate\Support\Env;


class naraController extends Controller
{
    public function daftarSantri(){
        $getData = DB::table('data_santri')->get();
        foreach ($getData as $sum) {
            $sum->sum = DB::table('tabungan_santri')->where('kode_santri', $sum->kode_santri)->where('tgl', date('Y-m-d'))->sum('kredit');
        }
//        dd($getData);
        $data = [
            'rowSantri' => $getData,
        ];
        return view('nara.daftar-santri')->with($data);
    }

    public function topup($kode){
        $cariData = DB::table('data_santri')->where('kode_santri', $kode)->count();
        if($cariData == 0){
            //Jika data Tidak Ada
            return redirect('/404');
        } else {
            //Jika Ada data
            $getData = DB::table('data_santri')->where('kode_santri', $kode)->first();
            $data = [
                'data' => $getData
            ];
            return view('nara.topup')->with($data);
        }
    }

    public function authTopup(Request $request){
        $kode_santri = $request->input('kode_santri');
        $getSaldoAwal = DB::table('data_santri')->where('kode_santri', $kode_santri)->first();
        $saldo_awal = $getSaldoAwal->saldo;

        $ket = $request->input('ket');
        if($ket == null) {
            $keterangan = "Topup";
        } else {
            $keterangan = $request->input('ket');
        }

        $insertData = [
            'kode_santri' => $kode_santri,
            'debet' => $request->input('topup'),
            'kredit' => 0,
            'saldo' => $saldo_awal + $request->input('topup'),
            'tgl' => date('Y-m-d'),
            'tgl_transaksi' => $request->input('tgl'),
            'ket' => $keterangan,
            'petugas' => session()->get('email'),
        ];


        // Start Transaction
        DB::beginTransaction();
        try{
            DB::table('tabungan_santri')->insert($insertData);
            DB::table('data_santri')->where('kode_santri', $kode_santri)->update(['saldo' => $insertData['saldo']]);
            DB::commit();
        } catch (Exception $e){
            DB::rollBack();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
        // End Transaction

        $chatID = $getSaldoAwal->tele;
        if($chatID == '') {
            $chatID = '1188921685';
        } else {
            $chatID = $getSaldoAwal->tele;
        }

        $apiToken = Env::get('TELEGRAM_BOT_API_TOKEN');

        $templatePesan = "Santri dengan nama $getSaldoAwal->nama telah menabung sebesar $request->topup. Jazakallahukhoir...";
        $sendChat = [
            'text' => $templatePesan,
            'chat_id' => $chatID,
        ];
        file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($sendChat));

        return redirect('/nara/daftar-santri');
    }

    public function tarik($kode){
        $cariData = DB::table('data_santri')->where('kode_santri', $kode)->count();
        if($cariData == 0){
            //Jika data Tidak Ada
            return redirect('/404');
        } else {
            //Jika Ada data
            $getData = DB::table('data_santri')->where('kode_santri', $kode)->first();
            $data = [
                'data' => $getData
            ];
            return view('nara.tarik')->with($data);
        }

    }

    public function authTarik(Request $request){
        $kode_santri = $request->input('kode_santri');
        $getSaldoAwal = DB::table('data_santri')->where('kode_santri', $kode_santri)->first();
        $saldo_awal = $getSaldoAwal->saldo;

        $insertData = [
            'kode_santri' => $kode_santri,
            'debet' => 0,
            'kredit' => $request->input('tarik'),
            'saldo' => $saldo_awal - $request->input('tarik'),
            'tgl' => date('Y-m-d'),
            'tgl_transaksi' => $request->input('tgl'),
            'ket' => $request->input('ket'),
            'petugas' => session()->get('email'),
        ];

        $saldo_akhir = $insertData['saldo'];
        $keterangan = $insertData['ket'];


        // Start Transaction
        DB::beginTransaction();
        try{
            DB::table('tabungan_santri')->insert($insertData);
            DB::table('data_santri')->where('kode_santri', $kode_santri)->update(['saldo' => $insertData['saldo']]);
            DB::commit();
        } catch (Exception $e){
            DB::rollBack();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
        // End Transaction

        $chatID = $getSaldoAwal->tele;
        if($chatID == '') {
            $chatID = '1188921685';
        } else {
            $chatID = $getSaldoAwal->tele;
        }

        $apiToken = ENV('TELEGRAM_BOT_API_TOKEN');
        $templatePesan = "Santri dengan nama $getSaldoAwal->nama telah melakukan penarikan sebesar $request->tarik untuk keperluan $keterangan. Saldo Akhir : Rp$saldo_akhir";
        $sendChat = [
            'text' => $templatePesan,
            'chat_id' => $chatID,
        ];
        file_get_contents("https://api.telegram.org/bot". $apiToken ."/sendMessage?" . http_build_query($sendChat));

        return redirect('/nara/daftar-santri');
    }

    public function jajan($kode){
        $cariData = DB::table('data_santri')->where('kode_santri', $kode)->count();
        if($cariData == 0){
            //Jika data Tidak Ada
            return redirect('/404');
        } else {
            //Jika Ada data
            $getData = DB::table('data_santri')->where('kode_santri', $kode)->first();
            $data = [
                'data' => $getData
            ];
            return view('nara.jajan')->with($data);
        }
    }

    public function authJajan(Request $request){
        $kode_santri = $request->input('kode_santri');
        $getSaldoAwal = DB::table('data_santri')->where('kode_santri', $kode_santri)->first();
        $saldo_awal = $getSaldoAwal->saldo;

        if ($request->input('ket') == null) {
            $keterangan = "Jajan";
        } else {
            $keterangan = $request->input('ket');
        }

        $insertData = [
            'kode_santri' => $kode_santri,
            'debet' => 0,
            'kredit' => $request->input('tarik'),
            'saldo' => $saldo_awal - $request->input('tarik'),
            'tgl' => date('Y-m-d'),
            'tgl_transaksi' => date('Y-m-d'),
            'ket' => $keterangan,
            'petugas' => session()->get('email'),
        ];

        $saldo_akhir = $insertData['saldo'];


        // Start Transaction
        DB::beginTransaction();
        try{
            DB::table('tabungan_santri')->insert($insertData);
            DB::table('data_santri')->where('kode_santri', $kode_santri)->update(['saldo' => $insertData['saldo']]);
            DB::commit();
        } catch (Exception $e){
            DB::rollBack();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
        // End Transaction

        $chatID = $getSaldoAwal->tele;
        if($chatID == '') {
            $chatID = '1188921685';
        } else {
            $chatID = $getSaldoAwal->tele;
        }

        $apiToken = ENV('TELEGRAM_BOT_API_TOKEN');
        $templatePesan = "Santri dengan nama $getSaldoAwal->nama telah jajan sebesar $request->tarik dengan rincian $keterangan. Saldo Akhir : Rp$saldo_akhir";
        $sendChat = [
            'text' => $templatePesan,
            'chat_id' => $chatID,
        ];
        file_get_contents("https://api.telegram.org/bot". $apiToken ."/sendMessage?" . http_build_query($sendChat));

        return redirect('/nara/daftar-santri');

    }


    public function laporan($kode) {
        $getData = DB::table('tabungan_santri')->where('kode_santri', $kode)->get();
        $getSaldo = DB::table('data_santri')->where('kode_santri', $kode)->first();
        $data = [
            'data' => $getData,
            'logo' => asset('images/kop.png'),
            'saldo' => $getSaldo->saldo,
        ];
        $pdf = Pdf::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('nara.laporan', $data);
        return $pdf->download('laporan.pdf');
//        return view('nara.laporan', $data);
    }

    public function excel(){
        return view('nara.excel');
    }



    public function unduhExcel(Request $request){

        return Excel::download(new exportExcel($request->tgl_awal, $request->tgl_akhir), 'laporan.xlsx');

    }


}
