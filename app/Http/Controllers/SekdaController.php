<?php

namespace App\Http\Controllers;

use App\Models\Sekda;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class SekdaController extends Controller
{
    public function index()
    {
        $tamu = Sekda::all();
        return response()->json([
            'data' => $tamu->map(function ($tamu) {
                return [
                    'id' => $tamu->id,
                    'nama' => $tamu->nama,
                    'nip' =>  $tamu->nip,
                    'noHp' => $tamu->noHp,
                    'statusPegawai' => $tamu->statusPegawai,
                    'alamatAsalInstansi' => $tamu->alamatAsalInstansi,
                    'bidang' => $tamu->bidang,
                    'jabatan' => $tamu->jabatan,
                    'keperluan' => $tamu->keperluan,
                    'tujuan' => $tamu->tujuan,
                ];
            })
        ]);
    }

    public function getLatestData()
    {
        $now = Carbon::now()->toDateString();
        $tamu = Sekda::whereDate('created_at', $now)->latest()->limit(10)->get();
        $count = Sekda::whereDate('created_at', $now)->count();

        return response()->json([
            'count' => $count,
            'tamu' => $tamu,
        ]);
    }

    public function dashboard()
    {
        $now = Carbon::now()->toDateString();
        $tamu = Sekda::whereDate('created_at', $now)->latest()->limit(10)->get();
        $totalTamu = Sekda::count();
        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');

        return view('dashboard.dashboard-setda', ['tamu' => $tamu, 'count' => $tamu->count(), 'totalTamu' => $totalTamu, 'today' => $today, 'now' => $now]);
    }

    public function store(Request $request)
    {
        if (empty($request->nama) && empty($request->noHp) && empty($request->statusPegawai) && empty($request->alamatAsalInstansi) && empty($request->keperluan) && empty($request->tujuan)) {
            return response()->json([
                'success' => 'false',
                'data' => [
                    'message' => 'Form Inputan Tidak Boleh Kosong'
                ]
            ], 400);
        } elseif (empty($request->nama)) {
            return response()->json([
                'success' => 'false',
                'data' => [
                    'message' => 'Nama Tamu Tidak Boleh Kosong !',
                ]
            ], 400);
        } elseif (empty($request->statusPegawai)) {
            return response()->json([
                'success' => 'false',
                'data' => [
                    'message' => 'Status Pegawai Tidak Boleh Kosong !',
                ]
            ], 400);
        } elseif (empty($request->alamatAsalInstansi)) {
            return response()->json([
                'success' => 'false',
                'data' => [
                    'message' => 'Alamat/Asal Instansi Tidak Boleh Kosong !',
                ]
            ], 400);
        } elseif (empty($request->keperluan)) {
            return response()->json([
                'success' => 'false',
                'data' => [
                    'message' => 'Keperluan Tidak Boleh Kosong !',
                ]
            ], 400);
        } elseif (empty($request->tujuan)) {
            return response()->json([
                'success' => 'false',
                'data' => [
                    'message' => 'Tujuan Tidak Boleh Kosong !',
                ]
            ], 400);
        }

        $tamu = Sekda::create([
            'nama' => $request->nama,
            'noHp' => $request->noHp,
            'nip' => $request->nip,
            'statusPegawai' => $request->statusPegawai,
            'alamatAsalInstansi' => $request->alamatAsalInstansi,
            'bidang' => $request->bidang,
            'jabatan' => $request->jabatan,
            'keperluan' => $request->keperluan,
            'tujuan' => $request->tujuan,
        ]);

        if ($tamu) {
            return response()->json([
                'success' => true,
                'data' => ['message' => 'Data Riwayat Tamu Berhasil Disimpan']
            ]);
        } else {
            return response()->json([
                'success' => false,
                'data' => [
                    'message' => 'Data Riwayat Tamu Gagal Disimpan '
                ]
            ]);
        }
    }

    public function show()
    {
        $tamu = Sekda::all();
        return view('tamu_setda.riwayat_user', compact('tamu'));
    }

    public function edit(Request $request, $id)
    {
        $tamu = Sekda::find($id);
        if (is_null($tamu)) {
            return response()->json([
                'success' => false,
                'data' => [
                    'message' => 'Data Tidak Ditemukan'
                ]
            ]);
        }

        $tamu->nama = $request->nama;
        $tamu->noHp = $request->noHp;
        $tamu->nip = $request->nip;
        $tamu->statusPegawai = $request->statusPegawai;
        $tamu->alamatAsalInstansi = $request->alamatAsalInstansi;
        $tamu->bidang = $request->bidang;
        $tamu->jabatan = $request->jabatan;
        $tamu->keperluan = $request->keperluan;
        $tamu->tujuan = $request->tujuan;


        $tamu->save();

        return response()->json(
            [
                'success' => true,
                'data' => [
                    'message' => 'Data Riwayat Tamu Berhasil Di Update',
                ]
            ],
            200
        );
    }

    public function update(Request $request, Sekda $tamu)
    {
    }

    public function destroy($id)
    {
        $dinas = Sekda::find($id);
        $dinas->delete();

        if ($dinas) {
            return response()->json([
                'success' => true,
                'data' => [
                    'message' => 'Data Riwayat Tamu Berhasil Di Hapus !'
                ]
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'data' => [
                    'message' => 'Data Tidak Berhasil Di Hapus!'
                ]
            ], 400);
        };
    }

    public function cetak(Request $request)
    {
        $datepicker1 = $request->date1;
        $datepicker2 = $request->date2;

        $tamu = Sekda::whereDate('created_at', [$datepicker1, $datepicker2])->get();

        $pdf = PDF::loadView('tamu_setda.tamu_pdf', compact('tamu'));
        $pdf->setPaper('F4', 'landscape');
        return $pdf->stream('tamu_setda.tamu_pdf');
    }

    public function cetak_all(Request $request)
    {

        $tamu = Sekda::all();

        $pdf = PDF::loadView('tamu_setda.tamu_pdf', compact('tamu'));
        $pdf->setPaper('F4', 'landscape');
        return $pdf->stream('tamu_setda.tamu_pdf');
    }
    public function detail(Request $request, $id)
    {
        $tamu = Sekda::findOrfail($id);
        return view('tamu_setda.detail', compact('tamu'));
    }
}
