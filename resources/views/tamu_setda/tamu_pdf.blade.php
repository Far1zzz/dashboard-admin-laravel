<!DOCTYPE html>
<html>

<head>
    <title>Laporan Riwayat Tamu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Laporan Riwayat Tamu</h4>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Asal Intansi</th>
                <th>No HP</th>
                <th>Status Pegawai</th>
                <th>Bidang</th>
                <th>Jabatan</th>
                <th>Keperluan</th>
                <th>Tujuan</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($tamu as $p)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->nip }}</td>
                    <td>{{ $p->alamatAsalInstansi }}</td>
                    <td>{{ $p->noHp }}</td>
                    <td>{{ $p->statusPegawai }}</td>
                    <td>{{ $p->bidang }}</td>
                    <td>{{ $p->jabatan }}</td>
                    <td>{{ $p->keperluan }}</td>
                    <td>{{ $p->tujuan }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
