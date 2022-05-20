<div class="btn-group align-top">
    @can('klinik-list')
        <button class="btn btn-sm btn-secondary badge" type="button" onClick="lihat({{ $id }})">Lihat</button>
    @endcan
    @can('klinik-edit')
        <a href="{{ route('klinik.edit', $id) }}" class="btn btn-sm btn-primary badge" type="button">Edit</a>
    @endcan
    @can('klinik-delete')
        <button class="btn btn-sm btn-danger badge" type="button" onClick="deleteu({{ $id }})"><i class="fa fa-trash"></i></button>
    @endcan
</div>