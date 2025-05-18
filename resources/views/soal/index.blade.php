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
                            <h3 class="lg:text-xl font-medium text-black-custom text-base mb-4">Data Soal Ujian</h3>
                            <div class="mb-5 flex justify-between w-full gap-3 md:gap-0 flex-col-reverse md:flex-row">
                                <form method="GET" action="{{ route('master_soal.index') }}" id="filterForm">
                                    <select class="select border border-gray-custom w-full md:w-xs" name="ujian_id"
                                        onchange="document.getElementById('filterForm').submit();">
                                        <option value="">Pilih Ujian</option>
                                        @foreach ($ujian as $item)
                                            <option value="{{ $item->id }}"
                                                {{ request('ujian_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->nama_ujian }}
                                            </option>
                                        @endforeach
                                    </select>
                                </form>

                                <div>
                                    <a href="{{ route('master_soal.create') }}">
                                        <button type="button" class="btn bg-blue-custom text-white-custom"><i
                                                class="fa-solid fa-plus"></i>Tambah</button>
                                    </a>
                                    <a href="/import-soal">
                                        <button type="button" class="btn bg-green-custom text-white-custom"><i
                                                class="fa-solid fa-file-import"></i>Import</button>
                                    </a>
                                </div>
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
                                <table class="min-w-full border border-gray-200 rounded-lg shadow-sm overflow-hidden">
                                    <!-- head -->
                                    <thead class="bg-blue-600 text-white">
                                        <tr>
                                            <th class="px-4 py-3 text-left text-sm font-semibold">No</th>
                                            <th class="px-4 py-3 text-left text-sm font-semibold">Soal</th>
                                            <th class="px-4 py-3 text-left text-sm font-semibold">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @forelse ($soal as $index => $item)
                                            <tr class="hover:bg-blue-50 transition duration-150">
                                                <td class="px-4 py-3 align-top text-sm text-gray-700">
                                                    {{ $index + 1 }}</td>
                                                <td class="px-4 py-3 align-top text-sm text-gray-700">
                                                    @if (Str::endsWith($item->soal, ['.jpg', '.jpeg', '.png', '.gif']))
                                                        <img src="{{ asset('storage/' . $item->soal) }}"
                                                            alt="Soal Gambar" class="w-32 h-auto mb-2">
                                                    @else
                                                        <p class="text-black-custom text-sm">{{ $item->soal }}</p>
                                                    @endif

                                                    <ul class="list-disc ml-5 mt-2 space-y-1">
                                                        @for ($i = 1; $i <= 4; $i++)
                                                            @php
                                                                $jawaban = $item["pilihan_$i"];
                                                                $isImage = Str::endsWith($jawaban, [
                                                                    '.jpg',
                                                                    '.jpeg',
                                                                    '.png',
                                                                    '.gif',
                                                                ]);
                                                                $isCorrect = "pilihan_$i" == $item->jawaban_benar;
                                                            @endphp
                                                            <li
                                                                class="{{ $isCorrect ? 'text-blue-600 font-semibold' : 'text-gray-700' }} text-sm">
                                                                @if ($isImage)
                                                                    <img src="{{ asset('storage/' . $jawaban) }}"
                                                                        alt="Pilihan Gambar" class="w-24 h-auto">
                                                                    @if ($isCorrect)
                                                                        <span class="ml-2">(Dipilih)</span>
                                                                    @endif
                                                                @else
                                                                    {{ $jawaban }}
                                                                    @if ($isCorrect)
                                                                        <span
                                                                            class="ml-2 font-semibold">(Dipilih)</span>
                                                                    @endif
                                                                @endif
                                                            </li>
                                                        @endfor
                                                    </ul>
                                                </td>
                                                <td class="px-4 py-3 align-top space-x-2">
                                                    <a href="{{ route('master_soal.edit', base64_encode($item->id)) }}"
                                                        class="btn btn-edit bg-blue-custom text-white-custom"><i
                                                            class="fa-regular fa-pen-to-square"></i></a>
                                                    <form action="{{ route('master_soal.destroy', $item->id) }}"
                                                        method="POST" class="form-hapus d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button"
                                                            class="btn btn-hapus bg-red-500 text-white hover:bg-red-600 transition"
                                                            data-id="{{ $item->id }}">
                                                            <i class="fa-regular fa-trash-can mr-1"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center px-4 py-6 text-gray-500">Tidak ada
                                                    soal untuk ujian ini.</td>
                                            </tr>
                                        @endforelse
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
</body>

</html>
