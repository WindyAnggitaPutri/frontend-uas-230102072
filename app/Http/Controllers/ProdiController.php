<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http; // import Http Client
use Illuminate\Http\Request;
class ProdiController extends Controller
{
      public function index()
    {
         $response = Http::get('http://localhost:8080/prodi');
        $prodis = $response->json();
        return view('Prodi', compact('prodis'));
    }

    public function create()
    {
        
        return view('tambahProdi');
    }

    // Menyimpan ruangan baru
public function store(Request $request)
    {
        // Validasi form (opsional tapi disarankan)
        $request->validate([
            'kode_prodi' => 'required',
            'nama_prodi' => 'required',
        ]);

        // Kirim data ke endpoint backend API (POST)
        $response = Http::asForm()->post('http://localhost:8080/prodi', [
            'kode_prodi' => $request->kode_prodi,
            'nama_prodi' => $request->nama_prodi,
        ]);

        // Cek apakah berhasil atau gagal
        if ($response->successful()) {
            return redirect('Prodi')->with('success', 'Data ruangan berhasil ditambahkan!'); //Ruangan nya itu untuk kembali, jadi harus sama kaya nama view
        } else {
            return back()->with('error', 'Gagal menambahkan data!');
        }
    } 
public function edit($kode_prodi)
{
    $response = Http::asForm()->get("http://localhost:8080/prodi/$kode_prodi");
    $prodi = $response->json();
   
    //dd($prodi);
    return view('editProdi', compact('prodi'));
}


 // Update data ruangan
    public function update(Request $request, $kode_prodi)
    {
       // Validasi input
        // Kirim data ke API
    $response = Http::put("http://localhost:8080/prodi/$kode_prodi", [
        'kode_prodi' => $request->kode_prodi,
        'nama_prodi' => $request->nama_prodi,
    ]);

    if ($response->successful()) {
        return redirect('Prodi')->with('success', 'Data berhasil diubah.');
    } else {
        return back()->with('error', 'Gagal mengubah data.');
    }
}

 public function destroy($kode_prodi)
    {
        // Kirim DELETE ke endpoint
        Http::delete("http://localhost:8080/prodi/{$kode_prodi}");
        return redirect('Prodi');
    }
}
