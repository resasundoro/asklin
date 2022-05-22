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
				    <a href="javascript:void(0)" class="mb-1 mt-1 me-1 btn btn-outline btn-primary mb-2" onClick="PJ()"><i class="fas fa-plus ms-2"></i> Tambah Penanggungjawab</a>
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
                    </tr>
                </thead>
                <tbody>
                    <tr>

                    </tr>

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
				<a  href="javascript:void(0)" class="mb-1 mt-1 me-1 btn btn-outline btn-primary mb-2" onClick="TD()"><i class="fas fa-plus ms-2"></i> Tambah Dokter</a>
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
                    </tr>
                </thead>
                <tbody>
                    <tr>

                    </tr>
                    
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
                <a  href="javascript:void(0)" class="mb-1 mt-1 me-1 btn btn-outline btn-primary mb-2" onClick="TP()"><i class="fas fa-plus ms-2"></i> Tambah Perawat</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>No. SIB / SIK</th>
                        <th>No. STR</th>
                        <th>Tgl. Akhir STR</th>
                        <th>Keterangan SIB / SIK </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                    </tr>
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
                <a  href="javascript:void(0)" class="mb-1 mt-1 me-1 btn btn-outline btn-primary mb-2" onClick="TKL()"><i class="fas fa-plus ms-2"></i> Tambah Tenaga Kesehatan Lain</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>Tekni Kefarmasian / Apoteker</th>
                        <th>No. STR</th>
                        <th>Tgl. Akhir STR</th>
                        <th>No. SIPA</th>
                        <th>No. SIAA / SIK</th>
                        <th>Keterangan SIPA / SIAA / SIK</th>
                    </tr>
                </thead>
                <tbody>
                    <tr></tr>
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
                <a  href="javascript:void(0)" class="mb-1 mt-1 me-1 btn btn-outline btn-primary mb-2" onClick="TSL()"><i class="fas fa-plus ms-2"></i> Tambah Tenaga SDM Lain</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>Ijazah Terakhir</th>
                        <th>Jabatan / Pekerjaan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr></tr>
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
                <a  href="javascript:void(0)" class="mb-1 mt-1 me-1 btn btn-outline btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#formRSterdekat"><i class="fas fa-plus ms-2"></i> Tambah RS Terdekat</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Rumah Sakit</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>Propinsi</th>
                        <th>No. Telepon</th>
                        <th>Jarak</th>
                    </tr>
                </thead>
                <tbody>
                    <tr></tr>
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
                <a  href="javascript:void(0)" class="mb-1 mt-1 me-1 btn btn-outline btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#formProvider"><i class="fas fa-plus ms-2"></i> Tambah Provider Asuransi</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Perusahaan</th>
                        <th>Nama Kontak</th>
                        <th>Alamat</th>
                        <th>Kabupaten/Kota</th>
                        <th>Propinsi</th>
                        <th>No. Telepon</th>
                    </tr>
                </thead>
                <tbody>
                    <tr></tr>
                </tbody>
            </table>

            <div class="col-sm-3">
				<a  href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modalUpload" class="btn btn-light mb-2">Upload Ruang Pendaftaran</a>
			</div>
			<div class="col-sm-3" style="margin-left: -60px;">
				<a  href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modalUpload" class="btn btn-light mb-2">Upload Ruang Administrasi</a>
			</div>

			<div class="col-sm-3" style="margin-left: -60px;">
				<a  href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modalUpload" class="btn btn-light mb-2">Upload Ruang Tindakan</a>
			</div>
			<div class="col-sm-3" style="margin-left: -70px;">
				<a  href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modalUpload" class="btn btn-light mb-2">Upload Ruang Perawatan</a>
			</div>
			<div class="col-sm-3">
				<a  href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modalUpload" class="btn btn-light mb-2">Upload Ruang Farmasi</a>
			</div>
			<div class="col-sm-3" style="margin-left: -80px;">
				<a  href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modalUpload" class="btn btn-light mb-2">Upload Ruang Konsultasi Dokter</a>
			</div>
			<div class="col-sm-3" style="margin-left: -25px;">
				<a  href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modalUpload" class="btn btn-light mb-2">Upload Ruang Papan Nama Klinik</a>
			</div>
			<div class="col-sm-3" style="margin-left: -25px;">
				<a  href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modalUpload" class="btn btn-light mb-2">Upload Ruang Papan Nama Dokter</a>
			</div>
		    <div class="col-sm-3" >
				<a  href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modalUpload" class="btn btn-light mb-2">Upload Ruang Kamar Mandi</a>
			</div>

            <div class="container">
                <div class="row mt-5 mb-2">
                    <div class="col">
                        <h2 class="font-weight-semibold mb-3">Persyaratan Izin</h2>
                        <div class="appear-animation " data-appear-animation="fadeInUp" data-appear-animation-delay="100">
                            <div class="feature-box alert alert-default alert-admin feature-box-style-2">
                                <div class="feature-box-icon" style="min-width: 4.7rem;"><h1>1.</h1></div>
                                <div class="feature-box-info">
                                    <h4 class="font-weight-semibold mb-1">Dokumen Izin Klinik</h4>
                                    <p style="color:red; font-weight: bold;">* Harus Ada</p>
                                    <p class="mb-0">Maks. berukuran 10 MB dan berformat jpg, jpeg, png, pdf</p>
                                    <input type="file" class="d-block form-control" placeholder="upload ">
                                </div>	
                            </div>
                        </div>

                        <hr class="solid my-2">

                        <div class="appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="100">
                            <div class="feature-box alert alert-default feature-box-style-2">
                                <div class="feature-box-icon" style="min-width: 4.7rem;"><h1>2.</h1></div>
                                <div class="feature-box-info">
                                    <h4 class="font-weight-semibold mb-1">Dokumen SOP Klinik</h4>
                                    <p style="color:red; font-weight: bold;">* Harus Ada</p>
                                    <p class="mb-0">Maks. berukuran 10 MB dan berformat jpg, jpeg, png, pdf</p>
                                    <input type="file" class="d-block form-control" placeholder="upload ">
                                </div>	
                            </div>
                        </div>

                        <hr class="solid my-2">

                        <div class="appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="100">
                            <div class="feature-box alert alert-default feature-box-style-2">
                                <div class="feature-box-icon" style="min-width: 4.7rem;"><h1>3.</h1></div>
                                <div class="feature-box-info">
                                    <h4 class="font-weight-semibold mb-1">Surat Pernyataan</h4>
                                    <p style="color:red; font-weight: bold;">* Harus Ada</p>
                                    <p>Surat pernyataan  kesediaan mematuhi peraturan  di atas kertas bermaterai Rp 10.000 dari pemilik/pimpinan/penanggungjawab klinik <a  href="javascript:void(0)">download disini</a></p>
                                    <p class="mb-0">Maks. berukuran 10 MB dan berformat jpg, jpeg, png, pdf</p>
                                    <input type="file" class="d-block form-control" placeholder="upload ">
                                </div>	
                            </div>
                        </div>

                        <hr class="solid my-2">

                        <div class="appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="100">
                            <div class="feature-box alert alert-default feature-box-style-2">
                                <div class="feature-box-icon" style="min-width: 4.7rem;"><h1>4.</h1></div>
                                <div class="feature-box-info">
                                    <p style="color:red; font-weight: bold;">* Harus Ada</p>
                                    <h4 class="font-weight-semibold mb-1">Surat Kerja sama Pengolahan Limbah Medis</h4>
                                    <p class="mb-0">Maks. berukuran 10 MB dan berformat jpg, jpeg, png, pdf</p>
                                    <input type="file" class="d-block form-control" placeholder="upload ">
                                </div>	
                            </div>
                        </div>

                        <hr class="solid my-2">

                        <div class="appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="100">
                            <div class="feature-box alert alert-default feature-box-style-2">
                                <div class="feature-box-icon" style="min-width: 4.7rem;"><h1>5.</h1></div>
                                <div class="feature-box-info">
                                    <p style="color:red; font-weight: bold;">* Harus Ada</p>
                                    <h4 class="font-weight-semibold mb-1">Dokumen Referensi Lainnya</h4>
                                    <p class="mb-0">Maks. berukuran 10 MB dan berformat jpg, jpeg, png, pdf</p>
                                    <input type="file" class="d-block form-control" placeholder="upload ">
                                </div>	
                            </div>
                        </div>

                        <div class="row justify-content-center mb-5">
                            <div class="col-auto">
                                <a  href="javascript:void(0)" class="btn btn-warning font-weight-semibold px-5 py-3 text-3"> <i class="fa fa-save"></i> &nbsp;<b>Simpan Draft</b></a>
                                <a href="user-akreditasi.html" class="btn btn-success font-weight-semibold px-5 py-3 text-3"> <i class="fa fa-check"></i> &nbsp;<b>Submit Formulir</b></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL UPLOAD FOTO -->
<div class="modal fade" id="modalUpload" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="formModalLabel">Upload Foto </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form id="form" class="mb-4" novalidate="novalidate">
                    <div class="alert alert-info alert-admin">
                        <div class="row">
                            <div class="col-lg-8">
                                <h4>Info</h4>
                                Hanya ekstensi <b style="color: red; font-weight: bold;">.jpg, .jpeg, .png</b> file saja yang diperbolehkan dengan besaran file max. 700KB. <input class="form-control" type="file" id="uploadSIPpj">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL PENANGGUNG JAWAB -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form id="demo-form" class="mb-4" novalidate="novalidate">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="id_klinik" id="id_klinik">
                    <div class="form-group row align-items-center">
                        <label class="col-sm-3 text-start text-sm-end mb-0">Peranan</label>
                        <div class="col-sm-9">
                            <select class="form-select form-control h-auto" data-msg-required="Peranan" name="id_kategori" id="id_kategori" required>
                                <option value="0">==Pilih==</option>
                                <option value="1" id="op1">Penanggung Jawab Klinik</option>
                                <option value="2" id="op2">Dokter Praktek</option>
                                <option value="3" id="op3">Tenaga Keperawatan</option>
                                <option value="4" id="op4">Tenaga Kesehatan Lain</option>
                                <option value="5" id="op5">Tenaga SDM Lain</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row align-items-center grup1">
                        <label class="col-sm-3 text-start text-sm-end mb-0 nama">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap Dokter Dengan Gelar" required/>
                        </div>
                    </div>
                    <div class="form-group row align-items-center grup2">
                        <label class="col-sm-3 text-start text-sm-end mb-0">Teknis Kefarmasian / Apoteker</label>
                        <div class="col-sm-9">
                            <input type="text" id="farmasi_apoteker" name="farmasi_apoteker" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row align-items-center grup3">
                        <label class="col-sm-3 text-start text-sm-end mb-0 npa_idi">NO NPA IDI</label>
                        <div class="col-sm-9">
                            <input type="text" id="npa_idi" name="npa_idi" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row align-items-center grup4">
                        <label class="col-sm-3 text-start text-sm-end mb-0 no_sib_sik">No. SIB/SIK</label>
                        <div class="col-sm-9">
                            <input type="text" id="no_sib_sik" name="no_sib_sik" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row grup5">
                        <label class="col-sm-3 text-start text-sm-end mb-0">Nomor STR</label>
                        <div class="col-sm-9">
                            <input type="text" id="no_str" name="no_str" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row grup6">
                        <label class="col-sm-3 text-start text-sm-end mb-0 no_sip">Nomor SIPA</label>
                        <div class="col-sm-9">
                            <input type="text" id="no_sip" name="no_sip" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row grup7">
                        <label class="col-sm-3 text-start text-sm-end mb-0">Tgl Akhir SIP</label>
                        <div class="col-sm-9">
                            <input type="date" id="tgl_akhir_sip" name="tgl_akhir_sip" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row grup8">
                        <label class="col-sm-3 text-start text-sm-end mb-0">Tgl Akhir SRT</label>
                        <div class="col-sm-9">
                            <input type="date" id="tgl_akhir_str" name="tgl_akhir_str" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row grup9">
                        <label class="col-sm-3 text-start text-sm-end mb-0">No Telpon</label>
                        <div class="col-sm-9">
                            <input type="text" id="no_tlp" name="no_tlp" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row grup10">
                        <label class="col-sm-3 text-start text-sm-end mb-0 ket_sib_sik">Keterangan SIB/SIK</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="ket_sib_sik" name="ket_sib_sik"></textarea>
                        </div>
                    </div>
                    <div class="form-group row grup11">
                        <label class="col-sm-3 text-start text-sm-end mb-0">Ijazah Terakhir</label>
                        <div class="col-sm-9">
                            <input type="text" id="ijazah_terakhir" name="ijazah_terakhir" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row grup12">
                        <label class="col-sm-3 text-start text-sm-end mb-0 no_sip">Pekerjaan / Jabatan</label>
                        <div class="col-sm-9">
                            <input type="text" id="ijazah_terakhir" name="ijazah_terakhir" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row grup13">
                        <label class="col-sm-3 text-start text-sm-end mb-0">Upload Data</label>
                        <div class="col-sm-9">
                            <label for="foto_sip" class="form-label">Upload SIP</label>
                                <input class="form-control" type="file" id="foto_sip" name="foto_sip">
                            <label for="foto_str" class="form-label">Upload STR</label>
                                <input class="form-control" type="file" id="foto_str" name="foto_str">
                            
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-save">Simpan</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    function PJ(){
        $('#form').trigger("reset");
        $('.modal-title').html("Tambah Penanggung Jawab");
        $('#modal').modal('show');
        $('#op1').show();
        $('#op2, #op3, #op4, #op5').hide();
        $('#id').val('');
    }

    function TD(){
        $('#form').trigger("reset");
        $('.modal-title').html("Tambah Dokter Praktek");
        $('#modal').modal('show');
        $('#op2').show();
        $('#op1, #op3, #op4, #op5').hide();
        $('#id').val('');
    }

    function TP(){
        $('#form').trigger("reset");
        $('.modal-title').html("Tambah Perawat");
        $('#modal').modal('show');
        $('#op3').show();
        $('#op1, #op2, #op4, #op5').hide();
        $('#id').val('');
    }

    function TKL(){
        $('#form').trigger("reset");
        $('.modal-title').html("Tambah Tenaga Kesehatan Lain");
        $('#modal').modal('show');
        $('#op4').show();
        $('#op1, #op2, #op3, #op5').hide();
        $('#id').val('');
    }

    function TSL(){
        $('#form').trigger("reset");
        $('.modal-title').html("Tambah SDM Lain");
        $('#modal').modal('show');
        $('#op5').show();
        $('#op1, #op2, #op3, #op4').hide();
        $('#id').val('');
    }

    $("#id_kategori").change(function() {
        if ($(this).val() == "0") {
            $('.grup1, .grup2, .grup3, .grup4, .grup5, .grup6, .grup7, .grup8, .grup9, .grup10, .grup11, .grup12').hide();
        } else if ($(this).val() == "1") {
            $('.grup1, .grup3, .grup5, .grup6, .grup7, .grup9').show();
            $('.grup2, .grup4, .grup8, .grup10, .grup11, .grup12').hide();
            $('.nama').html('Nama Dokter');
            $('.npa_idi').html('NPA IDI');
            $('.no_sip').html('No. SIP');
        } else if ($(this).val() == "2") {
            $('.grup1, .grup3, .grup5, .grup6, .grup7, .grup9').show();
            $('.grup2, .grup4, .grup8, .grup10, .grup11, .grup12').hide();
            $('.nama').html('Nama Dokter');
            $('.npa_idi').html('NPA IDI/PDGI');
            $('.no_sip').html('No. SIP');
        } else if ($(this).val() == "3") {
            $('.grup1, .grup4, .grup5, .grup8, .grup11').show();
            $('.grup2, .grup3, .grup6, .grup7, .grup9, .grup10, .grup12').hide();
            $('.nama').html('Nama Lengkap');
        } else if ($(this).val() == "4") {
            $('.grup1, .grup2, .grup4, .grup5, .grup6, .grup8, .grup10').show();
            $('.grup3, .grup7, .grup9, .grup11, .grup12').hide();
            $('.nama').html('Nama Lengkap');
            $('.no_sib_sik').html('No. SIAA/SIK');
            $('.no_sip').html('No. SIPA');
            $('.ket_sib_sik').html('Keterangan SIPA/SIA/SIK')
        } else if ($(this).val() == "5") {
            $('.grup1,.grup11, .grup12').show();
            $('.grup2,.grup4, .grup4, .grup5, .grup6, .grup7, .grup8, .grup9, .grup10').hide();
            $('.nama').html('Nama Lengkap');
        }
    });
    $("#id_kategori").trigger("change");
</script>
@endsection