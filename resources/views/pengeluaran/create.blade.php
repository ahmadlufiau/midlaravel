@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pengeluaran</div>
                <div class="card-body">
                    @if($edit == true)
                    {!! Form::model($data, ['method' => 'PUT', 'route' => ['kategori.pengeluaran.update', $kategori, $data]]) !!}
                    @else
                    {!! Form::model(null, ['route' => ['kategori.pengeluaran.store', $kategori], 'role' => 'form']) !!}
                    @endif
                    @include('pengeluaran.form')
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <button type="submit" class="btn btn-info btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Simpan
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Batal
                                </button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection