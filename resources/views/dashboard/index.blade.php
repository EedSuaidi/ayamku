<x-layout>

    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="page-heading">
        <div class="row d-flex align-items-center">
            <div class="col-md-6">
                <h3 class="m-0">Dashboard</h3>
            </div>
            <div class="col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-right">
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-6 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon purple mb-2">
                                            <i class="bi bi-person-fill w-auto h-auto"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Pelanggan</h6>
                                        <h6 class="font-extrabold mb-0">{{ $jumlahPelanggan }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon blue mb-2">
                                            <i class="bi bi-building-fill w-auto h-auto"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Perusahaan</h6>
                                        <h6 class="font-extrabold mb-0">{{ $jumlahPerusahaan }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Penghasilan</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-penghasilan"></div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="{{ asset('/dist') }}/assets/compiled/jpg/2.jpg">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">{{ Auth::user()->name }}</h5>
                                <h6 class="text-muted mb-0">{{ Auth::user()->email }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @slot('additionalScript')
        <script src="{{ asset('/dist') }}/assets/extensions/apexcharts/apexcharts.min.js"></script>
        <script src="{{ asset('/dist') }}/assets/static/js/pages/dashboard.js"></script>
        {{-- <script>
            var options = {
                series: [{
                    name: 'Omset',
                    data: [31, 40, 28, 51, 42, 109, 100, 85, 101, 90, 51, 40]
                }, {
                    name: 'Laba',
                    data: [11, 32, 45, 32, 34, 52, 41, 69, 42, 31, 21, 10]
                }],
                chart: {
                    height: 350,
                    type: 'area'
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth'
                },
                xaxis: {
                    categories: ["January", "February", "March", "April", "May", "June", "July", "August", "September",
                        "October", "November", "December"
                    ],
                },
                tooltip: {
                    x: {
                        format: 'dd/MM/yy'
                    },
                },
            };

            var chart = new ApexCharts(document.querySelector("#chart-penghasilan"), options);
            chart.render();
        </script> --}}
    @endslot

</x-layout>
