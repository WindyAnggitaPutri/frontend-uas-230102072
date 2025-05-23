<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Ruangan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen font-sans">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Ubah Data Ruangan</h1>

        <form method="POST" action="{{ route('Mahasiswa.update', $mahasiswa['npm']) }}">
    @csrf
    @method('PUT')
            <div class="mb-4">
                <label for="npm" class="block text-gray-700 text-sm font-bold mb-2">NPM:</label>
                <input type="text" id="npm" name="npm" value="{{ $mahasiswa['npm'] }}" readonly
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="nama_mahasiswa" class="block text-gray-700 text-sm font-bold mb-2">nama_mahasiswa:</label>
                <input type="text" id="nama_mahasiswa" name="npm" value="{{ $mahasiswa['npm'] }}" readonly
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                    Simpan Perubahan
                </button>
                <a href="/Ruangan" class="inline-block align-baseline font-bold text-sm text-gray-600 hover:text-gray-800">
                    Batal
                </a>
            </div>
        </form>
    </div>
</body>
</html>