<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1>Preview Data Penerima Bantuan Sosial</h1>
        <table class="table table-bordered">
            <tr>
                <th>Nama</th>
                <td>{{ $data['nama']}}</td>
            </tr>
            <tr>
                <th>NIK</th>
                <td>{{ $data['nik']}}</td>
            </tr>
            <tr>
                <th>Nomor Kartu Keluarga</th>
                <td>{{ $data['no_kk']}}</td>
            </tr>
            <tr>
                <th>Umur</th>
                <td>{{ $data['umur']}}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $data['jenis_kelamin']}}</td>
            </tr>
            <tr>
                <th>Provinsi</th>
                <td>{{ $data['provinsi'] }}</td>
            </tr>
            <tr>
                <th>Kab/Kota</th>
                <td>{{ $data['kab_kota']}}</td>
            </tr>
            <tr>
                <th>Kecamatan</th>
                <td>{{ $data['kecamatan']}}</td>
            </tr>
            <tr>
                <th>Kelurahan/Desa</th>
                <td>{{ $data['kelurahan']}}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $data['alamat']}}</td>
            </tr>
            <tr>
                <th>RT</th>
                <td>{{ $data['rt']}}</td>
            </tr>
            <tr>
                <th>RW</th>
                <td>{{ $data['rw']}}</td>
            </tr>
            <tr>
                <th>Penghasilan Sebelum Pandemi</th>
                <td>{{ number_format($data['penghasilan_sebelum'], 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Penghasilan Setelah Pandemi</th>
                <td>{{ number_format($data['penghasilan_setelah'], 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Alasan Memerlukan Bantuan</th>
                <td>{{ $data['alasan'] }}</td>
            </tr>
            <tr>
                <th>Foto KTP</th>
                <td><img src="{{ asset('path/to/foto_ktp/' . $data['foto_ktp']) }}" alt="Foto KTP" class="img-thumbnail" width="150"></td>
            </tr>
            <tr>
                <th>Foto Kartu Keluarga</th>
                <td><img src="{{ asset('path/to/foto_kk/' . $data['foto_kk']) }}" alt="Foto KK" class="img-thumbnail" width="150"></td>
            </tr>
        </table>

        @if($data['isSuccessfull']==1)
            <div class="alert alert-success">Data berhasil dikirim!</div>
        @else
            <div class="alert alert-danger">Pengiriman data gagal. Silakan coba lagi.</div>
        @endif

       
    </div>
</body>
</html>
