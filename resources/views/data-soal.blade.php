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
                            <h3 class="lg:text-xl font-medium text-black-custom text-base mb-4">Data Soal Ujian</h3>
                            <div class="mb-5 flex justify-between w-full gap-3 md:gap-0 flex-col-reverse md:flex-row">
                                <select class="select border border-gray-custom w-full md:w-xs" required>
                                    <option disabled selected>Pilih Soal Ujian</option>
                                    <option>Bahasa Indonesia Kelas X</option>
                                    <option>Bahasa Indonesia Kelas XI</option>
                                    <option>Bahasa Indonesia Kelas XII</option>
                                </select>
                                <div>
                                    <a href="/tambah-soal">
                                        <button type="button" class="btn bg-blue-custom text-white-custom"><i class="fa-solid fa-plus"></i>Tambah</button>
                                    </a>
                                    <a href="/import-soal">
                                        <button type="button" class="btn bg-green-custom text-white-custom"><i class="fa-solid fa-file-import"></i>Import</button>
                                    </a>
                                </div>
                            </div>
                            <div class="flex justify-between items-center gap-3 md:gap-0 flex-wrap">
                                <p class="text-sm font-medium text-black-custom">
                                    Show entries
                                    <input type="number" class="p-1 border border-gray-custom focus:outline-gray-custom rounded-sm w-10" placeholder="10">
                                </p>
                                <input type="text" class="border border-gray-custom text-black-custom text-sm rounded-sm block py-2 px-3 w-full md:max-w-sm focus:outline-gray-custom" placeholder="Search..." required>
                            </div>
                            {{-- table --}}
                            <div class="overflow-x-auto mt-4">
                                <table class="table table-zebra">
                                    <!-- head -->
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Soal</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <!-- row 1 -->
                                    <tr>
                                        <th>1</th>
                                        <td>
                                            <p class="text-black-custom text-sm font-medium">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas, ex!</p>
                                            <ul>
                                                <li class="text-black-custom text-sm font-medium">Jawaban A</li>
                                                <li class="text-blue-custom text-sm font-medium">Jawaban B (Dipilih)</li>
                                                <li class="text-black-custom text-sm font-medium">Jawaban C</li>
                                                <li class="text-black-custom text-sm font-medium">Jawaban D</li>
                                                <li class="text-black-custom text-sm font-medium">Jawaban E</li>
                                            </ul>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-edit bg-blue-custom text-white-custom"><i class="fa-regular fa-pen-to-square"></i></button>
                                            <button type="button" class="btn btn-hapus bg-red-custom text-white-custom"><i class="fa-regular fa-trash-can"></i></button>
                                        </td>
                                    </tr>
                                    <!-- row 2 -->
                                    <tr>
                                        <th>2</th>
                                        <td>
                                            <p class="text-black-custom text-sm font-medium">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Saepe, tempore et? Et perferendis voluptates explicabo.</p>
                                            <ul>
                                                <li class="text-black-custom text-sm font-medium">Jawaban A</li>
                                                <li class="text-black-custom text-sm font-medium">Jawaban B</li>
                                                <li class="text-black-custom text-sm font-medium">Jawaban C</li>
                                                <li class="text-blue-custom text-sm font-medium">Jawaban D (Dipilih)</li>
                                                <li class="text-black-custom text-sm font-medium">Jawaban E</li>
                                            </ul>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-edit bg-blue-custom text-white-custom"><i class="fa-regular fa-pen-to-square"></i></button>
                                            <button type="button" class="btn btn-hapus bg-red-custom text-white-custom"><i class="fa-regular fa-trash-can"></i></button>
                                        </td>
                                    </tr>
                                    <!-- row 3 -->
                                    <tr>
                                        <th>3</th>
                                        <td>
                                            <p class="text-black-custom text-sm font-medium">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum reiciendis numquam rem dolores omnis eveniet magnam aspernatur harum quis minus.</p>
                                            <ul>
                                                <li class="text-black-custom text-sm font-medium">Jawaban A</li>
                                                <li class="text-black-custom text-sm font-medium">Jawaban B</li>
                                                <li class="text-blue-custom text-sm font-medium">Jawaban C (Dipilih)</li>
                                                <li class="text-black-custom text-sm font-medium">Jawaban D</li>
                                                <li class="text-black-custom text-sm font-medium">Jawaban E</li>
                                            </ul>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-edit bg-blue-custom text-white-custom"><i class="fa-regular fa-pen-to-square"></i></button>
                                            <button type="button" class="btn btn-hapus bg-red-custom text-white-custom"><i class="fa-regular fa-trash-can"></i></button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            {{-- table --}}
                            {{-- pagination --}}
                            <div class="mt-4">
                                <div class="flex justify-between items-center gap-3 md:gap-0 flex-wrap">
                                    <p class="text-sm font-medium text-black-custom">Showing <span class="font-semibold text-sm">10</span> entries</p>
                                    <div class="join">
                                        <button class="join-item btn">«</button>
                                        <button class="join-item btn">Page 1</button>
                                        <button class="join-item btn">»</button>
                                    </div>
                                </div>
                            </div>
                            {{-- pagination --}}
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
        document.querySelectorAll('.btn-hapus').forEach(button => {
            button.addEventListener('click', () => {
                Swal.fire({
                    title: 'Apakah kamu yakin?',
                    text: "Data akan dihapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#1463ff',
                    cancelButtonColor: '#ff3b30',
                    confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Ganti dengan aksi penghapusan sesuai kebutuhan
                        console.log('Data dihapus!');
                    }
                });
            });
        });

        document.querySelectorAll('.btn-edit').forEach(button => {
            button.addEventListener('click', () => {
                // Ganti dengan redirect dinamis jika perlu
                window.location.href = '/edit-data-soal';
            });
        });
    </script>
    {{-- sweetalert --}}
</body>
</html>
