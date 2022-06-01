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
                <div class="modal-body" id="persyaratan">
                    <div class="form-group">
                        <label class="form-label">Status Dokumen</label>
                        <select class="form-control form-select" name="status" id="status">
                            <option value="0" readonly="readonly">Pending</option>
                            <option value="1">Gagal</option>
                            <option value="2">Terverifikasi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Catatan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
                    </div>
                </div>
                <div class="modal-body" id="status_klinik">
                    <div class="form-group">
                        <label class="form-label">Status Pendaftaran</label>
                        <select class="form-control form-select" name="status1" id="status1">
                            <option value="0" readonly="readonly">Pending</option>
                            <option value="1">Waiting</option>
                            <option value="2">Progress</option>
                            <option value="3">Draft</option>
                            <option value="4">Waiting Approval</option>
                            <option value="5">Approved</option>
                            <option value="6">Waiting Payment</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="btn-save" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('js')
<script>
    $(function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    var save_method;

    function status(id){
        save_method = "klinik";
        $.ajax({
            type:"POST",
            url: '{{ route('klinik.edit') }}',
            data: { id: id },
            dataType: 'json',
            success: function(data){
                $('#persyaratan').hide();
                $('#status_klinik').show();
                $('.modal-title').html("Edit Status Pendaftaran");
                $('#modal').modal('show');
                $('#id').val(data.id);
                $('#status1').val(data.status);
            }
        });
    }

    function persyaratan(id){
        save_method = "persyaratan";
        $.ajax({
            type:"POST",
            url: '{{ route('persyaratan.edit') }}',
            data: { id: id },
            dataType: 'json',
            success: function(data){
                $('#persyaratan').show();
                $('#status_klinik').hide();
                $('.modal-title').html("Edit Status Persyaratan");
                $('#modal').modal('show');
                $('#id').val(data.id);
                $('#status').val(data.status);
                $('#keterangan').val(data.keterangan);
            }
        });
    }

    $('#form').submit(function(e) {
        var url;
        if(save_method == 'klinik'){
            url = '{{ route('klinik.update') }}';
        } else if(save_method == 'persyaratan'){
            url = '{{ route('persyaratan.update') }}';
        }

        e.preventDefault();
        $("#btn-save"). attr("disabled", true);
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: url,
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#modal").modal('hide');
                $.growl.notice({
                    message: "Berhasil memperbarui persyaratan."
                });
                $("#btn-save").html('Submit');
                $("#btn-save"). attr("disabled", false);
                location.reload();
            },
            error: function(data){
                $.growl.error({
                    message: "please check Your details..."
                });
                $("#btn-save"). attr("disabled", false);
            }
        });
    });
</script>
@endsection