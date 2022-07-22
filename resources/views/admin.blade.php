<x-layout title="Admin - Dashboard">
    {{-- navbar --}}
    <x-navbar></x-navbar>

    @section('highchartjs')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    @endsection

    <!-- start daftar tabel mahasiswa -->
    <div class="row p-3 bg-light rounded-lg">
        <div class="col-12 ">
            <div class="row mb-2">
                <div class="col-12">
                    <p class="h3 text-dark judul-daftar-mahasiswa">Daftar Seluruh Mahasiswa Penerima Beasiswa</p>
                    @if (session('status'))
                    <div id="alert-alert" class="alert alert-success">
                        {!! session('status') !!}
                    </div>
                    @endif
                </div>
                <div class="col-md-6 col-12">
                    <a href="{{ url('admin/students/create') }}" data-text="Tambah" class="buttoncustom btn my-2 my-sm-0">
                        <span><i class="bi bi-plus"></i> Tambah</span>
                    </a>
                </div>
            </div>
            <table id="example" class="table-striped table-bordered display nowrap text-dark" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Prodi</th>
                        <th>Beasiswa</th>
                        <th>Berkas</th>
                        <th>Kelola</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>
                            {{ $item->user->name }}
                             <br>NIM. {{ $item->nim }}
                        </td>
                        <td>{{ $item->program->name }}</td>
                        <td>{{ $item->scholarship->name }}<br><span class="badge badge-warning">Rp{{ number_format($item->scholarship->nominal,0,",",".") }}</span> <span class="badge badge-success">{{ $item->stat->name }}</span></td>
                        <td>
                            {{-- cek jika mahasiswa belum melengkapi data --}}
                            @if ($item->nama_rekening == null || $item->no_hp == null || $item->alamat == null || $item->bank == null || $item->no_rekening == null || $item->berkas_one == null || $item->berkas_two == null)
                            <span class="badge badge-danger">Data Belum Lengkap</span><br>
                            @endif
                            @if (!empty($item->berkas_one))
                            <a href="{{ url('admin/berkas_one/'.$item->berkas_one) }}" class="badge badge-success"><i class="bi bi-filetype-pdf"></i> Unduh Rekening Koran</a></span>
                            @endif
                            @if (!empty($item->berkas_two))
                            <br><a href="{{ url('admin/berkas_two/'.$item->berkas_two) }}" class="badge badge-success"><i class="bi bi-filetype-pdf"></i> Unduh Buku Rekening</a></span>
                            @endif
                        </td>
                        <td>
                            <a class="d-inline m-1 btn btn-warning btn-sm" href="{{ url('admin/students/'.$item->id.'/edit') }}">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <form action="{{ url('admin/students/'.$item->id) }}" method="POST" class="d-inline m-1">
                                @method('DELETE')
                                @csrf
                                <button onclick="return confirm('Yakin ingin Hapus Data?')" type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-12 d-none">
            <div id="container" style="width:100%; height:400px;"></div>
        </div>
        <div class="col-12">
            <div id="kelengkapanBerkas" style="width:100%; height:400px;"></div>
        </div>
    </div>
    <!-- end daftar tabel mahasiswa -->

    @section('highchartscript')
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <!-- optional -->
    <script src="https://code.highcharts.com/modules/offline-exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        // generate tahun akademik otomatis
        function tahunakademik(startYear) {
            var currentYear = new Date().getFullYear(), years = [];
            startYear = startYear || 2020;
            while (startYear <= currentYear) {
                yeartambah = startYear++;
                years.push(yeartambah+'01');
                years.push(yeartambah+'02');
            }
            return years;
        }
        console.log(tahunakademik(2015));

        // untuk tanggal di title
        function formatDate() {
            const namaHari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
            var d = new Date(),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear(),
                hour = d.getHours(),
                minutes = d.getMinutes();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;
            if (hour < 10)
                hour = '0' + hour;

            let hari = namaHari[d.getDay()];
            var tanggal = [day, month, year].join('-');
            var waktu = [hour, minutes].join(':');

            return hari + ', ' + tanggal + ' ' + waktu;
        }

        console.log(formatDate());
        Highcharts.chart('container', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Jumlah Penerima Beasiswa</br>IAKN Palangka Raya'
            },
            subtitle: {
                text: 'Source: SITAMA per <span class="font-weight-bold">' + formatDate() + '</span>'
            },
            xAxis: {
                categories: ['Program Studi'],
                // crosshair: true,
                // title: {
                //     text: 'Jumlah'
                // }
            },
            yAxis: {
                // min: 2.50,
                // max: 3.30,
                title: {
                    text: 'Jumlah Mahasiswa'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table><tr><td colspan="2">Jumlah Mahasiswa</td></tr>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.0f} Orang</b></td></tr>',
                // pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                //     '<td style="padding:0"><b>{point.y:.2f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 1,
                    borderWidth: 0
                }
            },
            series:
                <?php echo $dataPoints; ?>
            ,
            // series: [{
            //     name: 'Teologi Kristen',
            //     data: [164]

            // }, {
            //     name: 'Kepemimpinan Kristen',
            //     data: [88]

            // }, {
            //     name: 'Pastoral Konseling',
            //     data: [20]
            // }, {
            //     name: 'Psikologi Kristen',
            //     data: [22]
            // }],
            // exporting: {
            //     buttons: {
            //         contextButton: {
            //             menuItems: ['downloadPNG', 'downloadJPEG']
            //         }
            //     }
            // }
        });
        Highcharts.chart('kelengkapanBerkas', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Jumlah Penerima Beasiswa yang Sudah Melengkapi Berkas</br>SITAMA IAKN Palangka Raya'
            },
            subtitle: {
                text: 'Source: SITAMA per <span class="font-weight-bold">' + formatDate() + '</span>'
            },
            xAxis: {
                categories: [''],
                // crosshair: true,
                title: {
                    text: 'Jenis Kelengkapan Berkas'
                }
            },
            yAxis: {
                // min: 2.50,
                // max: 3.30,
                title: {
                    text: 'Jumlah Mahasiswa'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table><tr><td colspan="2">Jumlah Mahasiswa</td></tr>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.0f} Orang</b></td></tr>',
                // pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                //     '<td style="padding:0"><b>{point.y:.2f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 1,
                    borderWidth: 0
                }
            },
            series:
                <?php echo $dataCounts; ?>
            ,
            // series: [{
            //     name: 'Berkas Lengkap',
            //     data: [164]

            // }, {
            //     name: 'Berkas Belum Lengkap',
            //     data: [88]
            // }],
            // exporting: {
            //     buttons: {
            //         contextButton: {
            //             menuItems: ['downloadPNG', 'downloadJPEG']
            //         }
            //     }
            // }
        });
    </script>
    @endsection

</x-layout>