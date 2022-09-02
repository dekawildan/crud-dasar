<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form CRUD</title>
</head>
<body>
    <form method="post" action="{{route('crud.store')}}">
    @csrf
    @method('POST')
    Judul Buku : <input name="judul_buku" type="text" placeholder="Judul Buku..." required><br>
    Tanggal Terbit : <input name="tgl_terbit" type="date" required><br>
    Jumlah Stok : <input name="jumlah" type="number" required><br>
    <button type="submit">Simpan</button><br>
    </form>
    <p>
        @if(Session::has('pesan'))
            <div style="width:100%; color:darkgreen; background-color: lightgreen;">{{\Session::get('pesan')}}</div>
        @endif
    </p>
    <form method="post" action="{{url('cari')}}">
        @csrf
        @method('POST')
        Cari Buku : <input name="caridata" type="text" placeholder="Masukkan judul buku..." required>
        <button>Cari</button>
    </form>
    <table width="90%" style="border:1px solid black;" cellpadding="0" cellspacing="0" border="1">
        <tr>
            <th>NO</th>
            <th>JUDUL BUKU</th>
            <th>TANGGAL TERBIT</th>
            <th>JUMLAH STOK</th>
            <th>TINDAKAN</th>
        </tr>
        <?php $no=1;?>
        @foreach($lihatbuku as $tampil)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$tampil->judul_buku}}</td>
            <td>{{$tampil->tgl_terbit}}</td>
            <td>{{$tampil->jumlah}}</td>
            <td>
                <button type="button" id="edit{{$tampil->id_buku}}">Edit</button> 
                <button type="button" id="hapus{{$tampil->id_buku}}">Hapus</button>

                <div style="display:none; background-color: black; text-align:center; opacity:0.9; width:100%; height:100vh; margin:0; padding:0; left:0; bottom:0; float:left; position:fixed; z-index:999;" id="layoutedit{{$tampil->id_buku}}">
                    <div style="background-color:white; margin:6% 24% 6% 24%; padding:10px; opacity:2 !important; color:black; float:left; position:relative; width:50%; height:auto; text-align:left !important; z-index:999;">
                        <h2 align="center">Edit Data {{$tampil->judul_buku}}</h2>
                        <form method="post" action="{{route('crud.update', $tampil->id_buku)}}">
                             @csrf
                             @method('PUT')
                             <input type="hidden" name="id_buku" value="{{$tampil->id_buku}}">
                            Judul Buku : <input name="judul_buku" type="text" value="{{$tampil->judul_buku}}" placeholder="Judul Buku..." required><br>
                            Tanggal Terbit : <input name="tgl_terbit" type="date" value="{{$tampil->tgl_terbit}}" required><br>
                            Jumlah Stok : <input name="jumlah" type="number" value="{{$tampil->jumlah}}" required><br>
                            <button type="submit">Edit</button> <button type="button" id="btneditbatal{{$tampil->id_buku}}">Batal</button><br>
                            </form>
                    </div>
                </div>

                <div style="display:none; background-color: black; text-align:center; opacity:0.9; width:100%; height:100vh; margin:0; padding:0; left:0; bottom:0; float:left; position:fixed; z-index:999;" id="layouthapus{{$tampil->id_buku}}">
                    <div style="background-color:white; padding:10px; color:black; float:left; position:relative; width:50%; margin:6% 24% 6% 24%; opacity:2 !important; height:auto; text-align:left !important; z-index: index 999;">
                        <h2 align="center">Hapus Data {{$tampil->judul_buku}}</h2>
                        <form method="post" action="{{route('crud.destroy', $tampil->id_buku)}}">
                             @csrf
                             @method('DELETE')
                             <input type="hidden" name="id_buku" value="{{$tampil->id_buku}}">
                            <p>Yakin menghapus data ini ?</p>
                            <button type="submit">Ya</button> <button type="button" id="btnhapusbatal{{$tampil->id_buku}}">Batal</button><br>
                            </form>
                    </div>
                </div>

                <script>
                    document.querySelector("#edit{{$tampil->id_buku}}").addEventListener("click", function() {
                        document.querySelector("#layoutedit{{$tampil->id_buku}}").style.display="block";
                    });
                    document.querySelector("#btneditbatal{{$tampil->id_buku}}").addEventListener("click", function() {
                        document.querySelector("#layoutedit{{$tampil->id_buku}}").style.display="none";
                    });
                    document.querySelector("#hapus{{$tampil->id_buku}}").addEventListener("click", function() {
                        document.querySelector("#layouthapus{{$tampil->id_buku}}").style.display="block";
                    });
                    document.querySelector("#btnhapusbatal{{$tampil->id_buku}}").addEventListener("click", function() {
                        document.querySelector("#layouthapus{{$tampil->id_buku}}").style.display="none";
                    });
                </script>

            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>