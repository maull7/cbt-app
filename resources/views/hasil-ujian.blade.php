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
                            <h3 class="lg:text-xl font-medium text-black-custom text-base mb-4">Hasil Ujian</h3>
                            <div class="mb-6 flex justify-between items-center flex-wrap gap-3 md:gap-0">
                                <select class="select border border-gray-custom w-full md:w-xs">
                                    <option disabled selected>Pilih Ujian</option>
                                    <option>Bahasa Indonesia Kelas X</option>
                                    <option>Bahasa Indonesia Kelas XI</option>
                                    <option>Bahasa Indonesia Kelas XII</option>
                                </select>
                                {{-- button akan muncul klo di select ujiannya --}}
                                <div class="hidden">
                                    <a href="/">
                                        <button type="button" class="btn bg-green-500 text-white-custom"><i class="fa-solid fa-file-export"></i>Export Nilai</button>
                                    </a>
                                    <a href="/">
                                        <button type="button" class="btn bg-yellow-500 text-white-custom"><i class="fa-solid fa-file-export"></i>Export Jawaban</button>
                                    </a>
                                </div>
                                {{-- button akan muncul klo di select ujiannya --}}
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
                                        <th>No Ujian</th>
                                        <th>Nama Peserta</th>
                                        <th>Mulai</th>
                                        <th>Selesai</th>
                                        <th>Jumlah Benar</th>
                                        <th>Nilai</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <!-- row 1 -->
                                    <tr>
                                        <th>1</th>
                                        <td>123123123</td>
                                        <td>Budi</td>
                                        <td>2025-05-05 08:00:00</td>
                                        <td>2025-05-05 09:40:00</td>
                                        <td>15</td>
                                        <td>80,00</td>
                                        <td>
                                            <a href="/view-hasil-ujian">
                                                <button type="button" class="btn bg-blue-custom text-white-custom"><i class="fa-regular fa-eye"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                    <!-- row 2 -->
                                    <tr>
                                        <th>2</th>
                                        <td>123123123</td>
                                        <td>Budi</td>
                                        <td>2025-05-05 08:00:00</td>
                                        <td>2025-05-05 09:40:00</td>
                                        <td>15</td>
                                        <td>80,00</td>
                                        <td>
                                            <a href="/view-hasil-ujian">
                                                <button type="button" class="btn bg-blue-custom text-white-custom"><i class="fa-regular fa-eye"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                    <!-- row 3 -->
                                    <tr>
                                        <th>3</th>
                                        <td>123123123</td>
                                        <td>Budi</td>
                                        <td>2025-05-05 08:00:00</td>
                                        <td>2025-05-05 09:40:00</td>
                                        <td>15</td>
                                        <td>80,00</td>
                                        <td>
                                            <a href="/view-hasil-ujian">
                                                <button type="button" class="btn bg-blue-custom text-white-custom"><i class="fa-regular fa-eye"></i></button>
                                            </a>
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
</body>
</html>
