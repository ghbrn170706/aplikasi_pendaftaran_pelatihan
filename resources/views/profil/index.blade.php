<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f2f5;
            color: #333;
            padding: 20px;
        }
        .container {
            max-width: 400px;
            margin: auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #25D366;
            font-weight: bold;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 15px;
        }
        .form-label {
            font-weight: bold;
            color: #555;
        }
        .form-control {
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .form-control:focus {
            border-color: #25D366;
            box-shadow: 0 0 5px rgba(37, 211, 102, 0.5);
        }
        .btn-primary {
            background-color: #25D366;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            width: 100%;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #1ea85b;
        }
        .btn-back {
            background-color: #ececec;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            font-size: 14px;
            font-weight: bold;
            color: #555;
            display: inline-flex;
            align-items: center;
            transition: background-color 0.3s ease;
        }
        .btn-back:hover {
            background-color: #dcdcdc;
        }
        .btn-back svg {
            margin-right: 8px;
        }
        img {
            border-radius: 50%;
            object-fit: cover;
            width: 100px;
            height: 100px;
            border: 2px solid #ddd;
        }
        .mb-3 {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Tombol Kembali -->
        <a href="dashboard" class="btn btn-back mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg>
            Kembali ke Dashboard
        </a>

        <h2>Edit Profil</h2>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $profil->nama ?? '' }}" required>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto Profil</label>
                <input type="file" class="form-control" id="foto" name="foto">
                @if ($profil && $profil->foto)
                    <img src="{{ asset('storage/' . $profil->foto) }}" alt="Foto Profil" class="mt-2">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>