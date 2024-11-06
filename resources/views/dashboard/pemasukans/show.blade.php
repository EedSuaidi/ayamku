<x-layout>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Detail Pemasukan</h4>
            </div>

            <div class="card-body">
                <form id="pemasukan-form">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" value="{{ $pemasukan->pelanggan->nama }}"
                                    id="nama" name="nama" disabled>
                            </div>

                            <div class="form-group">
                                <label for="total">Total</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control"
                                        value="Rp. {{ number_format($pemasukan->total, 0, ',', '.') }}" id="total"
                                        name="total" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal-pemasukan">Tanggal Pemasukan</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control"
                                        value="{{ date('d F Y', strtotime($pemasukan->tanggal_pemasukan)) }}"
                                        id="tanggal-pemasukan" name="tanggal_pemasukan" disabled>
                                </div>
                            </div>
                        </div>

                    </div>
                    <a href="/dashboard/pemasukans" class="btn btn-primary">Kembali</a>
                </form>
            </div>
        </div>
    </section>

</x-layout>
