@extends('layouts.master')

@section('name', 'Dashboard')

@section('title', 'Dashboard')

@section('content')

    <div class="position-relative">
        <div class="grid columns-12 gap-12">
            <div class="g-col-12 g-col-xl-12 g-col-xxl-12 z-12">

                <div class=" mb-3 grid g-col-12 gap-sm-10 intro-y">
                    <div
                        class="g-col-12 g-col-sm-6 g-col-md-4 py-6 ps-sm-5 ps-md-0 ps-lg-5 position-relative text-center text-sm-start">

                        <div class="fs-sm fs-xxl-base fw-medium mb-n1"> <span
                                class="text-black dark-text-black fw-normal">Selamat Datang</span> {{ auth()->user()->name }}
                        </div>
                        <div
                            class="fs-base fs-xxl-lg justify-content-center justify-content-sm-start d-flex align-items-center text-black dark-text-black lh-3 mt-5 mt-xxl-5">
                            Total Tamu Hari Ini : {{ $jml_tamu_wabup }}
                        </div>
                        <br>
                        <div id="modal-datepicker">
                            <div class="preview">
                                <div> <a href="javascript:;" data-bs-toggle="modal"
                                        data-bs-target="#datepicker-modal-preview" class="btn btn-danger">Cetak Per
                                        Hari</a> </div>
                                <br>
                                <div> <a href="{{ route('cetak_all-wabup') }}" class="btn btn-danger">Cetak
                                        Seluruh Tamu</a> </div>
                                <div> <a href="{{ route('fe-wabup') }}" class="btn btn-danger mt-5">E-tamu setda
                                    </a> </div>
                                <div id="datepicker-modal-preview" class="modal fade" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="fw-medium fs-base me-auto">
                                                    Filter berdasarkan tanggal
                                                </h2>
                                            </div>

                                            <form method="POST" action="{{ route('cetak-wabup') }}">
                                                @csrf
                                                <div class="modal-body grid columns-12 gap-4 gap-y-3">
                                                    <div class="g-col-12 g-col-sm-6">
                                                        <label for="modal-datepicker-1" class="form-label">From</label>
                                                        <input type="date" class="form-control" placeholder="yyyy-mm-dd"
                                                            name="date1">
                                                    </div>
                                                    <div class="g-col-12 g-col-sm-6">
                                                        <label for="modal-datepicker-2" class="form-label">To</label>
                                                        <input type="date" class="form-control" placeholder="yyyy-mm-dd"
                                                            name="date2">
                                                    </div>
                                                </div>
                                                <div class="modal-footer text-end">
                                                    <button type="button" data-bs-dismiss="modal"
                                                        class="btn btn-outline-secondary w-20 me-1">Cancel</button>
                                                    <button type="submit" data-bs-dismiss="modal"
                                                        class="btn btn-primary">Download PDF</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>


                    <style>
                        .ilustration-position {
                            display: flex;
                            justify-content: center;
                            align-items: center;
                        }
                    </style>



                    <div
                        class="g-row-start-3 g-row-start-md-auto g-col-12 g-col-md-8 py-12 border-black dark-border-dark-3 border-opacity-10 border-top border-top-md-0 border-start-md border-end-md border-dashed ">

                        <div class="my-auto ilustration-position">
                            <img alt="#" class="kanan" src="{{ asset('template/dist/images/illustration.svg') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
