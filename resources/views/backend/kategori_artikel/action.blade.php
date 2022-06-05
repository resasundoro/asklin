<div class="btn-group align-top">
    @can('kategori-artikel-edit')
        <button class="btn btn-sm btn-primary badge" type="button" onClick="edit({{ $id }})">Edit</button>
    @endcan
    @can('kategori-artikel-delete')
        <button class="btn btn-sm btn-primary badge" type="button" onClick="deleteu({{ $id }})"><i class="fa fa-trash"></i></button>
    @endcan
</div>