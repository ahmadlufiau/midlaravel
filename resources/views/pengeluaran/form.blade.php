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
<div class="col-md-6">
	<div class="form-group">
	    <label class=" form-control-label">Kategori</label>
	    {!! Form::select('category_id', $category,null, ['class' => 'form-control']) !!}
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
	    <label class=" form-control-label">User</label>
	    {!! Form::select('user_id', $user,null, ['class' => 'form-control']) !!}
	</div>
</div>
</div>