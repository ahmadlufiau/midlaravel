@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row col-md-12" style="padding-bottom:12px">
		<a href="{{ url('pengeluaran/create') }}" class="btn btn-info">Tambah Pengeluaran</a>
	</div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Pengeluaran</div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                            <thead align="center">
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                    <th>Kategori</th>
                                    <th>User</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $items)
                                <tr>
                                    <td>{{ $items->tanggal }}</td>
                                    <td>{{ $items->nama }}</td>
                                    <td>{{ $items->jumlah }}</td>
                                    <td>{{ $items->namacat }}</td>
                                    <td>{{ $items->namauser }}</td>
                                    <td>
                                    <form action="{{ route('pengeluaran.destroy', $items->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <a type="submit"  class="btn btn-primary" href="{{ route('pengeluaran.edit',$items->id) }}">Edit</a>
                                        <button type="submit"  class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection