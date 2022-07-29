<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal{{ $i }}">
    <i class="fa fa-trash"></i>
</button>
<div class="modal fade" id="myModal{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
	<h4 class="modal-title" id="myModalLabel">Hapus data</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

</div>
<div class="modal-body">

    <p class="alert alert-danger">Yakin ingin menghapus data ini?</p>

</div>
<div class="modal-footer">


    <a href="{{ asset('admin/produk/delete_gambar_produk/'.$gambar_produks->id_gambar_produk.'/'.$gambar_produks->id_produk) }}" class="btn btn-danger">
    <i class="fa fa-trash"></i> &nbsp;Hapus</a>

    <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>

</div>
</div>
</div>
</div>
