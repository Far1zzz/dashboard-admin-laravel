@extends('layouts.master')

@section('name', 'Detail Riwayat Tamu')

@section('title', 'Detail Riwayat Tamu')

@section('content')

<div>
    <label class="form-label">
        <h1 class="mt-3">Detail Tamu</h1>
    </label>
    <hr>
</div>
<div class="mt-5">
    <div class="row">
        <div class="col-lg-6 col-xs-12 mt-5">
            <label for="regular-form-1" class="form-label">Nama Lengkap</label>
            <input id="regular-form-1" type="text" class="form-control" name="nama"
               value="{{ old('nama', $tamu->nama) }}" readonly>
        </div>
        <div class="col-lg-6 col-xs-12 mt-5">
            <label for="regular-form-1" class="form-label">Nomor HP</label>
            <input id="regular-form-1" type="text" class="form-control"
                name="noHp" value="{{ old('noHp', $tamu->noHp) }}" readonly>
        </div>
        <div class="col-lg-6 col-xs-12 mt-5">
            <label for="regular-form-1" class="form-label">NIP</label>
            <input id="regular-form-1" type="text" class="form-control"
                value="{{ old('nip', $tamu->nip) }}" name="nip" readonly>
        </div>
        <div class="col-lg-6 col-xs-12 mt-5">
            <label for="regular-form-1" class="form-label">Status Pegawai</label>
            <input id="regular-form-1" type="text" class="form-control"
                value="{{ old('statusPegawai', $tamu->statusPegawai) }}" name="statusPegawai" readonly>
            </div>
        <div class="col-lg-6 col-xs-12 mt-5">
            <label for="regular-form-1" class="form-label">Alamat Instansi</label>
            <input id="regular-form-1" type="text" class="form-control"
                value="{{ old('alamatAsalInstansi', $tamu->alamatAsalInstansi) }}" name="alamatAsalInstansi" readonly>
            </div>
         <div class="col-lg-6 col-xs-12 mt-5">
            <label for="regular-form-1" class="form-label">Bidang</label>
            <input id="regular-form-1" type="text" class="form-control"
                value="{{ old('bidang', $tamu->bidang) }}" name="bidang" readonly>
            </div>
     <div class="col-lg-6 col-xs-12 mt-5">
            <label for="regular-form-1" class="form-label">Jabatan</label>
            <input id="regular-form-1" type="text" class="form-control"
                value="{{ old('jabatan', $tamu->jabatan) }}" name="jabatan" readonly>
            </div>
         <div class="col-lg-6 col-xs-12 mt-5">
            <label for="regular-form-1" class="form-label">Keperluan</label>
            <input id="regular-form-1" type="text" class="form-control"
                value="{{ old('keperluan', $tamu->keperluan) }}" name="keperluan" readonly>
            </div>
   
     <div class="col-lg-6 col-xs-12 mt-5">
            <label for="regular-form-1" class="form-label">Tujuan</label>
            <input id="regular-form-1" type="text" class="form-control"
                value="{{ old('tujuan', $tamu->tujuan) }}" name="tujuan" readonly>
            </div>
    
    </div>
</div>


@endsection