<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Peserta</title>
    <!-- fontawesome -->
        <link rel="stylesheet" href="/fontawesome/css/all.min.css" />

    <!-- favicon -->
        <link rel="icon" type="image/svg+xml" href="/assets/logo-sekolah.png">
    @vite('resources/css/app.css')
</head>
<body>
    <div class="min-h-screen w-full hero px-4">
        <div class="card w-full md:w-md bg-base-100 shadow-sm">
            <div class="card-body">
                <img src="{{ asset('assets/logo-sekolah.png') }}" alt="logo-sekolah" class="w-32 mb-4 mx-auto">
                <h2 class="text-center text-2xl font-bold text-blue-custom">Login Peserta</h2>
                <div class="mt-6">
                    <label for="no-ujian" class="block mb-3 text-sm font-medium text-black-custom">No Ujian</label>
                    <input class="w-full border border-gray-custom text-black-custom text-sm rounded-lg block py-3 px-2 focus:outline-gray-custom" type="text" name="no-ujian" id="no-ujian" placeholder="No Ujian"></label>
                </div>
                <div class="mt-4">
                    <label for="password" class="block mb-3 text-sm font-medium text-black-custom">Password</label>
                    <div class="relative w-full md:max-w-md">
                        <input type="password"class="border border-gray-custom text-sm rounded-lg block py-3 px-4 text-black-custom w-full focus:outline-gray-custom font-medium pr-10"name="password"id="password" placeholder="Password" required>
                        <i class="fa-regular fa-eye-slash absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer text-black-custom" id="togglePassword"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <label class="label text-sm font-semibold">
                        <input type="checkbox" class="checkbox" />
                        Ingat Saya
                    </label>
                </div>
                <div class="mt-6">
                    <a href="/peserta">
                        <button class="btn w-full bg-blue-custom text-white-custom">LOGIN</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- script toggle password --}}
    <script>
        const toggle = document.getElementById('togglePassword');
        const password = document.getElementById('password');
        toggle.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye');
        });
    </script>
    {{-- script toggle password --}}
</body>
</html>
