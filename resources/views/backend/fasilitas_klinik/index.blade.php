@extends('layouts.backend.main')

@section('breadcrumb')
    Fasilitas Klinik
@endsection

@section('content')
<!-- Row -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Data Fasilitas Klinik</h3>
                @can('m-fasilitas-klinik-create')
                    <a class="modal-effect btn btn-primary ms-auto" onClick="add()" href="javascript:void(0)">Tambah Fasilitas</a>
                @endcan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered text-nowrap border-bottom">
                        <thead>
                            <tr>
                                <th class="border-bottom-0">No</th>
                                <th class="border-bottom-0">Fasilitas</th>
                                <th class="border-bottom-0">Dibuat</th>
                                <th class="border-bottom-0">Diperbarui</th>
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
                    <div class="form-group">
                        <label class="form-label">Nama Fasilitas</label>
                        <input type="text" class="form-control" placeholder="Nama fasilitas klinik" id="fasilitas" name="fasilitas">
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
            ajax: '{{ route('fasilitas_klinik.list') }}',
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'fasilitas', name: 'fasilitas'},
                {data: "created_by",
                    render: function ( data, type, row ) {
                        return row.nama1 + '<br>(' + row.created_at + ')';
                    }
                },
                {data: "updated_by",
                    render: function ( data, type, row ) {
                        return row.nama2 + '<br>(' + row.updated_at + ')';
                    }
                },
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
        $('.modal-title').html("Tambah Fasilitas");
        $('#modal').modal('show');
        $('#id').val('');
    }

    function edit(id){
        $.ajax({
            type:"POST",
            url: '{{ route('fasilitas_klinik.edit') }}',
            data: { id: id },
            dataType: 'json',
            success: function(data){
                $('.modal-title').html("Edit Fasilitas");
                $('#modal').modal('show');
                $('#id').val(data.id);
                $('#fasilitas').val(data.fasilitas);
            }
        });
    }

    $('#form').submit(function(e) {
        e.preventDefault();
        $("#btn-save"). attr("disabled", true);
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: '{{ route('fasilitas_klinik.store') }}',
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#modal").modal('hide');
                $.growl.notice({
                    message: "Berhasil menambahkan fasilitas."
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
        if (confirm("Hapus fasilitas klinik ini?") == true) {
            var id = id;
            $.ajax({
                type:"POST",
                url: "{{ url('fasilitas_klinik/delete') }}",
                data: { id: id },
                dataType: 'json',
                success: function(res){
                    $('#datatable').dataTable().fnDraw(false);
                    $.growl.notice({
                        message: "Fasilitas berhasil dihapus."
                    });
                }
            });
        }
    }
</script>
@endsection