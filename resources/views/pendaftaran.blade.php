@section('title')
    Pendaftaran Peserta
@endsection

@extends('layouts.frontend.main')

@section('content')
<div role="main" class="main">

    <section class="page-header page-header-classic page-header-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                    <h1 data-title-border>Pendaftaran</h1>
                </div>
                <div class="col-md-4 order-1 order-md-2 align-self-center">
                    <ul class="breadcrumb d-block text-md-end">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Pendaftaran Peserta</li>
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
                            <div class="row">
                                <div class="form-group col">
                                    <div class="custom-checkbox-1" data-bs-toggle="collapse" data-bs-target=".shipping-field-wrapper">
                                        <input id="createAccount" type="checkbox" name="createAccount" value="1" />
                                        <label for="createAccount">Sudah Menjadi Anggota Asklin ?</label>
                                    </div>
                                </div>
                            </div>
                            <div class="shipping-field-wrapper collapse">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">Nomor Anggota Asklin</label>
                                    <div class="col-md-6">
                                        <input class="form-control text-3 h-auto py-2" type="text" name="NamaKlinik" value="" required>
                                    </div>
                                    <div class="col-12 mb-3 mb-lg-0 col-lg">
                                    <div class="d-grid gap-2">
                                        <a href="#" class="btn btn-outline btn-dark">Cari</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <div class="custom-checkbox-1">
                                    <input id="shipAddress" type="checkbox" name="shipAddress" value="1" />
                                    <label for="shipAddress">Belum Menjadi Anggota Asklin</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pt-3 pb-2">
        <div class="row pt-6">

            <!-- Mulai Grid  -->
            <div class="col-md-6 col-lg-6 mb-5 mb-lg-0">
                <form action="{{ route('pendaftaran.update', $klinik->id) }}" role="form" class="needs-validation">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">Nama Klinik</label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="text" name="nama_klinik" value="{{ $klinik->nama_klinik }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">Nama Kontak/ penganggung jawab</label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="text" name="NamaKontak" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">Email</label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="email" name="email" value="" required>
                        </div>
                    </div>
                        <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">No Telpon</label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="number" name="NoTelp" value="" required>
                        </div>
                    </div>

                </div>
                <!-- Akhir Grid  -->

                    <div class="col-md-6 col-lg-6">

                    
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">Status Pendaftar</label>
                        <div class="col-lg-9">
                            <select class="form-select form-control h-auto" data-msg-required="StatusPendaftar" name="StatusPendaftar" required>
                                        <option value="----"></option>
                                        <option value="1">Pemilik</option>
                                        <option value="2">Penanggungjawab</option>
                                        <option value="3">Pengelola</option>
                                        <option value="4">Pemilik dan Penanggungjawab</option>
                                        <option value="5">Pengelola dan Penanggungjawab</option>
                                    </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">No Ijin Klinik</label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="email" name="NoIjin" value="" required>
                        </div>
                    </div>
                        <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">Tgl.Terbit Ijin</label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="date" name="TglIzin" value="" required>
                        </div>
                    </div>
                        <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">Masa Berlaku s/d</label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="date" name="MasaBerlaku" value="" required>
                        </div>
                    </div>

                        </div>
                    <!-- Akhir Grid  -->

                <div class="container py-5 shop" id="shop">
                    <div class="row pt-1 pb-1">
                        <div class="col">
                            <h3 class="text-color-primary font-weight-bold fst-italic ls-0 text-5 mb-3 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="100" data-plugin-options="{'minWindowWidth': 0}">ALAMAT & FASILITAS KLINIK</h3>
                            <hr>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 mb-5 mb-lg-0">

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">Nama pemilik klinik</label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="text" name="NamaPemilik" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">Jenis klinik</label>
                        <div class="col-lg-9">
                            <select class="form-select form-control h-auto" data-msg-required="StatusPendaftar" name="StatusPendaftar" required>
                                        <option value="----"></option>
                                        <option value="1">Utama</option>
                                        <option value="2">Pratama</option>
                                </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">Status Kepemilikan Klinik</label>
                        <div class="col-lg-9">
                            <select class="form-select form-control h-auto" data-msg-required="StatusKepemilikan" name="StatusKepemilikan" required>
                                    <option value="----"></option>
                                    <option value="1">Perorangan</option>
                                    <option value="2">Badan Usaha</option>
                                    <option value="2">Badan Hukum</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-6 col-form-label form-control-label line-height-9 pt-2 text-2 required">Alamat</label>
                        <div class="col-lg-12">
                            <textarea maxlength="5000" data-msg-required="Please enter your address" rows="4" class="form-control text-3 h-auto py-2" name="Alamat" required></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="form-label mb-1 text-2">RT</label>
                            <input type="text" value="" data-msg-required="" maxlength="100" class="form-control text-3 h-auto py-2" name="RT" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="form-label mb-1 text-2">RW</label>
                            <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="RW" maxlength="100" class="form-control text-3 h-auto py-2" name="RW" required>
                        </div>
                    </div>

                        <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">Kode POS</label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="text" name="KodePOS" value="" required>
                        </div>
                    </div>

                        <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">Telpon Klinik</label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="text" name="TelpKlinik" value="" required>
                        </div>
                    </div>

                        <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">Provinsi</label>
                        <div class="col-lg-9">
                            <select class="form-select form-control h-auto" data-msg-required="Provinsi" name="Provinsi" required>
                                    <option value="----"></option>
                                    <option value="1">ACEH</option>
                                    <option value="2">JAWA BARAT</option>
                                    <option value="3">DKI JAKARTA</option>
                            </select>
                        </div>
                    </div>

                        <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">Kabupaten / Kota</label>
                        <div class="col-lg-9">
                            <select class="form-select form-control h-auto" data-msg-required="Kabupaten" name="Kabupaten" required>
                                    <option value="----"></option>
                                    <option value="1">Jakarta Pusat</option>
                                    <option value="2">Jakarta Barat</option>
                                    <option value="3">Jakarta Selatan</option>
                                    <option value="4">Jakarta Timur</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">Kecamatan</label>
                        <div class="col-lg-9">
                            <select class="form-select form-control h-auto" data-msg-required="Kabupaten" name="Kabupaten" required>
                                    <option value="----"></option>
                                    <option value="1">Makasar</option>
                                    <option value="2">Kramat Jati</option>
                                    <option value="3">Cipayung</option>
                            </select>
                        </div>
                    </div>

                        <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">Kelurahan</label>
                        <div class="col-lg-9">
                            <select class="form-select form-control h-auto" data-msg-required="Kelurahan" name="Kelurahan" required>
                                    <option value="----"></option>
                                    <option value="1">Pinang Ranti</option>
                            </select>
                        </div>
                    </div>

                    <!-- Akhir Grid  -->
                </div>

                    <div class="col-md-6 col-lg-6">

                    <div class="overflow-hidden mb-1">
                            <h3 class="text-color-primary font-weight-bold fst-italic ls-0 text-5 mb-3 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="100" data-plugin-options="{'minWindowWidth': 0}">KRITERIA KLINIK</h3>
                        </div>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <div class="custom-checkbox-1">
                                <input id="RawatJalan" type="checkbox" name="RawatJalan" value="1" />
                                <label for="RawatJalan">Rawat Jalan</label>
                            </div>
                        </div>

                    <div class="form-group col-lg-6">
                            <div class="custom-checkbox-1">
                                <input id="RawatInap" type="checkbox" name="RawatInap" value="1" />
                                <label for="RawatInap">Rawat Inap</label>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-hidden mb-1">
                            <h3 class="text-color-primary font-weight-bold fst-italic ls-0 text-5 mb-3 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="100" data-plugin-options="{'minWindowWidth': 0}">FASILITAS KLINIK</h3>
                        </div>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <div class="custom-checkbox-1">
                                <input id="RuangNifas" type="checkbox" name="RuangNifas" value="1" />
                                <label for="RuangNifas">Ruang Nifas</label>
                            </div>
                            <div class="custom-checkbox-1">
                                <input id="KamarBersalin" type="checkbox" name="KamarBersalin" value="1" />
                                <label for="KamarBersalin">Kamar-Bersalin</label>
                            </div>
                        </div>

                    <div class="form-group col-lg-6">
                            <div class="custom-checkbox-1">
                                <input id="TersediaOperasi" type="checkbox" name="TersediaOperasi" value="1" />
                                <label for="TersediaOperasi">Tersedia Ruang Operasi</label>
                            </div>
                        </div>
                    </div>

                        <div class="overflow-hidden mb-1">
                            <h3 class="text-color-primary font-weight-bold fst-italic ls-0 text-5 mb-3 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="100" data-plugin-options="{'minWindowWidth': 0}">JENIS LAYANAN</h3>
                        </div>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <div class="custom-checkbox-1">
                                <input id="Akupuntur" type="checkbox" name="Akupuntur" value="1" />
                                <label for="Akupuntur">Akupuntur</label>
                            </div>
                            <div class="custom-checkbox-1">
                                <input id="Bedah" type="checkbox" name="Bedah" value="1" />
                                <label for="Bedah">Bedah</label>
                            </div>
                                <div class="custom-checkbox-1">
                                <input id="Gigi" type="checkbox" name="Gigi" value="1" />
                                <label for="Gigi">Gigi</label>
                            </div>
                                <div class="custom-checkbox-1">
                                <input id="Kebidanan" type="checkbox" name="Kebidanan" value="1" />
                                <label for="Kebidanan">Bedah</label>
                            </div>
                                <div class="custom-checkbox-1">
                                <input id="PenyakitDalam" type="checkbox" name="PenyakitDalam" value="1" />
                                <label for="PenyakitDalam">Penyakit Dalam</label>
                            </div>
                                <div class="custom-checkbox-1">
                                <input id="RehabilitasiMedik" type="checkbox" name="RehabilitasiMedik" value="1" />
                                <label for="RehabilitasiMedik">Rehabilitasi Medik</label>
                            </div>
                                <div class="custom-checkbox-1">
                                <input id="Umum" type="checkbox" name="Umum" value="1" />
                                <label for="Umum">Umum</label>
                            </div>
                        </div>

                    <div class="form-group col-lg-6">
                            <div class="custom-checkbox-1">
                                <input id="Anak" type="checkbox" name="Anak" value="1" />
                                <label for="Anak">Anak</label>
                            </div>
                            <div class="custom-checkbox-1">
                                <input id="Estetika" type="checkbox" name="Estetika" value="1" />
                                <label for="Estetika">Anak</label>
                            </div>
                            <div class="custom-checkbox-1">
                                <input id="Hemodialisa" type="checkbox" name="Hemodialisa" value="1" />
                                <label for="Hemodialisa">Hemodialisa</label>
                            </div>
                            <div class="custom-checkbox-1">
                                <input id="Mata" type="checkbox" name="Mata" value="1" />
                                <label for="Mata">Mata</label>
                            </div>
                            <div class="custom-checkbox-1">
                                <input id="Persalinan" type="checkbox" name="Persalinan" value="1" />
                                <label for="Persalinan">Persalinan 24 Jam</label>
                            </div>
                            <div class="custom-checkbox-1">
                                <input id="THT" type="checkbox" name="THT" value="1" />
                                <label for="THT">THT</label>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Akhir Grid  -->

                <div class="form-group row">
                    <div class="form-group col-lg-9">

                    </div>
                    <div class="form-group col-lg-3">
                        <a href="create-dokter.html" class="btn btn-primary btn-modern float-end" data-loading-text="Loading...">Selanjutnya<a>
                        <!-- <input type="submit" value="SELANJUTNYA" class="btn btn-primary btn-modern float-end" data-loading-text="Loading..."> -->
                    </div>
                </div>


                </form>
            </div>

        </div>

    </div>
</div>
@endsection