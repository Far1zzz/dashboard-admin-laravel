@extends('layouts.master')

@section('name', 'Riwayat Tamu')

@section('title', 'Riwayat Tamu')

@section('breadcrumb')
    <i data-feather="chevron-right" class="breadcrumb__icon"></i>
    <a href="#" class="breadcrumb--active">Riwayat Tamu Bupati</a>
@endsection

@section('content')
    <div class="grid columns-12 gap-6 ">
        <div class="g-col-12 box g-col-xxl-12">
            <div class="grid p-5 columns-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="g-col-12 mb-2">
                    <div class="intro-y d-block d-sm-flex align-items-center h-10">
                        <h2 class="fs-lg fw-medium truncate me-5">
                            Daftar Tamu
                        </h2>
                        <div class="pull-right">
                        </div>
                        <div id="modal-datepicker" class="p-5">
                            <div class="preview">
                                <div class="text-center"> <a href="javascript:;" data-bs-toggle="modal"
                                        data-bs-target="#datepicker-modal-preview" class="btn btn-primary">Cetak</a> </div>
                                <div id="datepicker-modal-preview" class="modal fade" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="fw-medium fs-base me-auto">
                                                    Filter by Date
                                                </h2>
                                                <div class="dropdown d-sm-none">
                                                    <a class="dropdown-toggle w-5 h-5 d-block" href="javascript:;"
                                                        role="button" aria-expanded="false" data-bs-toggle="dropdown"> <i
                                                            data-feather="more-horizontal"
                                                            class="w-5 h-5 text-gray-600 dark-text-gray-600"></i> </a>
                                                    <div class="dropdown-menu w-40">
                                                        <ul class="dropdown-content">
                                                            {{-- <li>
                        <a href="javascript:;" class="dropdown-item"> <i data-feather="file" class="w-4 h-4 me-2"></i> Download Docs </a>
                        </li> --}}
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <form method="POST" action="{{ route('cetak-bupati') }}">
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
                            <div class="source-code d-none">
                                <button data-target="#copy-modal-datepicker"
                                    class="copy-code btn py-1 px-2 btn-outline-secondary"> <i data-feather="file"
                                        class="w-4 h-4 me-2"></i> Copy example code </button>
                                <div class="overflow-y-auto mt-3 rounded-2">
                                    <pre id="copy-modal-datepicker" class="source-preview"> <code class="fs-xs p-0 rounded-2 html ps-5 pt-8 pb-4 mb-n10 mt-n10"> HTMLOpenTag!-- BEGIN: Show Modal Toggle --HTMLCloseTag HTMLOpenTagdiv class=&quot;text-center&quot;HTMLCloseTag HTMLOpenTaga href=&quot;javascript:;&quot; data-bs-toggle=&quot;modal&quot; data-bs-target=&quot;#datepicker-modal-preview&quot; class=&quot;btn btn-primary&quot;HTMLCloseTagShow ModalHTMLOpenTag/aHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag!-- END: Show Modal Toggle --HTMLCloseTag HTMLOpenTag!-- BEGIN: Modal Content --HTMLCloseTag HTMLOpenTagdiv id=&quot;datepicker-modal-preview&quot; class=&quot;modal fade&quot; tabindex=&quot;-1&quot; aria-hidden=&quot;true&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;modal-dialog&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;modal-content&quot;HTMLCloseTag HTMLOpenTag!-- BEGIN: Modal Header --HTMLCloseTag HTMLOpenTagdiv class=&quot;modal-header&quot;HTMLCloseTag HTMLOpenTagh2 class=&quot;fw-medium fs-base me-auto&quot;HTMLCloseTagFilter by DateHTMLOpenTag/h2HTMLCloseTag HTMLOpenTagbutton class=&quot;btn btn-outline-secondary d-none d-sm-flex&quot;HTMLCloseTag HTMLOpenTagi data-feather=&quot;file&quot; class=&quot;w-4 h-4 me-2&quot;HTMLCloseTagHTMLOpenTag/iHTMLCloseTag Download Docs HTMLOpenTag/buttonHTMLCloseTag HTMLOpenTagdiv class=&quot;dropdown d-sm-none&quot;HTMLCloseTag HTMLOpenTaga class=&quot;dropdown-toggle w-5 h-5 d-block&quot; href=&quot;javascript:;&quot; role=&quot;button&quot; aria-expanded=&quot;false&quot; data-bs-toggle=&quot;dropdown&quot;HTMLCloseTag HTMLOpenTagi data-feather=&quot;more-horizontal&quot; class=&quot;w-5 h-5 text-gray-600 dark-text-gray-600&quot;HTMLCloseTagHTMLOpenTag/iHTMLCloseTag HTMLOpenTag/aHTMLCloseTag HTMLOpenTagdiv class=&quot;dropdown-menu w-40&quot;HTMLCloseTag HTMLOpenTagul class=&quot;dropdown-content&quot;HTMLCloseTag HTMLOpenTagliHTMLCloseTag HTMLOpenTaga href=&quot;javascript:;&quot; class=&quot;dropdown-item&quot;HTMLCloseTag HTMLOpenTagi data-feather=&quot;file&quot; class=&quot;w-4 h-4 me-2&quot;HTMLCloseTagHTMLOpenTag/iHTMLCloseTag Download Docs HTMLOpenTag/aHTMLCloseTag HTMLOpenTag/liHTMLCloseTag HTMLOpenTag/ulHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag!-- END: Modal Header --HTMLCloseTag HTMLOpenTag!-- BEGIN: Modal Body --HTMLCloseTag HTMLOpenTagdiv class=&quot;modal-body grid columns-12 gap-4 gap-y-3&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;g-col-12 g-col-sm-6&quot;HTMLCloseTag HTMLOpenTaglabel for=&quot;modal-datepicker-1&quot; class=&quot;form-label&quot;HTMLCloseTagFromHTMLOpenTag/labelHTMLCloseTag HTMLOpenTaginput id=&quot;modal-datepicker-1&quot; class=&quot;datepicker form-control&quot; data-single-mode=&quot;true&quot;HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;g-col-12 g-col-sm-6&quot;HTMLCloseTag HTMLOpenTaglabel for=&quot;modal-datepicker-2&quot; class=&quot;form-label&quot;HTMLCloseTagToHTMLOpenTag/labelHTMLCloseTag HTMLOpenTaginput id=&quot;modal-datepicker-2&quot; class=&quot;datepicker form-control&quot; data-single-mode=&quot;true&quot;HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag!-- END: Modal Body --HTMLCloseTag HTMLOpenTag!-- BEGIN: Modal Footer --HTMLCloseTag HTMLOpenTagdiv class=&quot;modal-footer text-end&quot;HTMLCloseTag HTMLOpenTagbutton type=&quot;button&quot; data-bs-dismiss=&quot;modal&quot; class=&quot;btn btn-outline-secondary w-20 me-1&quot;HTMLCloseTagCancelHTMLOpenTag/buttonHTMLCloseTag HTMLOpenTagbutton type=&quot;button&quot; class=&quot;btn btn-primary w-20&quot;HTMLCloseTagSubmitHTMLOpenTag/buttonHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag!-- END: Modal Footer --HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag!-- END: Modal Content --HTMLCloseTag </code> </pre>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="intro-y overflow-auto overflow-lg-visible mt-8 mt-sm-0">
                        <div class="table-responsive p-4">
                            <table class="table table-report mt-sm-2"   >
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama lengkap</th>
                                        <th>Asal Instansi</th>
                                        <th>No HP</th>
                                        <th>Tanggal Kedatangan</th>
                                        <th>Status Pegawai</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($tamu as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->alamatAsalInstansi }}</td>
                                            <td>{{ $item->noHp }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $item->statusPegawai }}</td>
                                            <td><a href="{{ route('detail-bupati', $item->id) }}"
                                                    class="btn btn-sm btn-primary">Detail</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
