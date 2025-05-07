<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CBT | Ujian</title>
    <!-- fontawesome -->
        <link rel="stylesheet" href="/fontawesome/css/all.min.css" />

    <!-- favicon -->
        <link rel="icon" type="image/svg+xml" href="/assets/logo-sekolah.png">
    @vite('resources/css/app.css')
</head>
<body>
    {{-- navbar --}}
    @include('users.navbar.navbar')
    {{-- navbar --}}
    <div class="px-4 w-full min-h-screen my-4">
        {{-- Bagian Card --}}
        <div class="w-full">
            <div class="flex flex-col lg:flex-row gap-6">
                <!-- Kartu Soal -->
                <div class="w-full lg:w-2/3 p-4 rounded shadow bg-white-custom">
                    <div class="flex justify-between items-center mb-4 border-b border-gray-custom pb-4">
                        <h2 class="font-semibold text-lg">Soal No. 10</h2>
                        <div class="bg-blue-500 text-white px-3 py-1 rounded text-sm font-bold">12:50</div>
                    </div>
                    <p class="mb-6 text-lg text-black-custom">Atribut tag untuk mengatur tebal garis tepi adalah..</p>

                    <div class="flex items-start flex-col gap-y-3 mb-6">
                        @php
                            $options = ['width', 'cellpadding', 'cellspacing', 'border', 'height'];
                        @endphp

                        @foreach ($options as $index => $value)
                            <div class="flex items-center justify-center gap-3">
                                <button
                                type="button"
                                class="px-4 py-2 cursor-pointer border border-blue-custom rounded-sm hover:bg-blue-100 focus:bg-blue-custom"
                                onclick="document.getElementById('radio_{{ $index }}').checked = true; highlightOption(this);"
                                >
                                    <input type="radio" name="soal" id="radio_{{ $index }}" class="hidden" value="{{ $value }}">
                                    <span class="font-bold text-black-custom">{{ chr(65 + $index) }}</span>
                                </button>
                                <span class="text-black-custom text-base">{{ $value }}</span>
                            </div>
                        @endforeach
                    </div>

                    <div class="flex justify-between">
                        <button class="bg-light-blue-custom cursor-pointer text-blue-700 px-4 py-2 rounded text-sm">&lt; Sebelumnya</button>
                        <button class="bg-blue-custom text-white cursor-pointer px-4 py-2 rounded-sm text-sm">Selanjutnya &gt;</button>
                    </div>
                </div>

                <!-- Navigasi Soal -->
                <div class="w-full lg:w-1/3 bg-white-custom p-4 rounded-sm shadow">
                    <div class="flex justify-center items-center mb-4 border-b border-gray-custom pb-4">
                        <button class="bg-blue-600 text-white px-3 py-1 rounded text-sm">1 dikerjakan</button>
                    </div>
                    <div class="grid grid-cols-5 gap-2 mb-4">
                        @for ($i = 1; $i <= 35; $i++)
                            <button
                                class="border border-blue-custom rounded text-sm py-1 cursor-pointer
                                    {{ $i == 10 ? 'bg-blue-500 text-white font-bold' : ($i == 8 ? 'text-black' : 'hover:bg-blue-100') }}">
                                {{ $i }}
                            </button>
                        @endfor
                    </div>
                    <button class="bg-red-custom cursor-pointer text-white w-full py-2 rounded font-semibold" onclick="my_modal_1.showModal()">
                        Akhiri Ujian
                    </button>
                    <dialog id="my_modal_1" class="modal">
                        <div class="modal-box">
                            <p class="py-4 text-black-custom">Setelah mengakhiri ujian tidak dapat kembali ke ujian ini lagi. Yakin akan mengakhiri ujian?</p>
                            <div class="modal-action">
                            <form method="dialog">
                                <button onclick="window.location.href='/detail-ujian-selesai'" class="btn bg-green-custom text-white-custom">
                                    Yakin
                                </button>
                                <button onclick="window.location.href='/ujian'" class="btn bg-red-custom text-white-custom">
                                    Batal
                                </button>
                            </form>
                            </div>
                        </div>
                    </dialog>
                </div>
            </div>
        </div>
        {{-- Bagian Card --}}
    </div>
</body>
</html>
