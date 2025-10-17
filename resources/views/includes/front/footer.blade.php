<footer class="bg-[#27548A] text-white py-12">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Bagian Atas -->
        <div class="flex flex-col lg:flex-row justify-between gap-10">
            <!-- Kolom 1 -->
            <div class="lg:w-1/2">
                <div class="mb-4">
                    <img src="{{ asset('img/logo_association.png') }}" alt="Logo" class="w-20">
                </div>
                <p class="text-gray-100 text-xl font-semibold leading-relaxed">
                    Petani Digital
                    <br>
                    Perkumpulan Tenaga Ahli bisnis Digital
                    <br><br>
                    Azalea Garden Blok F4 No. 26, Desa Daru,
                    <br> 
                    Kecamatan Jambe, Kabupaten Tangerang, 
                    <br>
                    Banten (15720)
                </p>
            </div>

            <!-- Kolom 2 -->
            <div class="flex flex-col sm:flex-row lg:justify-end gap-10 lg:w-1/2">
                <!-- Menu -->
                <div>
                    <h3 class="text-lg font-semibold mb-4 uppercase tracking-wide">Menu</h3>
                    <ul class="space-y-3 text-gray-100">
                        <li><a href="{{route('home')}}" class="hover:text-gray-300 transition">Beranda</a></li>
                        <li><a href="{{route('instructor-front')}}" class="hover:text-gray-300 transition">Instruktur</a></li>
                        <li><a href="{{route('documentation-front')}}" class="hover:text-gray-300 transition">Dokumentasi</a></li>
                        <li><a href="{{route('lesson-front')}}" class="hover:text-gray-300 transition">Media Belajar</a></li>
                    </ul>
                </div>
                <!-- Media Sosial -->
                <div>
                    <h3 class="text-lg font-semibold mb-4 uppercase tracking-wide">Media Sosial</h3>
                    <ul class="space-y-3 text-gray-100">
                        <li><a href="#" class="hover:text-gray-300 transition">Instagram</a></li>
                        <li><a href="#" class="hover:text-gray-300 transition">Facebook</a></li>
                        <li><a href="#" class="hover:text-gray-300 transition">Tiktok</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Garis -->
        <div class="border-t border-gray-400 my-10"></div>

        <!-- Partner -->
        <div class="flex flex-wrap justify-center items-center gap-6">
            <img src="{{ asset('img/partners/1.jpeg') }}" class="h-12 object-contain" alt="">
            <img src="{{ asset('img/partners/2.jpg') }}" class="h-12 object-contain" alt="">
            <img src="{{ asset('img/partners/3.png') }}" class="h-12 object-contain" alt="">
            <img src="{{ asset('img/partners/4.jpeg') }}" class="h-12 object-contain" alt="">
            <img src="{{ asset('img/partners/5.jpeg') }}" class="h-12 object-contain" alt="">
            <img src="{{ asset('img/partners/6.png') }}" class="h-12 object-contain" alt="">
            <img src="{{ asset('img/partners/7.png') }}" class="h-12 object-contain" alt="">
            <img src="{{ asset('img/partners/8.png') }}" class="h-12 object-contain" alt="">
            <img src="{{ asset('img/partners/9.png') }}" class="h-12 object-contain" alt="">
        </div>

        <!-- Copyright -->
        <p class="text-center text-gray-200 text-sm mt-8">
            © Mobile Faculty is Product 2025 from Petani Digital , All Rights Reserved
        </p>
    </div>
</footer>
