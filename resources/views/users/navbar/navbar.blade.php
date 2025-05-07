<div class="navbar bg-white-custom sticky top-0 z-10 shadow-sm">
    <div class="navbar-start">
        <a class="btn btn-ghost">
            <img src="{{ asset('assets/logo-sekolah.png') }}" alt="logo-sekolah" class="w-10">
        </a>
    </div>
    <div class="navbar-end">
        <!-- change popover-1 and --anchor-1 names. Use unique names for each dropdown -->
        <button class="btn btn-ghost font-semibold text-black-custom hover:bg-light-blue-custom" popovertarget="popover-1" style="anchor-name:--anchor-1">
            Budi Susanto
        </button>
        <div class="dropdown dropdown-end">
            <ul class="dropdown menu w-auto rounded-box bg-base-100 shadow-sm"
            popover id="popover-1" style="position-anchor:--anchor-1">
                <li>
                    <table class="table hover:bg-light-blue-custom text-black-custom">
                        <tbody>
                            <tr>
                                <td>No. Ujian</td>
                                <td>:</td>
                                <td>123123123</td>
                            </tr>
                            <tr>
                                <td>Nama Peserta</td>
                                <td>:</td>
                                <td>Budi Susanto</td>
                            </tr>
                        </tbody>
                    </table>
                </li>
                <li>
                    <a href="/login-peserta" class="font-semibold text-black-custom hover:bg-light-blue-custom"><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout</a>
                </li>
            </ul>
        </div>
    </div>
</div>
