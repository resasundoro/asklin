<div class="btn-group align-top">
    @can('m-fasilitas-klinik-edit')
        <button class="btn btn-sm btn-primary badge" type="button" onClick="edit({{ $id }})">Edit</button>
    @endcan
    @can('m-fasilitas-klinik-delete')
        <button class="btn btn-sm btn-primary badge" type="button" onClick="deleteu({{ $id }})"><i class="fa fa-trash"></i></button>
    @endcan
</div>