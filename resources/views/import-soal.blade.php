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
<body">
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
                            <h3 class="lg:text-xl font-medium text-black-custom text-base mb-4">Import Soal Ujian</h3>
                            <form action="/import-soal" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <div class="p-4 bg-light-blue-custom rounded-sm">
                                        <h4 class="text-sm font-medium text-black-custom mb-4">
                                            Gunakan format Excel yang disediakan untuk import data dari Excel. Jika soal mengandung Gambar, maka import teksnya saja. Gambar akan diupload secara manual.
                                        </h4>
                                        <a href="/assets/format-import-soal.xlsx" class="btn bg-green-custom text-white-custom"><i class="fa-solid fa-file-excel"></i>Download Format</a>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="nama-ujian" class="block mb-3 text-sm font-medium text-black-custom">Ujian</label>
                                    <select class="select border border-gray-custom w-full md:w-xs" required>
                                        <option disabled selected>Pilih Ujian</option>
                                        <option>Bahasa Indonesia Kelas X</option>
                                        <option>Bahasa Indonesia Kelas XI</option>
                                        <option>Bahasa Indonesia Kelas XII</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="file" class="block mb-3 text-sm font-medium text-black-custom">File Import</label>
                                    <input type="file" class="file-input w-full max-w-xs" name="file" id="file" />
                                </div>
                                <div class="pt-4 flex gap-1 flex-wrap">
                                    <button type="submit" class="btn bg-blue-custom text-white-custom" id="simpan"><i class="fa-solid fa-file-import"></i>Import</button>
                                    <button type="button" class="btn bg-red-custom text-white-custom" id="batal"><i class="fa-regular fa-circle-xmark text-white-custom"></i>Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- content --}}
    </div>

    {{-- sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const simpan = document.getElementById('simpan');
        const batal = document.getElementById('batal');
        simpan.addEventListener('click', () => {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Data berhasil disimpan',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true
            }).then(() => {
                window.location.href = '/data-soal';
            });
        });

        batal.addEventListener('click', () => {
            window.location.href = '/data-soal';
        });
    </script>
    {{-- sweetalert --}}
</body>
</html>
