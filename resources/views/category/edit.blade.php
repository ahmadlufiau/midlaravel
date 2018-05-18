@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Category</div>
                <div class="card-body">
                    {!! Form::model($category, ['route' => ['category.update', 'id' => $category->id] , 'method'=>'PUT','role' => 'form']) !!}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class=" form-control-label">Name Category</label>
                                {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'Name Category']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Update</button>
                                <button type="reset" class="btn btn-danger">Cancel</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection