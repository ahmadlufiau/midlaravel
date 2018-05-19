@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Kategori</div>
                <div class="card-body">
                    {!! Form::open(['route' => 'kategori.store', 'role' => 'form']) !!}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class=" form-control-label">Name Kategori</label>
                                {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'Nama Kategori']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Simpan</button>
                                <button type="reset" class="btn btn-danger">Batal</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori as $items)
                                <tr>
                                    <td>{{ $items->nama }}</td>
                                    <td>
                                        <form action="{{ route('kategori.destroy', $items->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <a href="{{ route('kategori.pengeluaran.index',$items->id) }}" class=" btn btn-warning">Lihat Pengeluaran</a>
                                        <a class="btn btn-info" href="{{ route('kategori.edit',$items->id) }}">Edit</a>
                                        <button type="submit"  class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                    <div class="text-center">
                    <nav>
                        {{ $kategori->render() }}
                    </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection