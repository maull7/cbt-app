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
                            <form action="{{ route('master_soal.store-all') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                                    <div class="mb-4">
                                        <label for="nama-ujian"
                                            class="block mb-3 text-sm font-medium text-black-custom">Ujian</label>
                                        <select name="id_ujian" class="select border border-gray-custom w-full md:w-xs"
                                            readonly>
                                            <option value="{{ $ujian->id }}">{{ $ujian->nama_ujian }}</option>
                                        </select>
                                        @error('id_ujian')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                @for ($i = 1; $i <= $jumlah_soal; $i++)
                                    <div class="mb-8 p-4 border border-gray-200 rounded-lg"
                                        id="soal-container-{{ $i }}">
                                        <h3 class="text-lg font-semibold mb-4 text-blue-800">Soal {{ $i }}
                                        </h3>

                                        <!-- Question Type Selection -->
                                        <div class="mb-4">
                                            <label class="block mb-3 text-sm font-medium text-black-custom">Pilih
                                                kategori soal</label>
                                            <select name="soal[{{ $i }}][id_kategori_soal]"
                                                class="select border border-gray-custom w-full md:w-xs kategori-soal"
                                                data-soal="{{ $i }}">
                                                <option value="">Pilih</option>
                                                @foreach ($kategori as $item)
                                                    <option value="{{ $item->id }}"
                                                        data-type="{{ $item->type }}">
                                                        {{ $item->type }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error("soal.$i.id_kategori_soal")
                                                <span class="text-red-500 text-xs">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Dynamic Question Input -->
                                        <div class="mb-4">
                                            <label class="block mb-3 text-sm font-medium text-black-custom">Soal
                                                {{ $i }}</label>
                                            <div id="soal-input-{{ $i }}">
                                                <!-- Default to text input -->
                                                <textarea name="soal[{{ $i }}][text]"
                                                    class="w-full border border-gray-300 rounded p-2 @error("soal.$i.text") border-red-500 @enderror" rows="3"
                                                    placeholder="Masukkan teks soal"></textarea>
                                            </div>
                                            @error("soal.$i.text")
                                                <span class="text-red-500 text-xs">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Answer Type Selection -->
                                        <div class="mb-4">
                                            <label class="block mb-3 text-sm font-medium text-black-custom">Pilih
                                                Kategori Jawaban</label>
                                            <select name="soal[{{ $i }}][id_kategori_jawaban]"
                                                class="select border border-gray-custom w-full md:w-xs kategori-jawaban"
                                                data-soal="{{ $i }}">
                                                <option value="">Pilih</option>
                                                @foreach ($kategori as $item)
                                                    <option value="{{ $item->id }}"
                                                        data-type="{{ $item->type }}">
                                                        {{ $item->type }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error("soal.$i.id_kategori_jawaban")
                                                <span class="text-red-500 text-xs">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Dynamic Answer Options -->
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                            @for ($j = 1; $j <= 4; $j++)
                                                <div class="answer-option"
                                                    id="answer-option-{{ $i }}-{{ $j }}">
                                                    <label class="block mb-2 text-sm font-medium text-black-custom">
                                                        Pilihan {{ $j }}
                                                    </label>
                                                    <div id="pilihan-input-{{ $i }}-{{ $j }}">
                                                        <input type="text"
                                                            name="soal[{{ $i }}][pilihan][{{ $j }}][text]"
                                                            class="w-full border border-gray-300 rounded p-2 @error("soal.$i.pilihan.$j.text") border-red-500 @enderror"
                                                            placeholder="Masukkan teks jawaban">
                                                    </div>
                                                    @error("soal.$i.pilihan.$j.text")
                                                        <span class="text-red-500 text-xs">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            @endfor
                                        </div>

                                        <!-- Correct Answer Selection -->
                                        <div class="mb-4">
                                            <label class="block mb-3 text-sm font-medium text-black-custom">Jawaban
                                                Benar</label>
                                            <select name="soal[{{ $i }}][jawaban_benar]"
                                                class="select border border-gray-custom w-full md:w-xs @error("soal.$i.jawaban_benar") border-red-500 @enderror">
                                                <option value="">Pilih Jawaban Benar</option>
                                                @for ($j = 1; $j <= 4; $j++)
                                                    <option value="{{ $j }}">Pilihan {{ $j }}
                                                    </option>
                                                @endfor
                                            </select>
                                            @error("soal.$i.jawaban_benar")
                                                <span class="text-red-500 text-xs">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Poin Field -->
                                        <div class="mb-4">
                                            <label for="poin_{{ $i }}"
                                                class="block mb-3 text-sm font-medium text-black-custom">Poin
                                                Soal</label>
                                            <input type="number" name="soal[{{ $i }}][poin]"
                                                id="poin_{{ $i }}"
                                                class="w-full border border-gray-300 rounded p-2 @error("soal.$i.poin") border-red-500 @enderror"
                                                value="1" min="1">
                                            @error("soal.$i.poin")
                                                <span class="text-red-500 text-xs">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                @endfor

                                <!-- Submit and Cancel Buttons -->
                                <div class="pt-4 flex gap-4 justify-end">
                                    <button type="button"
                                        class="btn bg-red-custom text-white-custom hover:bg-red-700" id="batal">
                                        <i class="fa-regular fa-circle-xmark text-white-custom"></i> Batal
                                    </button>
                                    <button type="submit"
                                        class="btn bg-blue-custom text-white-custom hover:bg-blue-700" id="simpan">
                                        <i class="fa-regular fa-floppy-disk text-white-custom"></i> Simpan Semua Soal
                                    </button>
                                </div>
                            </form>


                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    // Handle question type change
                                    document.querySelectorAll('.kategori-soal').forEach(select => {
                                        select.addEventListener('change', function() {
                                            const soalId = this.getAttribute('data-soal');
                                            const selectedOption = this.options[this.selectedIndex];
                                            const type = selectedOption.getAttribute('data-type');
                                            const inputContainer = document.getElementById(`soal-input-${soalId}`);

                                            updateInputField(inputContainer, type, 'soal', soalId);
                                        });
                                    });

                                    // Handle answer type change
                                    document.querySelectorAll('.kategori-jawaban').forEach(select => {
                                        select.addEventListener('change', function() {
                                            const soalId = this.getAttribute('data-soal');
                                            const selectedOption = this.options[this.selectedIndex];
                                            const type = selectedOption.getAttribute('data-type');

                                            // Update all answer options for this question
                                            for (let j = 1; j <= 4; j++) {
                                                const answerContainer = document.getElementById(
                                                    `pilihan-input-${soalId}-${j}`);
                                                updateInputField(answerContainer, type, 'pilihan', soalId, j);
                                            }
                                        });
                                    });

                                    function updateInputField(container, type, fieldType, soalId, optionId = null) {
                                        // Clear existing input
                                        container.innerHTML = '';

                                        if (type === 'image') {
                                            // Create file input for image
                                            const input = document.createElement('input');
                                            input.type = 'file';
                                            if (fieldType === 'soal') {
                                                input.name = `soal[${soalId}][image]`;
                                            } else {
                                                input.name = `soal[${soalId}][pilihan][${optionId}][image]`;
                                            }
                                            input.className = 'w-full border border-gray-300 rounded p-2';
                                            input.accept = 'image/*';
                                            container.appendChild(input);

                                            // ✅ Tambahkan hidden input text kosong agar Laravel tetap mengenali arraynya
                                            if (fieldType === 'pilihan') {
                                                const dummy = document.createElement('input');
                                                dummy.type = 'hidden';
                                                dummy.name = `soal[${soalId}][pilihan][${optionId}][text]`;
                                                dummy.value = '';
                                                container.appendChild(dummy);
                                            }

                                            // Add preview container
                                            const preview = document.createElement('div');
                                            preview.className = 'mt-2';
                                            preview.id = `preview-${fieldType}-${soalId}${optionId ? '-' + optionId : ''}`;
                                            container.appendChild(preview);

                                            // Add event listener for preview
                                            input.addEventListener('change', function(e) {
                                                const file = e.target.files[0];
                                                if (file) {
                                                    const reader = new FileReader();
                                                    reader.onload = function(event) {
                                                        const img = document.createElement('img');
                                                        img.src = event.target.result;
                                                        img.className = 'max-w-full h-auto max-h-40 mt-2';
                                                        preview.innerHTML = '';
                                                        preview.appendChild(img);
                                                    };
                                                    reader.readAsDataURL(file);
                                                }
                                            });
                                        } else {
                                            // Default to text input
                                            if (fieldType === 'soal') {
                                                const textarea = document.createElement('textarea');
                                                textarea.name = `soal[${soalId}][text]`;
                                                textarea.className = 'w-full border border-gray-300 rounded p-2';
                                                textarea.rows = 3;
                                                textarea.placeholder = 'Masukkan teks soal';
                                                container.appendChild(textarea);
                                            } else {
                                                const input = document.createElement('input');
                                                input.type = 'text';
                                                input.name = `soal[${soalId}][pilihan][${optionId}][text]`;
                                                input.className = 'w-full border border-gray-300 rounded p-2';
                                                input.placeholder = 'Masukkan teks jawaban';
                                                container.appendChild(input);
                                            }
                                        }
                                    }

                                });
                            </script>


                            <style>
                                .btn {
                                    padding: 0.5rem 1rem;
                                    border-radius: 0.375rem;
                                    font-weight: 500;
                                    transition: background-color 0.2s;
                                    display: inline-flex;
                                    align-items: center;
                                    gap: 0.5rem;
                                }

                                .btn:hover {
                                    filter: brightness(90%);
                                }

                                .bg-blue-custom {
                                    background-color: #3b82f6;
                                }

                                .bg-red-custom {
                                    background-color: #ef4444;
                                }

                                .text-white-custom {
                                    color: #ffffff;
                                }

                                .border-gray-custom {
                                    border-color: #d1d5db;
                                }

                                .text-black-custom {
                                    color: #1f2937;
                                }

                                .select {
                                    padding: 0.5rem;
                                    border-radius: 0.375rem;
                                    background-color: white;
                                }

                                .answer-option {
                                    padding: 1rem;
                                    border: 1px solid #e5e7eb;
                                    border-radius: 0.5rem;
                                    background-color: #f9fafb;
                                }

                                .answer-option:hover {
                                    background-color: #f3f4f6;
                                }
                            </style>

                            {{-- <script>
                                const jumlahSoal = {{ $jumlah_soal }};

                                for (let i = 1; i <= jumlahSoal; i++) {
                                    let soalEditor = new Quill(`#soal${i}`, {
                                        theme: 'snow'
                                    });
                                    for (let j = 1; j <= 4; j++) {
                                        new Quill(`#pilihan${i}_${j}`, {
                                            theme: 'snow'
                                        });
                                    }

                                    const kategoriSoalSelect = document.querySelector(`[name="id_kategori_soal"]`);
                                    const kategoriJawabanSelect = document.querySelector(`[name="id_kategori_jawaban"]`);

                                    kategoriSoalSelect.addEventListener('change', function(e) {
                                        const selectedOption = e.target.selectedOptions[0];
                                        const type = selectedOption.getAttribute('data-type');

                                        const soalWrapper = document.getElementById(`soal-wrapper-${i}`);
                                        soalWrapper.innerHTML = ''; // kosongkan isi lama

                                        if (type === 'text') {
                                            soalWrapper.innerHTML = `<div class="editor" id="soal${i}"></div>`;
                                            new Quill(`#soal${i}`, {
                                                theme: 'snow'
                                            });
                                        } else if (type === 'image') {
                                            soalWrapper.innerHTML =
                                                `<input type="file" name="soal_image_${i}" accept="image/*" class="file-input">`;
                                        }
                                    });

                                    kategoriJawabanSelect.addEventListener('change', function(e) {
                                        const selectedOption = e.target.selectedOptions[0];
                                        const type = selectedOption.getAttribute('data-type');

                                        for (let j = 1; j <= 5; j++) {
                                            const pilihanWrapper = document.getElementById(`pilihan-wrapper-${i}-${j}`);
                                            pilihanWrapper.innerHTML = ''; // kosongkan isi lama

                                            if (type === 'text') {
                                                pilihanWrapper.innerHTML = `<div class="editor" id="pilihan${i}_${j}"></div>`;
                                                new Quill(`#pilihan${i}_${j}`, {
                                                    theme: 'snow'
                                                });
                                            } else if (type === 'image') {
                                                pilihanWrapper.innerHTML =
                                                    `<input type="file" name="pilihan_image_${i}_${j}" accept="image/*" class="file-input">`;
                                            }
                                        }
                                    });
                                }
                            </script> --}}


                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- content --}}
    </div>



    {{-- sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
