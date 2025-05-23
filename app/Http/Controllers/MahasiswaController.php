<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http; // import Http Client
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
         $response = Http::get('http://localhost:8080/mahasiswa');
        $mahasiswas= $response->json();
        return view('Mahasiswa', compact('mahasiswas'));
    }

    public function create(){
                  $kelas = collect(Http::get('http://localhost:8080/kelas')->json()['data'] ?? [])->sortBy('id_kelas')->values();
        $prodi = collect(Http::get('http://localhost:8080/prodi')->json()['data'] ?? [])->sortBy('kode_prodi')->values();
//dd(''. $kelas);
        return view('tambahMahasiswa', compact('kelas', 'prodi'));
  
    }

    public function store(Request $request)
    {
        // Validasi form (opsional tapi disarankan)
        $request->validate([
            'npm' => 'required',
            'nama_mahasiswa' => 'required',
            'nama_kelas' => 'required',
            'nama_prodi' => 'required',
           
            
        ]);

        // Kirim data ke endpoint backend API (POST)
        $response = Http::post('http://localhost:8080/v_daftar_mahasiswa', [
            'npm' => $request->npm,
            'nama_mahasiswa' => $request->nama_mahasiswa,
             'nama_kelas' => $request->nama_kelas,
              'nama_prodi' => $request->nama_prodi,
             
               ]);
           

        // Cek apakah berhasil atau gagal
        if ($response->successful()) {
            return redirect('Mahasiswa')->with('success', 'Data ruangan berhasil ditambahkan!'); //Ruangan nya itu untuk kembali, jadi harus sama kaya nama view
        } else {
           //dd($response);
            return back()->with('error', 'Gagal menambahkan data!'. $response->body());
        }
    } 

    public function edit($npm)
{
    $response = Http::asForm()->get("http://localhost:8080/mahasiswa/$npm");
    $mahasiswa = $response->json();
   
    //dd($prodi);
    return view('editMahasiswa', compact('mahasiswa'));
}

public function update(Request $request, $npm)
    {
       // Validasi input
        // Kirim data ke API
    $response = Http::put("http://localhost:8080/mahasiswa/$npm", [
         'npm' => $request->npm,
            'nama_mahasiswa' => $request->nama_mahasiswa,
             'nama_kelas' => $request->nama_kelas,
              'nama_prodi' => $request->nama_prodi,
    ]);

    if ($response->successful()) {
        return redirect('Mahasiswa')->with('success', 'Data berhasil diubah.');
    } else {
        return back()->with('error', 'Gagal mengubah data.');
    }
}

public function destroy($npm)
    {
        // Kirim DELETE ke endpoint
        Http::delete("http://localhost:8080/mahasiswa/$npm");
        return redirect('Mahasiswa');
    }




}
