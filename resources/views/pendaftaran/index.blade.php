@section('title')
    User Akreditasi
@endsection

@extends('layouts.frontend.main')

@section('content')
<div role="main" class="main">
    <section class="page-header page-header-modern bg-color-light-scale-2 page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-dark">User Akreditasi</h1>
                    <br/>
                    @if($k->status == "0")
                        <span class="badge badge-success badge-sm mb-3">Pending</span><br/>
                        <a href="{{ url('pendaftaran/edit') }}" class="btn btn-outline btn-secondary mb-2">Daftarkan Klinik</a>
                    @elseif($k->status == "1")
                       <span class="badge badge-success badge-sm mb-3">Waiting</span><br/>
                       <a href="{{ url('pendaftaran/edit') }}" class="btn btn-outline btn-secondary mb-2">Update Persyaratan</a>
                    @elseif($k->status == "2")
                        <span class="badge badge-success badge-sm mb-3">Progress</span><br/>
                        <a href="{{ url('pendaftaran/sdm') }}" class="btn btn-outline btn-secondary mb-2">Update Persyaratan</a>
                    @elseif($k->status == "3")
                        <span class="badge badge-success badge-sm mb-3">Draft</span><br/>
                        <a href="{{ url('pendaftaran/edit') }}" class="btn btn-outline btn-secondary mb-2">Update Klinik</a>
                        <a href="{{ url('pendaftaran/sdm') }}" class="btn btn-outline btn-secondary mb-2">Update Persyaratan</a>
                    @elseif($k->status == "4")
                        <span class="badge badge-success badge-sm mb-3">Waiting Approval</span><br/>
                    @elseif($k->status == "5")
                        <span class="badge badge-success badge-sm mb-3">Approved</span><br/>
                    @elseif($k->status == "6")
                        <span class="badge badge-success badge-sm mb-3">Waiting Payment</span><br/>
                    @endif
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">User Akreditasi</li>
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
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col pb-3">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Contak Person</th>
                                                <td>{{ $k->nama_pendaftar }}</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Email</th>
                                                <td class="text-left">{{ $k->email_pendaftar }}</td>
                                            </tr>
                                            <tr>
                                                <th>Telepon</th>
                                                <td class="text-left">{{ $k->tlf_pendaftar }}</td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td>{{ $k->status_pendaftar }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nama Klinik</th>
                                                <td>{{ $k->nama_klinik }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nomor Ijin Klinik</th>
                                                <td>{{ $k->no_ijin_klinik }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tgl Izin</th>
                                                <td>{{ date('j F Y', strtotime($k->tgl_terbit_ijin_klinik)) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Berlaku S/d</th>
                                                <td>{{ date('j F Y', strtotime($k->masa_berlaku_ijin_klinik)) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Penanggung Jawab</th>
                                                <td>{{ $k->nama_pendaftar }}</td>
                                            </tr>
                                            <tr>
                                                <th>Telepon</th>
                                                <td>{{ $k->tlf_klinik }}</td>
                                            </tr>
                                            <tr>
                                                <th>Pemilik Klinik</th>
                                                <td>{{ $k->nama_badan }} ({{ $k->status_kepemilikan_klinik }})</td>
                                            </tr>
                                            <tr>
                                                <th>Jenis Layanan</th>
                                                <td>{{ $k->jenis_klinik }}</td>
                                            </tr>
                                            <tr>
                                                <th>Fasilitas Klinik</th>
                                                <td>
                                                    @foreach ($mfk as $i)
                                                    {{ (in_array($i->id, explode(",", $k->fasilitas)) ? $i->fasilitas.', ' : '')}}
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Alamat Klinik</th>
                                                <td>{{ $k->alamat_klinik.', RT/RW '.$k->rt.'/'.$k->rw. ', Kel. '.$k->nama_kelurahan.', Kec. '.$k->nama_kecamatan.', '.$k->nama_kota.', '.$k->nama_provinsi.' '.$k->kode_pos }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <hr class="solid my-5">
                <h4>DETAIL KLINIK</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tabs">
                            <ul class="nav nav-tabs nav-justified flex-column flex-md-row">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#popular10" data-bs-toggle="tab" class="text-center">SDM KLINIK</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#recent10" data-bs-toggle="tab" class="text-center">Rumah Sakit Terdekat</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#recent11" data-bs-toggle="tab" class="text-center">Kerjasama Dengan Provider </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#recent12" data-bs-toggle="tab" class="text-center">Dokumen Perizinan </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="popular10" class="tab-pane active">
                                    <h4>DOKTER PENANGGUNG JAWAB</h4>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nama Dokter</th>
                                                <th>NPA IDI/PDGI</th>
                                                <th>No. STR</th>
                                                <th>No. SIP</th>
                                                <th>Tgl. Akhir SIP</th>
                                                <th>Telepon</th>
                                                <th>Upload</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pj as $i)
                                                <tr>
                                                    <td>{{ $i->nama }}</td>
                                                    <td>{{ $i->npa_idi }}</td>
                                                    <td>{{ $i->no_str }}</td>
                                                    <td>{{ $i->no_sip }}</td>
                                                    <td>{{ $i->tgl_akhir_sip }}</td>
                                                    <td>{{ $i->no_tlf }}</td>
                                                    <td>
                                                        <a href="{{ asset('images/klinik/sdm/' . $i->foto_str) }}" target="_blank">Nomor STR</a>
                                                        <br/>
                                                        <a href="{{ asset('images/klinik/sdm/' . $i->foto_sip) }}" target="_blank">Nomor SIP</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <h4>DOKTER PRAKTEK</h4>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nama Dokter</th>
                                                <th>NPA IDI/PDGI</th>
                                                <th>No. STR</th>
                                                <th>No. SIP</th>
                                                <th>Tgl. Akhir SIP</th>
                                                <th>Telepon</th>
                                                <th>Upload</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dp as $i)
                                                <tr>
                                                    <td>{{ $i->nama }}</td>
                                                    <td>{{ $i->npa_idi }}</td>
                                                    <td>{{ $i->no_str }}</td>
                                                    <td>{{ $i->no_sip }}</td>
                                                    <td>{{ $i->tgl_akhir_sip }}</td>
                                                    <td>{{ $i->no_tlf }}</td>
                                                    <td>
                                                        <a href="{{ asset('images/klinik/sdm/' . $i->foto_str) }}" target="_blank">Nomor STR</a>
                                                        <br/>
                                                        <a href="{{ asset('images/klinik/sdm/' . $i->foto_sip) }}" target="_blank">Nomor SIP</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <h4>TENAGA KEPERAWATAN</h4>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nama Lengkap</th>
                                                <th>No. SIB / SIK</th>
                                                <th>No. STR</th>
                                                <th>Tgl. Akhir STR</th>
                                                <th>Keterangan SIB / SIK </th>
                                                <th>Upload</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tp as $i)
                                                <tr>
                                                    <td>{{ $i->nama }}</td>
                                                    <td>{{ $i->no_sib_sik }}</td>
                                                    <td>{{ $i->no_str }}</td>
                                                    <td>{{ $i->tgl_akhir_str }}</td>
                                                    <td>{{ $i->ket_sib_sik }}</td>
                                                    <td>
                                                        <a href="{{ asset('images/klinik/sdm/' . $i->foto_str) }}" target="_blank">Nomor STR</a>
                                                        <br/>
                                                        <a href="{{ asset('images/klinik/sdm/' . $i->foto_sip) }}" target="_blank">Nomor SIP</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <h4>TENAGA KESEHATAN LAIN</h4>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nama Lengkap</th>
                                                <th>Teknis Kefarmasian / Apoteker</th>
                                                <th>No. STR</th>
                                                <th>Tgl. Akhir STR</th>
                                                <th>No. SIPA</th>
                                                <th>No. SIAA / SIK</th>
                                                <th>Keterangan SIPA / SIAA / SIK</th>
                                                <th>Upload</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tkl as $i)
                                                <tr>
                                                    <td>{{ $i->nama }}</td>
                                                    <td>{{ $i->farmasi_apoteker }}</td>
                                                    <td>{{ $i->no_str }}</td>
                                                    <td>{{ $i->tgl_akhir_str }}</td>
                                                    <td>{{ $i->no_sip }}</td>
                                                    <td>{{ $i->no_sib_sik }}</td>
                                                    <td>{{ $i->ket_sib_sik }}</td>
                                                    <td>
                                                        <a href="{{ asset('images/klinik/sdm/' . $i->foto_str) }}" target="_blank">Nomor STR</a>
                                                        <br/>
                                                        <a href="{{ asset('images/klinik/sdm/' . $i->foto_sip) }}" target="_blank">Nomor SIP</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <h4>TENAGA SDM LAIN</h4>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nama Lengkap</th>
                                                <th>Ijazah Terakhir</th>
                                                <th>Jabatan / Pekerjaan</th>
                                                <th>Upload</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tsl as $i)
                                                <tr>
                                                    <td>{{ $i->nama }}</td>
                                                    <td>{{ $i->ijazah_terakhir }}</td>
                                                    <td>{{ $i->jabatan }}</td>
                                                    <td>
                                                        <a href="{{ asset('images/klinik/sdm/' . $i->foto_ijazah) }}" target="_blank">Foto Ijazah</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div id="recent10" class="tab-pane">
                                    <h4>RUMAH SAKIT TERDEKAT</h4>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nama Rumah Sakit</th>
                                                <th>Alamat</th>
                                                <th>No. Telepon</th>
                                                <th>Jarak</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($rs as $i)
                                                <tr>
                                                    <td>{{ $i->rs }}</td>
                                                    <td>{{ $i->alamat }}</td>
                                                    <td>{{ $i->tlf }}</td>
                                                    <td>{{ $i->jarak }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div id="recent11" class="tab-pane">
                                    <h4>KERJASAMA DENGAN PROVIDER ASURANSI</h4>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nama Perusahaan</th>
                                                <th>Nama Kontak</th>
                                                <th>Alamat</th>
                                                <th>No. Telepon</th>
                                                <th>Dokumen</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($asuransi as $i)
                                                <tr>
                                                    <td>{{ $i->asuransi }}</td>
                                                    <td>{{ $i->kontak }}</td>
                                                    <td>{{ $i->alamat }}</td>
                                                    <td>{{ $i->tlf }}</td>
                                                    <td>
                                                        <a href="{{ asset('images/klinik/asuransi/' . $i->kerjasama) }}" target="_blank">Dokumen</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div id="recent12" class="tab-pane">
                                    <div class="content-grid mt-4 mb-4">
                                        <div class="row content-grid-row">
                                            @foreach ($ps as $i)
                                                <div class="content-grid-item col-lg-3 text-center">
                                                    <div class="p-4">
                                                        <p><a href="{{ asset('images/klinik/syarat/' . $i->dokumen) }}" target="_blank">Lihat</a></p>
                                                        <p>{{ $i->kategori }}</p>
                                                        <p>
                                                            @if($i->status == 0)
                                                                PENDING
                                                            @elseif($i->status == 1)
                                                                GAGAL<br><i>{{ $i->keterangan }}</i>
                                                            @else
                                                                TERVERIFIKASI
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <h4>FOTO RUANG KLINIK</h4>
                                <div class="row mt-lg-5">
                                    @foreach ($rk as $i)
                                        <div class="col-lg-4">
                                            <span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-lighten thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-show-more thumb-info-no-zoom">
                                                <span class="thumb-info-wrapper">
                                                    <img src="{{ asset('images/klinik/ruang_klinik/' . $i->foto) }}" class="img-fluid">
                                                    <span class="thumb-info-title">
                                                        <span class="thumb-info-inner line-height-1">{{ $i->ruang }}</span>
                                                        <span class="thumb-info-type opacity-8">{{ $i->created_at }}</span>
                                                    </span>
                                                </span>
                                            </span>
                                        </div>
                                    @endforeach
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