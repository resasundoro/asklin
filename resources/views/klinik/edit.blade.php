@extends('layouts.backend.main')

@section('breadcrumb')
    Edit Klinik
@endsection

@section('content')
<!-- Row -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Klinik</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('klinik.update',$klinik->id) }}" class="form-horizontal" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div id="smartwizard-3">
                            <ul>
                                <li><a href="#step-10">Data Klinik</a></li>
                                <li><a href="#step-11">Detail Klinik</a></li>
                                <li><a href="#step-12">Fasilitas Klinik</a></li>
                            </ul>
                            <div>
                                <div id="step-10" class="">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Nomor Anggota</label>
                                                <input type="text" class="form-control" name="no_anggota" value="{{ $klinik->no_anggota }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Nama Klinik</label>
                                                <input type="text" class="form-control" name="nama_klinik" value="{{ $klinik->nama_klinik }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Logo Klinik</label>
                                                <input type="file" class="form-control" name="logo_klinik" value="{{ $klinik->logo_klinik }}">
                                                <img src="/images/klinik/{{ $klinik->logo_klinik }}" width="300px">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">No. Ijin Klinik</label>
                                                <input type="text" class="form-control" name="no_ijin_klinik" value="{{ $klinik->no_ijin_klinik }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Tanggal Terbit Ijin Klinik</label>
                                                <input type="text" class="form-control fc-datepicker" name="tgl_terbit_ijin_klinik" value="{{ $klinik->tgl_terbit_ijin_klinik }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Masa Berlaku Ijin Klinik</label>
                                                <input type="text" class="form-control fc-datepicker" name="masa_berlaku_ijin_klinik" value="{{ $klinik->masa_berlaku_ijin_klinik }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Nama Penanggung Jawab</label>
                                                <input type="text" class="form-control" name="nama_pendaftar" value="{{ $klinik->nama_pendaftar }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">No. Telfon Pendaftar</label>
                                                <input type="text" class="form-control" name="tlf_pendaftar" value="{{ $klinik->tlf_pendaftar }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Email Pendaftar</label>
                                                <input type="email" class="form-control" name="email_pendaftar" value="{{ $klinik->email_pendaftar }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Status Pendaftar</label>
                                                <select class="form-control form-select" name="status_pendaftar">
                                                    <option value="Pemilik" {{ $klinik->status_pendaftar == 'Pemilik'  ? 'selected' : '' }}>Pemilik</option>
                                                    <option value="Penanggung Jawab" {{ $klinik->status_pendaftar == 'Penanggung Jawab'  ? 'selected' : '' }}>Penanggung Jawab</option>
                                                    <option value="Pemilik & Penanggung Jawab" {{ $klinik->status_pendaftar == 'Pemilik & Penanggung Jawab'  ? 'selected' : '' }}>Pemilik & Penanggung Jawab</option>
                                                    <option value="Pengelola & Penanggung Jawab" {{ $klinik->status_pendaftar == 'Pengelola & Penanggung Jawab'  ? 'selected' : '' }}>Pengelola & Penanggung Jawab</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="step-11" class="">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Nama Pemilik Klinik</label>
                                                <input type="text" class="form-control" name="nama_pemilik" value="{{ $klinik->nama_pemilik }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Jenis Klinik</label>
                                                <select class="form-control form-select" name="jenis_klinik">
                                                    <option value="Utama" {{ $klinik->jenis_klinik == 'Utama'  ? 'selected' : '' }}>Utama</option>
                                                    <option value="Pratama" {{ $klinik->jenis_klinik == 'Pratama'  ? 'selected' : '' }}>Pratama</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Status Kepemilikan Klinik</label>
                                                <select class="form-control form-select" name="status_kepemilikan_klinik" id="status_kepemilikan_klinik">
                                                    <option value="Perorangan" {{ $klinik->status_kepemilikan_klinik == 'Perorangan'  ? 'selected' : '' }}>Perorangan</option>
                                                    <option value="Badan Usaha" {{ $klinik->status_kepemilikan_klinik == 'Badan Usaha'  ? 'selected' : '' }}>Badan Usaha</option>
                                                    <option value="Badan Hukum" {{ $klinik->status_kepemilikan_klinik == 'Badan Hukum'  ? 'selected' : '' }}>Badan Hukum</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="bbu">
                                                <label class="form-label">Bentuk Badan Usaha</label>
                                                <select class="form-control form-select" name="bentuk_badan_usaha">
                                                    <option value="CV" {{ $klinik->bentuk_badan_usaha == $klinik->bentuk_badan_usaha  ? 'selected' : '' }}>CV</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="bbh">
                                                <label class="form-label">Bentuk Badan Hukum</label>
                                                <select class="form-control form-select" name="bentuk_badan_hukum">
                                                    <option value="PT" {{ $klinik->bentuk_badan_hukum == 'PT'  ? 'selected' : '' }}>PT</option>
                                                    <option value="Yayasan" {{ $klinik->bentuk_badan_hukum == 'Yayasan'  ? 'selected' : '' }}>Yayasan</option>
                                                    <option value="Koperasi" {{ $klinik->bentuk_badan_hukum == 'Koperasi'  ? 'selected' : '' }}>Koperasi</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="nbhu">
                                                <label class="form-label">Nama Badan Hukum / Usaha</label>
                                                <input type="text" class="form-control" name="nama_badan" value="{{ $klinik->nama_badan }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">No. Telfon Klinik</label>
                                                <input type="text" class="form-control" name="tlf_klinik" value="{{ $klinik->tlf_klinik }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Alamat</label>
                                                <input type="text" class="form-control" id="alamat_klinik" name="alamat_klinik" value="{{ $klinik->alamat_klinik }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">RT / RW</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" placeholder="RT" name="rt" value="{{ $klinik->rt }}">
                                                    <input type="number" class="form-control" placeholder="RW" name="rw" value="{{ $klinik->rw }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Kode POS</label>
                                                <input type="text" class="form-control" name="kode_pos" value="{{ $klinik->kode_pos }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Provinsi</label>
                                                <select class="form-control form-select" name="provinsi" id="provinsi">
                                                    <option>==Pilih Provinsi==</option>
                                                    @foreach ($provinsi as $p)
                                                        <option value="{{ $p->id }}" {{ $klinik->provinsi == $p->id  ? 'selected' : '' }}>{{ $p->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Kota / Kabupaten</label>
                                                <select class="form-control form-select" name="kota" id="kota">
                                                    <option>==Pilih Kota / Kabupaten==</option>
                                                    @foreach ($kota as $k)
                                                        <option value="{{ $k->id }}" {{ $klinik->kota == $k->id  ? 'selected' : '' }}>{{ $k->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Kecamatan</label>
                                                <select class="form-control form-select" name="kecamatan" id="kecamatan">
                                                    <option>==Pilih Kecamatan==</option>
                                                    @foreach ($kecamatan as $k)
                                                        <option value="{{ $k->id }}" {{ $klinik->kecamatan == $k->id  ? 'selected' : '' }}>{{ $k->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Kelurahan / Desa</label>
                                                <select class="form-control form-select" name="kelurahan" id="kelurahan">
                                                    <option>==Pilih Kelurahan / Desa==</option>
                                                    @foreach ($desa as $d)
                                                        <option value="{{ $d->id }}" {{ $klinik->kelurahan == $d->id  ? 'selected' : '' }}>{{ $d->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="step-12" class="">
                                    <div class="form-group">
                                        <div class="form-label">Kriteria Klinik</div>
                                        <div class="row">
                                            @foreach($kriteria as $k)
                                                <div class="col-auto">
                                                    <label class="custom-control custom-checkbox-md">
                                                        <input type="checkbox" class="custom-control-input" name="kriteria[]" value="{{ $k->id }}" {{ (in_array($k->id, explode(",", $klinik->kriteria)) ? 'checked' : '')}}>
                                                        <span class="custom-control-label">{{ $k->kriteria }}</span>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label">Fasilitas Klinik</div>
                                        <div class="row">
                                            @foreach($fasilitas as $f)
                                                <div class="col-auto">
                                                    <label class="custom-control custom-checkbox-md">
                                                        <input type="checkbox" class="custom-control-input" name="fasilitas[]" value="{{ $f->id }}" {{ (in_array($f->id, explode(",", $klinik->fasilitas)) ? 'checked' : '')}}>
                                                        <span class="custom-control-label">{{ $f->fasilitas }}</span>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label">Layanan Klinik</div>
                                        <div class="row">
                                            <div class="col-auto c1">
                                                <label class="custom-control custom-checkbox-md">
                                                    <input type="checkbox" class="custom-control-input" name="layanan[]" value="1" {{ (in_array(1, explode(",", $klinik->layanan)) ? 'checked' : '')}}>
                                                    <span class="custom-control-label">Akupuntur</span>
                                                </label>
                                            </div>
                                            <div class="col-auto c2">
                                                <label class="custom-control custom-checkbox-md">
                                                    <input type="checkbox" class="custom-control-input" name="layanan[]" value="2" {{ (in_array(2, explode(",", $klinik->layanan)) ? 'checked' : '')}}>
                                                    <span class="custom-control-label">Bedah</span>
                                                </label>
                                            </div>
                                            <div class="col-auto c3">
                                                <label class="custom-control custom-checkbox-md">
                                                    <input type="checkbox" class="custom-control-input" name="layanan[]" value="3" {{ (in_array(3, explode(",", $klinik->layanan)) ? 'checked' : '')}}>
                                                    <span class="custom-control-label">Gigi</span>
                                                </label>
                                            </div>
                                            <div class="col-auto c4">
                                                <label class="custom-control custom-checkbox-md">
                                                    <input type="checkbox" class="custom-control-input" name="layanan[]" value="4" {{ (in_array(4, explode(",", $klinik->layanan)) ? 'checked' : '')}}>
                                                    <span class="custom-control-label">Kebidanan</span>
                                                </label>
                                            </div>
                                            <div class="col-auto c5">
                                                <label class="custom-control custom-checkbox-md">
                                                    <input type="checkbox" class="custom-control-input" name="layanan[]" value="5" {{ (in_array(5, explode(",", $klinik->layanan)) ? 'checked' : '')}}>
                                                    <span class="custom-control-label">Penyakit Dalam</span>
                                                </label>
                                            </div>
                                            <div class="col-auto c6">
                                                <label class="custom-control custom-checkbox-md">
                                                    <input type="checkbox" class="custom-control-input" name="layanan[]" value="6" {{ (in_array(6, explode(",", $klinik->layanan)) ? 'checked' : '')}}>
                                                    <span class="custom-control-label">Rehabilitasi Medik</span>
                                                </label>
                                            </div>
                                            <div class="col-auto c7">
                                                <label class="custom-control custom-checkbox-md">
                                                    <input type="checkbox" class="custom-control-input" name="layanan[]" value="7" {{ (in_array(7, explode(",", $klinik->layanan)) ? 'checked' : '')}}>
                                                    <span class="custom-control-label">Umum</span>
                                                </label>
                                            </div>
                                            <div class="col-auto c8">
                                                <label class="custom-control custom-checkbox-md">
                                                    <input type="checkbox" class="custom-control-input" name="layanan[]" value="8" {{ (in_array(8, explode(",", $klinik->layanan)) ? 'checked' : '')}}>
                                                    <span class="custom-control-label">Anak</span>
                                                </label>
                                            </div>
                                            <div class="col-auto c9">
                                                <label class="custom-control custom-checkbox-md">
                                                    <input type="checkbox" class="custom-control-input" name="layanan[]" value="9" {{ (in_array(9, explode(",", $klinik->layanan)) ? 'checked' : '')}}>
                                                    <span class="custom-control-label">Estetika</span>
                                                </label>
                                            </div>
                                            <div class="col-auto c10">
                                                <label class="custom-control custom-checkbox-md">
                                                    <input type="checkbox" class="custom-control-input" name="layanan[]" value="10" {{ (in_array(10, explode(",", $klinik->layanan)) ? 'checked' : '')}}>
                                                    <span class="custom-control-label">Hemodialisa</span>
                                                </label>
                                            </div>
                                            <div class="col-auto c11">
                                                <label class="custom-control custom-checkbox-md">
                                                    <input type="checkbox" class="custom-control-input" name="layanan[]" value="11" {{ (in_array(11, explode(",", $klinik->layanan)) ? 'checked' : '')}}>
                                                    <span class="custom-control-label">Mata</span>
                                                </label>
                                            </div>
                                            <div class="col-auto c12">
                                                <label class="custom-control custom-checkbox-md">
                                                    <input type="checkbox" class="custom-control-input" name="layanan[]" value="12" {{ (in_array(12, explode(",", $klinik->layanan)) ? 'checked' : '')}}>
                                                    <span class="custom-control-label">Persalinan 24 Jam</span>
                                                </label>
                                            </div>
                                            <div class="col-auto c13">
                                                <label class="custom-control custom-checkbox-md">
                                                    <input type="checkbox" class="custom-control-input" name="layanan[]" value="13" {{ (in_array(13, explode(",", $klinik->layanan)) ? 'checked' : '')}}>
                                                    <span class="custom-control-label">THT</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<!-- FORM WIZARD JS-->
<script src="{{ asset('assets/plugins/formwizard/jquery.smartWizard.js') }}"></script>

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

        // Toolbar extra buttons
	    var btnFinish = $('<button type="submit" id="btn-save"></button>').text('Simpan').addClass('btn btn-primary');

        $('#smartwizard-3').smartWizard({
			selected: 0,
			theme: 'dots',
			transitionEffect:'fade',
			showStepURLhash: false,
			toolbarSettings: {toolbarExtraButtons: [btnFinish]}
	    });
    });

    $(".fc-datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
    $('#provinsi').select2();
    $('#kota').select2();
    $('#kecamatan').select2();
    $('#kelurahan').select2();

    $("#status_kepemilikan_klinik").change(function() {
        if ($(this).val() == "Perorangan") {
            $('#bbu').hide();
            $('#bbh').hide();
            $('#nbhu').hide();
        }
        else if ($(this).val() == "Badan Usaha") {
            $('#bbu').show();
            $('#bbh').hide();
            $('#nbhu').show();
        }
        else if ($(this).val() == "Badan Hukum") {
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