<script>
    $(function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    var save_method;

    function PJ(){
        $('#form').trigger("reset");
        $('#sdm').show();
        $('#rs, #rk, #ps').hide();
        save_method = 'sdm';
        $('.modal-title').html("Tambah Penanggung Jawab");
        $('#modal').modal('show');
        $('#op1').show();
        $('#op2, #op3, #op4, #op5').hide();
        $('#id').val('');
        $('#id_klinik').val('{{ Auth::user()->id_klinik }}');
    }

    function TD(){
        $('#form').trigger("reset");
        $('#sdm').show();
        $('#rs, #rk, #ps').hide();
        save_method = 'sdm';
        $('.modal-title').html("Tambah Dokter Praktek");
        $('#modal').modal('show');
        $('#op2').show();
        $('#op1, #op3, #op4, #op5').hide();
        $('#id').val('');
        $('#id_klinik').val('{{ Auth::user()->id_klinik }}');
    }

    function TP(){
        $('#form').trigger("reset");
        $('#sdm').show();
        $('#rs, #rk, #ps').hide();
        save_method = 'sdm';
        $('.modal-title').html("Tambah Perawat");
        $('#modal').modal('show');
        $('#op3').show();
        $('#op1, #op2, #op4, #op5').hide();
        $('#id').val('');
        $('#id_klinik').val('{{ Auth::user()->id_klinik }}');
    }

    function TKL(){
        $('#form').trigger("reset");
        $('#sdm').show();
        $('#rs, #rk, #ps').hide();
        save_method = 'sdm';
        $('.modal-title').html("Tambah Tenaga Kesehatan Lain");
        $('#modal').modal('show');
        $('#op4').show();
        $('#op1, #op2, #op3, #op5').hide();
        $('#id').val('');
        $('#id_klinik').val('{{ Auth::user()->id_klinik }}');
    }

    function TSL(){
        $('#form').trigger("reset");
        $('#sdm').show();
        $('#rs, #rk, #ps').hide();
        save_method = 'sdm';
        $('.modal-title').html("Tambah SDM Lain");
        $('#modal').modal('show');
        $('#op5').show();
        $('#op1, #op2, #op3, #op4').hide();
        $('#id').val('');
        $('#id_klinik').val('{{ Auth::user()->id_klinik }}');
    }

    function RS(){
        $('#form').trigger("reset");
        $('#asuransi, .kontak, .kerjasama').hide();
        $('#rs, #jarak').show();
        $('.rs').html('Nama RS');
        $('#rs').show();
        $('#sdm, #rk, #ps').hide();
        save_method = 'rs';
        $('.modal-title').html("Tambah Rumah Sakit");
        $('#modal').modal('show');
        $('#id').val('');
        $('#id_klinik').val('{{ Auth::user()->id_klinik }}');
    }

    function ASURANSI(){
        $('#form').trigger("reset");
        $('#asuransi, .kontak, .kerjasama').show();
        $('#rs, #jarak').hide();
        $('.rs').html('Nama Perusahaan');
        $('#sdm, #rk, #ps').hide();
        $('#rs').show();
        save_method = 'ass';
        $('.modal-title').html("Tambah Asuransi");
        $('#modal').modal('show');
        $('#id').val('');
        $('#id_klinik').val('{{ Auth::user()->id_klinik }}');
    }

    function RK(){
        $('#form').trigger("reset");
        $('#sdm, #rs, #ps').hide();
        $('#rk').show();
        save_method = 'rk';
        $('.modal-title').html("Tambah Ruang Klinik");
        $('#modal').modal('show');
        $('#id').val('');
        $('#id_klinik').val('{{ Auth::user()->id_klinik }}');
    }

    function PS(){
        $('#form').trigger("reset");
        $('#sdm, #rs, #rk').hide();
        $('#ps').show();
        save_method = 'ps';
        $('.modal-title').html("Tambah Persyaratan Izin");
        $('#modal').modal('show');
        $('#id').val('');
        $('#id_klinik').val('{{ Auth::user()->id_klinik }}');
    }

    $('#form').submit(function(e) {
        var url;
        if(save_method == 'sdm'){
            url = '{{ route('karyawan.store') }}';
        } else if(save_method == 'rs'){
            url = '{{ route('rumah_sakit.store') }}';
        } else if(save_method == 'ass'){
            url = '{{ route('asuransi.store') }}';
        } else if(save_method == 'rk'){
            url = '{{ route('ruang_klinik.store') }}';
        } else if(save_method == 'ps'){
            url = '{{ route('persyaratan.store') }}';
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

    function deleteu(id){
        if (confirm("Hapus karyawan ini?") == true) {
            var id = id;
            $.ajax({
                type:"POST",
                url: "{{ url('karyawan/delete') }}",
                data: { id: id },
                dataType: 'json',
                success: function(res){
                    location.reload();
                    $.growl.notice({
                        message: "Karyawan berhasil dihapus."
                    });
                }
            });
        }
    }

    function deleters(id){
        if (confirm("Hapus rumah sakit ini?") == true) {
            var id = id;
            $.ajax({
                type:"POST",
                url: "{{ url('rumah_sakit/delete') }}",
                data: { id: id },
                dataType: 'json',
                success: function(res){
                    location.reload();
                    $.growl.notice({
                        message: "Rumah sakit berhasil dihapus."
                    });
                }
            });
        }
    }

    function deleterk(id){
        if (confirm("Hapus ruangan ini?") == true) {
            var id = id;
            $.ajax({
                type:"POST",
                url: "{{ url('ruang_klinik/delete') }}",
                data: { id: id },
                dataType: 'json',
                success: function(res){
                    location.reload();
                    $.growl.notice({
                        message: "Ruang berhasil dihapus."
                    });
                }
            });
        }
    }

    function deleteas(id){
        if (confirm("Hapus asuransi ini?") == true) {
            var id = id;
            $.ajax({
                type:"POST",
                url: "{{ url('asuransi/delete') }}",
                data: { id: id },
                dataType: 'json',
                success: function(res){
                    location.reload();
                    $.growl.notice({
                        message: "Asuransi berhasil dihapus."
                    });
                }
            });
        }
    }

    function deleteps(id){
        if (confirm("Hapus dokumen ini?") == true) {
            var id = id;
            $.ajax({
                type:"POST",
                url: "{{ url('persyaratan/delete') }}",
                data: { id: id },
                dataType: 'json',
                success: function(res){
                    location.reload();
                    $.growl.notice({
                        message: "Dokumen berhasil dihapus."
                    });
                }
            });
        }
    }

    $("#id_kategori").change(function() {
        if ($(this).val() == "0") {
            $('.grup1, .grup2, .grup3, .grup4, .grup5, .grup6, .grup7, .grup8, .grup9, .grup10, .grup11, .grup12, .grup13, .grup14').hide();
        } else if ($(this).val() == "1") {
            $('.grup1, .grup3, .grup5, .grup6, .grup7, .grup9, .grup13').show();
            $('.grup2, .grup4, .grup8, .grup10, .grup11, .grup12,  .grup14').hide();
            $('.nama').html('Nama Dokter');
            $('.npa_idi').html('NPA IDI');
            $('.no_sip').html('No. SIP');
        } else if ($(this).val() == "2") {
            $('.grup1, .grup3, .grup5, .grup6, .grup7, .grup9, .grup13').show();
            $('.grup2, .grup4, .grup8, .grup10, .grup11, .grup12, .grup14').hide();
            $('.nama').html('Nama Dokter');
            $('.npa_idi').html('NPA IDI/PDGI');
            $('.no_sip').html('No. SIP');
        } else if ($(this).val() == "3") {
            $('.grup1, .grup4, .grup5, .grup8, .grup10, .grup11, .grup13').show();
            $('.grup2, .grup3, .grup6, .grup7, .grup9, .grup12, .grup14').hide();
            $('.nama').html('Nama Lengkap');
        } else if ($(this).val() == "4") {
            $('.grup1, .grup2, .grup4, .grup5, .grup6, .grup8, .grup10, .grup13').show();
            $('.grup3, .grup7, .grup9, .grup11, .grup12, .grup14').hide();
            $('.nama').html('Nama Lengkap');
            $('.no_sib_sik').html('No. SIAA/SIK');
            $('.no_sip').html('No. SIPA');
            $('.ket_sib_sik').html('Keterangan SIPA/SIA/SIK')
        } else if ($(this).val() == "5") {
            $('.grup1,.grup11, .grup12, .grup14').show();
            $('.grup2,.grup4, .grup4, .grup5, .grup6, .grup7, .grup8, .grup9, .grup10, .grup13').hide();
            $('.nama').html('Nama Lengkap');
        }
    });
    $("#id_kategori").trigger("change");
</script>