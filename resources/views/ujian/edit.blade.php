<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CBT | Admin</title>
    <!-- fontawesome -->
    <link rel="stylesheet" href="/fontawesome/css/all.min.css" />

    <!-- favicon -->
    <link rel="icon" type="image/svg+xml" href="/assets/logo-sekolah.png">

    {{-- quill --}}
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="drawer lg:drawer-open">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        {{-- sidebar --}}
        <div class="drawer-side z-50">
            <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
            @include('components.sidebar.sidebar')
        </div>
        {{-- sidebar --}}

        {{-- navbar --}}
        <div class="drawer-content">
            @include('components.navbar.navbar')
        </div>
        {{-- navbar --}}

        {{-- content --}}
        <div class="drawer-content">
            <div class="p-4 mt-16 min-h-screen">
                <div class="grid grid-cols-1">
                    <div class="card w-auto bg-white-custom shadow-sm">
                        <div class="card-body">
                            <h3 class="lg:text-xl font-medium text-black-custom text-base mb-4">Edit Ujian</h3>
                            <form action="{{ route('master_ujian.update', $ujian->id) }}" method="POST"
                                id="form-ujian">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label for="nama-ujian"
                                        class="block mb-3 text-sm font-medium text-black-custom">Nama Ujian</label>
                                    <input type="text"
                                        class="border border-gray-custom text-sm rounded-lg block py-3 px-2 text-black-custom w-full md:w-xs focus:outline-gray-custom font-medium"
                                        name="nama_ujian" id="nama-ujian" placeholder="Nama Ujian" required
                                        value="{{ $ujian->nama_ujian }}">
                                </div>
                                <select name="id_mapel" id="jurusan"
                                    class="border border-gray-custom text-sm rounded-lg block py-3 px-2 text-black-custom w-full md:w-md focus:outline-gray-custom font-medium"
                                    required>
                                    <option value="">-- Pilih Mapel --</option>
                                    @foreach ($mapel as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('id_mapel', $item->id) == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama_mapel }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="mb-4">
                                    <label for="jumlah-soal"
                                        class="block mb-3 text-sm font-medium text-black-custom">Jumlah Soal</label>
                                    <input type="number"
                                        class="border border-gray-custom text-sm rounded-lg block py-3 px-2 text-black-custom w-full md:w-xs focus:outline-gray-custom font-medium"
                                        name="jumlah_soal" id="jumlah-soal" placeholder="Jumlah Soal" required
                                        value="{{ $ujian->jumlah_soal }}">
                                </div>

                                <div class="mb-4">
                                    <label for="acak-soal" class="block mb-3 text-sm font-medium text-black-custom">Acak
                                        Soal</label>
                                    <select name="soal_acak" class="select border border-gray-custom w-full md:w-xs">
                                        <option value="1" {{ $ujian->soal_acak == 1 ? 'selected' : '' }}>Ya
                                        </option>
                                        <option value="2" {{ $ujian->soal_acak == 2 ? 'selected' : '' }}>Tidak
                                        </option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="acak-jawaban"
                                        class="block mb-3 text-sm font-medium text-black-custom">Acak Jawaban</label>
                                    <select name="jawaban_acak" class="select border border-gray-custom w-full md:w-xs">
                                        <option value="1" {{ $ujian->jawaban_acak == 1 ? 'selected' : '' }}>Ya
                                        </option>
                                        <option value="2" {{ $ujian->jawaban_acak == 2 ? 'selected' : '' }}>Tidak
                                        </option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="deskripsi"
                                        class="block mb-3 text-sm font-medium text-black-custom">Deskripsi</label>
                                    <div id="editor"></div>
                                    <input type="hidden" name="deskripsi" id="deskripsi-input">
                                    @error('deskripsi')
                                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="pt-4 flex gap-1 flex-wrap">
                                    <button type="submit" class="btn bg-blue-custom text-white-custom"
                                        id="simpan"><i
                                            class="fa-regular fa-floppy-disk text-white-custom"></i>Simpan</button>
                                    <button type="button" class="btn bg-red-custom text-white-custom" id="batal"><i
                                            class="fa-regular fa-circle-xmark text-white-custom"></i>Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- content --}}
    </div>

    {{-- quill --}}
    <script>
        const quill = new Quill('#editor', {
            theme: 'snow'
        });

        // Set nilai deskripsi di editor ketika halaman dibuka
        document.addEventListener("DOMContentLoaded", function() {
            const deskripsi = @json($ujian->deskripsi); // Menangkap nilai deskripsi dari PHP
            quill.root.innerHTML = deskripsi; // Mengisi editor dengan nilai deskripsi
        });

        // Pastikan form sudah benar ID-nya
        const form = document.getElementById('form-ujian');
        const deskripsiInput = document.getElementById('deskripsi-input');

        form.addEventListener('submit', function(e) {
            // Ambil konten dalam bentuk HTML dan teks
            const html = quill.root.innerHTML.trim();
            const text = quill.getText().trim();

            // Jika teks kosong atau hanya terdapat <p><br></p>, tampilkan alert
            if (text.length === 0 || html === '<p><br></p>') {
                alert('Deskripsi tidak boleh kosong.');
                e.preventDefault(); // Batalkan submit
                return;
            }

            // Set nilai ke input hidden
            deskripsiInput.value = html;
        });
    </script>

    {{-- sweetalert --}}
    {{-- sweetalert --}}
</body>

</html>
