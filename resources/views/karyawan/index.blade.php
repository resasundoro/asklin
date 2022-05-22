@extends('layouts.backend.main')

@section('breadcrumb')
    Karyawan
@endsection

@section('content')
<!-- Row -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Data Karyawan</h3>
                @can('karyawan-create')
                    <a class="modal-effect btn btn-primary ms-auto" onClick="add()" href="javascript:void(0)">Tambah Karyawan</a>
                @endcan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered text-nowrap border-bottom">
                        <thead>
                            <tr>
                                <th class="border-bottom-0">No</th>
                                <th class="border-bottom-0">Klinik</th>
                                <th class="border-bottom-0">Peranan</th>
                                <th class="border-bottom-0">Nama</th>
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button class="btn-close me-1" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form action="javascript:void(0)" id="form" name="form" class="form-horizontal" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label class="col-md-3 form-label">Klinik</label>
                        <div class="col-md-9">
                            <select class="form-control form-select" name="id_klinik" id="id_klinik">
                                <option>==Pilih Klinik==</option>
                                @foreach ($klinik as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama_klinik }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-3 form-label">Peranan</label>
                        <div class="col-md-9">
                            <select class="form-control form-select" name="id_kategori" id="id_kategori">
                                <option value="0">==Pilih Peranan==</option>
                                @foreach ($peranan as $p)
                                    <option value="{{ $p->id }}">{{ $p->kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3 grup1">
                        <label class="col-md-3 form-label nama">Nama</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                    </div>
                    <div class="row mb-3 grup2">
                        <label class="col-md-3 form-label">Teknis Kefarmasian / Apoteker</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="farmasi_apoteker" name="farmasi_apoteker">
                        </div>
                    </div>
                    <div class="row mb-3 grup3">
                        <label class="col-md-3 form-label npa_idi">NPA IDI</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="npa_idi" name="npa_idi">
                        </div>
                    </div>
                    <div class="row mb-3 grup4">
                        <label class="col-md-3 form-label no_sib_sik">No. SIB/SIK</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="no_sib_sik" name="no_sib_sik">
                        </div>
                    </div>
                    <div class="row mb-3 grup5">
                        <label class="col-md-3 form-label">No. STR</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="no_str" name="no_str">
                        </div>
                    </div>
                    <div class="row mb-3 grup6">
                        <label class="col-md-3 form-label no_sip">No. SIPA</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="no_sip" name="no_sip">
                        </div>
                    </div>
                    <div class="row mb-3 grup7">
                        <label class="col-md-3 form-label">Tanggal Akhir SIP</label>
                        <div class="col-md-9">
                            <input type="date" class="form-control" id="tgl_akhir_sip" name="tgl_akhir_sip">
                        </div>
                    </div>
                    <div class="row mb-3 grup8">
                        <label class="col-md-3 form-label">Tanggal Akhir STR</label>
                        <div class="col-md-9">
                            <input type="date" class="form-control" id="tgl_akhir_str" name="tgl_akhir_str">
                        </div>
                    </div>
                    <div class="row mb-3 grup9">
                        <label class="col-md-3 form-label">No. Telepon</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="no_tlp" name="no_tlp">
                        </div>
                    </div>
                    <div class="row mb-3 grup10">
                        <label class="col-md-3 form-label ket_sib_sik">Keterangan SIB/SIK</label>
                        <div class="col-md-9">
                            <textarea class="form-control" id="ket_sib_sik" name="ket_sib_sik"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3 grup11">
                        <label class="col-md-3 form-label">Ijazah Terakhir</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="ijazah_terakhir" name="ijazah_terakhir">
                        </div>
                    </div>
                    <div class="row mb-3 grup12">
                        <label class="col-md-3 form-label">Pekerjaan / Jabatan</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="jabatan" name="jabatan">
                        </div>
                    </div>
                    <div class="row mb-3 grup13">
                        <label class="col-md-3 form-label">Upload SIP</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control" id="foto_sip" name="foto_sip">
                        </div>
                    </div>
                    <div class="row mb-3 grup14">
                        <label class="col-md-3 form-label">Upload STR</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control" id="foto_str" name="foto_str">
                        </div>
                    </div>
                    <div class="row mb-3 grup15">
                        <label class="col-md-3 form-label">Upload Ijazah</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control" id="foto_ijazah" name="foto_ijazah">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="btn-save" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

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
            type: 'JSON',
            ajax: '{{ route('karyawan.list') }}',
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'nama_klinik', name: 'nama_klinik'},
                {data: 'kategori', name: 'kategori'},
                {data: 'nama', name: 'nama'},
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: true, 
                    searchable: true
                },
            ]
        });
    });

    function add(){
        $('#form').trigger("reset");
        $('.modal-title').html("Tambah Karyawan");
        $('#modal').modal('show');
        $('#id').val('');
    }

    function edit(id){
        $.ajax({
            type:"POST",
            url: '{{ route('karyawan.edit') }}',
            data: { id: id },
            dataType: 'json',
            success: function(data){
                $('.modal-title').html("Edit Karyawan");
                $('#modal').modal('show');
                $('#id').val(data.id);
                $('#id_klinik').val(data.id_klinik);
                $('#id_kategori').val(data.id_kategori);
                $('#nama').val(data.nama);
                $('#npa_idi').val(data.npa_idi);
                $('#no_str').val(data.no_str);
                $('#tgl_akhir_sip').val(data.tgl_akhir_sip);
                $('#no_tlf').val(data.no_tlf);
                $('#no_sib_sik').val(data.no_sib_sik);
                $('#tgl_akhir_str').val(data.tgl_akhir_str);
                $('#ket_sib_sik').val(data.ket_sib_sik);
                $('#farmasi_apoteker').val(data.farmasi_apoteker);
                $('#ijazah_terakhir').val(data.ijazah_terakhir);
                $('#jabatan').val(data.jabatan);
                $('#foto_sip').val(data.foto_sip);
                $('#foto_str').val(data.foto_str);
                $('#foto_ijazah').val(data.foto_ijazah);
            }
        });
    }

    $('#form').submit(function(e) {
        e.preventDefault();
        $("#btn-save"). attr("disabled", true);
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: '{{ route('karyawan.store') }}',
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#modal").modal('hide');
                $.growl.notice({
                    message: "Berhasil menambahkan karyawan."
                });
                $('#datatable').dataTable().fnDraw(false);
                $("#btn-save").html('Submit');
                $("#btn-save"). attr("disabled", false);
            },
            error: function(data){
                $.growl.error({
                    message: "please check Your details..."
                });
                $("#btn-save"). attr("disabled", false);
            }
        });
    });

    function deleteu(id){
        if (confirm("Hapus karyawan ini?") == true) {
            var id = id;
            $.ajax({
                type:"POST",
                url: "{{ url('karyawan/delete') }}",
                data: { id: id },
                dataType: 'json',
                success: function(res){
                    $('#datatable').dataTable().fnDraw(false);
                    $.growl.notice({
                        message: "Karyawan berhasil dihapus."
                    });
                }
            });
        }
    }

    $("#id_kategori").change(function() {
        if ($(this).val() == "0") {
            $('.grup1, .grup2, .grup3, .grup4, .grup5, .grup6, .grup7, .grup8, .grup9, .grup10, .grup11, .grup12, .grup13, .grup14, .grup15').hide();
        } else if ($(this).val() == "1") {
            $('.grup1, .grup3, .grup5, .grup6, .grup7, .grup9, .grup13, .grup14').show();
            $('.grup2, .grup4, .grup8, .grup10, .grup11, .grup12, .grup15').hide();
            $('.nama').html('Nama Dokter');
            $('.npa_idi').html('NPA IDI');
            $('.no_sip').html('No. SIP');
        } else if ($(this).val() == "2") {
            $('.grup1, .grup3, .grup5, .grup6, .grup7, .grup9, .grup13, .grup14').show();
            $('.grup2, .grup4, .grup8, .grup10, .grup11, .grup12, .grup15').hide();
            $('.nama').html('Nama Dokter');
            $('.npa_idi').html('NPA IDI/PDGI');
            $('.no_sip').html('No. SIP');
        } else if ($(this).val() == "3") {
            $('.grup1, .grup4, .grup5, .grup8, .grup11, .grup13, .grup14').show();
            $('.grup2, .grup3, .grup6, .grup7, .grup9, .grup10, .grup12, .grup15').hide();
            $('.nama').html('Nama Lengkap');
        } else if ($(this).val() == "4") {
            $('.grup1, .grup2, .grup4, .grup5, .grup6, .grup8, .grup10, .grup13, .grup14').show();
            $('.grup3, .grup7, .grup9, .grup11, .grup12, .grup15').hide();
            $('.nama').html('Nama Lengkap');
            $('.no_sib_sik').html('No. SIAA/SIK');
            $('.no_sip').html('No. SIPA');
            $('.ket_sib_sik').html('Keterangan SIPA/SIA/SIK')
        } else if ($(this).val() == "5") {
            $('.grup1,.grup11, .grup12, .grup15').show();
            $('.grup2,.grup4, .grup4, .grup5, .grup6, .grup7, .grup8, .grup9, .grup10, .grup13, .grup14').hide();
            $('.nama').html('Nama Lengkap');
        }
    });
    $("#id_kategori").trigger("change");
</script>
@endsection