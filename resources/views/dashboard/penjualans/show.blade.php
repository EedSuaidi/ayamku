<x-layout>

    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="page-heading mb-3">
        <div class="row d-flex align-items-center">
            <div class="col-md-6 order-md-1 order-last">
                <h3 class="m-0">Penjualan</h3>
            </div>
            <div class="col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/penjualans">Penjualan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Detail Penjualan</h4>
            </div>

            <div class="card-body">
                <form id="penjualan-form">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" value="{{ $penjualan->pelanggan->nama }}"
                                    disabled>
                            </div>

                            <div class="form-group">
                                <label for="jumlah-ekor">Jumlah Ekor</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control"
                                        value="{{ $penjualan->jumlah_ekor }} Ekor" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Jumlah Berat">Jumlah Berat</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control"
                                        value="{{ floor($penjualan->jumlah_berat) == $penjualan->jumlah_berat ? number_format($penjualan->jumlah_berat, 0, ',', '.') : number_format($penjualan->jumlah_berat, 1, ',', '.') }} kg"
                                        disabled>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" class="form-control"
                                    value="Rp. {{ number_format($penjualan->harga, 0, ',', '.') }}" disabled>
                            </div>

                            <div class="form-group">
                                <label for="total">Total</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control"
                                        value="Rp. {{ number_format($penjualan->total, 0, ',', '.') }}" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tanggal-penjualan">Tanggal Penjualan</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control"
                                        value="{{ date('d F Y', strtotime($penjualan->tanggal_penjualan)) }}" disabled>
                                </div>
                            </div>
                        </div>

                    </div>
                    <a href="/dashboard/penjualans" class="btn btn-primary">Kembali</a>
                </form>
            </div>
        </div>
    </section>

</x-layout>
