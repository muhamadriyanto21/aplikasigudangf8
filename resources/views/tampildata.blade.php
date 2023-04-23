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
        <div class="row mt-3">
            <div class="col-12">
                <h1 class="text-center">Edit Data Bahan</h1>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row mt-3 justify-content-center">
            <div class="col-8">
              <div class="card">
                <div class="card-body">
                  <form action="/updatedata/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nama Bahan</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="nama" aria-describedby="emailHelp" value="{{ $data->nama }}">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Masuk</label>
                      <input type="number" name="masuk" class="form-control" id="exampleInputPassword1" value="{{ $data->masuk }}">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Keluar</label>
                      <input type="number" name="keluar" class="form-control" id="exampleInputPassword1" value="{{ $data->keluar }}">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Stok</label>
                      <input type="number" name="stok" class="form-control" id="exampleInputPassword1" value="{{ $data->stok }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah +</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>