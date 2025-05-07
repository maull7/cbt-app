<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin</title>
    <!-- fontawesome -->
    <link rel="stylesheet" href="/fontawesome/css/all.min.css" />

    <!-- favicon -->
    <link rel="icon" type="image/svg+xml" href="/assets/logo-sekolah.png">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="min-h-screen w-full hero px-4">
        <div class="card w-full md:w-md bg-base-100 shadow-sm">
            @if ($errors->any())
                <div class="alert alert-error shadow-lg mb-4">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
                        </svg>
                        <span>{{ $errors->first() }}</span>
                    </div>
                </div>
            @endif

            <form action="{{ route('login.action') }}" method="POST">
                @csrf
                <div class="card-body">
                    <img src="{{ asset('assets/logo-sekolah.png') }}" alt="logo-sekolah" class="w-32 mb-4 mx-auto">
                    <h2 class="text-center text-2xl font-bold text-blue-custom">Login Admin</h2>
                    <div class="mt-6">
                        <label for="username" class="block mb-3 text-sm font-medium text-black-custom">Username</label>
                        <input
                            class="w-full border border-gray-custom text-white-custom text-sm rounded-lg block py-3 px-2 focus:outline-gray-custom"
                            type="text" name="username" id="username" placeholder="Username"
                            value="{{ old('username') }}">

                        </label>
                    </div>
                    <div class="mt-4">
                        <label for="password" class="block mb-3 text-sm font-medium text-black-custom">Password</label>
                        <div class="relative w-full md:max-w-md">
                            <input
                                type="password"class="border border-gray-custom text-sm rounded-lg block py-3 px-4 text-white-custom w-full focus:outline-gray-custom font-medium pr-10"
                                name="password" id="password" placeholder="Password" required>
                            <i class="fa-regular fa-eye-slash absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer text-white-custom"
                                id="togglePassword"></i>
                        </div>
                    </div>
                    <div class="mt-6">

                        <button type="submit"
                            class="btn w-full rounded-md bg-blue-custom text-white-custom">LOGIN</button>

                    </div>
                </div>
            </form>

        </div>
    </div>
    {{-- script toggle password --}}
    <script>
        const toggle = document.getElementById('togglePassword');
        const password = document.getElementById('password');
        toggle.addEventListener('click', function(e) {
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
