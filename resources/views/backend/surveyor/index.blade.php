@extends('layouts.backend.main')

@section('breadcrumb')
    Surveyor
@endsection

@section('content')
<!-- Row -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Data Surveyor</h3>
                @can('surveyor-create')
                    <a class="modal-effect btn btn-primary ms-auto" onClick="add()" href="javascript:void(0)">Tambah Surveyor</a>
                @endcan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered text-nowrap border-bottom">
                        <thead>
                            <tr>
                                <th class="border-bottom-0">No</th>
                                <th class="border-bottom-0">Foto</th>
                                <th class="border-bottom-0">Nama</th>
                                <th class="border-bottom-0">Jabatan</th>
                                <th class="border-bottom-0">Alamat</th>
                                <th class="border-bottom-0">Email</th>
                                <th class="border-bottom-0">Telepon</th>
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
                        <label class="col-md-3 form-label">User</label>
                        <div class="col-md-9">
                            <select class="form-control form-select" name="id_user" id="id_user">
                                <option>==Pilih User==</option>
                                @foreach ($user as $u)
                                    <option value="{{ $u->id }}">{{ $u->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-3 form-label">Foto</label>
                        <div class="col-md-9">
                            <input type="file" name="foto" class="form-control" placeholder="Foto" name="foto" id="foto">
                            <img src="" width="60px" id="id_foto">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-3 form-label nama">Jabatan</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="jabatan" name="jabatan">
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
                        <label class="col-md-3 form-label">Kecamatan</label>
                        <div class="col-md-9">
                            <select class="form-control form-select" name="id_kecamatan" id="id_kecamatan">
                                <option>==Pilih Kecamatan==</option>
                                @foreach ($kecamatan as $k)
                                    <option value="{{ $k->id }}">{{ $k->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-3 form-label">Kelurahan/Desa</label>
                        <div class="col-md-9">
                            <select class="form-control form-select" name="id_kelurahan" id="id_kelurahan">
                                <option>==Pilih Kelurahan/Desa==</option>
                                @foreach ($kelurahan as $k)
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
            responsive: true,
            type: 'JSON',
            ajax: '{{ route('surveyor.list') }}',
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'foto', name: 'foto',
                    render: function( data, type, full, meta ) {
                        return "<img src=\"/images/surveyor/" + data + "\" height=\"50\"/>";
                    }
                },
                {data: 'name', name: 'name'},
                {data: 'jabatan', name: 'jabatan'},
                {data: "alamat",
                    render: function ( data, type, row ) {
                        return row.alamat + ',<br>' + row.nama_kelurahan + ',<br>' + row.nama_kecamatan+ ',<br>' + row.nama_kelurahan;
                    }
                },
                {data: 'email', name: 'email'},
                {data: 'tlf', name: 'tlf'},
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

        $('#id_kota').on('change', function(){
            let id_kota = $('#id_kota').val();

            $.ajax({
                type: 'POST',
                url: '{{ route('getKecamatan') }}',
                data: {id_kota:id_kota},
                cache: false,
                success: function(data){
                    $('#id_kecamatan').html(data);
                    $('#id_kelurahan').html();
                }
            })
        });

        $('#id_kecamatan').on('change', function(){
            let id_kecamatan = $('#id_kecamatan').val();

            $.ajax({
                type: 'POST',
                url: '{{ route('getKelurahan') }}',
                data: {id_kecamatan:id_kecamatan},
                cache: false,
                success: function(data){
                    $('#id_kelurahan').html(data);
                }
            })
        });
    });

    function add(){
        $('#form').trigger("reset");
        $('.modal-title').html("Tambah Surveyor");
        $('#modal').modal('show');
        $('#id').val('');
    }

    function edit(id){
        $.ajax({
            type:"POST",
            url: '{{ route('surveyor.edit') }}',
            data: { id: id },
            dataType: 'json',
            success: function(data){
                $('.modal-title').html("Edit Surveyor");
                $('#modal').modal('show');
                $('#id').val(data.id);
                $('#id_user').val(data.id_user);
                $('#id_foto').attr("src", "/images/surveyor/" + data.foto);
                $('#jabatan').val(data.jabatan);
                $('#alamat').val(data.alamat);
                $('#id_provinsi').val(data.id_provinsi);
                $('#id_kota').val(data.id_kota);
                $('#id_kecamatan').val(data.id_kecamatan);
                $('#id_kelurahan').val(data.id_kelurahan);
                $('#tlf').val(data.tlf);
            }
        });
    }

    $('#form').submit(function(e) {
        e.preventDefault();
        $("#btn-save"). attr("disabled", true);
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: '{{ route('surveyor.store') }}',
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#modal").modal('hide');
                $.growl.notice({
                    message: "Berhasil menambahkan surveyor."
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
        if (confirm("Hapus surveyor ini?") == true) {
            var id = id;
            $.ajax({
                type:"POST",
                url: "{{ url('surveyor/delete') }}",
                data: { id: id },
                dataType: 'json',
                success: function(res){
                    $('#datatable').dataTable().fnDraw(false);
                    $.growl.notice({
                        message: "Surveyor berhasil dihapus."
                    });
                }
            });
        }
    }
</script>
@endsection