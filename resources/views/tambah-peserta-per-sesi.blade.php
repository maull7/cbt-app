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
                            <h3 class="lg:text-xl font-medium text-black-custom text-base mb-4">Tambah Kelompok Ujian</h3>
                            <div class="mb-6 flex justify-between w-full gap-3 lg:gap-0 flex-wrap">
                                <select class="select border border-gray-custom w-full md:w-xs">
                                    <option disabled selected>Pilih Ujian</option>
                                    <option>Bahasa Indonesia Kelas X</option>
                                    <option>Bahasa Indonesia Kelas XI</option>
                                    <option>Bahasa Indonesia Kelas XII</option>
                                </select>
                                <select class="select border border-gray-custom w-full md:w-xs">
                                    <option disabled selected>Pilih Sesi</option>
                                    <option>Sesi 1</option>
                                    <option>Sesi 2</option>
                                    <option>Sesi 3</option>
                                </select>
                                <div>
                                    <a href="/peserta-per-sesi">
                                        <button type="button" class="btn bg-blue-custom text-white-custom"><i class="fa-solid fa-save"></i>Simpan</button>
                                    </a>
                                    <a href="/peserta-per-sesi">
                                        <button type="button" class="btn bg-red-custom text-white-custom" id="batal"><i class="fa-regular fa-circle-xmark text-white-custom"></i>Batal</button>
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
                            <div class="overflow-x-auto">
                                <table class="table">
                                    <!-- head -->
                                    <thead>
                                    <tr>
                                        <th>
                                        <label>
                                            <input type="checkbox" class="checkbox" id="selectAll" />
                                        </label>
                                        </th>
                                        <th>No</th>
                                        <th>No Ujian</th>
                                        <th>Nama Peserta</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Nama Sekolah</th>
                                        <th>Kelas</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <!-- row 1 -->
                                    <tr>
                                        <th>
                                        <label>
                                            <input type="checkbox" class="checkbox row-checkbox" />
                                        </label>
                                        </th>
                                        <td>1</td>
                                        <td>12313123</td>
                                        <td>Budi</td>
                                        <td>L</td>
                                        <td>SMK Negeri 1</td>
                                        <td>X RPL 1</td>
                                    </tr>
                                    <!-- row 2 -->
                                    <tr>
                                        <th>
                                        <label>
                                            <input type="checkbox" class="checkbox row-checkbox" />
                                        </label>
                                        </th>
                                        <td>2</td>
                                        <td>12313123</td>
                                        <td>Budi</td>
                                        <td>L</td>
                                        <td>SMK Negeri 1</td>
                                        <td>X RPL 1</td>
                                    </tr>
                                    <!-- row 3 -->
                                    <tr>
                                        <th>
                                        <label>
                                            <input type="checkbox" class="checkbox row-checkbox" />
                                        </label>
                                        </th>
                                        <td>3</td>
                                        <td>12313123</td>
                                        <td>Budi</td>
                                        <td>L</td>
                                        <td>SMK Negeri 1</td>
                                        <td>X RPL 1</td>
                                    </tr>
                                    <!-- row 4 -->
                                    <tr>
                                        <th>
                                        <label>
                                            <input type="checkbox" class="checkbox row-checkbox" />
                                        </label>
                                        </th>
                                        <td>4</td>
                                        <td>12313123</td>
                                        <td>Budi</td>
                                        <td>L</td>
                                        <td>SMK Negeri 1</td>
                                        <td>X RPL 1</td>
                                    </tr>
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

    {{-- checkbox all --}}
    <script>
        const selectAllCheckbox = document.getElementById("selectAll");
        const rowCheckboxes = document.querySelectorAll(".row-checkbox");

        selectAllCheckbox.addEventListener("change", function () {
            rowCheckboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
            });
        });
    </script>
    {{-- checkbox all --}}

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
                window.location.href = '/edit-data-sesi';
            });
        });
    </script>
    {{-- sweetalert --}}
</body>
</html>
