<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Bahan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Data Bahan</h1>
            </div>
        </div>
    </div>
    
    <div class="container">
      
      <a href="/tambahbahan" class="btn btn-success">Tambah +</a>
        <div class="row mt-3">
          @if($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
              {{ $message }}
            </div>
          @endif
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
                      @foreach ($data as $row)
                      
                      <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $row->nama }}</td>
                        <td>
                          <img src="fotobahan/{{ $row->foto }}" alt="" style="width: 70px">
                        </td>
                        <td>{{ $row->masuk }}</td>
                        <td>{{ $row->keluar }}</td>
                        <td>{{ $row->stok }}</td>
                        <td>{{ $row->created_at->format('D M Y') }}</td>
                        <td>
                          <a href="/tampilkandata/{{ $row->id }}" class="btn btn-warning">Edit</a>
                          <a href="/delete/{{ $row->id }}" class="btn btn-danger">Hapus</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>