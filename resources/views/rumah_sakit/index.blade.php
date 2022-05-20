@extends('layouts.backend.main')

@section('breadcrumb')
    Rumah Sakit Terdekat
@endsection

@section('content')
<!-- Row -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Data Rumah Sakit Terdekat</h3>
                @can('rumah-sakit-create')
                    <a class="modal-effect btn btn-primary ms-auto" onClick="add()" href="javascript:void(0)">Tambah Rumah Sakit</a>
                @endcan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered text-nowrap border-bottom">
                        <thead>
                            <tr>
                                <th class="border-bottom-0">No</th>
                                <th class="border-bottom-0">Klinik</th>
                                <th class="border-bottom-0">Rumah Sakit</th>
                                <th class="border-bottom-0">Alamat</th>
                                <th class="border-bottom-0">Telepon</th>
                                <th class="border-bottom-0">Jarak</th>
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
                        <label class="col-md-3 form-label nama">Rumah Sakit</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="rs" name="rs">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-3 form-label nama">Alamat</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="alamat" name="alamat">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-3 form-label">Provinsi</label>
                        <div class="col-md-9">
                            <select class="form-control form-select" name="id_provinsi" id="id_provinsi">
                                <option>==Pilih Provinsi==</option>
                                @foreach ($provinsi as $p)
                                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-3 form-label">Kota/Kabupaten</label>
                        <div class="col-md-9">
                            <select class="form-control form-select" name="id_kota" id="id_kota">
                                <option>==Pilih Kota/Kabupaten==</option>
                                @foreach ($kota as $k)
                                    <option value="{{ $k->id }}">{{ $k->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-3 form-label nama">Telepon</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="tlf" name="tlf">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-3 form-label nama">Jarak</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="jarak" name="jarak">
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
            ajax: '{{ route('rumah_sakit.list') }}',
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'nama_klinik', name: 'nama_klinik'},
                {data: 'rs', name: 'rs'},
                {data: "alamat",
                    render: function ( data, type, row ) {
                        return row.alamat + ',<br>' + row.nama_kota + ',<br>' + row.nama_provinsi;
                    }
                },
                {data: 'tlf', name: 'tlf'},
                {data: 'jarak', name: 'jarak'},
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: true, 
                    searchable: true
                },
            ]
        });

        $('#id_provinsi').on('change', function(){
            let id_provinsi = $('#id_provinsi').val();

            $.ajax({
                type: 'POST',
                url: '{{ route('getKota') }}',
                data: {id_provinsi:id_provinsi},
                cache: false,
                success: function(data){
                    $('#id_kota').html(data);
                }
            })
        });
    });

    function add(){
        $('#form').trigger("reset");
        $('.modal-title').html("Tambah Rumah Sakit");
        $('#modal').modal('show');
        $('#id').val('');
    }

    function edit(id){
        $.ajax({
            type:"POST",
            url: '{{ route('rumah_sakit.edit') }}',
            data: { id: id },
            dataType: 'json',
            success: function(data){
                $('.modal-title').html("Edit Rumah Sakit");
                $('#modal').modal('show');
                $('#id').val(data.id);
                $('#id_klinik').val(data.id_klinik);
                $('#rs').val(data.rs);
                $('#alamat').val(data.alamat);
                $('#id_provinsi').val(data.id_provinsi);
                $('#id_kota').val(data.id_kota);
                $('#tlf').val(data.tlf);
                $('#jarak').val(data.jarak);
            }
        });
    }

    $('#form').submit(function(e) {
        e.preventDefault();
        $("#btn-save"). attr("disabled", true);
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: '{{ route('rumah_sakit.store') }}',
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#modal").modal('hide');
                $.growl.notice({
                    message: "Berhasil menambahkan rumah sakit."
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
        if (confirm("Hapus rumah sakit ini?") == true) {
            var id = id;
            $.ajax({
                type:"POST",
                url: "{{ url('rumah_sakit/delete') }}",
                data: { id: id },
                dataType: 'json',
                success: function(res){
                    $('#datatable').dataTable().fnDraw(false);
                    $.growl.notice({
                        message: "Rumah sakit berhasil dihapus."
                    });
                }
            });
        }
    }
</script>
@endsection