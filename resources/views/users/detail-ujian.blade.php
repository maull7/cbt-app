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
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            {{-- card --}}
            <div class="card w-auto bg-white-custom shadow-sm">
                <div class="card-body">
                    <h2 class="text-2xl text-black-custom font-semibold border-b border-gray-custom pb-4">Identitas Peserta</h2>
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
                                <td class="font-semibold">Durasi</td>
                                <td>:</td>
                                <td>90 Menit</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- card --}}
            <div class="card w-auto bg-white-custom shadow-sm">
                <div class="card-body">
                    <h2 class="text-2xl text-black-custom font-semibold border-b border-gray-custom pb-4">Deskripsi Ujian</h2>
                    <p class="text-sm text-black-custom mt-3">Ujian Bahasa Indonesia</p>
                    <div class="mt-6">
                        <a href="/ujian">
                            <button class="btn w-full bg-blue-custom text-white-custom">Kerjakan</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        {{-- Bagian Card --}}
    </div>
</body>
</html>
