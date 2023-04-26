<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Bahan</title>
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    {{-- toast --}}
    
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row mt-2">
            <div class="col-12">
                <h1 class="text-center">Data Bahan</h1>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
      

      
        <div class="row mt-1">
            <div class="row mt-2 mb-2">
              <div class="col-auto ">
                <a href="/tambahbahan" class="btn btn-success">Tambah Data+</a>
              </div>
              <div class="col-auto">
                <form action="/pegawai" method="GET">
                  <input type="search" name="search" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock" placeholder="Cari Bahan...">
                </form>
              </div>
              <div class="col-auto ms-2">
                <a href="/exportpdf" class="btn btn-danger">Export PDF  <i class="fa-solid fa-file-pdf"></i></a>
              </div>
             
            </div>
          {{-- @if($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
              {{ $message }}
            </div>
          @endif --}}
            <div class="col-12">            
                <table class="table">
                    <thead>
                      <tr class="table-dark">
                        <th scope="col">No</th>
                        <th scope="col">Nama Bahan</th>
                        <th scope="col">Foto Bahan</th>
                        <th scope="col">Bahan Masuk</th>
                        <th scope="col">Bahan Keluar</th>
                        <th scope="col">Total Stok</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $no = 1;
                      @endphp
                      @foreach ($data as $index => $row)
                      
                      <tr>
                        <th scope="row">{{ $index + $data->firstItem() }}</th>
                        <td>{{ $row->nama }}</td>
                        <td>
                          <img src="fotobahan/{{ $row->foto }}" alt="" style="width: 70px">
                        </td>
                        <td>{{ $row->masuk }}</td>
                        <td>{{ $row->keluar }}</td>
                        <td>{{ $row->stok }}</td>
                        <td>{{ $row->created_at->format('D M Y') }}</td>
                        <td>
                          <a href="/tampilkandata/{{ $row->id }}" class="btn btn-primary">Edit  <i class="fa-solid fa-pen-to-square"></i></a>
                          <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}" data-masuk="{{ $row->masuk }}">Hapus  <i class="fa-solid fa-trash"></i></a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{ $data->links() }}
            </div>
        </div>
    </div>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.4.slim.js" integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>
    {{-- sweet alert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    {{-- toast --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

{{-- script delete --}}
    <script>
      $('.delete').click(function() {
        var bahanid = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');
        var masuk = $(this).attr('data-masuk');

        swal({
        title: "Apakah Kamu Yakin?",
        text: "Kamu akan menghapus data bahan dengan nama : " + nama + " Bahan Masuk : " + masuk +" ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location = "/delete/"+bahanid+""
          swal("Data Berhasil Dihapus", {
            icon: "success",
          });
        } else {
          swal("Data Tidak Jadi Dihapus");
        }
      });
      });
     </script>
     
     <script>
      @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
      @endif
      
     </script>
  </body>
</html>