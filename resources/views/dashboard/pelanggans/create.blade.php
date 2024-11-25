<x-layout>

    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="page-heading mb-3">
        <div class="row d-flex align-items-center">
            <div class="col-md-6 order-md-1 order-last">
                <h3 class="m-0">Pelanggan</h3>
            </div>
            <div class="col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/pelanggans">Pelanggan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Pelanggan</h4>
            </div>

            <div class="card-body">
                <form action="/dashboard/pelanggans" method="POST" id="pelanggan-form">
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
                                <label for="jenis-kelamin">Jenis Kelamin</label>
                                <fieldset class="form-group">
                                    <select class="form-select @error('jenis_kelamin') is-invalid @enderror"
                                        id="jenis-kelamin" name="jenis_kelamin" required>
                                        <option disabled selected>Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki" @selected(old('jenis_kelamin') == 'Laki-laki')>Laki-laki</option>
                                        <option value="Perempuan" @selected(old('jenis_kelamin') == 'Perempuan')>Perempuan</option>
                                    </select>

                                    @error('jenis_kelamin')
                                        <div class="alert alert-danger mt-2 mb-1">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </fieldset>
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

                            <div class="form-group">
                                <label for="saldo">Saldo</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Rp. </span>
                                    <input type="text" class="form-control @error('saldo') is-invalid @enderror"
                                        value="{{ old('saldo') }}" id="saldo" name="saldo"
                                        placeholder="Masukkan Saldo" onkeyup="formatSaldo(this)">

                                </div>
                                @error('saldo')
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

    @slot('additionalScript')
        <script src="{{ asset('/Accounting') }}/accounting.min.js"></script>
        <script>
            function formatSaldo(input) {
                let value = input.value.replace(/,/g, '').replace(/\./g, '');

                if (value === '') {
                    input.value = '';
                    return;
                }

                let isNegative = value.startsWith('-');
                if (isNegative) {
                    value = value.substring(1);
                }
                let formattedValue = accounting.formatNumber(value, 0, '.', ',');
                if (isNegative) {
                    formattedValue = '-' + formattedValue;
                }

                input.value = formattedValue;
            }

            // Add this function to remove dot separator and convert to integer before submitting
            document.getElementById('pelanggan-form').addEventListener('submit', function() {
                let saldoInput = document.getElementById('saldo');
                let saldoValue = saldoInput.value.replace(/\./g, '');
                saldoInput.value = parseInt(saldoValue);
            });
        </script>
    @endslot

</x-layout>
