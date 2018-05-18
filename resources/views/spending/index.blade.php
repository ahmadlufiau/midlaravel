@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row col-md-12" style="padding-bottom:12px">
		<a href="{{ route('category.spending.create', $category) }}" class="btn btn-info">Create Spending</a>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
                <div class="card-header">Data Spending</div>
				<div class="card-body">
					<table class="table table-stripped table-hover">
						<thead>
                            <th>Tanggal</th>
                            <th>Nama</th>
							<th>Jumlah</th>
							<th>Options</th>
						</thead>
						<tbody>
							@foreach($category->spendings as $spending)
							<tr>
                                <td>{{ $spending->tanggal }}</td>
                                <td>{{ $spending->nama }}</td>
								<td>{{ $spending->jumlah}}</td>
								<td>
									{!! Form::open(['method' => 'DELETE', 'route' => ['category.spending.destroy', $category, $spending]]) !!}
										{!! link_to_route('category.spending.edit', 'Edit', [$category, $spending], ['class'=>'btn btn-info']) !!}
										{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        			{!! Form::close() !!}
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