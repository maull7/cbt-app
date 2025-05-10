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
                            <h3 class="lg:text-xl font-medium text-black-custom text-base mb-4">Tambah mapel
                            </h3>
                            <form action="{{ route('master_mapel.store') }}" method="POST">
                                @csrf

                                <div class="mb-4">
                                    <label for="nama-mapel"
                                        class="block mb-3 text-sm font-medium text-black-custom">Nama mapel</label>
                                    <input type="text"
                                        class="border border-gray-custom text-sm rounded-lg block py-3 px-2 text-black-custom w-full md:w-md focus:outline-gray-custom font-medium"
                                        name="nama_mapel" id="nama-mapel" placeholder="Nama mapel" required>
                                </div>
                                <select name="id_guru" id="guru"
                                    class="border border-gray-custom text-sm rounded-lg block py-3 px-2 text-black-custom w-full md:w-md focus:outline-gray-custom font-medium"
                                    required>
                                    <option value="">-- Pilih Guru --</option>
                                    @foreach ($guru as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('id_guru') == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
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


</body>

</html>
