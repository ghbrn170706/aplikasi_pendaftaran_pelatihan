@extends('dashboard')

@section('content')

<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #cfe2ff;
        }
        .testimonial-card {
            width: 16rem;
            flex-shrink: 0;
        }
        .testimonial-container {
            display: flex;
            overflow-x: auto;
            gap: 1rem;
            padding: 1rem;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="text-center mb-4">
            <h1 class="text-white bg-primary d-inline-block px-4 py-2 rounded">
                Testimoni Member E-learning
            </h1>
            <br>
            <a href="{{ route('pendapat_anggota.create') }}" class="btn btn-success mt-3">Tambah Foto</a>
        </div>
        <div class="testimonial-container">
            @foreach ($pendapat as $item)
            <div class="card testimonial-card shadow-sm">
                <div class="card-body text-center">
                    <div class="text-primary fs-3 mb-2">“</div>
                    <p class="text-success fw-bold mb-2">Diterima Jadi {{ $item->posisi_sebagai }} di E-learning</p>
                    <p class="text-muted mb-3">{{ $item->nama_anggota }}<br>{{ $item->jabatan_pekerjaan }}</p>
                    <img alt="Photo of {{ $item->nama_anggota }}" class="rounded-circle mb-3" height="100" src="{{ asset('storage/' . $item->foto) }}" width="100"/>
                    <form action="{{ route('pendapat_anggota.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
