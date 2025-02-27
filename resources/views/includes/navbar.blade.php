<nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700 md:px-10">
  <div class="flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="/back/img/Logo_ubhara.png" class="h-7" alt="Ubhara Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Tracer Alumni</span>
    </a>
    <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="/" class="block py-2 px-3 rounded md:bg-transparent md:text-gray-900 md:p-0 md:hover:text-amber-600 dark:text-white" aria-current="page">Beranda</a>
        </li>
        <li>
          <a href="/loker" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-amber-600 md:p-0 dark:text-white md:dark:hover:text-amber-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Info Lowongan Kerja</a>
        </li>
        <li>
          <a href="/artikel" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-amber-600 md:p-0 dark:text-white md:dark:hover:text-amber-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Artikel</a>
        </li>
        <li>
          <a href="/kontak" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-amber-600 md:p-0 dark:text-white md:dark:hover:text-amber-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Kontak</a>
        </li>
        <li>
          <a href="/pertanyaan" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-amber-600 md:p-0 dark:text-white md:dark:hover:text-amber-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Kuisioner</a>
        </li>
         
        @auth
        {{-- jika sudah login maka tampil ini --}}
        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownKet" class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-amber-600 md:p-0 md:w-auto dark:text-white md:dark:hover:text-amber-600 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Welcome,{{ auth()->user()->name }}<svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
          </svg></button>
          <!-- Dropdown menu -->
          <div id="dropdownKet" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
              <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                <li>
                  <a href="/dashboard" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">My Dashboard</a>
                </li>
                <li>
                  <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white w-full text-left">Logout</button>
                  </form>
                </li>
              </ul>
          </div>
            @else
            {{-- jika belum login ini tampil --}}
            <li>
              <a href="/login" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-amber-600 md:p-0 dark:text-white md:dark:hover:text-amber-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Login</a>
            </li>
        @endauth
        
      </ul>
    </div>
  </div>
</nav>
