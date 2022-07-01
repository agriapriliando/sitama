<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Fakultas V1</title>
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
    <div >
        <div class="row mt-3">
            <div class="col-12">
                <p class="font-italic">Dicetak oleh {{ session()->get('name') }} pada {{ date("d-m-Y H:i") }} WIB</p>
            </div>
            <div class="col-12">
                <p class="h5 text-center">DAFTAR PENERIMA BEASISWA</p>
                <p class="h5 text-center">INSTITUT AGAMA KRISTEN NEGERI (IAKN) PALANGKA RAYA TAHUN {{ date("Y") }}</p>
            </div>
        </div>
        <!-- start table first -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Nama</th>
                    <th rowspan="2">NIM</th>
                    <th rowspan="2">Prodi</th>
                    <th colspan="8">IPS</th>
                    <th rowspan="2">IPK</th>
                </tr>
                <tr>
                    <th>I</th>
                    <th>II</th>
                    <th>III</th>
                    <th>IV</th>
                    <th>V</th>
                    <th>VI</th>
                    <th>VII</th>
                    <th>VIII</th>
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
                    <td>{{ $item->ip_one }}</td>
                    <td>{{ $item->ip_two }}</td>
                    <td>{{ $item->ip_three }}</td>
                    <td>{{ $item->ip_four }}</td>
                    <td>{{ $item->ip_five }}</td>
                    <td>{{ $item->ip_six }}</td>
                    <td>{{ $item->ip_seven }}</td>
                    <td>{{ $item->ip_eight }}</td>
                    <td>{{ $item->ipk }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- end table first -->
    </div>
</body>

</html>