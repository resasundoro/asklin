@extends('layouts.backend.main')

@section('breadcrumb')
    Klinik
@endsection

@section('content')
<!-- Row -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Data Klinik</h3>
                @can('klinik-create')
                    <a class="modal-effect btn btn-primary ms-auto" onClick="add()" href="javascript:void(0)">Tambah Klinik</a>
                @endcan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered text-nowrap border-bottom">
                        <thead>
                            <tr>
                                <th class="border-bottom-0">No</th>
                                <th class="border-bottom-0">No Peserta</th>
                                <th class="border-bottom-0">Klinik</th>
                                <th class="border-bottom-0">Pemilik</th>
                                <th class="border-bottom-0">Jenis</th>
                                <th class="border-bottom-0">Telfon</th>
                                <th class="border-bottom-0">Kota</th>
                                <th class="border-bottom-0">Tanggal</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button class="btn-close me-1" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form action="javascript:void(0)" id="form" name="form" class="form-horizontal" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id">
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
                                            <input type="text" class="form-control" id="no_anggota" name="no_anggota">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Nama Klinik</label>
                                            <input type="text" class="form-control" id="nama_klinik" name="nama_klinik">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Logo Klinik</label>
                                            <input type="file" class="form-control" name="logo_klinik" id="logo_klinik">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">No. Ijin Klinik</label>
                                            <input type="text" class="form-control" id="no_ijin_klinik" name="no_ijin_klinik">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Tanggal Terbit Ijin Klinik</label>
                                            <input type="date" class="form-control" id="tgl_terbit_ijin_klinik" name="tgl_terbit_ijin_klinik">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Masa Berlaku Ijin Klinik</label>
                                            <input type="date" class="form-control" id="masa_berlaku_ijin_klinik" name="masa_berlaku_ijin_klinik">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Nama Penanggung Jawab</label>
                                            <input type="text" class="form-control" id="nama_pendaftar" name="nama_pendaftar">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">No. Telfon Pendaftar</label>
                                            <input type="text" class="form-control" id="tlf_pendaftar" name="tlf_pendaftar">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Email Pendaftar</label>
                                            <input type="email" class="form-control" id="email_pendaftar" name="email_pendaftar">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Status Pendaftar</label>
                                            <select class="form-control form-select" name="status_pendaftar" id="status_pendaftar">
                                                <option value="Pemilik">Pemilik</option>
                                                <option value="Penanggung Jawab">Penanggung Jawab</option>
                                                <option value="Pemilik & Penanggung Jawab">Pemilik & Penanggung Jawab</option>
                                                <option value="Pengelola & Penanggung Jawab">Pengelola & Penanggung Jawab</option>
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
                                            <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Jenis Klinik</label>
                                            <select class="form-control form-select" name="jenis_klinik" id="jenis_klinik">
                                                <option value="Utama">Utama</option>
                                                <option value="Pratama">Pratama</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Status Kepemilikan Klinik</label>
                                            <select class="form-control form-select" name="status_kepemilikan_klinik" id="status_kepemilikan_klinik">
                                                <option value="Perorangan">Perorangan</option>
                                                <option value="Badan Usaha">Badan Usaha</option>
                                                <option value="Badan Hukum">Badan Hukum</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="bbu">
                                            <label class="form-label">Bentuk Badan Usaha</label>
                                            <select class="form-control form-select" name="bentuk_badan_usaha" id="bentuk_badan_hukum">
                                                <option value="CV">CV</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="bbh">
                                            <label class="form-label">Bentuk Badan Hukum</label>
                                            <select class="form-control form-select" name="bentuk_badan_usaha" id="bentuk_badan_hukum">
                                                <option value="PT">PT</option>
                                                <option value="Yayasan">Yayasan</option>
                                                <option value="Koperasi">Koperasi</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="nbhu">
                                            <label class="form-label">Nama Badan Hukum / Usaha</label>
                                            <input type="text" class="form-control" id="nama_badan" name="nama_badan">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">No. Telfon Klinik</label>
                                            <input type="text" class="form-control" id="tlf_klinik" name="tlf_klinik">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Alamat</label>
                                            <input type="text" class="form-control" id="alamat_klinik" name="alamat_klinik">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">RT / RW</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="RT" name="rt" id="rt">
                                                <input type="number" class="form-control" placeholder="RW" name="rw" id="rw">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Kode POS</label>
                                            <input type="text" class="form-control" id="kode_pos" name="kode_pos">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Provinsi</label>
                                            <select class="form-control select2 form-select" name="provinsi" id="provinsi">
                                                <option>==Pilih Provinsi==</option>
                                                @foreach ($provinsi as $p)
                                                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Kota / Kabupaten</label>
                                            <select class="form-control select2 form-select" name="kota" id="kota"></select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Kecamatan</label>
                                            <select class="form-control select2 form-select" name="kecamatan" id="kecamatan"></select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Kelurahan / Desa</label>
                                            <select class="form-control select2 form-select" name="kelurahan" id="kelurahan">
                                                
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
                                                    <input type="checkbox" class="custom-control-input" name="kriteria[]" value="{{ $k->id }}">
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
                                                    <input type="checkbox" class="custom-control-input" name="fasilitas[]" value="{{ $f->id }}">
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
                                                    <input type="checkbox" class="custom-control-input" name="layanan[]" value="1">
                                                    <span class="custom-control-label">Akupuntur</span>
                                                </label>
                                            </div>
                                            <div class="col-auto c2">
                                                <label class="custom-control custom-checkbox-md">
                                                    <input type="checkbox" class="custom-control-input" name="layanan[]" value="2">
                                                    <span class="custom-control-label">Bedah</span>
                                                </label>
                                            </div>
                                            <div class="col-auto c3">
                                                <label class="custom-control custom-checkbox-md">
                                                    <input type="checkbox" class="custom-control-input" name="layanan[]" value="3">
                                                    <span class="custom-control-label">Gigi</span>
                                                </label>
                                            </div>
                                            <div class="col-auto c4">
                                                <label class="custom-control custom-checkbox-md">
                                                    <input type="checkbox" class="custom-control-input" name="layanan[]" value="4"}>
                                                    <span class="custom-control-label">Kebidanan</span>
                                                </label>
                                            </div>
                                            <div class="col-auto c5">
                                                <label class="custom-control custom-checkbox-md">
                                                    <input type="checkbox" class="custom-control-input" name="layanan[]" value="5">
                                                    <span class="custom-control-label">Penyakit Dalam</span>
                                                </label>
                                            </div>
                                            <div class="col-auto c6">
                                                <label class="custom-control custom-checkbox-md">
                                                    <input type="checkbox" class="custom-control-input" name="layanan[]" value="6">
                                                    <span class="custom-control-label">Rehabilitasi Medik</span>
                                                </label>
                                            </div>
                                            <div class="col-auto c7">
                                                <label class="custom-control custom-checkbox-md">
                                                    <input type="checkbox" class="custom-control-input" name="layanan[]" value="7">
                                                    <span class="custom-control-label">Umum</span>
                                                </label>
                                            </div>
                                            <div class="col-auto c8">
                                                <label class="custom-control custom-checkbox-md">
                                                    <input type="checkbox" class="custom-control-input" name="layanan[]" value="8">
                                                    <span class="custom-control-label">Anak</span>
                                                </label>
                                            </div>
                                            <div class="col-auto c9">
                                                <label class="custom-control custom-checkbox-md">
                                                    <input type="checkbox" class="custom-control-input" name="layanan[]" value="9">
                                                    <span class="custom-control-label">Estetika</span>
                                                </label>
                                            </div>
                                            <div class="col-auto c10">
                                                <label class="custom-control custom-checkbox-md">
                                                    <input type="checkbox" class="custom-control-input" name="layanan[]" value="10">
                                                    <span class="custom-control-label">Hemodialisa</span>
                                                </label>
                                            </div>
                                            <div class="col-auto c11">
                                                <label class="custom-control custom-checkbox-md">
                                                    <input type="checkbox" class="custom-control-input" name="layanan[]" value="11">
                                                    <span class="custom-control-label">Mata</span>
                                                </label>
                                            </div>
                                            <div class="col-auto c12">
                                                <label class="custom-control custom-checkbox-md">
                                                    <input type="checkbox" class="custom-control-input" name="layanan[]" value="12">
                                                    <span class="custom-control-label">Persalinan 24 Jam</span>
                                                </label>
                                            </div>
                                            <div class="col-auto c13">
                                                <label class="custom-control custom-checkbox-md">
                                                    <input type="checkbox" class="custom-control-input" name="layanan[]" value="13">
                                                    <span class="custom-control-label">THT</span>
                                                </label>
                                            </div>
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

@include('klinik.show');

@endsection

@section('js')
<!-- DATA TABLE JS-->
<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>

<!-- FORM WIZARD JS-->
<script src="{{ asset('assets/plugins/formwizard/jquery.smartWizard.js') }}"></script>

<script>
    $(function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            type: 'JSON',
            ajax: '{{ route('klinik.list') }}',
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'no_peserta', name: 'no_peserta'},
                {data: 'nama_klinik', name: 'nama_klinik'},
                {data: 'nama_pemilik', name: 'nama_pemilik'},
                {data: 'jenis_klinik', name: 'jenis_klinik'},
                {data: 'tlf_klinik', name: 'tlf_klinik'},
                {data: "name", name: 'name'},
                {data: 'created_at', name: 'created_at'},
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: true, 
                    searchable: true
                },
            ],
            columnDefs: [
                { orderable: false, targets: [0,7,8] }
            ],
            order: [[7, 'desc']],
            buttons:
            [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });

        $('#modal').modal({ backdrop: 'static', keyboard: false });

        // Toolbar extra buttons
	    var btnFinish = $('<button type="submit" id="btn-save"></button>').text('Simpan').addClass('btn btn-primary');

        $('#smartwizard-3').smartWizard({
			selected: 0,
			theme: 'dots',
			transitionEffect:'fade',
			showStepURLhash: false,
			toolbarSettings: {toolbarExtraButtons: [btnFinish]}
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

        $('#provinsi').select2({ dropdownParent: $('#modal') });
        $('#kota').select2({ dropdownParent: $('#modal') });
        $('#kecamatan').select2({ dropdownParent: $('#modal') });
        $('#kelurahan').select2({ dropdownParent: $('#modal') });
    });

    function add(){
        $('#form').trigger("reset");
        $('.modal-title').html("Tambah Klinik");
        $('#modal').modal('show');
        $('#id').val('');
    }

    $('#form').submit(function(e) {
        e.preventDefault();
        $("#btn-save"). attr("disabled", true);
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: '{{ route('klinik.store') }}',
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#modal").modal('hide');
                $.growl.notice({
                    title: 'Pemberitahuan',
                    message: "Berhasil menambahkan klinik."
                });
                $('#datatable').dataTable().fnDraw(false);
                $("#btn-save"). attr("disabled", false);
            },
            error: function(data){
                $.growl.error({
                    title: 'Pemberitahuan',
                    message: "Silahkan periksa data yang akan diinput..."
                });
                $("#btn-save"). attr("disabled", false);
            }
        });
    });

    function deleteu(id){
        if (confirm("Hapus data klinik ini?") == true) {
            var id = id;
            $.ajax({
                type:"POST",
                url: "{{ url('klinik/delete') }}",
                data: { id: id },
                dataType: 'json',
                success: function(res){
                    $('#datatable').dataTable().fnDraw(false);
                    $.growl.notice({
                        title: 'Pemberitahuan',
                        message: "Klinik berhasil dihapus."
                    });
                }
            });
        }
    }

    function lihat(id){
        $.ajax({
            type:"POST",
            url: '{{ route('klinik.show') }}',
            data: { id: id },
            dataType: 'json',
            success: function(data){
                $('.modal-title').html(data.nama_klinik);
                $('#lihat').modal('show');
                $('#logo_klinik').html('src="hehe"');
            }
        });
    }

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