@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Category</div>
                <div class="card-body">
                    {!! Form::open(['route' => 'category.store', 'role' => 'form']) !!}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class=" form-control-label">Name Category</label>
                                {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'Name Category']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Save</button>
                                <button type="reset" class="btn btn-danger">Cancel</button>
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
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->nama }}</td>
                                    <td>
                                        <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <a href="category/{{ $category->id }}/spending" class=" btn btn-warning">View Spending</a>
                                        <a class="btn btn-info" href="{{ route('category.edit',$category->id) }}">Edit</a>
                                        <button type="submit"  class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                    <div class="text-center">
                    <nav>
                        {{ $categories->render() }}
                    </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection