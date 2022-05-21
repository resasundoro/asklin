@section('title')
    Pendaftaran Peserta
@endsection

@extends('layouts.frontend.main')

@section('content')
<table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($kliniks as $klinik)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $klinik->nama_klinik }}</td>
	        <td>
                <a class="btn btn-primary" href="{{ route('pendaftaran.edit',$klinik->id) }}">Edit</a>
	        </td>
	    </tr>
	    @endforeach
    </table>
    <div class="row text-center">
        {!! $kliniks->links() !!}
    </div>
@endsection