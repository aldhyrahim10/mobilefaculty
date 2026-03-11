<nav class="w-full h-20 flex items-center fixed top-0 z-20" id="navs">
    <div class="flex items-center justify-between w-[90%] lg:w-[80%] m-auto h-[60%]">
        <img src="{{ asset('img/logo_association.png') }}" width="80px" alt="">
        <div class="hidden lg:block flex justify-start items-center">
            <a href="{{ route('home') }}"
                class="menu-item mx-7 text-md font-medium text-white hover:text-[#0195dd]">Beranda</a>
            <a href="{{ route('instructor-front') }}"
                class="menu-item mx-7 text-md font-medium text-white hover:text-[#0195dd]">Instruktur</a>
            <a href="{{ route('documentation-front') }}"
                class="menu-item mx-7 text-md font-medium text-white hover:text-[#0195dd]">Dokumentasi</a>
            <a href="{{ route('lesson-front') }}"
                class="menu-item mx-7 text-md font-medium text-white hover:text-[#0195dd]">Media Pembelajaran</a>
            <a href="{{ route('academic-front') }}"
                class="menu-item mx-7 text-md font-medium text-white hover:text-[#0195dd]">Akademik</a>
        </div>
        <div class="block lg:hidden" id="btnMenu">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
            </svg>

        </div>
        <div class="fixed top-0 right-0 w-full h-screen bg-black opacity-50 hidden" id="bgBlack">

        </div>
        <div class="fixed top-0 right-0 w-[75%] h-screen bg-[#0195dd] z-[9999] hidden" id="mobileMenu">
            <div class="flex flex-col items-center justify-center h-full space-y-8">
                <a href="{{ route('home') }}"
                    class="text-white text-2xl hover:text-gray-200">Beranda</a>
                <a href="{{ route('instructor-front') }}"
                    class="text-white text-2xl hover:text-gray-200">Instruktur</a>
                <a href="{{ route('documentation-front') }}"
                    class="text-white text-2xl hover:text-gray-200">Dokumentasi</a>
                <a href="{{ route('lesson-front') }}"
                    class="text-white text-2xl hover:text-gray-200">Media Pembelajaran</a>
                <a href="{{ route('academic-front') }}"
                    class="text-white text-2xl hover:text-gray-200">Akademik</a>
            </div>
        </div>

    </div>
</nav>
