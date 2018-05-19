@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row col-md-12" style="padding-bottom:12px">
		<a href="{{ route('kategori.pengeluaran.create', $kategori) }}" class="btn btn-info">Tambah Pengeluaran</a>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
                <div class="card-header">Data Pengeluaran {{ $kategori->nama }} </div>
				<div class="card-body">
					<table class="table table-stripped table-hover">
						<thead>
                            <th>Tanggal</th>
                            <th>Nama</th>
							<th>Jumlah</th>
							<th>Options</th>
						</thead>
						<tbody>
							@foreach($kategori->pengeluaran as $items)
							<tr>
                                <td>{{ $items->tanggal }}</td>
                                <td>{{ $items->nama }}</td>
								<td>{{ $items->jumlah}}</td>
								<td>
									{!! Form::open(['method' => 'DELETE', 'route' => ['kategori.pengeluaran.destroy', $kategori, $items]]) !!}
										{!! link_to_route('kategori.pengeluaran.edit', 'Edit', [$kategori, $items], ['class'=>'btn btn-info']) !!}
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