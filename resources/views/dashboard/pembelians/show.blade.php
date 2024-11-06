<x-layout>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Detail Pembelian</h4>
            </div>

            <div class="card-body">
                <form id="pembelian-form">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" value="{{ $pembelian->perusahaan->nama }}"
                                    id="nama" name="nama" disabled>
                            </div>

                            <div class="form-group">
                                <label for="Jumlah Berat">Jumlah Berat</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" value="{{ $pembelian->jumlah_berat }} kg"
                                        id="jumlah-berat" name="jumlah_berat" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" class="form-control"
                                    value="{{ number_format($pembelian->harga, 0, ',', '.') }}" id="harga"
                                    name="harga" disabled>
                            </div>

                            <div class="form-group">
                                <label for="total">Total</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control"
                                        value="Rp. {{ number_format($pembelian->total, 0, ',', '.') }}" id="total"
                                        name="total" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tanggal-pembelian">Tanggal Pembelian</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control"
                                        value="{{ date('d F Y', strtotime($pembelian->tanggal_pembelian)) }}"
                                        id="tanggal-pembelian" name="tanggal_pembelian" disabled>
                                </div>
                            </div>
                        </div>

                    </div>
                    <a href="/dashboard/pembelians" class="btn btn-primary">Kembali</a>
                </form>
            </div>
        </div>
    </section>

</x-layout>
