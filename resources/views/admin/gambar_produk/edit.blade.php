<p class="text-right">
  <a href="{{  asset('admin/produk/gambar_produk/'.$gambar->id_produk) }}"
  class="btn btn-success btn-sm" ><i class="fa fa-backward"></i> Kembali</a>
</p>
<hr>


<form action="{{ asset('admin/produk/edit_gambar_produk') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}

<input type="hidden" name="id_produk" value="{{  $gambar->id_produk }}">
<input type="hidden" name="id_gambar_produk" value="{{  $gambar->id_gambar_produk }}">
<div class=" form-group">
	<label class="col-md-3">Gambar produk <span class="text-danger">*</span></label>
    <br><div class="col-md-9"><img src="{{ asset('public/upload/image/thumbs/'.$gambar->gambar) }}" width="180" class="img img-responsive"></div><br>
	<div class="col-md-9">
		<input type="file" name="gambar" class="form-control" placeholder="Gambar" rquired>
	</div>
    
</div>

<div class=" form-group">
	<label class="col-md-3">Judul gambar</label>
	<div class="col-md-9">
		<input type="text" name="nama_gambar_produk" class="form-control" placeholder="Judul gambar" value="{{  $gambar->nama_gambar_produk }}">
	</div>
</div>

<div class=" form-group">
	<label class="col-md-3">Urutan Gambar</label>
	<div class="col-md-9">
        <input type="number" name="urutan" class="form-control" placeholder="Urutan gambar" value="{{  $gambar->urutan }}">
	</div>
</div>

<div class=" form-group">
	<label class="col-md-3">Keterangan gambar</label>
	<div class="col-md-9">
		<textarea name="keterangan"  class="form-control" placeholder="Keterangan" >{{  $gambar->keterangan }}</textarea>
	</div>
</div>

<div class=" form-group">
	<label class="col-md-3"></label>
	<div class="col-md-9">
		<div class="form-group">
			<input type="submit" name="submit" class="btn btn-primary " value="Simpan Data">
			<input type="reset" name="reset" class="btn btn-success " value="Reset">
			<button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
		</div>
	</div>
</div>

</form>

