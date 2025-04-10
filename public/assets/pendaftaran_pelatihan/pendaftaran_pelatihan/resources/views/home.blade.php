@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
        <div id="animation" style="display: none;">
            <p>Harap tunggu selama 5 menit...</p>
            <!-- Tambahkan animasi CSS atau GIF -->
        </div>
    </div>
@endif

<script>
    // Tampilkan animasi setelah 2 detik
    setTimeout(function () {
        document.getElementById('animation').style.display = 'block';
    }, 2000);
</script>