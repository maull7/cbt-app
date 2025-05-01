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
                <div class="grid grid-cols-1">
                    <div class="card w-auto bg-white-custom shadow-sm">
                        <div class="card-body">
                            <h3 class="lg:text-xl font-medium text-black-custom text-base mb-4">Profile User</h3>
                            <form action="">
                                <div class="mb-4">
                                    <label for="nama" class="block mb-3 text-sm font-medium text-black-custom">
                                        Nama
                                    </label>
                                    <input type="text" class="border border-gray-custom text-black-custom text-sm rounded-lg block py-3 px-2 w-full focus:outline-gray-custom font-medium" name="nama" id="nama" placeholder="Enter your name" required>
                                </div>
                                <div class="mb-4">
                                    <label for="nama" class="block mb-3 text-sm font-medium text-black-custom">
                                        Username
                                    </label>
                                    <input type="text" class="border border-gray-custom text-black-custom text-sm rounded-lg block py-3 px-2 w-full focus:outline-gray-custom font-medium" name="username" id="username" placeholder="Username" required>
                                </div>
                                <div class="mb-4">
                                    <label for="nama" class="block mb-3 text-sm font-medium text-black-custom">
                                        Email
                                    </label>
                                    <input type="email" class="border border-gray-custom text-black-custom text-sm rounded-lg block py-3 px-2 w-full focus:outline-gray-custom font-medium" name="email" id="email" placeholder="example@gmail.com" required>
                                </div>
                                <div class="mb-4">
                                    <label for="nama" class="block mb-3 text-sm font-medium text-black-custom">
                                        Password
                                    </label>
                                    <div class="relative">
                                        <input type="password" class="border border-gray-custom text-black-custom text-sm rounded-lg block py-3 px-2 w-full focus:outline-gray-custom font-medium" name="password" id="password" placeholder="Password" required>
                                        <i class="fa-regular fa-eye-slash absolute top-4 right-3 cursor-pointer text-sm text-black-custom" id="togglePassword"></i>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="nama" class="block mb-3 text-sm font-medium text-black-custom">
                                        Konfirmasi Password
                                    </label>
                                    <input type="password" class="border border-gray-custom text-black-custom text-sm rounded-lg block py-3 px-2 w-full focus:outline-gray-custom font-medium" name="konfirmasi-password" id="konfirmasi-password" placeholder="Konfirmasi Password" required>
                                </div>
                                <div class="mb-4">
                                    <label for="nama" class="block mb-3 text-sm font-medium text-black-custom">
                                        Foto User
                                    </label>
                                    <input type="file" class="file-input w-full max-w-xs" name="foto" id="foto" />
                                    <div class="mt-4 border border-gray-custom rounded-sm block py-3 px-2 max-w-max overflow-auto">
                                        <img src="{{ asset('assets/logo-sekolah.png') }}" alt="foto-user" class="w-40">
                                    </div>
                                </div>
                                <div class="pt-4 flex gap-1 flex-wrap">
                                    <button type="submit" class="btn bg-blue-custom text-white-custom"><i class="fa-regular fa-floppy-disk text-white-custom"></i>Simpan Perubahan</button>
                                    <a href="/">
                                        <button type="submit" class="btn bg-red-custom text-white-custom"><i class="fa-regular fa-circle-xmark text-white-custom"></i>Batal</button>
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
