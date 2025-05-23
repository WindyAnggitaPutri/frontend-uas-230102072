<h1>SISTEM KRS - Tipe Soal C </h1>
Sistem ini adalah sistem yang dapat membantu mahasiswa dalam mendapatkan KRS. Sistem ini juga mempermudahkan dalam pengelolaan data KRS yang terdapat dalam Politeknik Negeri Cilacap. <br>
<hr>

<h3>Kebutuhan Pembuatan Sistem ini </h3>
🔗 [SI-KRS Database (GitHub)](https://github.com/kristiandimasadiwicaksono/SI-KRS-Backend.git) <br>
🔗 [SI-KRS Database (GitHub)](https://github.com/WindyAnggitaPutri/SI_KRS_Database.git) <br>
<hr>

<h3>1. Clone Repository BackEnd</h3> <br>
1. Membuat Folder di dalam www dengan nama UAS PBF <br>
2. Lalu buka CMD melalui path folder tersebut  <br>
3. Git clone repository BackEnd  <br>

    git clone https://github.com/kristiandimasadiwicaksono/SI-KRS-Backend.git

4. Setelah itu masuk ke folder BackEnd yang sudah di git clone tadi lalu buka CMD melalui path folder tadi  <br>
5. Lalu lakukan Composer Install  <br>
  
        composer install

6. Setelah masuk ke Vscode

        code .

8. Copy file env

        cp .env.example .env
   
10. Lalu ubah sedikit file yang terdapat di env tersebut

        CI_ENVIRONMENT = development

         database.default.hostname = localhost
         database.default.database = db_uas_230102072
         database.default.username = root
         database.default.password = 
         database.default.DBDriver = MySQLi
         database.default.DBPrefix =
         database.default.port = 3306

12. Jalankan server BackEnd

        php spark serve

<h3>2. Import Database </h3>
Langkah - Langkah : <br>
Link Database : 🔗 [SI-KRS Database (GitHub)](https://github.com/WindyAnggitaPutri/SI_KRS_Database.git) <br>

1. Buka link database yang telah disediakan
2. Lalu download file db_krs.sql
3. Setelah itu pergi ke phpMyAdmin/ atau bisa klik menu database yang ada di laragon
4. Setelah itu membuat database baru dengan nama db_uas_230102072
5. Lalu pergi ke menu Imposrt, pilih file yang akan di impirt (db_krs.sql)
6. Klik OK untuk memproses import file db_krs.sql tadi

<h3>3. Mencoba EndPoint API di Postman</h3><br>
        
1. Sebelumnya pastikan dulu bahwa server Backend berjalan dengan baik dengan menggunakan perintah

        php spark serve
        
2. Setelah itu buka aplikasi Postman
3. Klik + pada kanan atas, lalu pilih Collection untuk membuat collection uas_mhs dan uas_prodi dengan memilih API Rest Basic
4. Setelah itu membuat Request beru untuk setiap Get, Post, Put, Delete
    Prodi:
    - GET → http://localhost:8080/prodi / http://localhost:8080/prodi/{id}
    - POST → http://localhost:8080/prodi
    - PUT → http://localhost:8080/prodi/{id}
    - DELETE → http://localhost:8080/prodi/{id}
    Mahasiswa :
    - GET → http://localhost:8080/mahasiswa / http://localhost:8080/mahasiswa/{id}
    - POST → http://localhost:8080/mahasiswa
    - PUT → http://localhost:8080/mahasiswa/{id}
    - DELETE → http://localhost:8080/mahasiswa/{id}
      
<h3>4. Membuat Laravel</h3>

1. Buka folder UAS PBF tadi, lalu buka cmd di folder itu
2. Membuat Project Laravel

        composer create-project laravel/laravel frontend-uas-230102072

3. Setelah itu masuk ke Vscode
4. Jalankan terlebih dahulu server Frontend

        php artisan serve

6. Klik Ctrl lalu klik link itu menggunakan kursor

<h3>5. Menjalankan SI KRS</h3>

1. Menjalankan server Backend

        php spark serve
   
2. Menjalankan server Frontend

        php artisan serve


<h3>6. Membuat tampilan laravel dengan Menggunkaan Tailwind</h3>
    
1. Membuat View dan isinya

    - Contoh isi view Dashboard
          <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Selamat Datang di SI</title>
                <script src="https://cdn.tailwindcss.com"></script>
            </head>
            <body class="bg-gray-100 h-screen flex font-sans">
            
                <aside class="bg-green-800 text-white w-64 py-6 px-3 flex flex-col">
                    <div class="mb-8">
                        <h1 class="text-2xl font-semibold text-center">SI Akademik</h1>
                        <p class="text-sm text-green-200 text-center">Selamat Datang</p>
                    </div>
                    <nav class="flex-grow">
                        <ul>
                          <li class="mb-4">
                                <a href="{{route('Prodi.index')}}" class="block px-4 py-2 text-sm text-white hover:bg-green-600">Data Prodi</a>
                            </li>
                              <li class="mb-4">
                                <a href="{{route('Mahasiswa.index')}}" class="block px-4 py-2 text-sm text-white hover:bg-green-600">Data Mahasiswa</a>
                            </li>
                            
            
        
                        </ul>
                       
                    </nav>
                </aside>
            
                <main class="flex-grow bg-gray-100 p-8">
                    <div class="bg-white rounded-lg shadow-md p-10">
                        <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Selamat Datang di Sistem Informasi Akademik</h1>
                        <p class="text-gray-700 leading-relaxed mb-4 text-center">
                            Ini adalah halaman utama sistem informasi akademik. Anda dapat mengakses berbagai fitur melalui navigasi di sebelah kiri.
                        </p>
                        <div class="text-center">
                            <p class="text-lg text-gray-600">Silakan pilih menu di samping untuk melanjutkan.</p>
                        </div>
                    </div>
                </main>
            
            </body>
            </html>
    - Contoh isi view Prodi
              
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>CRUD RUANGAN</title>
                <script src="https://cdn.tailwindcss.com"></script>
            </head>
            <body class="bg-gray-100 h-screen flex font-sans">
            
               <aside class="bg-green-800 text-white w-64 py-6 px-3 flex flex-col">
                    <div class="mb-8">
                        <h1 class="text-2xl font-semibold text-center">SI Akademik</h1>
                        <p class="text-sm text-green-200 text-center">Selamat Datang</p>
            </div>
                    <nav class="flex-grow">
                        <ul>
                            <li class="mb-4">
                                <a href="{{route('Prodi.index')}}" class="block px-4 py-2 text-sm text-white hover:bg-green-600">Data Prodi</a>
                            </li>
                             <li class="mb-4">
                                <a href="{{route('Mahasiswa.index')}}" class="block px-4 py-2 text-sm text-white hover:bg-green-600">Data Mahasiswa</a>
                            </li>
                            
                        
                    
                        </ul>
                       
                    </nav>
                </aside>

                <main class="flex-grow bg-gray-100 p-8">
                    <div class="bg-white rounded-lg shadow-md p-10">
                        <div class="container mx-auto py-8">
            
                            <div class="text-3xl font-semibold text-center text-gray-400 mt-8 mb-10">
                                <h1>DATA PRODI</h1>
                            </div>
                            <div class="mb-4 text-left">
                                <div class="mb-4 text-left">
                <a href="{{route('Prodi.create')}}" 
                   class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline inline-block">
                    Tambah Ruangan
                </a>
                 <input type="text" id="searchInput" placeholder="Cari..." class="border p-2 rounded w-1/3">
            </div>



                            </div>
            
                            <div class="shadow overflow-hidden border-b border-gray-200 rounded">
                                <table class="min-w-full bg-white table-auto border border-gray-400 border-collapse">
                                    <thead class="bg-gray-300">
                                        <tr>
                                            <th class="px-4 py-2">Kode Prodi</th>
                                            <th class="px-4 py-2">Nama Prodi</th>
                                            <th class="px-4 py-2">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                         @foreach($prodis as $prodi)
                                    <tr>
                                          <td class="px-4 py-2">{{ $prodi['kode_prodi'] }}</td>
                                         <td class="px-4 py-2">{{ $prodi['nama_prodi'] }}</td>
                                          <td class="px-4 py-2">
                                                <a href="{{ route('Prodi.edit', $prodi['kode_prodi']) }}"
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
               Edit
            </a>
            
                                                <!-- <a href="#" class="text-red-600 hover:text-red-900">Hapus</a> -->
            
                                                 <!-- Form hapus -->
                                <form method="POST" action="{{ route('Prodi.destroy', $prodi['kode_prodi']) }}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Hapus</button>
                                </form>
                                            </td>
                                        </tr>
                                        <!-- Tambahkan baris data lain sesuai kebutuhan -->
                                             @endforeach
                                    </tbody>
                                <
                            </div>
            
                        </div>
                    </div>
                </main>
            
            </body>

            <script>
                document.getElementById("searchInput").addEventListener("keyup", function() {
                        let filter = this.value.toLowerCase();
                        let rows = document.querySelectorAll("tbody tr");
            
                        rows.forEach(row => {
                            let kodeProdi = row.cells[0].textContent.toLowerCase();
                            let namaProdi = row.cells[1].textContent.toLowerCase();
            
                            if (kodeProdi.includes(filter) || namaProdi.includes(filter)) {
                                row.style.display = "";
                            } else {
                                row.style.display = "none";
                            }
                        });
                    });
            </script>
            </html>
   
2. Membuat Controller isinya

    - Cara membuat Controller 

            php artisan make:controller DashboardController
            php artisan make:controller ProdiController
              
    - Isi nya
      DashboardController

               <?php

                namespace App\Http\Controllers;
                
                use Illuminate\Http\Request;
                
                class DashboardController extends Controller
                {
                      public function index()
                    {
                        return view('Dashboard');
                    }
                
                    /**
                     * Show the form for creating a new resource.
                     */
                    public function create()
                    {
                    //
                }
            
                /**
                 * Store a newly created resource in storage.
                 */
                public function store(Request $request)
                {
                    //
                }

                /**
                 * Display the specified resource.
                 */
                public function show(Dashboard $dashboard)
                {
                    //
                }
            
                /**
                 * Show the form for editing the specified resource.
                 */
                public function edit(Dashboard $dashboard)
                {
                    //
                }

                /**
                 * Update the specified resource in storage.
                 */
                public function update(Request $request, dashboard $dashboard)
                {
                    //
                }
            
                /**
                 * Remove the specified resource from storage.
                 */
                public function destroy(Dashboard $dashboard)
                {
                    //
                }
            
            
            }

      
      ProdiController

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

          
3. Membuat Route

   - Masuk ke Route, lalu masuk ke <b>web.pbp</b>

                <?php

                use App\Http\Controllers\MahasiswaController;
                use App\Http\Controllers\ProdiController;
                use Illuminate\Support\Facades\Route;
                use App\Http\Controllers\DashboardController;
                
                /*
                |--------------------------------------------------------------------------
                | Web Routes
                |--------------------------------------------------------------------------
                |
                | Here is where you can register web routes for your application. These
                | routes are loaded by the RouteServiceProvider and all of them will
                | be assigned to the "web" middleware group. Make something great!
                |
                */

                // Route::get('/', function () {
                //     return view('Dashboard');
                // });
                
                
                Route::get('/', [DashboardController::class, 'index'])->name('Dashboard.index');
                
                Route::resource('Prodi', ProdiController::class);
                
                Route::resource('Mahasiswa', MahasiswaController::class);

<h3>7. Push ke Github</h3>

1. Buka github yang dimiliki
2. Lalu buat repository baru dengan nama frontend-uas-230102072
3. Setelah itu masuk ke VSCODE, lalu masuk ke terimanl tempat laravel tadi
4. Inisialisasi Git

        git init
   
6. Tambahkan remote repository dengan nama frontend-uas-230102072

        git remote add origin 
   
8. a
9. a


