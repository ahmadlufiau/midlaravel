@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">User</div>
                <div class="card-body">
                    @foreach($data as $datas)
                    <form action="{{ route('user.update', $datas->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="name" class="form-control" value="{{ $datas->name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $datas->email }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                        <button type="submit" class="btn btn-info">Simpan</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                        </div>
                        </div>
                    </form>
                    @endforeach
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection