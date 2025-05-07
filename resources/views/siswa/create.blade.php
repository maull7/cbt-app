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
                            <h3 class="lg:text-xl font-medium text-black-custom text-base mb-4">Tambah Siswa
                            </h3>
                            <form action="{{ route('master_siswa.store') }}" method="POST">
                                @csrf

                                <!-- NIS -->
                                <div class="mb-4">
                                    <label for="nis"
                                        class="block mb-3 text-sm font-medium text-black-custom">NIS</label>
                                    @error('nis')
                                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                                    @enderror
                                    <input type="text" name="nis" id="nis" required
                                        class="border border-gray-custom text-sm rounded-lg block py-3 px-2 text-black-custom w-full md:w-md"
                                        value="{{ old('nis') }}" placeholder="Masukkan NIS">
                                </div>

                                <!-- NISN -->
                                <div class="mb-4">
                                    <label for="nisn"
                                        class="block mb-3 text-sm font-medium text-black-custom">NISN</label>
                                    @error('nisn')
                                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                                    @enderror
                                    <input type="text" name="nisn" id="nisn" required
                                        class="border border-gray-custom text-sm rounded-lg block py-3 px-2 text-black-custom w-full md:w-md"
                                        value="{{ old('nisn') }}" placeholder="Masukkan NISN">
                                </div>

                                <!-- Nama -->
                                <div class="mb-4">
                                    <label for="nama"
                                        class="block mb-3 text-sm font-medium text-black-custom">Nama</label>
                                    @error('nama')
                                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                                    @enderror
                                    <input type="text" name="nama" id="nama" required
                                        class="border border-gray-custom text-sm rounded-lg block py-3 px-2 text-black-custom w-full md:w-md"
                                        value="{{ old('nama') }}" placeholder="Masukkan nama lengkap">
                                </div>

                                <!-- Tanggal Lahir -->
                                <div class="mb-4">
                                    <label for="tanggal_lahir"
                                        class="block mb-3 text-sm font-medium text-black-custom">Tanggal Lahir</label>
                                    @error('tanggal_lahir')
                                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                                    @enderror
                                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" required
                                        class="border border-gray-custom text-sm rounded-lg block py-3 px-2 text-black-custom w-full md:w-md"
                                        value="{{ old('tanggal_lahir') }}">
                                </div>

                                <!-- Jenis Kelamin -->
                                <div class="mb-4">
                                    <label class="block mb-3 text-sm font-medium text-black-custom">Jenis
                                        Kelamin</label>
                                    @error('jenis_kelamin')
                                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                                    @enderror
                                    <div class="flex gap-6 items-center">
                                        <label class="flex items-center gap-2">
                                            <input type="radio" name="jenis_kelamin" value="Laki-laki"
                                                {{ old('jenis_kelamin') == 'Laki-laki' ? 'checked' : '' }}>
                                            <span class="text-black-custom">Laki-laki</span>
                                        </label>
                                        <label class="flex items-center gap-2">
                                            <input type="radio" name="jenis_kelamin" value="Perempuan"
                                                {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }}>
                                            <span class="text-black-custom">Perempuan</span>
                                        </label>
                                    </div>
                                </div>


                                <!-- Password -->


                                <!-- Kelas -->
                                <div class="mb-4">
                                    <label for="kelas"
                                        class="block mb-3 text-sm font-medium text-black-custom">Kelas</label>
                                    @error('id_kelas')
                                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                                    @enderror
                                    <select name="id_kelas" id="kelas"
                                        class="border border-gray-custom text-sm rounded-lg block py-3 px-2 text-black-custom w-full md:w-md"
                                        required>
                                        <option value="">-- Pilih Kelas --</option>
                                        @foreach ($kelas as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
                                        @endforeach
                                    </select>
                                </div>



                                <!-- Tombol Aksi -->
                                <div class="pt-4 flex gap-1 flex-wrap">
                                    <button type="submit" class="btn bg-blue-custom text-white-custom" id="simpan">
                                        <i class="fa-regular fa-floppy-disk text-white-custom"></i> Simpan
                                    </button>
                                    <a href="{{ route('master_siswa.index') }}"
                                        class="btn bg-red-custom text-white-custom">
                                        <i class="fa-regular fa-circle-xmark text-white-custom"></i> Batal
                                    </a>
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
