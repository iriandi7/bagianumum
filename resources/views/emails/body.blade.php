<div>
    <h1>Halo {{ $peminjaman->user->name }},</h1>
    <p>Kami senang memberitahu Anda bahwa permintaan peminjaman ruangan Anda {{ $status }}. Berikut adalah detail
        peminjaman ruangan:</p>

    <br>
    <p>Nama Acara: {{ $peminjaman->nama_acara }}</p>
    <p>Nama Organisasi: {{ $peminjaman->organisasi->organisasi_nama }}</p>
    <p>Nama Ruangan: {{ $peminjaman->ruangan->ruangan_nama }}</p>
    <p>Tanggal Meminjam: {{ $peminjaman->tanggal_pinjam }}</p>
    <p>Tanggal Mengembapkan: {{ $peminjaman->tanggal_kembap }}</p>
    <p>Nomor Surat: {{ $peminjaman->no_surat }}</p>

    <p>Jangan ragu untuk menghubungi kami jika Anda membutuhkan informasi tambahan atau ada perubahan dalam rencana
        Anda.
        Terima kasih atas kerjasamanya!</p>

    <p>Hormat Kami,</p>
    <p><strong>Bagian Umum Sekretariat Daerah Kota Batu</strong></p>
</div>
