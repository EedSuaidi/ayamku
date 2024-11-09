<x-layout>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Detail Pengeluaran</h4>
            </div>

            <div class="card-body">
                <form id="pengeluaran-form">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <input type="text" class="form-control" value="{{ $pengeluaran->kategori }}"
                                    id="kategori" name="kategori" disabled>
                            </div>

                            <div class="form-group">
                                <label for="total">Total</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control"
                                        value="Rp. {{ number_format($pengeluaran->total, 0, ',', '.') }}" id="total"
                                        name="total" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal-pengeluaran">Tanggal Pengeluaran</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control"
                                        value="{{ date('d F Y', strtotime($pengeluaran->tanggal_pengeluaran)) }}"
                                        id="tanggal-pengeluaran" name="tanggal_pengeluaran" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea style="resize: none;" class="form-control" id="keterangan" name="keterangan" rows="3" disabled>{{ $pengeluaran->keterangan }}</textarea>
                            </div>
                        </div>

                    </div>
                    <a href="/dashboard/pengeluarans" class="btn btn-primary">Kembali</a>
                </form>
            </div>
        </div>
    </section>

</x-layout>
