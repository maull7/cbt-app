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
                            <h3 class="lg:text-xl font-medium text-black-custom text-base mb-4">Tambah Sesi Ujian</h3>
                            <form action="">
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
                                    <label for="nama-sesi" class="block mb-3 text-sm font-medium text-black-custom">Nama Sesi</label>
                                    <input type="text" class="border border-gray-custom text-sm rounded-lg block py-3 px-2 text-black-custom w-full md:w-xs focus:outline-gray-custom font-medium" name="nama-sesi" id="nama-sesi" placeholder="Nama Sesi" required>
                                </div>
                                <div class="mb-4">
                                    <label for="mulai" class="block mb-3 text-sm font-medium text-black-custom">Mulai</label>
                                    <input type="datetime-local" class="input w-full md:w-xs" required />
                                </div>
                                <div class="mb-4">
                                    <label for="durasi" class="block mb-3 text-sm font-medium text-black-custom">Selesai</label>
                                    <input type="datetime-local" class="input w-full md:w-xs" required />
                                </div>
                                <div class="pt-4 flex gap-1 flex-wrap">
                                    <button type="submit" class="btn bg-blue-custom text-white-custom" id="simpan"><i class="fa-regular fa-floppy-disk text-white-custom"></i>Simpan</button>
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
                window.location.href = '/data-sesi';
            });
        });

        batal.addEventListener('click', () => {
            window.location.href = '/data-sesi';
        });
    </script>
    {{-- sweetalert --}}
</body>
</html>
