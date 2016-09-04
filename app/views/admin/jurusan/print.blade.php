@extends('layouts.printapp')

@endsection

@section('content')
<section id="main-content" style="min-height: 640px">
  <section class="wrapper">
    <!-- page start-->
    <section class="panel">
      <header class="panel-heading">
        <b>Data Warga</b>
      </header>
      <div class="panel-body">
        <div >
          <div class="space15"></div>
          <table border="2px">
            <thead>
              <tr>
                <td align="center"><b>No Identitas</b></td>
                <td align="center"><b>No Identitas</b></td>
                <td align="center"><b>Nama</b></td>
                <td align="center"><b>Alamat</b></td>
                <td align="center"><b>Golongan Darah</b></td>
                <td align="center"><b>Status Pekerjaan</b></td>
                <td align="center"><b>Tanggal Lahir</b></td>
                <td align="center"><b>Tempat Lahir</b></td>
                <td align="center"><b>Jenis Kelamin</b></td>
                <!-- <td>
                  <select name="jenis_kelamin" required class="form-control">
                    <option value="">-Pilih Jenis Kelamin-</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </td> -->
              
              </tr>
            </thead>
            <tbody>
              <?php $i =1; ?>
              @foreach($jurusans as $jurusan)
                <tr class="">
                  <td align="center"><?php echo $i++ ?></td>
                  <td align="center">{{ $jurusan->no_ktp }}</td>
                  <td align="center">{{ $jurusan->nama_jurusan }}</td>
                  <td align="center">{{ $jurusan->alamat }}</td>
                  <td align="center">{{ $jurusan->golongan_darah }}</td>
                  <td align="center">{{ $jurusan->status_pekerjaan }}</td>
                  <td align="center">{{ $jurusan->tanggal_lahir }}</td>
                  <td align="center">{{ $jurusan->tempat_lahir }}</td>
                  <td align="center">{{ $jurusan->jenis_kelamin }}</td>
                </tr>
               @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <!-- page end-->
  </section>
</section>
<!--main content end-->

<!-- Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Tambah Jurusan</h4>
      </div>
      {{ Form::open(array('route' => 'admin.jurusan.store', 'class' => 'cmxform form-horizontal tasi-form', 'method' => 'POST', 'onsubmit' => 'pesanTunggu()')) }}
        <div class="modal-body">
          <div class="form-group ">
            <div class="col-lg-12">
              <input class="form-control" autofocus name="nama_jurusan" type="text" placeholder="Nama" required />
            </div><br>
            <div class="col-lg-12">
              <input class="form-control" autofocus name="no_ktp" type="text" placeholder="No KTP" required />
            </div><br>
            <div class="col-lg-12">
              <input class="form-control" autofocus name="status_pekerjaan" type="text" placeholder="Status Pekerjaan" required />
            </div><br>
            <div class="col-lg-12">
              <input class="form-control" autofocus name="golongan_darah" type="text" placeholder="Golongan Darah" required />
            </div><br>
            <div class="col-lg-12">
              <input class="form-control" autofocus name="alamat" type="text" placeholder="Alamat" required />
            </div><br>
            <div class="col-lg-12">
              <input class="form-control" autofocus name="tempat_lahir" type="text" placeholder="Tempat Lahir" required />
            </div><br>
            <div class="col-lg-12">
              <input class="form-control" autofocus name="tanggal_lahir" type="text" placeholder="Tanggal Lahir" required />
            </div><br>

            <div class="col-lg-12">
              <select name="jenis_kelamin" required class="form-control">
                <option value="">-Pilih Jenis Kelamin-</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div><br>
          </div>
        </div>
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn btn-default" type="button">Tutup</button>
          <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
      {{ Form::close() }}
    </div>
  </div>
</div>
<!-- modal -->

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Edit Jurusan</h4>
      </div>
      <div id="edit-form">

      </div>
    </div>
  </div>
</div>
<!-- modal -->

@endsection

@section('js')
  <script type="text/javascript">
  function confirmHapus(id,data) {
    bootbox.confirm("Hapus Jurusan '" + data + "' ?", function(result) {
      if(result) {
        pesanTunggu();
        document.getElementById('form-hapus-'+id).submit();
      }
    }); 
  }


  function editForm(alamat) {
    document.getElementById('edit-form').innerHTML = "";

    $.ajax({
      url: alamat ,
      success: function(msg) {
        $('#edit-form').html(msg);
      },
      dataType: "html"
      });
  }

  window.load = print_d();
    function print_d(){
      window.print();
    }
</script>
@endsection