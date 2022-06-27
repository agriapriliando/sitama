<!-- start navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="#">SITAMA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @if (session()->get('user') == "mhs")
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('beasiswa') }}">Dashboard <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('beasiswa/update') }}">Perbaharui Data<span class="sr-only">(current)</span></a>
            </li>
            @endif
            @if (session()->get('user') == "adm")
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('admin') }}">Dashboard <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-expanded="false">
                    Mahasiswa
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('admin') }}">Daftar Penerima Beasiswa</a>
                    <a class="dropdown-item" href="{{ url('admin/students/create') }}">Tambah Penerima</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/faqs') }}">FAQ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/notices') }}">Pengumuman</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-expanded="false">
                    Pengaturan
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('admin/programs') }}">Daftar Program Studi</a>
                    <a class="dropdown-item" href="{{ url('admin/scholarships') }}">Jenis Beasiswa</a>
                    <a class="dropdown-item" href="{{ url('admin/stats') }}">Jenis Status Mahasiswa</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ url('admin/users') }}">Daftar Akun Administrator</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/reports') }}">Laporan</a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{ url('logout') }}">Logout</a>
            </li>
        </ul>
        @if (session()->get('user') == "mhs")
        <div class="form-inline my-2 my-lg-0">
            <a href="{{ url('beasiswa/akun') }}" data-text="Kelola" class="btn my-2 my-sm-0 buttoncustom"><span><i
                        class="bi bi-person-circle"></i> Saya</span></a>
        </div>
        @endif
        @if (session()->get('user') == "adm")
        <div class="form-inline my-2 my-lg-0">
            <a href="{{ url('admin/users/'.session()->get('id').'/edit') }}" data-text="Kelola" class="btn my-2 my-sm-0 buttoncustom"><span><i
                        class="bi bi-person-circle"></i> Saya</span></a>
        </div>
        @endif
        <!-- end navbar -->
    </div>
</nav>
<!-- end navbar -->