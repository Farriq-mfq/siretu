<div class="row">
    <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
        <div class="card">
            <div class="card-body pb-0">
                <div class="row">
                    <div class="text-white col-8">
                        <h5 class="card-title text-primary">
                            {{ $personil }}
                        </h5>
                        <p class="text-muted">Personil</p>
                    </div>
                    <div class="col-4 d-flex align-items-center justify-content-center">
                        <i class="bx bx-user h1"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer p-2 border-top">
                <a href="{{ route('personil') }}" class="fs-6 text-center  d-block">Lihat data<i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
        <div class="card">
            <div class="card-body pb-0">
                <div class="row">
                    <div class="text-white col-8">
                        <h5 class="card-title text-primary">
                            {{ $siswa }}
                        </h5>
                        <p class="text-muted">Siswa</p>
                    </div>
                    <div class="col-4 d-flex align-items-center justify-content-center">
                        <i class="bx bx-user h1"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer p-2 border-top">
                <a href="{{ route('siswa') }}" class="fs-6 text-center d-block">Lihat data<i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
        <div class="card">
            <div class="card-body pb-0">
                <div class="row">
                    <div class="text-white col-8">
                        <h5 class="card-title text-primary">
                            {{ $kelompok }}
                        </h5>
                        <p class="text-muted">Kelompok guru/karyawan</p>
                    </div>
                    <div class="col-4 d-flex align-items-center justify-content-center">
                        <i class="bx bx-user-pin h1"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer p-2 border-top">
                <a href="{{ route('kelompok') }}" class="fs-6 text-center d-block">Lihat data<i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
        <div class="card">
            <div class="card-body pb-0">
                <div class="row">
                    <div class="text-white col-8">
                        <h5 class="card-title text-primary">
                            {{ $wifi }}
                        </h5>
                        <p class="text-muted">Wifi</p>
                    </div>
                    <div class="col-4 d-flex align-items-center justify-content-center">
                        <i class="bx bx-wifi h1"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer p-2 border-top">
                <a href="{{ route('wifi') }}" class="fs-6 text-center d-block">Lihat data<i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>
