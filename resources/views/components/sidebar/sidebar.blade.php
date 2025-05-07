<ul class="menu bg-white-custom min-h-screen w-56 p-4">
    <div class="flex items-center gap-2 flex-col mb-4">
        <a>
            <img src="{{ asset('storage/profile/admin/' . Auth::user()->image) }}" alt="Foto Profil"
                class="w-16 h-16 object-cover rounded-full">

        </a>
        <a class="text-md md:text-lg text-black-custom font-bold">Nama Sekolah</a>
    </div>
    <div class="flex flex-col">
        <!-- Sidebar content here -->
        <li class="rounded-sm sidebar-link"><a href="/"
                class="hover:bg-light-blue-custom font-semibold text-black-custom py-4 text-sm md:text-md"><i
                    class="fa-solid fa-chart-line"></i>Dashboard</a></li>
        <li class="rounded-sm sidebar-link">
            <a href="{{ route('master_jurusan.index') }}"
                class="hover:bg-light-blue-custom font-semibold text-black-custom py-4 text-sm md:text-md">
                <i class="fa-solid fa-school"></i> Jurusan
            </a>
        </li>

        <li class="rounded-sm sidebar-link">
            <a href="{{ route('master_kelas.index') }}"
                class="hover:bg-light-blue-custom font-semibold text-black-custom py-4 text-sm md:text-md">
                <i class="fa-solid fa-chalkboard-teacher"></i> Kelas
            </a>
        </li>

        <li class="rounded-sm sidebar-link">
            <a href="{{ route('master_siswa.index') }}"
                class="hover:bg-light-blue-custom font-semibold text-black-custom py-4 text-sm md:text-md">
                <i class="fa-solid fa-user-graduate"></i> Siswa
            </a>
        </li>

        <li class="rounded-sm sidebar-link"><a href="/data-ujian"
                class="hover:bg-light-blue-custom font-semibold text-black-custom py-4 text-sm md:text-md"><i
                    class="fa-solid fa-book"></i>Ujian</a></li>
        <li class="rounded-sm sidebar-link"><a href="/data-soal"
                class="hover:bg-light-blue-custom font-semibold text-black-custom py-4 text-sm md:text-md"><i
                    class="fa-regular fa-file-lines"></i>Soal Ujian</a></li>
        <li class="rounded-sm sidebar-link"><a href="/data-sesi"
                class="hover:bg-light-blue-custom font-semibold text-black-custom py-4 text-sm md:text-md"><i
                    class="fa-regular fa-clock"></i>Sesi Ujian</a></li>
        <li class="rounded-sm sidebar-link"><a href="/data-peserta"
                class="hover:bg-light-blue-custom font-semibold text-black-custom py-4 text-sm md:text-md"><i
                    class="fa-regular fa-user"></i>Peserta Ujian</a></li>
        <li class="rounded-sm sidebar-link"><a href="/peserta-per-sesi"
                class="hover:bg-light-blue-custom font-semibold text-black-custom py-4 text-sm md:text-md"><i
                    class="fa-solid fa-users"></i>Peserta Per-Sesi</a></li>
        <li class="rounded-sm sidebar-link"><a href="/hasil-ujian"
                class="hover:bg-light-blue-custom font-semibold text-black-custom py-4 text-sm md:text-md"><i
                    class="fa-solid fa-list-check"></i>Hasil Ujian</a></li>
    </div>
</ul>
