<x-layout>

    <x-slot:title>{{ $title }}</x-slot:title>

    @slot('additionalStyle')
        <link rel="stylesheet" href="{{ asset('/dist') }}/assets/extensions/flatpickr/flatpickr.min.css">
    @endslot

    <div class="page-heading mb-3">
        <div class="row d-flex align-items-center">
            <div class="col-md-6 order-md-1 order-last">
                <h3 class="m-0">Pengeluaran</h3>
            </div>
            <div class="col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/pengeluarans">Pengeluaran</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Pengeluaran</h4>
            </div>

            <div class="card-body">
                <form action="/dashboard/pengeluarans" method="POST" id="pengeluaran-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <fieldset class="form-group">
                                    <select class="form-select @error('kategori') is-invalid @enderror" name="kategori"
                                        id="kategori" required>
                                        <option disabled selected>Pilih Kategori</option>
                                        <option value="Ayam">Ayam</option>
                                        <option value="Pakan">Pakan</option>
                                        <option value="Gaji">Gaji</option>
                                        <option value="Sangu">Sangu</option>
                                        <option value="Kebutuhan">Kebutuhan</option>
                                    </select>

                                    @error('kategori')
                                        <div class="alert alert-danger mt-2 mb-1">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </fieldset>
                            </div>

                            <div class="form-group">
                                <label for="total">Total</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Rp. </span>
                                    <input type="text" class="form-control @error('total') is-invalid @enderror"
                                        value="{{ old('total') }}" min="0" id="total" name="total"
                                        placeholder="Masukkan Total Pengeluaran" onkeyup="formatAngka(this)" required>
                                </div>

                                @error('total')
                                    <div class="alert alert-danger mt-2 mb-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal-pengeluaran">Tanggal Pengeluaran</label>
                                <input type="text"
                                    class="form-control mb-3 flatpickr-no-config flatpickr-input @error('tanggal_pengeluaran') is-invalid @enderror"
                                    value="{{ old('tanggal_pengeluaran') }}" id="tanggal-pengeluaran"
                                    name="tanggal_pengeluaran" placeholder="Pilih Tanggal" required>

                                @error('tanggal_pengeluaran')
                                    <div class="alert alert-danger mt-2 mb-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="keterangan">Keterangan <span class="fw-light">(Opsional)</span></label>
                                <textarea style="resize: none;" class="form-control" id="keterangan" name="keterangan" rows="3"
                                    placeholder="Masukkan Keterangan"></textarea>

                                @error('keterangan')
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


            // Add this function to remove dot separator and convert to integer before submitting
            document.getElementById('pengeluaran-form').addEventListener('submit', function() {
                let totalInput = document.getElementById('total');
                let totalValue = totalInput.value.replace(/\./g, '');
                totalInput.value = parseInt(totalValue);
            });
        </script>
    @endslot

</x-layout>
