<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Fakultas V2</title>
</head>
<style>
    th {
        text-align: center;
    }
</style>
<?php
date_default_timezone_set("Asia/Jakarta");
?>
<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <p class="font-italic">Dicetak oleh {{ session()->get('name') }} pada {{ date("d-m-Y H:i") }} WIB</p>
            </div>
            <div class="col-12">
                <p class="h5 text-center">DAFTAR PENERIMA BEASISWA</p>
                <p class="h5 text-center">INSTITUT AGAMA KRISTEN NEGERI (IAKN) PALANGKA RAYA TAHUN 2021</p>
            </div>
        </div>
        <!-- start table first -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Prodi</th>
                    <th>IPK</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        {{ $item->user->name }} | <span>{{ $item->stat->name }}</span> <br>
                        @if ($item->nama_rekening == null)
                        <span>Nama sesuai Rekening Belum diisi</span>
                        @else
                        {{ $item->nama_rekening }}
                        @endif
                    </td>
                    <td>{{ $item->nim }}</td>
                    <td>{{ $item->program->jenjang }} {{ $item->program->name }}</td>
                    <td>{{ $item->IPK }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- end table first -->
    </div>
</body>

</html>