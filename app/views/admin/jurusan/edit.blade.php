{{ Form::model($jurusan, ['route' => ['admin.jurusan.update', $jurusan->id], 'class' => 'form-horizontal', 'method'=>'PATCH', 'onsubmit'=>'pesanTunggu()']) }}
<div class="modal-body">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-left" for="form-field-1-1"> Nama : </label>

		<div class="col-sm-9">
		<input type="text" required name="nama_jurusan" placeholder="Nama Jurusan" class="form-control" value="{{ $jurusan->nama_jurusan }}" />
		</div>
	</div>
</div>

<div class="modal-footer">
	<button class="btn btn-sm btn-primary" type="submit">
		<i class="ace-icon fa fa-save"></i>
		Simpan
	</button>
	<button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
		<i class="ace-icon fa fa-times"></i>
		Batal
	</button>
</div>
{{ Form::close() }}