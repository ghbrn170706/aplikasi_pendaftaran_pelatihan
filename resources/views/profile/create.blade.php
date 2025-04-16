<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom styles for image preview */
        .image-preview {
            display: none;
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 9999px;
        }
    </style>
</head>
<body class="bg-gray-100">

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-center text-blue-600 mb-8">Create Profile</h1>

    <!-- Form Section -->
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
        <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Profile Image -->
            <div class="flex flex-col items-center mb-6">
                <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">Upload Profile Image</label>
                <input type="file" class="hidden" id="gambar" name="gambar" accept="image/*">
                <button type="button" onclick="document.getElementById('gambar').click()" class="w-36 h-36 rounded-full bg-gray-200 flex items-center justify-center cursor-pointer hover:bg-gray-300 transition duration-300">
                    <img id="profileImage" src="#" alt="Profile Image" class="image-preview rounded-full">
                    <span class="text-gray-500 text-2xl">+</span>
                </button>
            </div>

            <!-- Name and NIK -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                    <input type="text" id="nik" name="nik" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
            </div>

            <!-- Email and Phone -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" readonly class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-100 cursor-not-allowed">
                </div>
                <div>
                    <label for="nomor_hp" class="block text-sm font-medium text-gray-700">Nomor HP</label>
                    <input type="text" id="nomor_hp" name="nomor_hp" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
            </div>

            <!-- Birthdate and Gender -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>

            <!-- Address -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="provinsi" class="block text-sm font-medium text-gray-700">Provinsi</label>
                    <select id="provinsi" name="provinsi" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="">Pilih Provinsi</option>
                    </select>
                </div>
                <div>
                    <label for="kabupaten" class="block text-sm font-medium text-gray-700">Kota/Kabupaten</label>
                    <select id="kabupaten" name="kabupaten" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="">Pilih Kabupaten</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="kecamatan" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                    <select id="kecamatan" name="kecamatan" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="">Pilih Kecamatan</option>
                    </select>
                </div>
                <div>
                    <label for="desa" class="block text-sm font-medium text-gray-700">Desa</label>
                    <select id="desa" name="desa" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="">Pilih Desa</option>
                    </select>
                </div>
            </div>

            <!-- Job -->
            <div class="mb-4">
                <label for="pekerjaan" class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                <select id="pekerjaan" name="pekerjaan" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="bekerja">Bekerja</option>
                    <option value="tidak bekerja">Tidak Bekerja</option>
                    <option value="mahasiswa">Pelajar/Mahasiswa</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center">
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Image Preview
    document.getElementById("gambar").addEventListener("change", function(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const previewImage = document.getElementById("profileImage");
            previewImage.src = reader.result;
            previewImage.style.display = "block";
        };
        reader.readAsDataURL(event.target.files[0]);
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Load Provinsi saat halaman dimuat
        $.getJSON("https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json", function (data) {
            let provinsiOptions = '<option value="">Pilih Provinsi</option>';
            $.each(data, function (index, item) {
                provinsiOptions += `<option value="${item.id}">${item.name}</option>`;
            });
            $("#provinsi").html(provinsiOptions);
        });

        // Load Kabupaten berdasarkan Provinsi yang dipilih
        $("#provinsi").on("change", function () {
            let provinsiId = $(this).val();
            $("#kabupaten").html('<option value="">Memuat...</option>');
            $.getJSON(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinsiId}.json`, function (data) {
                let kabupatenOptions = '<option value="">Pilih Kabupaten</option>';
                $.each(data, function (index, item) {
                    kabupatenOptions += `<option value="${item.id}">${item.name}</option>`;
                });
                $("#kabupaten").html(kabupatenOptions);
            });
        });

        // Load Kecamatan berdasarkan Kabupaten yang dipilih
        $("#kabupaten").on("change", function () {
            let kabupatenId = $(this).val();
            $("#kecamatan").html('<option value="">Memuat...</option>');
            $.getJSON(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${kabupatenId}.json`, function (data) {
                let kecamatanOptions = '<option value="">Pilih Kecamatan</option>';
                $.each(data, function (index, item) {
                    kecamatanOptions += `<option value="${item.id}">${item.name}</option>`;
                });
                $("#kecamatan").html(kecamatanOptions);
            });
        });

        // Load Desa berdasarkan Kecamatan yang dipilih
        $("#kecamatan").on("change", function () {
            let kecamatanId = $(this).val();
            $("#desa").html('<option value="">Memuat...</option>');
            $.getJSON(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${kecamatanId}.json`, function (data) {
                let desaOptions = '<option value="">Pilih Desa</option>';
                $.each(data, function (index, item) {
                    desaOptions += `<option value="${item.id}">${item.name}</option>`;
                });
                $("#desa").html(desaOptions);
            });
        });
    });
</script>

</body>
</html>