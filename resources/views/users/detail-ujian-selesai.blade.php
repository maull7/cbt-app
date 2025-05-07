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
        <div class="grid grid-cols-1 w-full md:w-3/4 gap-4">
            {{-- card --}}
            <div class="card w-auto bg-white-custom shadow-sm">
                <div class="card-body">
                    <h2 class="text-2xl text-black-custom font-semibold border-b border-gray-custom pb-4">Selesai Ujian</h2>
                    <table class="table text-sm text-black-custom mt-3">
                        <tbody>
                            <tr>
                                <td class="font-semibold">No. Ujian</td>
                                <td>:</td>
                                <td>123123123</td>
                            </tr>
                            <tr>
                                <td class="font-semibold">Nama Peserta</td>
                                <td>:</td>
                                <td>Budi Santoso</td>
                            </tr>
                            <tr>
                                <td class="font-semibold">Nama Sekolah</td>
                                <td>:</td>
                                <td>SMK Negri 1</td>
                            </tr>
                            <tr>
                                <td class="font-semibold">Kelas</td>
                                <td>:</td>
                                <td>X TKJ 1</td>
                            </tr>
                            <tr>
                                <td class="font-semibold">Nama Ujian</td>
                                <td>:</td>
                                <td>Bahasa Indonesia Kelas X</td>
                            </tr>
                            <tr>
                                <td class="font-semibold">Mata Pelajaran</td>
                                <td>:</td>
                                <td>Bahasa Indonesia</td>
                            </tr>
                            <tr>
                                <td class="font-semibold">Mulai Mengerjakan</td>
                                <td>:</td>
                                <td>01-01-2023 09:10:00</td>
                            </tr>
                            <tr>
                                <td class="font-semibold">Selesai Mengerjakan</td>
                                <td>:</td>
                                <td>01-01-2023 11:40:00</td>
                            </tr>
                            <tr>
                                <td class="font-semibold">Hasil</td>
                                <td>:</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-6">
                        <a href="/daftar-ujian">
                            <button class="btn w-full bg-blue-custom text-white-custom">Daftar Ujian</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        {{-- Bagian Card --}}
    </div>
</body>
</html>
