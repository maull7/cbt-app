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
                            <form action="{{ route('master_soal.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                {{-- Ujian --}}
                                <div class="mb-4">
                                    <label class="block mb-3 text-sm font-medium text-black-custom">Ujian</label>
                                    <select class="select border border-gray-custom w-full md:w-xs" required
                                        name="id_ujian">
                                        <option disabled selected>Pilih Ujian</option>
                                        @foreach ($ujian as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_ujian }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Kategori Soal --}}
                                <div class="mb-4">
                                    <label class="block mb-3 text-sm font-medium text-black-custom">Kategori
                                        Soal</label>
                                    <select class="select border border-gray-custom w-full md:w-xs" required
                                        name="id_kategori_soal" id="kategori_soal">
                                        <option disabled selected>Pilih Jenis Soal</option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}" data-type="{{ $item->type }}">
                                                {{ $item->type }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Soal --}}
                                <div class="mb-4">
                                    <label class="block mb-3 text-sm font-medium text-black-custom">Soal</label>
                                    <div id="soalField">
                                        <textarea class="textarea border border-gray-custom w-full" name="soal" required></textarea>

                                    </div>
                                </div>

                                {{-- Kategori Jawaban --}}
                                <div class="mb-4">
                                    <label class="block mb-3 text-sm font-medium text-black-custom">Kategori
                                        Jawaban</label>
                                    <select class="select border border-gray-custom w-full md:w-xs" required
                                        name="id_kategori_jawaban" id="kategori_jawaban">
                                        <option disabled selected>Pilih Jenis Jawaban</option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}" data-type="{{ $item->type }}">
                                                {{ $item->type }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Pilihan 1 - 5 --}}
                                @for ($i = 1; $i <= 4; $i++)
                                    <div class="mb-4">
                                        <label class="block mb-3 text-sm font-medium text-black-custom">Pilihan
                                            {{ $i }}</label>
                                        <div id="input_pilihan_{{ $i }}">
                                            <textarea class="textarea border border-gray-custom w-full" name="pilihan_{{ $i }}"></textarea>
                                        </div>
                                    </div>
                                @endfor

                                {{-- Jawaban Benar --}}
                                <div class="mb-4">
                                    <label class="block mb-3 text-sm font-medium text-black-custom">Jawaban
                                        Benar</label>
                                    <select name="jawaban_benar" class="select border border-gray-custom w-full md:w-xs"
                                        required>
                                        <option disabled selected>Pilih Jawaban Benar</option>
                                        @for ($i = 1; $i <= 4; $i++)
                                            <option value="{{ $i }}">Pilihan {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>

                                {{-- Poin --}}
                                <div class="mb-4">
                                    <label class="block mb-3 text-sm font-medium text-black-custom">Poin</label>
                                    <input type="number" name="poin" min="0"
                                        class="input border border-gray-custom w-full" required>
                                </div>

                                <div class="pt-4 flex gap-1 flex-wrap">
                                    <button type="submit" class="btn bg-blue-custom text-white-custom">
                                        <i class="fa-regular fa-floppy-disk text-white-custom"></i> Simpan
                                    </button>
                                    <button type="button" class="btn bg-red-custom text-white-custom"
                                        id="batal">
                                        <i class="fa-regular fa-circle-xmark text-white-custom"></i> Batal
                                    </button>
                                </div>
                            </form>

                            {{-- JavaScript --}}
                            <script>
                                function updateSoal(type) {
                                    const Soal = document.getElementById('soalField');
                                    Soal.innerHTML = '';
                                    if (type == 'image') {
                                        const input = document.createElement('input')
                                        input.name = 'soal'
                                        input.type = 'file'
                                        input.accept = 'image/*';
                                        input.className =
                                            'block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100';
                                        Soal.appendChild(input);
                                    } else {
                                        const textarea = document.createElement('textarea');
                                        textarea.name = `soal`;
                                        textarea.className = 'textarea border border-gray-custom w-full';
                                        Soal.appendChild(textarea);
                                    }
                                }

                                function updatePilihanInputs(type) {
                                    for (let i = 1; i <= 4; i++) {
                                        const container = document.getElementById(`input_pilihan_${i}`);
                                        container.innerHTML = '';
                                        if (type === 'image') {
                                            const input = document.createElement('input');
                                            input.type = 'file';
                                            input.name = `pilihan_${i}`;
                                            input.accept = 'image/*';
                                            input.className =
                                                'block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100';
                                            container.appendChild(input);
                                        } else {
                                            const textarea = document.createElement('textarea');
                                            textarea.name = `pilihan_${i}`;
                                            textarea.className = 'textarea border border-gray-custom w-full';
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
                                })
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
