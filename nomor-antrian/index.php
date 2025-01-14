<!doctype html>
<html lang="en" class="h-full">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Aplikasi Antrian Berbasis Web">
  <meta name="author" content="#">

  <!-- Title -->
  <title>Aplikasi Antrian Berbasis Web</title>

  <!-- Favicon icon -->
  <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex flex-col min-h-screen">
  <main class="flex-grow">
    <div class="container mx-auto pt-5">
      <div class="flex justify-center">
        <div class="w-full lg:w-1/3 mb-4">
          <div class="p-4 bg-white rounded-md shadow-md mb-4">
            <!-- judul halaman -->
            <div class="flex items-center">
              <i class="bi bi-camera text-green-600 text-2xl mr-3"></i>
              <h1 class="text-lg font-semibold">Harap Foto Nomor Antrian Setelah Menekan <b>Ambil Nomor!</b></h1>
            </div>
          </div>

          <div class="bg-white border border-gray-200 rounded-md shadow-md">
            <div class="p-5 text-center grid">
              <div class="border border-green-600 rounded-md py-2 mb-5">
                <h3 class="text-xl pt-4">ANTRIAN</h3>
                <!-- menampilkan informasi jumlah antrian -->
                <h1 id="antrian" class="text-6xl font-bold text-green-600 leading-tight py-2"></h1>
              </div>
              <!-- button pengambilan nomor antrian -->
              <a id="insert" href="javascript:void(0)" class="bg-green-600 text-white font-semibold rounded-full text-lg px-5 py-4 mb-2 inline-flex items-center justify-center">
                <i class="bi bi-plus-circle text-xl mr-2"></i> Ambil Nomor
              </a>
              <p class="text-lg pt-1"> <span id="tanggalwaktu"></span></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- jQuery Core -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- Icon support -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

  <script>
    var dt = new Date();
    document.getElementById("tanggalwaktu").innerHTML = ("0" + dt.getDate()).slice(-2) + "/" + ("0" + (dt.getMonth() + 1)).slice(-2) + "/" + dt.getFullYear() + "  " + ("0" + dt.getHours()).slice(-2) + ":" + ("0" + dt.getMinutes()).slice(-2);
  </script>

  <script type="text/javascript">
    $(document).ready(function () {
      // tampilkan jumlah antrian
      $('#antrian').load('get_antrian.php');

      // proses insert data
      $('#insert').on('click', function () {
        $.ajax({
          type: 'POST',                     // mengirim data dengan method POST
          url: 'insert.php',                // url file proses insert data
          success: function (result) {       // ketika proses insert data selesai
            // jika berhasil
            if (result === 'Sukses') {
              // tampilkan jumlah antrian
              $('#antrian').load('get_antrian.php').fadeIn('slow');
            }
          },
        });
      });
    });
  </script>
</body>

</html>
