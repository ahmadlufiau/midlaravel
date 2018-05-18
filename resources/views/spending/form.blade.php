<div class="col-md-12">
<div class="col-md-6">
	<div class="form-group">
	    <label class=" form-control-label">Tanggal</label>
	    {!! Form::date('tanggal', null, ['class' => 'form-control']) !!}
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
	    <label class=" form-control-label">Nama</label>
	    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
	    <label class=" form-control-label">Jumlah</label>
	    {!! Form::text('jumlah', null, ['class' => 'form-control']) !!}
	</div>
</div>
{{-- Cara category_id dengan hidden form --}}
{{-- <div class="col-md-6">
	<div class="form-group">
	    <label class=" form-control-label">Jumlah</label>
	    {!! Form::hidden('category_id', $category->id, ['class' => 'form-control']) !!}
	</div>
</div> --}}
</div>