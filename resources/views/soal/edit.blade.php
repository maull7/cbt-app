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
                <div class="alert-container">
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-exclamation-circle me-2"></i>
                                <div>
                                    <h5 class="alert-heading mb-1">Submission Failed</h5>
                                    <div class="error-message">{!! session('error') !!}</div>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <div>
                                    <h5 class="alert-heading mb-1">Validation Errors</h5>
                                    <ul class="mb-0 error-list">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle me-2"></i>
                                <div>
                                    <h5 class="alert-heading mb-1">Success!</h5>
                                    <div>{{ session('success') }}</div>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                </div>
                <div class="grid grid-cols-1">
                    <div class="card w-auto bg-white-custom shadow-sm">
                        <div class="card-body">
                            <h3 class="lg:text-xl font-medium text-black-custom text-base mb-4">Tambah Soal Ujian</h3>
                            <form action="{{ route('master_soal.update', $soal->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                {{-- Ujian --}}
                                <div class="mb-4">
                                    <label class="block mb-3 text-sm font-medium text-black-custom">Ujian</label>
                                    <select class="select border border-gray-custom w-full md:w-xs" required
                                        name="id_ujian">
                                        <option disabled>Pilih Ujian</option>
                                        @foreach ($ujian as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $soal->id_ujian == $item->id ? 'selected' : '' }}>
                                                {{ $item->nama_ujian }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Kategori Soal --}}
                                <div class="mb-4">
                                    <label class="block mb-3 text-sm font-medium text-black-custom">Kategori
                                        Soal</label>
                                    <select class="select border border-gray-custom w-full md:w-xs" required
                                        name="id_kategori_soal" id="kategori_soal">
                                        <option disabled>Pilih Jenis Soal</option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}" data-type="{{ $item->type }}"
                                                {{ $soal->id_kategori_soal == $item->id ? 'selected' : '' }}>
                                                {{ $item->type }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Soal --}}
                                <div class="mb-4">
                                    <label class="block mb-3 text-sm font-medium text-black-custom">Soal</label>
                                    <div id="soalField">
                                        @php
                                            $soalKategori = $kategori->firstWhere('id', $soal->id_kategori_soal);
                                        @endphp
                                        @if ($soalKategori && $soalKategori->type == 'image')
                                            <div class="mb-2">
                                                <img src="{{ asset('storage/' . $soal->soal) }}" class="w-32 h-auto"
                                                    alt="Soal Gambar">
                                            </div>
                                            <input type="file" name="soal" accept="image/*"
                                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                        @else
                                            <textarea class="textarea border border-gray-custom w-full" name="soal">{{ $soal->soal }}</textarea>
                                        @endif
                                    </div>
                                </div>

                                {{-- Kategori Jawaban --}}
                                <div class="mb-4">
                                    <label class="block mb-3 text-sm font-medium text-black-custom">Kategori
                                        Jawaban</label>
                                    <select class="select border border-gray-custom w-full md:w-xs" required
                                        name="id_kategori_jawaban" id="kategori_jawaban">
                                        <option disabled>Pilih Jenis Jawaban</option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}" data-type="{{ $item->type }}"
                                                {{ $soal->id_kategori_jawaban == $item->id ? 'selected' : '' }}>
                                                {{ $item->type }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Pilihan 1 - 4 --}}
                                @php
                                    $jawabanKategori = $kategori->firstWhere('id', $soal->id_kategori_jawaban);
                                @endphp
                                @for ($i = 1; $i <= 4; $i++)
                                    <div class="mb-4">
                                        <label class="block mb-3 text-sm font-medium text-black-custom">Pilihan
                                            {{ $i }}</label>
                                        <div id="input_pilihan_{{ $i }}">
                                            @php $pilihan = "pilihan_{$i}"; @endphp
                                            @if ($jawabanKategori && $jawabanKategori->type == 'image')
                                                @if ($soal->$pilihan)
                                                    <div class="mb-2">
                                                        <img src="{{ asset('storage/' . $soal->$pilihan) }}"
                                                            class="w-24 h-auto" alt="Pilihan {{ $i }}">
                                                    </div>
                                                @endif
                                                <input type="file" name="pilihan_{{ $i }}"
                                                    accept="image/*"
                                                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                            @else
                                                <textarea class="textarea border border-gray-custom w-full" name="pilihan_{{ $i }}">{{ $soal->$pilihan }}</textarea>
                                            @endif
                                        </div>
                                    </div>
                                @endfor

                                {{-- Jawaban Benar --}}
                                <div class="mb-4">
                                    <label class="block mb-3 text-sm font-medium text-black-custom">Jawaban
                                        Benar</label>
                                    <select name="jawaban_benar"
                                        class="select border border-gray-custom w-full md:w-xs" required>
                                        <option disabled>Pilih Jawaban Benar</option>
                                        @for ($i = 1; $i <= 4; $i++)
                                            <option value="{{ $i }}"
                                                {{ $soal->jawaban_benar == "$i" ? 'selected' : '' }}>Pilihan
                                                {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>

                                {{-- Poin --}}
                                <div class="mb-4">
                                    <label class="block mb-3 text-sm font-medium text-black-custom">Poin</label>
                                    <input type="number" name="poin" min="0"
                                        class="input border border-gray-custom w-full" value="{{ $soal->poin }}"
                                        required>
                                </div>

                                {{-- Tombol --}}
                                <div class="pt-4 flex gap-1 flex-wrap">
                                    <button type="submit" class="btn bg-blue-custom text-white-custom">
                                        <i class="fa-regular fa-floppy-disk text-white-custom"></i> Update
                                    </button>
                                    <a href="{{ route('master_soal.index') }}" class="btn bg-gray-300 text-black">
                                        <i class="fa-regular fa-circle-xmark"></i> Batal
                                    </a>
                                </div>
                            </form>


                            {{-- JavaScript --}}
                            <script>
                                function updateSoal(type) {
                                    const Soal = document.getElementById('soalField');
                                    const currentValue = Soal.querySelector('textarea') ? Soal.querySelector('textarea').value :
                                        (Soal.querySelector('input[type="file"]') ? Soal.querySelector('input[type="file"]').dataset.current : '');

                                    Soal.innerHTML = '';

                                    if (type == 'image') {
                                        // For image type
                                        const fileInput = document.createElement('input');
                                        fileInput.name = 'soal';
                                        fileInput.type = 'file';
                                        fileInput.accept = 'image/*';
                                        fileInput.className =
                                            'block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100';

                                        // If we're switching from text to image but had a previous image
                                        if (currentValue && currentValue.startsWith('storage/')) {
                                            const imgPreview = document.createElement('div');
                                            imgPreview.className = 'mb-2';
                                            imgPreview.innerHTML =
                                                `<img src="{{ asset('storage/') }}/${currentValue.replace('storage/', '')}" class="w-32 h-auto" alt="Current Image">`;
                                            Soal.appendChild(imgPreview);
                                            fileInput.dataset.current = currentValue;
                                        }

                                        Soal.appendChild(fileInput);
                                    } else {
                                        // For text type
                                        const textarea = document.createElement('textarea');
                                        textarea.name = 'soal';
                                        textarea.className = 'textarea border border-gray-custom w-full';

                                        // If we're switching from image to text, use the stored text value if available
                                        if (currentValue && !currentValue.startsWith('storage/')) {
                                            textarea.value = currentValue;
                                        } else if (document.querySelector('textarea[name="soal"]')) {
                                            // Fallback to existing textarea value
                                            textarea.value = document.querySelector('textarea[name="soal"]').value;
                                        }

                                        Soal.appendChild(textarea);
                                    }
                                }

                                function updatePilihanInputs(type) {
                                    for (let i = 1; i <= 4; i++) {
                                        const container = document.getElementById(`input_pilihan_${i}`);
                                        const currentInput = container.querySelector('textarea') || container.querySelector('input[type="file"]');
                                        const currentValue = currentInput ?
                                            (currentInput.tagName === 'TEXTAREA' ? currentInput.value :
                                                (currentInput.dataset.current || '')) : '';

                                        container.innerHTML = '';

                                        if (type === 'image') {
                                            // For image type
                                            const fileInput = document.createElement('input');
                                            fileInput.type = 'file';
                                            fileInput.name = `pilihan_${i}`;
                                            fileInput.accept = 'image/*';
                                            fileInput.className =
                                                'block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100';

                                            // If we have a current image value
                                            if (currentValue && currentValue.startsWith('storage/')) {
                                                const imgPreview = document.createElement('div');
                                                imgPreview.className = 'mb-2';
                                                imgPreview.innerHTML =
                                                    `<img src="{{ asset('storage/') }}/${currentValue.replace('storage/', '')}" class="w-24 h-auto" alt="Current Pilihan ${i}">`;
                                                container.appendChild(imgPreview);
                                                fileInput.dataset.current = currentValue;
                                            }

                                            container.appendChild(fileInput);
                                        } else {
                                            // For text type
                                            const textarea = document.createElement('textarea');
                                            textarea.name = `pilihan_${i}`;
                                            textarea.className = 'textarea border border-gray-custom w-full';

                                            // Set the value if available
                                            if (currentValue && !currentValue.startsWith('storage/')) {
                                                textarea.value = currentValue;
                                            } else if (document.querySelector(`textarea[name="pilihan_${i}"]`)) {
                                                // Fallback to existing textarea value
                                                textarea.value = document.querySelector(`textarea[name="pilihan_${i}"]`).value;
                                            }

                                            container.appendChild(textarea);
                                        }
                                    }
                                }

                                document.getElementById('kategori_jawaban').addEventListener('change', function() {
                                    const selected = this.options[this.selectedIndex];
                                    const type = selected.getAttribute('data-type');
                                    updatePilihanInputs(type);
                                });

                                document.getElementById('kategori_soal').addEventListener('change', function() {
                                    const selected = this.options[this.selectedIndex];
                                    const type = selected.getAttribute('data-type');
                                    updateSoal(type);
                                });
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- content --}}
    </div>

    {{-- quill --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.editor').forEach((el) => {
                new Quill(el, {
                    theme: 'snow'
                });
            });
        });
    </script>

    {{-- sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- sweetalert --}}
</body>

</html>
