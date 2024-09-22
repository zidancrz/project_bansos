<?php

namespace App\Http\Controllers;

use App\Models\PenerimaBansos;
use Illuminate\Http\Request;

class PenerimaBansosController extends Controller
{
    public function index()
    {
        return view('bansos-form');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:16',
            'no_kk' => 'required|string|max:16',
            'foto_ktp' => 'image|mimes:jpeg,png,jpg|max:2048',
            'foto_kk' => 'image|mimes:jpeg,png,jpg|max:2048',
            'umur' => 'required|integer|min:25',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'provinsi' => 'required|string',
            'kab_kota' => 'required|string',
            'kecamatan' => 'required|string',
            'kelurahan' => 'required|string',
            'alamat' => 'required|string|max:255',
            'rt' => 'required|string|max:3',
            'rw' => 'required|string|max:3',
            'penghasilan_sebelum' => 'required|numeric',
            'penghasilan_setelah' => 'required|numeric',
            'alasan' => 'required|string',
        ]);

        // Simpan data
        if ($request->hasFile('foto_ktp')) {
            $fotoKtpPath = $request
                ->file('foto_ktp')
                ->store('uploads/ktp', 'public');
            $validatedData['foto_ktp'] = $fotoKtpPath;
        }

        if ($request->hasFile('foto_kk')) {
            $fotoKkPath = $request
                ->file('foto_kk')
                ->store('uploads/kk', 'public');
            $validatedData['foto_kk'] = $fotoKkPath;
        }
        $penerimaBansos = PenerimaBansos::create($validatedData);

        // Simulasikan pengiriman ke server dengan Math.random()
        $validatedData['isSuccessfull'] = rand(0, 1);

        return redirect()
            ->route('form.preview')
            ->with('data', $validatedData);
    }

    public function preview()
    {
        $data = session('data');
        return view('preview', compact('data'));
    }
}
