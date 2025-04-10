@extends('dashboard')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profiles</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">
    <h1 class="text-center text-primary mb-4">Profiles</h1>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('profile.create') }}" class="btn btn-primary fw-medium px-3 py-1">Create New Profile</a>
    </div>

    <div class="table-responsive bg-white shadow-sm rounded p-3">
        <table class="table table-hover text-center align-middle">
            <thead class="bg-primary text-white">
                <tr>
                    <th class="py-2">No</th>
                    <th class="py-2">Nama</th>
                    <th class="py-2">Tanggal Lahir</th>
                    <th class="py-2">Email</th>
                    <th class="py-2">Nomor HP</th>
                    <th class="py-2">Provinsi</th>
                    <th class="py-2">Kabupaten</th>
                    <th class="py-2">NIK</th>
                    <th class="py-2">Status</th>
                    <th class="py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="table-light">
                @foreach ($profiles as $profile)
                    <tr class="border-bottom">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $profile->nama }}</td>
                        <td>{{ $profile->tanggal_lahir }}</td>
                        <td>{{ $profile->email }}</td>
                        <td>{{ $profile->nomor_hp }}</td>
                        <td>{{ $profile->provinsi }}</td>
                        <td>{{ $profile->kabupaten }}</td>
                        <td>{{ $profile->nik }}</td>
                        <td>{{ $profile->pekerjaan }}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('profile.show', $profile->profileID) }}" class="btn btn-sm btn-primary">View</a>
                                @if(Auth::user()->role !== 'admin')
                                    <a href="{{ route('profile.edit', $profile->profileID) }}" class="btn btn-sm btn-warning">Edit</a>
                                @endif
                                <form action="{{ route('profile.destroy', $profile->profileID) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this profile?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
