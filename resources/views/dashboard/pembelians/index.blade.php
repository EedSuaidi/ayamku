<x-layout>

    <x-slot:title>{{ $title }}</x-slot:title>

    @include('sweetalert::alert')

    @slot('additionalStyle')
        <link rel="stylesheet" href="{{ asset('/dist') }}/assets/extensions/simple-datatables/style.css">
        <link rel="stylesheet" href="{{ asset('/dist') }}/assets/compiled/css/table-datatable.css">
    @endslot

    <div class="page-heading mb-3">
        <div class="row d-flex align-items-center">
            <div class="col-md-6 order-md-1 order-last">
                <h3 class="m-0">Pembelian</h3>
            </div>
            <div class="col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pembelian</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h5 class="card-title">
                    Daftar Pembelian
                </h5>
                <a href="/dashboard/pembelians/create" class="btn btn-success ms-auto">Tambah
                    Pembelian</a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="table1" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Total</th>
                            <th scope="col">Tanggal Pembelian</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembelians as $pembelian)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pembelian->perusahaan->nama }}</td>
                                <td>Rp. {{ number_format($pembelian->total, 0, ',', '.') }}</td>
                                <td><span
                                        style="display: none;">{{ date('Y/m/d', strtotime($pembelian->tanggal_pembelian)) }}</span>{{ date('d/m/Y', strtotime($pembelian->tanggal_pembelian)) }}
                                </td>
                                <td>
                                    <a href="/dashboard/pembelians/{{ $pembelian->id }}"
                                        class="btn btn-primary mb-2 mb-lg-0"><i class="bi bi-eye-fill"></i></a>
                                    <a href="{{ route('pembelians.destroy', $pembelian->id) }}" class="btn btn-danger"
                                        data-confirm-delete="true"><i class="bi bi-trash-fill"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>

    @slot('additionalScript')
        <script src="{{ asset('/dist') }}/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
        <script src="{{ asset('/dist') }}/assets/static/js/pages/simple-datatables.js"></script>
    @endslot

</x-layout>
