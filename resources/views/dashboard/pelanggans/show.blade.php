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
                        <li class="breadcrumb-item active" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

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
                                <input type="text" class="form-control" value="{{ $pelanggan->nama }}" disabled>
                            </div>

                            <div class="form-group">
                                <label for="jenis-kelamin">Jenis Kelamin</label>
                                <input type="text" class="form-control" value="{{ $pelanggan->jenis_kelamin }}"
                                    disabled>
                                {{-- <fieldset class="form-group">
                                    <select class="form-select" id="jenis-kelamin" name="jenis_kelamin" disabled>
                                        <option disabled selected>Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki" @selected($pelanggan->jenis_kelamin == 'Laki-laki')>Laki-laki</option>
                                        <option value="Perempuan" @selected($pelanggan->jenis_kelamin == 'Perempuan')>Perempuan</option>
                                    </select>
                                </fieldset> --}}
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea style="resize: none;" class="form-control" rows="3" disabled>{{ $pelanggan->alamat }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nomor-telepon">Nomor Telepon</label>
                                <input type="text" class="form-control" value="{{ $pelanggan->nomor_telepon }}"
                                    disabled>
                            </div>

                            <div class="form-group">
                                <label for="saldo">Saldo</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control"
                                        value="Rp. {{ number_format($pelanggan->saldo, 0, ',', '.') }}" disabled>
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
