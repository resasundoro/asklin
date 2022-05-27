@extends('layouts.backend.main')

@section('breadcrumb')
   Persyaratan Izin
@endsection

@section('content')
<!-- Row -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Data Dokumen</h3>
                @can('persyaratan-create')
                    <a class="modal-effect btn btn-primary ms-auto" onClick="add()" href="javascript:void(0)">Tambah Dokumen</a>
                @endcan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered text-nowrap border-bottom">
                        <thead>
                            <tr>
                                <th class="border-bottom-0">No</th>
                                <th class="border-bottom-0">Klinik</th>
                                <th class="border-bottom-0">Kategori</th>
                                <th class="border-bottom-0">Dokumen</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Keterangan</th>
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
                        <label class="col-md-3 form-label">Kategori</label>
                        <div class="col-md-9">
                            <select class="form-control form-select" name="id_persyaratan" id="id_persyaratan">
                                <option>==Pilih Kategori==</option>
                                @foreach ($MPS as $i)
                                    <option value="{{ $i->id }}">{{ $i->kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3 grup13">
                        <label class="col-md-3 form-label">Upload Dokumen</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control" id="dokumen" name="dokumen">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-3 form-label">Status</label>
                        <div class="col-md-9">
                            <select class="form-control form-select" name="status" id="status">
                                <option>==Pilih Status==</option>
                                <option value="0">Pending</option>
                                <option value="1">Gagal</option>
                                <option value="2">Selesai</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3 grup13">
                        <label class="col-md-3 form-label">Keterangan</label>
                        <div class="col-md-9">
                            <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
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
            ajax: '{{ route('persyaratan.list') }}',
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'nama_klinik', name: 'nama_klinik'},
                {data: 'kategori', name: 'kategori'},
                {
                    data: "dokumen",
                    "render": function (data, type, row) {
                        return "<img src=\"/images/klinik/syarat/" + row.dokumen + "\" height=\"50\"/>";
                    },
                },
                {data: 'status', name: 'status'},
                {data: 'keterangan', name: 'keterangan'},
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
        $('.modal-title').html("Tambah Dokumen");
        $('#modal').modal('show');
        $('#id').val('');
    }

    function edit(id){
        $.ajax({
            type:"POST",
            url: '{{ route('persyaratan.edit') }}',
            data: { id: id },
            dataType: 'json',
            success: function(data){
                $('.modal-title').html("Edit Dokumen");
                $('#modal').modal('show');
                $('#id').val(data.id);
                $('#id_klinik').val(data.id_klinik);
                $('#id_persyaratan').val(data.id_persyaratan);
                $('#dokumen').val(data.dokumen);
                $('#status').val(data.status);
                $('#keterangan').val(data.keterangan);
            }
        });
    }

    $('#form').submit(function(e) {
        e.preventDefault();
        $("#btn-save"). attr("disabled", true);
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: '{{ route('persyaratan.store') }}',
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#modal").modal('hide');
                $.growl.notice({
                    message: "Berhasil menambahkan dokumen klinik."
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
        if (confirm("Hapus dokumen ini?") == true) {
            var id = id;
            $.ajax({
                type:"POST",
                url: "{{ url('persyaratan/delete') }}",
                data: { id: id },
                dataType: 'json',
                success: function(res){
                    $('#datatable').dataTable().fnDraw(false);
                    $.growl.notice({
                        message: "Dokumen berhasil dihapus."
                    });
                }
            });
        }
    }
</script>
@endsection