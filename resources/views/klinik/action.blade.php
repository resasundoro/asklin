<div class="btn-group align-top">
    @can('klinik-list')
        <a href="{{ route('klinik.show', $id) }}" class="btn btn-sm btn-secondary badge" target="_blank">Detail Klinik</a>
    @endcan
    @can('klinik-delete')
        <button class="btn btn-sm btn-danger badge" type="button" onClick="deleteu({{ $id }})"><i class="fa fa-trash"></i></button>
    @endcan
</div>