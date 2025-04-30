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
<body">
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
                {{-- Bagian Card --}}
                <div class="grid grid-cols-1 lg:grid-cols-4 md:grid-cols-3 gap-4">
                    {{-- card --}}
                    <div class="card w-auto bg-white-custom shadow-sm">
                        <div class="card-body">
                            <div class="flex justify-between items-center">
                                <div class="flex flex-col gap-3">
                                    <h3 class="lg:text-xl font-semibold text-gray-custom text-base">
                                        Data Ujian
                                    </h3>
                                    <h1 class="text-4xl lg:text-5xl font-semibold text-black-custom">100</h1>
                                </div>
                                <div class="text-3xl h-16 w-16 bg-light-blue-custom rounded-full text-blue-custom flex items-center justify-center">
                                    <i class="fa-solid fa-book"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- card --}}
                    {{-- card --}}
                    <div class="card w-auto bg-white-custom shadow-sm">
                        <div class="card-body">
                            <div class="flex justify-between items-center">
                                <div class="flex flex-col gap-3">
                                    <h3 class="lg:text-xl font-semibold text-gray-custom text-base">
                                        Data Soal
                                    </h3>
                                    <h1 class="text-4xl lg:text-5xl font-semibold text-black-custom">10</h1>
                                </div>
                                <div class="text-3xl h-16 w-16 bg-light-blue-custom rounded-full text-blue-custom flex items-center justify-center">
                                    <i class="fa-regular fa-file-lines"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- card --}}
                    {{-- card --}}
                    <div class="card w-auto bg-white-custom shadow-sm">
                        <div class="card-body">
                            <div class="flex justify-between items-center">
                                <div class="flex flex-col gap-3">
                                    <h3 class="lg:text-xl font-semibold text-gray-custom text-base">
                                        Data Sesi
                                    </h3>
                                    <h1 class="text-4xl lg:text-5xl font-semibold text-black-custom">5</h1>
                                </div>
                                <div class="text-3xl h-16 w-16 bg-light-blue-custom rounded-full text-blue-custom flex items-center justify-center">
                                    <i class="fa-regular fa-clock"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- card --}}
                    {{-- card --}}
                    <div class="card w-auto bg-white-custom shadow-sm">
                        <div class="card-body">
                            <div class="flex justify-between items-center">
                                <div class="flex flex-col gap-3">
                                    <h3 class="lg:text-xl font-semibold text-gray-custom text-base">
                                        Data Peserta
                                    </h3>
                                    <h1 class="text-4xl lg:text-5xl font-semibold text-black-custom">500</h1>
                                </div>
                                <div class="text-3xl h-16 w-16 bg-light-blue-custom rounded-full text-blue-custom flex items-center justify-center">
                                    <i class="fa-regular fa-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- card --}}
                </div>
                {{-- Bagian Card --}}

                {{-- Bagian Nilai --}}
                <div class="grid grid-cols-1 mt-5">
                    <div class="card w-auto bg-white-custom shadow-sm">
                        <div class="card-body">
                            <h3 class="lg:text-xl font-semibold text-black-custom text-base">Hasil Nilai Ujian</h3>
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
                {{-- Bagian Nilai --}}
            </div>
        </div>
        {{-- content --}}
    </div>
    @vite(['resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');

        const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'];

        const data = {
            labels: labels,
            datasets: [{
                label: 'My First Dataset',
                data: [65, 59, 80, 81, 56, 55, 40],
                fill: false,
                borderColor: 'rgb(20, 99, 255)',
                tension: 0.1
            }]
        };

        const config = {
            type: 'line',
            data: data,
        };

        new Chart(ctx, config);
    </script>
</body>
</html>
