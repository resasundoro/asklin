@section('title')
    Status Akreditasi
@endsection

@extends('layouts.frontend.main')

@section('content')
<div role="main" class="main">
    <section class="page-header page-header-modern bg-color-light-scale-2 page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-dark">Status Formulir</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Status Formulir</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="container pt-3 pb-2">
        <div class="row pt-2">
            @include('layouts.frontend.l_sidebar')
            <div class="col-lg-9">
                <div id="examples" class="container py-2">
                    <div id="examples" class="container py-2">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tabs">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a class="nav-link active" href="#DalamProses" data-bs-toggle="tab">Dalam Proses</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#ButuhTindakan" data-bs-toggle="tab">Butuh Tindakan</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#Draft" data-bs-toggle="tab">Draft</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#Ditolak" data-bs-toggle="tab">Ditolak</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#Selesai" data-bs-toggle="tab">Selesai</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="DalamProses" class="tab-pane active">
                                            @if($k->status == "1" || $k->status == "2")
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Nomor Permohonan</th>
                                                            <th>Tanggal Mengajukan</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $k->no_peserta }}</td>
                                                            <td>{{ date('j F Y h:i:s', strtotime($k->created_at)) }}</td>
                                                            <td>{{ $k->status }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                @else
                                                <p class="text-center">Belum ada data yang di perbarui.</p>
                                            @endif
                                        </div>
                                        <div id="ButuhTindakan" class="tab-pane">
                                            @if($k->status == "3")
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Nomor Permohonan</th>
                                                            <th>Tanggal Mengajukan</th>
                                                            <th>Tanggal Perbaikan</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $k->no_peserta }}</td>
                                                            <td>{{ date('j F Y h:i:s', strtotime($k->created_at)) }}</td>
                                                            <td>{{ date('j F Y h:i:s', strtotime($k->updated_at)) }}</td>
                                                            <td>{{ $k->status }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                @else
                                                <p class="text-center">Belum ada data yang di perbarui.</p>
                                            @endif
                                        </div>
                                        <div id="Draft" class="tab-pane">
                                            @if($k->status == "Create Dokter")
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Nomor Permohonan</th>
                                                            <th>Tanggal Mengajukan</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $k->no_peserta }}</td>
                                                            <td>{{ date('j F Y h:i:s', strtotime($k->created_at)) }}</td>
                                                            <td>{{ $k->status }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                @else
                                                <p class="text-center">Belum ada data yang di perbarui.</p>
                                            @endif
                                        </div>

                                        <div id="Ditolak" class="tab-pane">
                                            @if($k->status == "Ditolak Pusat")
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Nomor Permohonan</th>
                                                            <th>Tanggal Mengajukan</th>
                                                            <th>Tanggal Perbaikan</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $k->no_peserta }}</td>
                                                            <td>{{ date('j F Y h:i:s', strtotime($k->created_at)) }}</td>
                                                            <td>{{ date('j F Y h:i:s', strtotime($k->updated_at)) }}</td>
                                                            <td>{{ $k->status }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                @else
                                                <p class="text-center">Belum ada data yang di perbarui.</p>
                                            @endif
                                        </div>
                                        <div id="Selesai" class="tab-pane">
                                            @if($k->status == "Approved")
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Nomor Permohonan</th>
                                                            <th>Tanggal Mengajukan</th>
                                                            <th>Tanggal Perbaikan</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $k->no_peserta }}</td>
                                                            <td>{{ date('j F Y h:i:s', strtotime($k->created_at)) }}</td>
                                                            <td>{{ date('j F Y h:i:s', strtotime($k->updated_at)) }}</td>
                                                            <td>{{ $k->status }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                @else
                                                <p class="text-center">Belum ada data yang di setujui.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection