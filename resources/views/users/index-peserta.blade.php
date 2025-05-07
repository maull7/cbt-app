<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CBT | Daftar Ujian</title>
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
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            {{-- card --}}
            <div class="card w-auto bg-white-custom shadow-sm">
                <div class="card-body">
                    <h2 class="text-2xl text-black-custom font-semibold">Bahasa Indonesia Kelas X</h2>
                    <table class="text-sm text-black-custom mt-3">
                        <tbody>
                            <tr>
                                <td>Mata Pelajaran</td>
                                <td>:</td>
                                <td>Bahasa Indonesia</td>
                            </tr>
                            <tr>
                                <td>Sesi</td>
                                <td>:</td>
                                <td>Sesi 1</td>
                            </tr>
                            <tr>
                                <td>Mulai</td>
                                <td>:</td>
                                <td>01-01-2023 09:00:00</td>
                            </tr>
                            <tr>
                                <td>Selesai</td>
                                <td>:</td>
                                <td>01-01-2023 12:00:00</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-6">
                        <a href="/detail-ujian">
                            <button class="btn w-full bg-blue-custom text-white-custom">Kerjakan</button>
                        </a>
                    </div>
                </div>
            </div>
            {{-- card --}}
            <div class="card w-auto bg-white-custom shadow-sm">
                <div class="card-body">
                    <h2 class="text-2xl text-black-custom font-semibold">Bahasa Indonesia Kelas X</h2>
                    <table class="text-sm text-black-custom mt-3">
                        <tbody>
                            <tr>
                                <td>Mapel</td>
                                <td>:</td>
                                <td>Bahasa Indonesia</td>
                            </tr>
                            <tr>
                                <td>Sesi</td>
                                <td>:</td>
                                <td>Sesi 1</td>
                            </tr>
                            <tr>
                                <td>Mulai</td>
                                <td>:</td>
                                <td>01-01-2023 09:00:00</td>
                            </tr>
                            <tr>
                                <td>Selesai</td>
                                <td>:</td>
                                <td>01-01-2023 12:00:00</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-6">
                        <a href="/detail-ujian">
                            <button class="btn w-full bg-blue-custom text-white-custom">Kerjakan</button>
                        </a>
                    </div>
                </div>
            </div>
            {{-- card --}}
            <div class="card w-auto bg-white-custom shadow-sm">
                <div class="card-body">
                    <h2 class="text-2xl text-black-custom font-semibold">Bahasa Indonesia Kelas X</h2>
                    <table class="text-sm text-black-custom mt-3">
                        <tbody>
                            <tr>
                                <td>Mapel</td>
                                <td>:</td>
                                <td>Bahasa Indonesia</td>
                            </tr>
                            <tr>
                                <td>Sesi</td>
                                <td>:</td>
                                <td>Sesi 1</td>
                            </tr>
                            <tr>
                                <td>Mulai</td>
                                <td>:</td>
                                <td>01-01-2023 09:00:00</td>
                            </tr>
                            <tr>
                                <td>Selesai</td>
                                <td>:</td>
                                <td>01-01-2023 12:00:00</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-6">
                        <a href="/detail-ujian">
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
