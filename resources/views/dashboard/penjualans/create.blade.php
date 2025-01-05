<x-layout>

    <x-slot:title>{{ $title }}</x-slot:title>

    @slot('additionalStyle')
        <link rel="stylesheet" href="{{ asset('/dist') }}/assets/extensions/flatpickr/flatpickr.min.css">
    @endslot

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
                        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Penjualan</h4>
            </div>

            <div class="card-body">
                <form action="/dashboard/penjualans" method="POST" id="penjualan-form">
                    @csrf
                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="pelanggan_id">Nama</label>
                                <fieldset class="form-group">
                                    <select class="form-select @error('pelanggan_id') is-invalid @enderror"
                                        name="pelanggan_id" required>
                                        <option disabled selected>Pilih Pelanggan</option>
                                        @foreach ($pelanggans as $pelanggan)
                                            @if (old('pelanggan_id') == $pelanggan->id)
                                                <option value="{{ $pelanggan->id }}" selected>{{ $pelanggan->nama }}
                                                </option>
                                            @else
                                                <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                    @error('pelanggan_id')
                                        <div class="alert alert-danger mt-2 mb-1">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </fieldset>
                            </div>

                            <div class="form-group">
                                <label for="jumlah-ekor">Jumlah Ekor</label>
                                <input type="number" class="form-control @error('jumlah_ekor') is-invalid @enderror"
                                    value="{{ old('jumlah_ekor') }}" min="0" id="jumlah-ekor" name="jumlah_ekor"
                                    placeholder="Masukkan Jumlah Ekor" required>

                                @error('jumlah_ekor')
                                    <div class="alert alert-danger mt-2 mb-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="Jumlah Berat">Jumlah Berat</label>
                                <input type="number" class="form-control @error('jumlah_berat') is-invalid @enderror"
                                    value="{{ old('jumlah_berat') }}" min="0" id="jumlah-berat"
                                    name="jumlah_berat" placeholder="Masukkan Jumlah Berat (kg)"
                                    oninput="calculateTotal()" step=".01" required>

                                @error('jumlah_berat')
                                    <div class="alert alert-danger mt-2 mb-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Rp. </span>
                                    <input type="text" class="form-control @error('harga') is-invalid @enderror"
                                        value="{{ old('harga') }}" min="0" id="harga" name="harga"
                                        placeholder="Masukkan Harga Perkilo"
                                        onkeyup="formatAngka(this); calculateTotal()" required>
                                </div>

                                @error('harga')
                                    <div class="alert alert-danger mt-2 mb-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="total">Total</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Rp. </span>
                                    <input type="text" class="form-control @error('total') is-invalid @enderror"
                                        value="{{ old('total') }}" min="0" id="total" name="total"
                                        readonly="readonly" required>
                                </div>

                                @error('total')
                                    <div class="alert alert-danger mt-2 mb-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tanggal-penjualan">Tanggal Penjualan</label>
                                <input type="text"
                                    class="form-control mb-3 flatpickr-no-config flatpickr-input @error('tanggal_penjualan') is-invalid @enderror"
                                    value="{{ old('tanggal_penjualan') }}" id="tanggal-penjualan"
                                    name="tanggal_penjualan" placeholder="Pilih Tanggal" readonly="readonly" required>

                                @error('tanggal_penjualan')
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
        <script src="{{ asset('/dist') }}/assets/extensions/flatpickr/flatpickr.min.js"></script>
        <script src="{{ asset('/dist') }}/assets/static/js/pages/date-picker.js"></script>

        <script src="{{ asset('/Accounting') }}/accounting.min.js"></script>
        <script>
            function formatAngka(input) {
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

            function calculateTotal() {
                let harga = document.getElementById('harga').value.replace(/,/g, '').replace(/\./g, '');
                let jumlahBerat = document.getElementById('jumlah-berat').value;
                let total = harga * jumlahBerat;
                let formattedTotal = accounting.formatNumber(total, 0, '.', ',');
                document.getElementById('total').value = formattedTotal;
            }

            // Add this function to remove dot separator and convert to integer before submitting
            document.getElementById('penjualan-form').addEventListener('submit', function() {
                let hargaInput = document.getElementById('harga');
                let hargaValue = hargaInput.value.replace(/\./g, '');
                hargaInput.value = parseInt(hargaValue);
                let totalInput = document.getElementById('total');
                let totalValue = totalInput.value.replace(/\./g, '');
                totalInput.value = parseInt(totalValue);
            });
        </script>
    @endslot

</x-layout>
