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
            ajax: '{{ route('klinik.list') }}',
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'no_peserta', name: 'no_peserta'},
                {data: 'nama_klinik',
                    render: function ( data, type, row ) {
                        return row.nama_klinik + '<br>(' + row.jenis_klinik + ')';
                    }
                },
                {data: 'nama_pemilik', name: 'nama_pemilik'},
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
                { orderable: false, targets: [0,6,7] }
            ],
            order: [[6, 'desc']],
            buttons:
            [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
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
</script>
@endsection