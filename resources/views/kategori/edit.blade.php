@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Kategori</div>
                <div class="card-body">
                    {!! Form::model($kategori, ['route' => ['kategori.update', 'id' => $kategori->id] , 'method'=>'PUT','role' => 'form']) !!}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class=" form-control-label">Nama Kategori</label>
                                {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'Name Kategori']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Update</button>
                                <button type="reset" class="btn btn-danger">Batal</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection