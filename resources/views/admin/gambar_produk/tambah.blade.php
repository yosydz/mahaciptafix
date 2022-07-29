<button class="btn btn-success " data-toggle="modal" data-target="#Tambah">
    <i class="fa fa-plus"></i> Upload Gambar Baru
</button>
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
	<h4 class="modal-title" id="myModalLabel">Tambah data?</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

</div>

<div class="modal-body">



{{-- // Form buka --}}
<form action="{{ asset('admin/produk/tambah_gambar_produk') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id_produk" value="{{  $produk->id_produk }}">

<div class="row form-group">
	<label class="col-md-3">Gambar produk <span class="text-danger">*</span></label>
	<div class="col-md-9">
		<input type="file" name="gambar" class="form-control" placeholder="Gambar" required>
	</div>
</div>

<div class="row form-group">
	<label class="col-md-3">Judul gambar</label>
	<div class="col-md-9">
		<input type="text" name="nama_gambar_produk" class="form-control" placeholder="Judul gambar" >
	</div>
</div>

<div class="row form-group">
	<label class="col-md-3">Urutan gambar</label>
	<div class="col-md-9">
		<input type="number" name="urutan" class="form-control" placeholder="Urutan" >
	</div>
</div>



<div class="row form-group">
	<label class="col-md-3">Keterangan gambar</label>
	<div class="col-md-9">
		<textarea name="keterangan"  class="form-control" placeholder="Keterangan" ></textarea>
	</div>
</div>

<div class="row form-group">
	<label class="col-md-3"></label>
	<div class="col-md-9">
		<div class="form-group text-right">
			<input type="submit" name="submit" class="btn btn-primary " value="Simpan Data">
			<input type="reset" name="reset" class="btn btn-success " value="Reset">
			<button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
		</div>
	</div>
</div>
<div class="clearfix"></div>

</form>

</div>

</div>
</div>
</div>
