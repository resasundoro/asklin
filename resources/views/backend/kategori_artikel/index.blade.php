@extends('layouts.backend.main')

@section('breadcrumb')
    Kategori Artikel
@endsection

@section('content')
<!-- Row -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Data Kategori Artikel</h3>
                @can('kategori-artikel-create')
                    <a class="modal-effect btn btn-primary ms-auto" onClick="add()" href="javascript:void(0)">Tambah Kategori</a>
                @endcan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered text-nowrap border-bottom">
                        <thead>
                            <tr>
                                <th class="border-bottom-0">No</th>
                                <th class="border-bottom-0">Kategori</th>
                                <th class="border-bottom-0">Slug</th>
                                <th class="border-bottom-0">Keywords</th>
                                <th class="border-bottom-0">Meta Description</th>
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
                        <label class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Keywords</label>
                        <input type="text" class="form-control" id="keywords" name="keywords">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Meta Description</label>
                        <input type="text" class="form-control" id="meta_desc" name="meta_desc">
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
            ajax: '{{ route('kategori_artikel.list') }}',
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'slug', name: 'slug'},
                {data: 'keywords', name: 'keywords'},
                {data: 'meta_desc', name: 'meta_desc'},
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
        $('.modal-title').html("Tambah Kategori");
        $('#modal').modal('show');
        $('#id').val('');
    }

    function edit(id){
        $.ajax({
            type:"POST",
            url: '{{ route('kategori_artikel.edit') }}',
            data: { id: id },
            dataType: 'json',
            success: function(data){
                $('.modal-title').html("Edit Kategori");
                $('#modal').modal('show');
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#slug').val(data.slug);
                $('#keywords').val(data.keywords);
                $('#meta_desc').val(data.meta_desc);
            }
        });
    }

    $('#form').submit(function(e) {
        e.preventDefault();
        $("#btn-save"). attr("disabled", true);
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: '{{ route('kategori_artikel.store') }}',
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#modal").modal('hide');
                $.growl.notice({
                    message: "Berhasil menambahkan kategori."
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
        if (confirm("Hapus kategori ini?") == true) {
            var id = id;
            $.ajax({
                type:"POST",
                url: "{{ url('kategori_artikel/delete') }}",
                data: { id: id },
                dataType: 'json',
                success: function(res){
                    $('#datatable').dataTable().fnDraw(false);
                    $.growl.notice({
                        message: "Kategori berhasil dihapus."
                    });
                }
            });
        }
    }
</script>
@endsection