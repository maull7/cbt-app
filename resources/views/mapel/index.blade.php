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
                            <h3 class="lg:text-xl font-medium text-black-custom text-base mb-4">Data Master Mapel</h3>
                            <div class="mb-5 flex gap-2 flex-wrap">
                                <a href="{{ route('master_mapel.create') }}">
                                    <button type="button" class="btn bg-blue-custom text-white-custom"><i
                                            class="fa-solid fa-plus"></i>Tambah Mapel</button>
                                </a>

                            </div>
                            <div class="flex justify-between items-center gap-3 md:gap-0 flex-wrap">
                                <p class="text-sm font-medium text-black-custom">
                                    Show entries
                                    <input type="number"
                                        class="p-1 border border-gray-custom focus:outline-gray-custom rounded-sm w-10"
                                        placeholder="10">
                                </p>
                                <input type="text"
                                    class="border border-gray-custom text-black-custom text-sm rounded-sm block py-2 px-3 w-full md:max-w-sm focus:outline-gray-custom"
                                    placeholder="Search..." required>
                            </div>
                            {{-- table --}}
                            <div class="overflow-x-auto mt-4">
                                <table class="table w-full rounded-lg overflow-hidden shadow-md border">
                                    <!-- head -->
                                    <thead class="bg-blue-500 text-white">
                                        <tr>
                                            <th class="px-4 py-3 text-left">No</th>
                                            <th class="px-4 py-3 text-left">Mata Pelajaran</th>
                                            <th class="px-4 py-3 text-left">Nama Guru</th>
                                            <th class="px-4 py-3 text-left">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white text-black">
                                        @foreach ($mapel as $data)
                                            <tr class="hover:bg-blue-50 transition-colors duration-200">
                                                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                                <td class="px-4 py-2">{{ $data->nama_mapel }}</td>
                                                <td class="px-4 py-2">{{ $data->guru->nama }}</td>
                                                <td class="px-4 py-2 flex gap-2">
                                                    <a href="{{ route('master_mapel.edit', base64_encode($data->id)) }}"
                                                        class="btn btn-edit bg-blue-custom text-white-custom"><i
                                                            class="fa-regular fa-pen-to-square"></i></a>
                                                    <form action="{{ route('master_mapel.destroy', $data->id) }}"
                                                        method="POST" class="form-hapus d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button"
                                                            class="btn btn-hapus bg-red-500 text-white hover:bg-red-600 transition"
                                                            data-id="{{ $data->id }}">
                                                            <i class="fa-regular fa-trash-can mr-1"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                            {{-- table --}}
                            {{-- pagination --}}
                            <div class="mt-4">
                                <div class="flex justify-between items-center gap-3 md:gap-0 flex-wrap">
                                    <p class="text-sm font-medium text-black-custom">Showing <span
                                            class="font-semibold text-sm">10</span> entries</p>
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
            button.addEventListener('click', function() {
                Swal.fire({
                    title: 'Apakah kamu yakin?',
                    text: "Data akan dihapus secara permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#1463ff',
                    cancelButtonColor: '#ff3b30',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Temukan form terdekat dari tombol yang ditekan
                        this.closest('form').submit();
                    }
                });
            });
        });
    </script>
    {{-- sweetalert --}}
</body>

</html>
