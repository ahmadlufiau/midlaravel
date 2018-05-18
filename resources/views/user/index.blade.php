@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Kategori</div>
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                        <button type="submit" class="btn btn-info">Simpan</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                        </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                            <thead align="center">
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $items)
                                <tr>
                                    <td>{{ $items->name }}</td>
                                    <td>{{ $items->email }}</td>
                                    <td>
                                    <form action="{{ route('user.destroy', $items->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <a type="submit"  class="btn btn-primary" href="{{ route('user.edit',$items->id) }}">Edit</a>
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