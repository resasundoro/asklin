@section('title')
    Pendaftaran SDM
@endsection

@extends('layouts.frontend.main')

@section('content')
<div role="main" class="main">
    <section class="page-header page-header-classic page-header-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                    <h1 data-title-border>SDM KLINIK</h1>
                </div>
                <div class="col-md-4 order-1 order-md-2 align-self-center">
                    <ul class="breadcrumb d-block text-md-end">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class=""><a href="{{ route('pendaftaran.edit') }}">Edit Klinik</a></li>
                        <li class="active">SDM Klinik</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="alert alert-info alert-admin">
                    <div class="row">
                        <div class="col-lg-8">
                            <h4>Info</h4>
                            Pada Halaman ini Anda Harus Mengisi Semua SDM yang ada Di Klinik <br>
                            Untuk Merubah Data Data Sebelumnya <a href="{{ route('pendaftaran.edit') }}" class="mb-1 mt-1 me-1 btn btn-outline btn-primary mb-2"><i class="fas fa-edit ms-2"></i> Edit Klinik</a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pt-3 pb-2">
        <div class="row pt-6">
            <div class="container py-1 shop" id="shop">
                <div class="row pt-1 pb-1">
                    <div class="col">
                        <h3 class="text-color-primary font-weight-bold fst-italic ls-0 text-5 mb-1 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="100" data-plugin-options="{'minWindowWidth': 0}">PENANGGUNG JAWAB KLINIK</h3>
                        <hr>
                    </div>
                </div>
            </div>

            <table class="table table-bordered">
				<div class="col">
                    @can('karyawan-create')
                        <a href="javascript:void(0)" class="mb-1 mt-1 me-1 btn btn-outline btn-primary mb-2" onClick="PJ()"><i class="fas fa-plus ms-2"></i> Tambah Penanggungjawab</a>
                    @endcan
				</div>
                <thead>
                    <tr>
                        <th>Nama Dokter</th>
                        <th>NPA IDI/PDGI</th>
                        <th>No. STR</th>
                        <th>No. SIP</th>
                        <th>Tgl. Akhir SIP</th>
                        <th>Telepon</th>
                        <th>Upload</th>
                        <th>Action</th>
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
                            <td>
                                <div class="btn-group align-top">
                                    @can('karyawan-delete')
                                        <button class="btn btn-sm btn-primary badge" type="button" onClick="deleteu({{ $i->id }})"><i class="fa fa-trash"></i></button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
			</table>

            <div class="container py-1 shop" id="shop">
				<div class="row pt-1 pb-1">
					<div class="col">
						<h3 class="text-color-primary font-weight-bold fst-italic ls-0 text-5 mb-1 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="100" data-plugin-options="{'minWindowWidth': 0}">DOKTER PRAKTEK</h3>
						<hr>
					</div>
				</div>
			</div>
			<div class="col-lg-8 col-xl-7 text-center text-md-start">
                @can('karyawan-create')
                    <a href="javascript:void(0)" class="mb-1 mt-1 me-1 btn btn-outline btn-primary mb-2" onClick="TD()"><i class="fas fa-plus ms-2"></i> Tambah Dokter</a>
                @endcan
			</div>
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
                        <th>Action</th>
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
                            <td>
                                <div class="btn-group align-top">
                                    @can('karyawan-delete')
                                        <button class="btn btn-sm btn-primary badge" type="button" onClick="deleteu({{ $i->id }})"><i class="fa fa-trash"></i></button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="container py-1 shop" id="shop">
                <div class="row pt-1 pb-1">
                    <div class="col">
                        <h3 class="text-color-primary font-weight-bold fst-italic ls-0 text-5 mb-1 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="100" data-plugin-options="{'minWindowWidth': 0}">TENAGA KEPERAWATAN</h3>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-7 text-center text-md-start">
                @can('karyawan-create')
                    <a href="javascript:void(0)" class="mb-1 mt-1 me-1 btn btn-outline btn-primary mb-2" onClick="TP()"><i class="fas fa-plus ms-2"></i> Tambah Perawat</a>
                @endcan
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>No. SIB / SIK</th>
                        <th>No. STR</th>
                        <th>Tgl. Akhir STR</th>
                        <th>Keterangan SIB / SIK </th>
                        <th>Upload</th>
                        <th>Action</th>
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
                            <td>
                                <div class="btn-group align-top">
                                    @can('karyawan-delete')
                                        <button class="btn btn-sm btn-primary badge" type="button" onClick="deleteu({{ $i->id }})"><i class="fa fa-trash"></i></button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="container py-1 shop" id="shop">
                <div class="row pt-1 pb-1">
                    <div class="col">
                        <h3 class="text-color-primary font-weight-bold fst-italic ls-0 text-5 mb-1 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="100" data-plugin-options="{'minWindowWidth': 0}">TENAGA KESEHATAN LAIN</h3>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-7 text-center text-md-start">
                @can('karyawan-create')
                    <a href="javascript:void(0)" class="mb-1 mt-1 me-1 btn btn-outline btn-primary mb-2" onClick="TKL()"><i class="fas fa-plus ms-2"></i> Tambah Tenaga Kesehatan Lain</a>
                @endcan
            </div>
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
                        <th>Action</th>
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
                            <td>
                                <div class="btn-group align-top">
                                    @can('karyawan-delete')
                                        <button class="btn btn-sm btn-primary badge" type="button" onClick="deleteu({{ $i->id }})"><i class="fa fa-trash"></i></button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="container py-1 shop" id="shop">
                <div class="row pt-1 pb-1">
                    <div class="col">
                        <h3 class="text-color-primary font-weight-bold fst-italic ls-0 text-5 mb-1 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="100" data-plugin-options="{'minWindowWidth': 0}">TENAGA SDM LAIN</h3>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-7 text-center text-md-start">
                @can('karyawan-create')
                    <a href="javascript:void(0)" class="mb-1 mt-1 me-1 btn btn-outline btn-primary mb-2" onClick="TSL()"><i class="fas fa-plus ms-2"></i> Tambah Tenaga SDM Lain</a>
                @endcan
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>Ijazah Terakhir</th>
                        <th>Jabatan / Pekerjaan</th>
                        <th>Upload</th>
                        <th>Action</th>
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
                            <td>
                                <div class="btn-group align-top">
                                    @can('karyawan-delete')
                                        <button class="btn btn-sm btn-primary badge" type="button" onClick="deleteu({{ $i->id }})"><i class="fa fa-trash"></i></button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="container py-1 shop" id="shop">
                <div class="row pt-1 pb-1">
                    <div class="col">
                        <h3 class="text-color-primary font-weight-bold fst-italic ls-0 text-5 mb-1 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="100" data-plugin-options="{'minWindowWidth': 0}">RUMAH SAKIT TERDEKAT</h3>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-7 text-center text-md-start">
                @can('rumah-sakit-create')
                    <a href="javascript:void(0)" class="mb-1 mt-1 me-1 btn btn-outline btn-primary mb-2" onClick="RS()"><i class="fas fa-plus ms-2"></i> Tambah RS Terdekat</a>
                @endcan
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Rumah Sakit</th>
                        <th>Alamat</th>
                        <th>No. Telepon</th>
                        <th>Jarak</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rs as $i)
                        <tr>
                            <td>{{ $i->rs }}</td>
                            <td>{{ $i->alamat }}</td>
                            <td>{{ $i->tlf }}</td>
                            <td>{{ $i->jarak }}</td>
                            <td>
                                <div class="btn-group align-top">
                                    @can('rumah-sakit-delete')
                                        <button class="btn btn-sm btn-primary badge" type="button" onClick="deleters({{ $i->id }})"><i class="fa fa-trash"></i></button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="container py-1 shop" id="shop">
                <div class="row pt-1 pb-1">
                    <div class="col">
                        <h3 class="text-color-primary font-weight-bold fst-italic ls-0 text-5 mb-1 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="100" data-plugin-options="{'minWindowWidth': 0}">KERJASAMA DENGAN PROVIDER ASURANSI</h3>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-7 text-center text-md-start">
                @can('rumah-sakit-create')
                    <a href="javascript:void(0)" class="mb-1 mt-1 me-1 btn btn-outline btn-primary mb-2" onClick="ASURANSI()"><i class="fas fa-plus ms-2"></i> Tambah Provider Asuransi</a>
                @endcan
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Perusahaan</th>
                        <th>Nama Kontak</th>
                        <th>Alamat</th>
                        <th>No. Telepon</th>
                        <th>Action</th>
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
                                <div class="btn-group align-top">
                                    @can('asuransi-delete')
                                        <button class="btn btn-sm btn-primary badge" type="button" onClick="deleteas({{ $i->id }})"><i class="fa fa-trash"></i></button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="container py-1 shop" id="shop">
                <div class="row pt-1 pb-1">
                    <div class="col">
                        <h3 class="text-color-primary font-weight-bold fst-italic ls-0 text-5 mb-1 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="100" data-plugin-options="{'minWindowWidth': 0}">FOTO RUANG KLINIK</h3>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-7 text-center text-md-start">
                @can('ruang-klinik-create')
                    <a href="javascript:void(0)" class="mb-1 mt-1 me-1 btn btn-outline btn-primary mb-2" onClick="RK()"><i class="fas fa-plus ms-2"></i> Tambah Ruang Klinik</a>
                @endcan
            </div>
            <div class="container">
                <div class="row">
                    @foreach ($rk as $i)
                        <div class="col-sm text-center">
                            <p><img src="{{ asset('images/klinik/ruang_klinik/' . $i->foto) }}" class="img-fluid"></p>
                            <p>{{ $i->ruang }}</p>
                            <div class="btn-group align-top">
                                @can('asuransi-delete')
                                    <button class="btn btn-sm btn-primary badge" type="button" onClick="deleterk({{ $i->id }})"><i class="fa fa-trash"></i> Hapus</button>
                                @endcan
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="container py-1 shop" id="shop">
                <div class="row pt-1 pb-1">
                    <div class="col">
                        <h3 class="text-color-primary font-weight-bold fst-italic ls-0 text-5 mb-1 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="100" data-plugin-options="{'minWindowWidth': 0}">PERSYARATAN IZIN</h3>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-7 text-center text-md-start">
                @can('persyaratan-create')
                    <a href="javascript:void(0)" class="mb-1 mt-1 me-1 btn btn-outline btn-primary mb-2" onClick="PS()"><i class="fas fa-plus ms-2"></i> Tambah Persyaratan</a>
                @endcan
            </div>
            <div class="container">
                <div class="row">
                    @foreach ($ps as $i)
                        <div class="col-sm text-center">
                            <p><a href="{{ asset('images/klinik/syarat/' . $i->dokumen) }}" target="_blank">{{ $i->dokumen }}</a></p>
                            <p>{{ $i->kategori }}</p>
                            <div class="btn-group align-top">
                                @can('persyaratan-delete')
                                    <button class="btn btn-sm btn-primary badge" type="button" onClick="deleteps({{ $i->id }})"><i class="fa fa-trash"></i> Hapus</button>
                                @endcan
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="container">
				<div class="row mt-5 mb-2">
					<div class="col">
                        <div class="row justify-content-center mb-5">
							<div class="col-auto">
                                <form action="{{ route('pendaftaran.draft') }}" class="mb-4" novalidate="novalidate" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="submit" class="btn btn-warning font-weight-semibold px-5 py-3 text-3" value="Simpan Draft" name="status_draft">
                                </form>
                                <form action="{{ route('pendaftaran.submit') }}" class="mb-4" novalidate="novalidate" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="submit" class="btn btn-success font-weight-semibold px-5 py-3 text-3" value="Submit Formulir" name="status_kirim">
                                </form>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>

@include('pendaftaran.modal')

@endsection

@section('js')
    @include('pendaftaran.js')
@endsection