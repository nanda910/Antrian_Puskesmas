<!doctype html>
<html lang="en" class="h-full">

<head>
  <!-- Meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Aplikasi Antrian Berbasis Web">
  <meta name="author" content="#">

  <!-- Title -->
  <title>Aplikasi Antrian Berbasis Web</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex flex-col min-h-screen bg-gray-100">
  <main class="flex-grow">
    <div class="container mx-auto py-8 px-4">
      <!-- Header Section -->
      <div class="flex flex-col md:flex-row bg-white shadow-md rounded-lg p-6 mb-6">
        <!-- Title -->
        <div class="flex items-center mb-4 md:mb-0 md:mr-auto">
          <i class="bi-mic-fill text-green-600 text-3xl mr-4"></i>
          <h1 class="text-lg font-semibold">Panggilan Loket Pengambilan Klinik John Banting</h1>
        </div>
        <!-- Breadcrumbs -->
        <nav class="text-gray-600" aria-label="breadcrumb">
          <ol class="flex space-x-2">
            <li><a href="../index.php" class="text-green-600"><i class="bi-house-fill"></i></a></li>
            <li>&gt;</li>
            <li>Dashboard</li>
            <li>&gt;</li>
            <li>Antrian</li>
          </ol>
        </nav>
      </div>

      <!-- Info Cards -->
      <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
        <div class="bg-white shadow-md rounded-lg p-6">
          <div class="flex items-center">
            <div class="text-yellow-500 text-3xl mr-4">
              <i class="bi-people"></i>
            </div>
            <div>
              <p id="jumlah-antrian" class="text-3xl font-bold text-yellow-500">0</p>
              <p>Jumlah Antrian</p>
            </div>
          </div>
        </div>
        <div class="bg-white shadow-md rounded-lg p-6">
          <div class="flex items-center">
            <div class="text-green-600 text-3xl mr-4">
              <i class="bi-person-check"></i>
            </div>
            <div>
              <p id="antrian-sekarang" class="text-3xl font-bold text-green-600">0</p>
              <p>Antrian Sekarang</p>
            </div>
          </div>
        </div>
        <div class="bg-white shadow-md rounded-lg p-6">
          <div class="flex items-center">
            <div class="text-blue-500 text-3xl mr-4">
              <i class="bi-person-plus"></i>
            </div>
            <div>
              <p id="antrian-selanjutnya" class="text-3xl font-bold text-blue-500">0</p>
              <p>Antrian Selanjutnya</p>
            </div>
          </div>
        </div>
        <div class="bg-white shadow-md rounded-lg p-6">
          <div class="flex items-center">
            <div class="text-red-500 text-3xl mr-4">
              <i class="bi-person"></i>
            </div>
            <div>
              <p id="sisa-antrian" class="text-3xl font-bold text-red-500">0</p>
              <p>Sisa Antrian</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Data Table Section -->
      <div class="bg-white shadow-md rounded-lg p-6">
        <div class="overflow-x-auto">
          <table id="tabel-antrian" class="w-full text-left border border-gray-200">
            <thead>
              <tr class="bg-gray-100">
                <th class="py-2 px-4 border-b">Nomor Antrian</th>
                <th class="py-2 px-4 border-b">Status</th>
                <th class="py-2 px-4 border-b">Panggil</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </main>

  <!-- Audio File -->
  <audio id="tingtung" src="../assets/audio/tingtung.mp3"></audio>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://code.responsivevoice.org/responsivevoice.js?key=jQZ2zcdq"></script>

  <script>
    $(document).ready(function () {
      $('#jumlah-antrian').load('get_jumlah_antrian.php');
      $('#antrian-sekarang').load('get_antrian_sekarang.php');
      $('#antrian-selanjutnya').load('get_antrian_selanjutnya.php');
      $('#sisa-antrian').load('get_sisa_antrian.php');

      const table = $('#tabel-antrian').DataTable({
        ajax: 'get_antrian.php',
        columns: [
          { data: 'no_antrian' },
          { data: 'status', visible: false },
          {
            data: null,
            render: function (data) {
              return data.status === '0'
                ? '<button class="bg-green-600 text-white rounded-full p-2">Panggil</button>'
                : '<button class="bg-gray-600 text-white rounded-full p-2">Ulangi</button>';
            },
          },
        ],
      });

      $('#tabel-antrian tbody').on('click', 'button', function () {
        const data = table.row($(this).parents('tr')).data();
        const bell = document.getElementById('tingtung');

        bell.pause();
        bell.currentTime = 0;
        bell.play();

        setTimeout(() => {
          responsiveVoice.speak(`Nomor Antrian, ${data.no_antrian}, silahkan menuju ruang pemeriksaan dokter`, "Indonesian Male", { rate: 0.9 });
        }, bell.duration * 770);

        $.post('update.php', { id: data.id });
      });

      setInterval(() => {
        $('#jumlah-antrian').load('get_jumlah_antrian.php');
        $('#antrian-sekarang').load('get_antrian_sekarang.php');
        $('#antrian-selanjutnya').load('get_antrian_selanjutnya.php');
        $('#sisa-antrian').load('get_sisa_antrian.php');
        table.ajax.reload(null, false);
      }, 1000);
    });
  </script>
</body>

</html>
