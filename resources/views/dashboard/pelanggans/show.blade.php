<x-layout>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Detail Pelanggan</h4>
            </div>

            <div class="card-body">
                <form id="pelanggan-form">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" value="{{ $pelanggan->nama }}" id="nama"
                                    name="nama" placeholder="Masukkan Nama" disabled>
                            </div>

                            <div class="form-group">
                                <label for="jenis-kelamin">Jenis Kelamin</label>
                                <fieldset class="form-group">
                                    <select class="form-select" id="jenis-kelamin" name="jenis_kelamin" disabled>
                                        <option disabled selected>Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki" @selected($pelanggan->jenis_kelamin == 'Laki - laki')>Laki-laki</option>
                                        <option value="Perempuan" @selected($pelanggan->jenis_kelamin == 'Perempuan')>Perempuan</option>
                                    </select>
                                </fieldset>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea style="resize: none;" class="form-control" id="alamat" name="alamat" rows="3" disabled>{{ $pelanggan->alamat }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nomor-telepon">Nomor Telepon</label>
                                <input type="text" class="form-control" value="{{ $pelanggan->nomor_telepon }}"
                                    id="nomor-telepon" name="nomor_telepon" placeholder="Masukkan Nomor Telepon"
                                    disabled>
                            </div>

                            <div class="form-group">
                                <label for="saldo">Saldo</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control"
                                        value="Rp. {{ number_format($pelanggan->saldo, 0, ',', '.') }}" id="saldo"
                                        name="saldo" placeholder="Masukkan Saldo" onkeyup="formatSaldo(this)"
                                        disabled>
                                </div>
                            </div>

                        </div>
                    </div>
                    <a href="/dashboard/pelanggans" class="btn btn-primary">Kembali</a>
                </form>
            </div>
        </div>
    </section>

</x-layout>
