<h1>Detail Jurusan</h1>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <td>{{ $jurusan->id }}</td>
    </tr>

    <tr>
        <th>Kode Jurusan</th>
        <td>{{ $jurusan->kode }}</td>
    </tr>

    <tr>
        <th>Nama Jurusan</th>
        <td>{{ $jurusan->nama }}</td>
    </tr>

    <tr>
        <th>Dibuat</th>
        <td>{{ $jurusan->created_at->format('d-m-Y H:i') }}</td>
    </tr>
</table>

<br>

<a href="{{ url('/jurusan') }}">Kembali ke Daftar Jurusan</a>