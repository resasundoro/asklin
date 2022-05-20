<div class="btn-group align-top">
    @can('role-edit')
        <a href="{{ route('roles.edit', $id) }}" class="btn btn-sm btn-primary badge" type="button">Edit</a>
    @endcan
    @can('role-delete')
        <button class="btn btn-sm btn-primary badge" type="button" onClick="deleteu({{ $id }})"><i class="fa fa-trash"></i></button>
    @endcan
</div>