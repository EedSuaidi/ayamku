<x-layout>

    @slot('additionalStyle')
        <link rel="stylesheet" href="{{ asset('/dist') }}/assets/extensions/flatpickr/flatpickr.min.css">
    @endslot

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Pembelian</h4>
            </div>

            <div class="card-body">
                <form action="/dashboard/pembelians" method="POST" id="pembelian-form">
                    @csrf
                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="perusahaan_id">Nama</label>
                                <fieldset class="form-group">
                                    <select class="form-select @error('perusahaan_id') is-invalid @enderror"
                                        name="perusahaan_id" required>
                                        <option disabled selected>Pilih Perusahaan</option>
                                        @foreach ($perusahaans as $perusahaan)
                                            @if (old('perusahaan_id') == $perusahaan->id)
                                                <option value="{{ $perusahaan->id }}" selected>{{ $perusahaan->nama }}
                                                </option>
                                            @else
                                                <option value="{{ $perusahaan->id }}">{{ $perusahaan->nama }}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                    @error('perusahaan_id')
                                        <div class="alert alert-danger mt-2 mb-1">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </fieldset>
                            </div>

                            <div class="form-group">
                                <label for="Jumlah Berat">Jumlah Berat</label>
                                <input type="number" class="form-control @error('jumlah_berat') is-invalid @enderror"
                                    value="{{ old('jumlah_berat') }}" min="0" id="jumlah-berat"
                                    name="jumlah_berat" placeholder="Masukkan Jumlah Berat (kg)"
                                    oninput="calculateTotal()" required>

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
                                <label for="tanggal-pembelian">Tanggal Pembelian</label>
                                <input type="text"
                                    class="form-control mb-3 flatpickr-no-config flatpickr-input @error('tanggal_pembelian') is-invalid @enderror"
                                    value="{{ old('tanggal_pembelian') }}" id="tanggal-pembelian"
                                    name="tanggal_pembelian" placeholder="Pilih Tanggal" readonly="readonly" required>

                                @error('tanggal_pembelian')
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
            document.getElementById('pembelian-form').addEventListener('submit', function() {
                let jumlahBeratInput = document.getElementById('jumlah-berat');
                let jumlahBeratValue = jumlahBeratInput.value.replace(/\./g, '');
                jumlahBeratInput.value = parseInt(jumlahBeratValue);
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
