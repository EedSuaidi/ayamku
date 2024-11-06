<x-layout>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Detail Perusahaan</h4>
            </div>

            <div class="card-body">
                <form id="perusahaan-form">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" value="{{ $perusahaan->nama }}"
                                    id="nama" name="nama" placeholder="Masukkan Nama" disabled>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea style="resize: none;" class="form-control" id="alamat" name="alamat" rows="3" disabled>{{ $perusahaan->alamat }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nomor-telepon">Nomor Telepon</label>
                                <input type="text" class="form-control" value="{{ $perusahaan->nomor_telepon }}"
                                    id="nomor-telepon" name="nomor_telepon" placeholder="Masukkan Nomor Telepon"
                                    disabled>
                            </div>

                        </div>
                    </div>
                    <a href="/dashboard/perusahaans" class="btn btn-primary">Kembali</a>
                </form>
            </div>
        </div>
    </section>

</x-layout>
