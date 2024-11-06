<x-layout>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Perusahaan</h4>
            </div>

            <div class="card-body">
                <form action="/dashboard/perusahaans" method="POST" id="perusahaan-form">
                    @csrf
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    value="{{ old('nama') }}" name="nama" placeholder="Masukkan Nama" required>

                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea style="resize: none;" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
                                    rows="3" placeholder="Masukkan Alamat" required>{{ old('alamat') }}</textarea>

                                @error('alamat')
                                    <div class="alert alert-danger mt-2 mb-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nomor-telepon">Nomor Telepon</label>
                                <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror"
                                    value="{{ old('nomor_telepon') }}" id="nomor-telepon" name="nomor_telepon"
                                    placeholder="Masukkan Nomor Telepon" required>

                                @error('nomor_telepon')
                                    <div class="alert alert-danger mt-2 mb-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </section>

</x-layout>
