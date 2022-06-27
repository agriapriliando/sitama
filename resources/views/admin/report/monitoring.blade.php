<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Daftar IPS</title>
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
                <p class="h5 text-center">DAFTAR NILAI MAHASISWA PENERIMA BEASISWA</p>
                <p class="h5 text-center">INSTITUT AGAMA KRISTEN NEGERI (IAKN) PALANGKA RAYA TAHUN 2021</p>
            </div>
        </div>
        <!-- start table first -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Nama | Status / <br> Nama Rekening</th>
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
                        @if ($item->name_rekening == null)
                        <span>Nama sesuai Rekening Belum diisi</span>
                        @else
                        {{ $item->name_rekening }}
                        @endif
                    </td>
                    <td>{{ $item->nim }}</td>
                    <td>{{ $item->program->jenjang }} {{ $item->program->name }}</td>
                    <td class="{{ $item->ip_one < 2.75 && $item->ip_one != null ? 'bg-warning' : null }}">{{ $item->ip_one }}</td>
                    <td class="{{ $item->ip_two < 2.75 && $item->ip_two != null ? 'bg-warning' : null }}">{{ $item->ip_two }}</td>
                    <td class="{{ $item->ip_three < 2.75 && $item->ip_three != null ? 'bg-warning' : null }}">{{ $item->ip_three }}</td>
                    <td class="{{ $item->ip_four < 2.75 && $item->ip_four != null ? 'bg-warning' : null }}">{{ $item->ip_four }}</td>
                    <td class="{{ $item->ip_five < 2.75 && $item->ip_five != null ? 'bg-warning' : null }}">{{ $item->ip_five }}</td>
                    <td class="{{ $item->ip_six < 2.75 && $item->ip_six != null ? 'bg-warning' : null }}">{{ $item->ip_six }}</td>
                    <td class="{{ $item->ip_seven < 2.75 && $item->ip_seven != null ? 'bg-warning' : null }}">{{ $item->ip_seven }}</td>
                    <td class="{{ $item->ip_eight < 2.75 && $item->ip_eight != null ? 'bg-warning' : null }}">{{ $item->ip_eight }}</td>
                    <td class="{{ $item->ipk < 2.75 && $item->ipk != null ? 'bg-warning' : null }}">{{ $item->ipk }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- end table first -->
    </div>
</body>

</html>