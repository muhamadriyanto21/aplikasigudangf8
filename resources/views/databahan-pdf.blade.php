<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Bahan</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> --}}
    <style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }
      
      #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
      }
      
      #customers tr:nth-child(even){background-color: #f2f2f2;}
      
      #customers tr:hover {background-color: #ddd;}
      
      #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
      }
      .gudang {
  float: left;
  width: 50%;
}

/* Clear floats after the columns */
/* .row:after {
  content: "";
  display: table;
  clear: both;
} */
     </style>

  </head>
  <body>
   <div class="container">
    <h1>Data Bahan Sentong F8</h1>

    <table id="customers">
      <tr>
        <th>No</th>
        <th>Nama Bahan</th>
        <th>Bahan Masuk</th>
        <th>Bahan Keluar</th>
        <th>Stok Bahan</th>
      </tr>
      @php
       $no = 1;   
      @endphp
      @foreach ($data as $row)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $row->nama }}</td>
            <td>{{ $row->masuk }}</td>
            <td>{{ $row->keluar }}</td>
            <td>{{ $row->stok }}</td>
        </tr>
      @endforeach
      
    </table>
    
   
   </div>
    <div class="row">
        <div class="gudang">
            <h3>Kepala Gudang</h3>
            <br><br>
            <h4>P.Andi</h4>
        </div>
        <div class="gudang">
            <h3 style="margin-left: 200px;">Admin</h3>
            <br><br>
            <h4 style="margin-left: 200px;">Bu Elok</h4>
        </div>
    </div>
</div>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> --}}
  </body>
</html>


