@extends('layouts.backend.main')

@section('breadcrumb')
    Artikel
@endsection

@section('content')
<!-- Row -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Data Artikel</h3>
                @can('artikel-create')
                    <a class="modal-effect btn btn-primary ms-auto" onClick="add()" href="javascript:void(0)">Tambah Artikel</a>
                @endcan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered text-nowrap border-bottom">
                        <thead>
                            <tr>
                                <th class="border-bottom-0">No</th>
                                <th class="border-bottom-0">Cover</th>
                                <th class="border-bottom-0">Title</th>
                                <th class="border-bottom-0">Kategori</th>
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
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button class="btn-close me-1" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form action="javascript:void(0)" id="form" name="form" class="form-horizontal" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Thumbnail</label>
                            <input type="file" class="form-control" id="cover" name="cover">
                        </div>
                        <div class="form-group col-md-6">
                            <img src="" id="setcover" style="max-width: 300px">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">Kategori</label>
                            <select name="id_kategori" id="id_kategori" class="form-control">
                                <option value="" disabled selected>Pilih Kategori</option>
                                @foreach ($kategori as $k)
                                    <option value="{{ $k->id }}">{{ $k->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">Tags</label>
                            <select name="id_tags[]" id="id_tags" class="form-control" multiple>
                                <option value="" disabled selected>Pilih Tags</option>
                                @foreach ($tags as $t)
                                    <option value="{{ $t->id }}">{{ $t->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Konten</label>
                        <textarea class="form-control" id="desc" name="desc" cols="30" rows="10"></textarea>
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

<!-- CKEDITOR -->
<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>

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
            ajax: '{{ route('artikel.list') }}',
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: "cover",
                    render: function ( data, type, row ) {
                        return "<img src='{{ asset('images/blog') }}" + "/" + row.cover + "' height='50'>";
                    }
                },
                {data: 'title', name: 'title'},
                {data: 'nm_kategori', name: 'nm_kategori'},
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

    CKEDITOR.replace( 'desc' );

    function add(){
        $('#form').trigger("reset");
        $('#setcover').hide();
        $('.modal-title').html("Tambah Artikel");
        $('#modal').modal('show');
        $('#id').val('');
        CKEDITOR.instances['desc'].setData();
    }

    function edit(id){
        $.ajax({
            type:"POST",
            url: '{{ route('artikel.edit') }}',
            data: { id: id },
            dataType: 'json',
            success: function(data){
                $('#setcover').show();
                $('.modal-title').html("Edit Artikel");
                $('#modal').modal('show');
                $('#id').val(data.id);
                $('#id_kategori').val(data.id_kategori);
                $('#id_tags').val(data.id_tags);
                $('#setcover').attr({src: "{{ asset('images/blog') }}" +"/" +data.cover});
                $('#title').val(data.title);
                $('#slug').val(data.slug);
                $('#desc').val(data.desc);
                $('#keywords').val(data.keywords);
                $('#meta_desc').val(data.meta_desc);
                CKEDITOR.instances['desc'].setData(desc);
            }
        });
    }

    $('#form').submit(function(e) {
        e.preventDefault();
        $("#btn-save"). attr("disabled", true);
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: '{{ route('artikel.store') }}',
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#modal").modal('hide');
                $.growl.notice({
                    message: "Berhasil menambahkan artikel."
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
        if (confirm("Hapus artikel ini?") == true) {
            var id = id;
            $.ajax({
                type:"POST",
                url: "{{ url('artikel/delete') }}",
                data: { id: id },
                dataType: 'json',
                success: function(res){
                    $('#datatable').dataTable().fnDraw(false);
                    $.growl.notice({
                        message: "Artikel berhasil dihapus."
                    });
                }
            });
        }
    }
</script>
@endsection