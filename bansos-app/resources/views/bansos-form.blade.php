<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Penerima Bantuan Sosial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            function load_data() {
                var timeout = setTimeout(function() {
                    
                }, 1500);

                $.ajax({
                    url: 'https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json',
                    method: 'GET',
                    success: function(data) {

                        clearTimeout(timeout);

                        var $select = $('#provinsi');
                        data.forEach(function(province) {
                            var option = $('<option></option>')
                                .attr('value', province.id)
                                .text(province.name);
                            $select.append(option);
                        });
                    },
                    error: function(error) {

                        clearTimeout(timeout);

                        alert('not respond timeout')


                    }
                });
            }
            $('#provinsi').change(function() {
                var selectedValue = $(this).val();
                if (selectedValue) {
                    var timeout = setTimeout(function() {
                        
                    }, 1500);
                    fetch('https://www.emsifa.com/api-wilayah-indonesia/api/regencies/' + selectedValue +
                            '.json')
                        .then(response => response.json())
                        .then(regencies => {
                            var kab_kota = $('#kab_kota');
                            regencies.forEach(
                                regency => {
                                    kab_kota.append($('<option>', {
                                        value: regency.id,
                                        text: regency.name
                                    }));
                                }
                            );
                            console.log(regencies)
                        }).catch(error => {
                            clearTimeout(timeout);
                            alert('Error fetching regencies:', error);
                        });

                }
            });

            $('#kab_kota').change(function() {
                var selectedValue = $(this).val();
                if (selectedValue) {
                    var timeout = setTimeout(function() {
                       
                    }, 1500);
                    fetch('https://www.emsifa.com/api-wilayah-indonesia/api/districts/' + selectedValue +
                            '.json')
                        .then(response => response.json())
                        .then(districts => {
                            var kecamatan = $('#kecamatan');
                            districts.forEach(
                                district => {
                                    kecamatan.append($('<option>', {
                                        value: district.id,
                                        text: district.name
                                    }));
                                }
                            );
                            console.log(districts)
                        }).catch(error => {
                            clearTimeout(timeout);
                            alert('Error fetching regencies:', error);
                        });

                }
            });
            $('#kecamatan').change(function() {
                var selectedValue = $(this).val();
                if (selectedValue) {
                    var timeout = setTimeout(function() {
                       
                    }, 1500);
                    fetch('https://www.emsifa.com/api-wilayah-indonesia/api/villages/' + selectedValue +
                            '.json')
                        .then(response => response.json())
                        .then(villages => {
                            var kelurahan = $('#kelurahan');
                            villages.forEach(
                                village => {
                                    kelurahan.append($('<option>', {
                                        value: village.id,
                                        text: village.name
                                    }));
                                }
                            );
                            console.log(villages)
                        }).catch(error => {
                            clearTimeout(timeout);
                            alert('Error fetching regencies:', error);
                        });

                }
            });
            load_data();
        });
    </script>
</head>

<body>
    <div class="container my-4">
        <h1>Form Penerima Bantuan Sosial</h1>
        <form action="{{ route('form.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 w-75">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" required>
            </div>
            <div class="mb-3">
                <label for="no_kk" class="form-label">Nomor Kartu Keluarga</label>
                <input type="text" class="form-control" id="no_kk" name="no_kk" required>
            </div>
            <div class="mb-3">
                <label for="foto_ktp" class="form-label">Foto KTP</label>
                <input type="file" class="form-control" id="foto_ktp" name="foto_ktp" accept=".jpg,.jpeg,.png,.bmp"
                    required>
                <small class="form-text text-muted">Maksimal 2MB, format JPG/JPEG/PNG/BMP</small>
            </div>

            <div class="mb-3">
                <label for="foto_kk" class="form-label">Foto Kartu Keluarga</label>
                <input type="file" class="form-control" id="foto_kk" name="foto_kk" accept=".jpg,.jpeg,.png,.bmp"
                    required>
                <small class="form-text text-muted">Maksimal 2MB, format JPG/JPEG/PNG/BMP</small>
            </div>
            <div class="mb-3">
                <label for="umur" class="form-label">Umur</label>
                 <input type="number" class="form-control" id="umur" name="umur" required min="25"> 
                </select>
                <div class="invalid-feedback">
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="provinsi" class="form-label">Provinsi</label>
                    <select class="form-select" id="provinsi" name="provinsi" required>
                        <option value="">Pilih Provinsi</option>
                        <!-- Tambahkan opsi provinsi dari API Emsifa di sini -->
                    </select>
                </div>
                <div class="mb-3">
                    <label for="kab_kota" class="form-label">Kab/Kota</label>
                    <select class="form-select" id="kab_kota" name="kab_kota" required>
                        <option value="">Pilih Kab/Kota</option>
                        <!-- Tambahkan opsi kab/kota berdasarkan provinsi yang dipilih -->
                    </select>
                </div>
                <div class="mb-3">
                    <label for="kecamatan" class="form-label">Kecamatan</label>
                    <select class="form-select" id="kecamatan" name="kecamatan" required>
                        <option value="">Pilih Kecamatan</option>
                        <!-- Tambahkan opsi kecamatan berdasarkan kab/kota yang dipilih -->
                    </select>
                </div>
                <div class="mb-3">
                    <label for="kelurahan" class="form-label">Kelurahan/Desa</label>
                    <select class="form-select" id="kelurahan" name="kelurahan" required>
                        <option value="">Pilih Kelurahan/Desa</option>
                        <!-- Tambahkan opsi kelurahan/desa berdasarkan kecamatan yang dipilih -->
                    </select>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                </div>
                <div class="mb-3">
                    <label for="rt" class="form-label">RT</label>
                    <input type="text" class="form-control" id="rt" name="rt" required>
                </div>
                <div class="mb-3">
                    <label for="rw" class="form-label">RW</label>
                    <input type="text" class="form-control" id="rw" name="rw" required>
                </div>
                <div class="mb-3">
                    <label for="penghasilan_sebelum" class="form-label">Penghasilan Sebelum Pandemi</label>
                    <input type="text" class="form-control" id="penghasilan_sebelum" name="penghasilan_sebelum"
                        required>
                </div>
                <div class="mb-3">
                    <label for="penghasilan_setelah" class="form-label">Penghasilan Setelah Pandemi</label>
                    <input type="text" class="form-control" id="penghasilan_setelah" name="penghasilan_setelah"
                        required>
                </div>
                <div class="mb-3">
                    <label for="alasan" class="form-label">Alasan Memerlukan Bantuan</label>
                    <select class="form-select" id="alasan" name="alasan" required>
                        <option value="">Pilih Alasan</option>
                        <option value="Kehilangan pekerjaan">Kehilangan pekerjaan</option>
                        <option value="Kepala keluarga">Kepala keluarga</option>
                        <option value="Tergolong fakir/miskin">Tergolong fakir/miskin</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="verifikasi" required>
                    <label class="form-check-label" for="verifikasi">Saya menyatakan bahwa data yang diisikan adalah
                        benar dan siap mempertanggungjawabkan apabila ditemukan ketidaksesuaian dalam data
                        tersebut.</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>



</body>

</html>
