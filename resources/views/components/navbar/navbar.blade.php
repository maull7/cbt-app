<div class="navbar bg-white-custom sticky top-0 left-0 z-10">
    <div class="lg:hidden flex-1">
        <label for="my-drawer-2">
            <i class="fa-solid fa-bars text-black-custom text-xl cursor-pointer"></i>
        </label>
    </div>
    <div class="flex justify-end flex-1">
        <div class="dropdown dropdown-end"></div>
        <div class="dropdown dropdown-end">
            <div class="flex items-center gap-2">
                <h4 class="font-semibold text-black-custom text-sm md:text-md">Admin</h4>
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img
                        alt="logo-admin"
                        src="{{ asset('assets/logo-sekolah.png') }}" />
                    </div>
                </div>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                <li>
                    <a class="flex flex-col gap-1 text-black-custom font-semibold hover:bg-light-blue-custom">
                        Admin
                        <span class="text-xs font-light text-gray-custom">admin@gmail.com</span>
                    </a>
                </li>
                <li><a class="font-semibold text-black-custom hover:bg-light-blue-custom"><i class="fa-regular fa-user"></i>Profile</a></li>
                <li><a class="font-semibold text-black-custom hover:bg-light-blue-custom"><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout</a></li>
            </ul>
        </div>
    </div>
</div>
