<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Aplikasi Antrian Berbasis Web">
  <meta name="author" content="#">

  <title>Aplikasi Antrian Berbasis Web</title>

  <!-- Favicon icon -->
  <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex flex-col min-h-screen">
  <main class="flex-grow">
    <div class="container mx-auto pt-10 px-4">
      <!-- Alert -->
      <div class="flex items-center bg-white shadow-md rounded-lg p-5 mb-10">
        <div class="text-green-500 text-3xl mr-4">
          <i class="bi bi-file-medical"></i>
        </div>
        <div>
          <p class="text-lg font-semibold">Selamat Datang di <strong>Aplikasi Antrian Panggilan Klinik John Banting</strong>. Silahkan pilih halaman yang ingin ditampilkan.</p>
        </div>
      </div>

      <!-- Cards -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Nomor Antrian Card -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
          <div class="p-6">
            <div class="bg-green-500 text-white rounded-full w-12 h-12 flex items-center justify-center mb-4">
              <i class="bi bi-people text-xl"></i>
            </div>
            <h3 class="text-xl font-semibold mb-2">Nomor Antrian Klinik John Banting</h3>
            <p class="text-gray-600 mb-4">Halaman Nomor Antrian digunakan pengunjung Klinik John Banting untuk mengambil nomor antrian.</p>
            <a href="nomor-antrian" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-full inline-flex items-center">
              Tampilkan <i class="bi bi-chevron-right ml-2"></i>
            </a>
          </div>
        </div>

        <!-- Panggilan Antrian Card -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
          <div class="p-6">
            <div class="bg-green-500 text-white rounded-full w-12 h-12 flex items-center justify-center mb-4">
              <i class="bi bi-mic text-xl"></i>
            </div>
            <h3 class="text-xl font-semibold mb-2">Panggilan Antrian Klinik John Banting</h3>
            <p class="text-gray-600 mb-4">Halaman Panggilan Antrian digunakan petugas Klinik John Banting untuk memanggil antrian pengunjung.</p>
            <a href="panggilan-antrian" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-full inline-flex items-center">
              Tampilkan <i class="bi bi-chevron-right ml-2"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>

</html>
