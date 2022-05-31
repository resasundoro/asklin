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

    <form action="{{ route('pendaftaran.update',$p->id) }}" role="form" class="needs-validation" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="row">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col">
                    <div class="alert alert-info alert-admin">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="form-group col">
                                        <div class="custom-radio-1" data-bs-toggle="collapse" data-bs-target=".shipping-field-wrapper">
                                            <input id="createAccount" type="radio" name="asklin" value="1" {{ $p->asklin == '1'  ? 'checked' : '' }}/>
                                            <label for="createAccount">Sudah Menjadi Anggota Asklin ?</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="shipping-field-wrapper collapse">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label form-control-label line-height-9 pt-2 text-2 ">Nomor Anggota Asklin</label>
                                        <div class="col-md-6">
                                            <input class="form-control text-3 h-auto py-2" type="text" name="no_anggota" value="{{ $p->no_anggota }}">
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
                                    <div class="custom-radio-1">
                                        <input id="shipAddress" type="radio" name="asklin" value="0" {{ $p->asklin == '0'  ? 'checked' : '' }}/>
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

                <div class="col-md-6 col-lg-6 mb-5 mb-lg-0">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 ">Nama Klinik</label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="text" name="nama_klinik" value="{{ $p->nama_klinik }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 ">Logo Klinik</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="file" name="logo_klinik" value="{{ $p->logo_klinik }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        @if(isset($p->logo_klinik))
                            <img src="{{ asset('/images/klinik/'.$p->logo_klinik) }}" style="max-width: 300px">
                        @else
                            <span class="badge badge-danger badge-md">Logo Belum Di Upload</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6 col-lg-6">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 ">Nama Kontak / Penanggung Jawab</label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="text" name="nama_pendaftar" value="{{ $p->nama_pendaftar }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 ">Email</label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="email" name="email_pendaftar" value="{{ $p->email_pendaftar }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 ">No Telpon</label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="number" name="tlf_pendaftar" value="{{ $p->tlf_pendaftar }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 ">Status Pendaftar</label>
                        <div class="col-lg-9">
                            <select class="form-select form-control h-auto" data-msg-="status_pendaftar" name="status_pendaftar">
                                <option value="Pemilik" {{ $p->status_pendaftar == 'Pemilik'  ? 'selected' : '' }}>Pemilik</option>
                                <option value="Penanggung Jawab" {{ $p->status_pendaftar == 'Penanggung Jawab'  ? 'selected' : '' }}>Penanggung Jawab</option>
                                <option value="Pemilik & Penanggung Jawab" {{ $p->status_pendaftar == 'Pemilik & Penanggung Jawab'  ? 'selected' : '' }}>Pemilik & Penanggung Jawab</option>
                                <option value="Pengelola & Penanggung Jawab" {{ $p->status_pendaftar == 'Pengelola & Penanggung Jawab'  ? 'selected' : '' }}>Pengelola & Penanggung Jawab</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 ">No Ijin Klinik</label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="text" name="no_ijin_klinik" value="{{ $p->no_ijin_klinik }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 ">Tgl.Terbit Ijin</label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2 fc-datepicker" type="text" name="tgl_terbit_ijin_klinik" value="{{ $p->tgl_terbit_ijin_klinik }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 ">Masa Berlaku s/d</label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2 fc-datepicker" type="text" name="masa_berlaku_ijin_klinik" value="{{ $p->masa_berlaku_ijin_klinik }}">
                        </div>
                    </div>
                </div>

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
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 ">Nama pemilik klinik</label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="text" name="nama_pemilik" value="{{ $p->nama_pemilik }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 ">Jenis klinik</label>
                        <div class="col-lg-9">
                            <select class="form-select form-control h-auto" data-msg-="jenis_klinik" name="jenis_klinik"  id="jenis_klinik">
                                <option value="Utama" {{ $p->jenis_klinik == 'Utama'  ? 'selected' : '' }}>Utama</option>
                                <option value="Pratama" {{ $p->jenis_klinik == 'Pratama'  ? 'selected' : '' }}>Pratama</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 ">Status Kepemilikan Klinik</label>
                        <div class="col-lg-9">
                            <select class="form-select form-control h-auto" data-msg-="status_kepemilikan_klinik" name="status_kepemilikan_klinik" id="status_kepemilikan_klinik">
                                <option value="Perorangan" {{ $p->status_kepemilikan_klinik == 'Perorangan'  ? 'selected' : '' }}>Perorangan</option>
                                <option value="Badan Usaha" {{ $p->status_kepemilikan_klinik == 'Badan Usaha'  ? 'selected' : '' }}>Badan Usaha</option>
                                <option value="Badan Hukum" {{ $p->status_kepemilikan_klinik == 'Badan Hukum'  ? 'selected' : '' }}>Badan Hukum</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" id="bbu">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 ">Bentuk Badan Usaha</label>
                        <div class="col-lg-9">
                            <select class="form-select form-control h-auto" data-msg-="bentuk_badan_usaha" name="bentuk_badan_usaha">
                                <option value="CV" {{ $p->bentuk_badan_usaha == $p->bentuk_badan_usaha  ? 'selected' : '' }}>CV</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" id="bbh">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 ">Bentuk Badan Usaha</label>
                        <div class="col-lg-9">
                            <select class="form-select form-control h-auto" data-msg-="bentuk_badan_hukum" name="bentuk_badan_hukum">
                                <option value="PT" {{ $p->bentuk_badan_hukum == 'PT'  ? 'selected' : '' }}>PT</option>
                                <option value="Yayasan" {{ $p->bentuk_badan_hukum == 'Yayasan'  ? 'selected' : '' }}>Yayasan</option>
                                <option value="Koperasi" {{ $p->bentuk_badan_hukum == 'Koperasi'  ? 'selected' : '' }}>Koperasi</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" id="nbhu">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 ">Nama Badan Hukum / Usaha</label>
                        <div class="col-lg-9">
                            <input type="text" data-msg-="" maxlength="100" class="form-control text-3 h-auto py-2" name="nama_badan" value="{{ $p->nama_badan }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 ">Alamat</label>
                        <div class="col-lg-9">
                            <textarea maxlength="5000" data-msg-="Please enter your address" rows="4" class="form-control text-3 h-auto py-2" name="alamat_klinik">{{ $p->alamat_klinik }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="form-label mb-1 text-2">RT</label>
                            <input type="text" data-msg-="" maxlength="100" class="form-control text-3 h-auto py-2" name="rt" value="{{ $p->rt }}">
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="form-label mb-1 text-2">RW</label>
                            <input type="text" data-msg-="" data-msg-email="RW" maxlength="100" class="form-control text-3 h-auto py-2" name="rw" value="{{ $p->rw }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 ">Kode POS</label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="text" name="kode_pos" value="{{ $p->kode_pos }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 ">Telpon Klinik</label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="text" name="tlf_klinik" value="{{ $p->tlf_klinik }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 ">Provinsi</label>
                        <div class="col-lg-9">
                            <select class="form-select form-control h-auto" data-msg-="provinsi" name="provinsi" id="provinsi">
                                <option>==Pilih Provinsi==</option>
                                @foreach ($provinsi as $prov)
                                    <option value="{{ $prov->id }}" {{ $p->provinsi == $prov->id  ? 'selected' : '' }}>{{ $prov->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 ">Kabupaten / Kota</label>
                        <div class="col-lg-9">
                            <select class="form-select form-control h-auto" data-msg-="kota" name="kota" id="kota">
                                @foreach ($kota as $k)
                                    <option value="{{ $k->id }}" {{ $p->kota == $k->id  ? 'selected' : '' }}>{{ $k->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 ">Kecamatan</label>
                        <div class="col-lg-9">
                            <select class="form-select form-control h-auto" data-msg-="kecamatan" name="kecamatan" id="kecamatan">
                                @foreach ($kecamatan as $k)
                                    <option value="{{ $k->id }}" {{ $p->kecamatan == $k->id  ? 'selected' : '' }}>{{ $k->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 ">Kelurahan</label>
                        <div class="col-lg-9">
                            <select class="form-select form-control h-auto" data-msg-="Kelurahan" name="kelurahan" id="kelurahan">
                                @foreach ($kelurahan as $k)
                                    <option value="{{ $k->id }}" {{ $p->kelurahan == $k->id  ? 'selected' : '' }}>{{ $k->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6">
                    <div class="overflow-hidden mb-1">
                        <h3 class="text-color-primary font-weight-bold fst-italic ls-0 text-5 mb-3 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="100" data-plugin-options="{'minWindowWidth': 0}">KRITERIA KLINIK</h3>
                    </div>

                    <div class="row">
                        @foreach($kriteria as $k)
                            <div class="form-group col-lg-6">
                                <div class="custom-checkbox-1">
                                    <input type="checkbox" name="kriteria[]" value="{{ $k->id }}" {{ (in_array($k->id, explode(",", $p->kriteria)) ? 'checked' : '')}}>
                                    <label class="custom-control-label">{{ $k->kriteria }}</label>
                                </div>
                            </div>
                        @endforeach

                        <div class="overflow-hidden mb-1">
                            <h3 class="text-color-primary font-weight-bold fst-italic ls-0 text-5 mb-3 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="100" data-plugin-options="{'minWindowWidth': 0}">FASILITAS KLINIK</h3>
                        </div>

                        <div class="row">
                            @foreach($fasilitas as $k)
                                <div class="form-group col-lg-6">
                                    <div class="custom-checkbox-1">
                                        <input type="checkbox" name="fasilitas[]" value="{{ $k->id }}" {{ (in_array($k->id, explode(",", $p->fasilitas)) ? 'checked' : '')}}>
                                        <label class="custom-control-label">{{ $k->fasilitas }}</label>
                                    </div>
                                </div>
                            @endforeach

                            <div class="overflow-hidden mb-1">
                                <h3 class="text-color-primary font-weight-bold fst-italic ls-0 text-5 mb-3 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="100" data-plugin-options="{'minWindowWidth': 0}">JENIS LAYANAN</h3>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <div class="custom-checkbox-1" id="c1">
                                        <input id="Akupuntur" type="checkbox" name="layanan[]" value="1" {{ (in_array(1, explode(",", $p->layanan)) ? 'checked' : '')}}/>
                                        <label for="Akupuntur">Akupuntur</label>
                                    </div>
                                    <div class="custom-checkbox-1" id="c2">
                                        <input id="Bedah" type="checkbox" name="layanan[]" value="2" {{ (in_array(2, explode(",", $p->layanan)) ? 'checked' : '')}}/>
                                        <label for="Bedah">Bedah</label>
                                    </div>
                                        <div class="custom-checkbox-1" id="c3">
                                        <input id="Gigi" type="checkbox" name="layanan[]" value="3" {{ (in_array(3, explode(",", $p->layanan)) ? 'checked' : '')}}/>
                                        <label for="Gigi">Gigi</label>
                                    </div>
                                        <div class="custom-checkbox-1" id="c4">
                                        <input id="Kebidanan" type="checkbox" name="layanan[]" value="4" {{ (in_array(4, explode(",", $p->layanan)) ? 'checked' : '')}}/>
                                        <label for="Kebidanan">Kebidanan</label>
                                    </div>
                                        <div class="custom-checkbox-1" id="c5">
                                        <input id="PenyakitDalam" type="checkbox" name="layanan[]" value="5" {{ (in_array(5, explode(",", $p->layanan)) ? 'checked' : '')}}/>
                                        <label for="PenyakitDalam">Penyakit Dalam</label>
                                    </div>
                                        <div class="custom-checkbox-1" id="c6">
                                        <input id="RehabilitasiMedik" type="checkbox" name="layanan[]" value="6" {{ (in_array(6, explode(",", $p->layanan)) ? 'checked' : '')}}/>
                                        <label for="RehabilitasiMedik">Rehabilitasi Medik</label>
                                    </div>
                                        <div class="custom-checkbox-1" id="c7">
                                        <input id="Umum" type="checkbox" name="layanan[]" value="7" {{ (in_array(7, explode(",", $p->layanan)) ? 'checked' : '')}}/>
                                        <label for="Umum">Umum</label>
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <div class="custom-checkbox-1" id="c8">
                                        <input id="Anak" type="checkbox" name="layanan[]" value="8" {{ (in_array(8, explode(",", $p->layanan)) ? 'checked' : '')}}/>
                                        <label for="Anak">Anak</label>
                                    </div>
                                    <div class="custom-checkbox-1" id="c9">
                                        <input id="Estetika" type="checkbox" name="layanan[]" value="9" {{ (in_array(9, explode(",", $p->layanan)) ? 'checked' : '')}}/>
                                        <label for="Estetika">Estetika</label>
                                    </div>
                                    <div class="custom-checkbox-1" id="c10">
                                        <input id="Hemodialisa" type="checkbox" name="layanan[]" value="10" {{ (in_array(10, explode(",", $p->layanan)) ? 'checked' : '')}}/>
                                        <label for="Hemodialisa">Hemodialisa</label>
                                    </div>
                                    <div class="custom-checkbox-1" id="c11">
                                        <input id="Mata" type="checkbox" name="layanan[]" value="11" {{ (in_array(11, explode(",", $p->layanan)) ? 'checked' : '')}}/>
                                        <label for="Mata">Mata</label>
                                    </div>
                                    <div class="custom-checkbox-1" id="c12">
                                        <input id="Persalinan" type="checkbox" name="layanan[]" value="12" {{ (in_array(12, explode(",", $p->layanan)) ? 'checked' : '')}}/>
                                        <label for="Persalinan">Persalinan 24 Jam</label>
                                    </div>
                                    <div class="custom-checkbox-1" id="c13">
                                        <input id="THT" type="checkbox" name="layanan[]" value="13" {{ (in_array(13, explode(",", $p->layanan)) ? 'checked' : '')}}/>
                                        <label for="THT">THT</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="form-group col-lg-9">

                            </div>
                            <div class="form-group col-lg-3">
                                <input type="submit" value="SELANJUTNYA" class="btn btn-primary btn-modern float-end" data-loading-text="Loading...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('js')
<!-- DATEPICKER JS -->
<script src="{{ asset('assets/plugins/date-picker/date-picker.js') }}"></script>
<script src="{{ asset('assets/plugins/date-picker/jquery-ui.js') }}"></script>

<script>
    $(function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#provinsi').on('change', function(){
            let id_provinsi = $('#provinsi').val();

            $.ajax({
                type: 'POST',
                url: '{{ route('getKota') }}',
                data: {id_provinsi:id_provinsi},
                cache: false,
                success: function(data){
                    $('#kota').html(data);
                    $('#kecamatan').html();
                    $('#kelurahan').html();
                }
            })
        });

        $('#kota').on('change', function(){
            let id_kota = $('#kota').val();

            $.ajax({
                type: 'POST',
                url: '{{ route('getKecamatan') }}',
                data: {id_kota:id_kota},
                cache: false,
                success: function(data){
                    $('#kecamatan').html(data);
                    $('#kelurahan').html();
                }
            })
        });

        $('#kecamatan').on('change', function(){
            let id_kecamatan = $('#kecamatan').val();

            $.ajax({
                type: 'POST',
                url: '{{ route('getKelurahan') }}',
                data: {id_kecamatan:id_kecamatan},
                cache: false,
                success: function(data){
                    $('#kelurahan').html(data);
                }
            })
        });
    });

    $(".fc-datepicker").datepicker({ dateFormat: 'yy-mm-dd' });

    $("#status_kepemilikan_klinik").change(function() {
        if ($(this).val() == "Perorangan") {
            $('#bbu').hide();
            $('#bbh').hide();
            $('#nbhu').hide();
        } else if ($(this).val() == "Badan Usaha") {
            $('#bbu').show();
            $('#bbh').hide();
            $('#nbhu').show();
        } else if ($(this).val() == "Badan Hukum") {
            $('#bbu').hide();
            $('#bbh').show();
            $('#nbhu').show();
        }
    });
    $("#status_kepemilikan_klinik").trigger("change");

    $("#jenis_klinik").change(function() {
        if ($(this).val() == "Utama") {
            $('#c1, #c2, #c3, #c4, #c5, #c6, #c7, #c8, #c9, #c10, #c11, #c12, #c13').show();
        } else if ($(this).val() == "Pratama") {
            $('#c8, #c3, #c7, #c12, #c9, #c4, #c6').show();
            $('#c1, #c2, #c5, #c10, #c11, #c13').hide();
        }
    });
    $("#jenis_klinik").trigger("change");
</script>
@endsection