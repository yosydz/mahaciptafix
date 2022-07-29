<p class="text-right">
    <a href="{{ asset('admin/produk') }}" class="btn btn-info btn-sm">
<i class="fa fa-backward"></i> Kembali</a>
</p>
<hr>
<p>

@include('admin.gambar_produk.tambah')
</p>
{{-- {{ dd($produk) }} --}}

<div class="clearfix"><hr></div>
    <div class="table-responsive mailbox-messages">
      <table id="example1" class="display table table-bordered table-sm" cellspacing="0" width="100%">
<thead>
<tr>
    <th>No</th>
    <th>Gambar</th>
    <th>Judul gambar</th>
    <th>Keterangan</th>
    <th>Urutan</th>
    <th>Action</th>
</tr>
</thead>
<tbody>

<tr>
    <td>{{ 1 }}</td>
    <td>
    @if($produk->gambar != "")
    <img src="{{ asset('public/upload/image/thumbs/'.$produk->gambar) }}" width="60" class="img img-responsive">
    @else
     {{ 'Tidak ada'}}
    @endif
    </td>
    <td>{{ $produk->gambar }}</td>
    <td>{{ 'Gambar Preview' }}</td>
    <td>1</td>
    <td>

    </td>

</tr>

@php
    $i=2
@endphp
@foreach($gambar as $gambar_produks)

<tr class="odd gradeX">
    <td>{{ $i }}</td>
    <td>
    @if($gambar_produks->gambar != "")
    <img src="{{ asset('public/upload/image/thumbs/'.$gambar_produks->gambar) }}" width="60" class="img img-responsive">
    @else {{ 'Tidak ada' }}
    @endif
    </td>
    <td>{{ $gambar_produks->nama_gambar_produk }}</td>
    <td>{{ $gambar_produks->keterangan }}</td>
    <td>{{ $gambar_produks->urutan }}</td>
    <td class="text-center">
      <a href="{{ asset('admin/produk/gambar_produk_edit/'.$gambar_produks->id_gambar_produk) }}"
      class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
      @include('admin.gambar_produk.delete')
    </td>
</tr>

@php
    $i++
@endphp
@endforeach
</tbody>
</table>
</div>
