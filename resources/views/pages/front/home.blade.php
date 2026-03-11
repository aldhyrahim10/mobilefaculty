@extends('layouts.app')

@section('title')
Selamat Datang di Mobile Faculty
@endsection

@section('content')

{{-- Header --}}
<section class="py-48 h-[800px] text-white relative"
    style="background-image: url(img/bg-header.jpg); background-size: cover;">
    <div class="w-[90%] lg:w-[80%] mx-auto px-6 text-center">
        <p class="text-lg md:text-xl mt-12">
            Selamat datang di
        </p>
        <h1 class="text-4xl md:text-5xl font-bold mt-8 mb-6">
            <span class="text-yellow-300">Mobile Faculty</span>
        </h1>
        <p class="w-[70%] m-auto  text-lg md:text-xl mb-8">
            Mitra terpercaya Anda dalam pengembangan kompetensi, pelatihan berkualitas, dan sertifikasi profesional
            untuk
            meningkatkan daya saing di dunia kerja.
        </p>
        <div class="flex flex-row justify-center gap-4">
            <a href="#about-me" class="bg-white text-blue-700 font-semibold px-6 py-3 rounded-lg shadow hover:bg-gray-100">
                Tentang Kami
            </a>
        </div>
    </div>
</section>

<!-- Section Tentang Kami -->
<section class="py-32" id="about-me">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <!-- Judul -->
        <div class="mb-12 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 relative inline-block">
                Tentang Kami
                <span class="absolute left-0 -bottom-2 w-16 h-1 bg-blue-600 mx-auto block rounded-full"></span>
            </h2>
        </div>

        <!-- Konten -->
        <div class="flex flex-col lg:flex-row items-center gap-10">
            <!-- Gambar -->
            <div class="flex-1">
                <img src="img/about-me.jpeg" alt="Tentang Kami" class="rounded-2xl shadow-lg w-full object-cover">
            </div>

            <!-- Deskripsi -->
            <div class="flex-1">
                <p class="text-lg leading-relaxed text-justify">
                    <span class="font-semibold">Mobile Faculty</span> adalah lembaga penyedia pelatihan dan sertifikasi
                    kompetensi yang berfokus pada pengembangan sumber daya manusia unggul.
                    Kami menghadirkan program pelatihan berkualitas, instruktur berpengalaman, serta sertifikasi resmi
                    yang
                    diakui secara nasional.
                </p>
                <p class="mt-4 text-lg leading-relaxed text-justify">
                    Dengan pendekatan praktis dan relevan dengan kebutuhan industri, Mobile Faculty berkomitmen menjadi
                    mitra
                    terpercaya
                    dalam meningkatkan keterampilan dan daya saing di dunia kerja.
                </p>

                <!-- Highlight Box -->
                <div class="mt-8 p-6 bg-blue-50 border-l-4 border-blue-600 rounded-lg shadow-sm">
                    <p class="text-blue-800 font-medium">
                        🎓 Program pelatihan kami dirancang untuk menjawab tantangan industri modern dengan fokus pada
                        kompetensi
                        nyata.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-32" id="about-me">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <!-- Judul -->
        <div class="mb-12 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 relative inline-block">
                Introduction European IT Certification Institute Brussels, Belgium, European Union
            </h2>
            <div class="h-1 w-20 bg-blue-600 mx-auto mt-8 mb-6 rounded-full"></div>

            <!-- Video YouTube -->
            <div class="flex justify-center mt-10">
                <iframe 
                    class="w-full max-w-3xl aspect-video rounded-xl shadow-lg"
                    src="https://www.youtube.com/embed/UObcNgrbNV8?si=tNgbbV9ZbMXkj0MU?autoplay=1&mute=0"
                    title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
</section>




<!-- Instruktur -->
<section class="py-32 bg-gray-100">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
        <!-- Header -->
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
            Instruktur Kami
        </h2>
        <div class="h-1 w-20 bg-blue-600 mx-auto mb-6 rounded-full"></div>
        <p class="text-lg max-w-3xl mx-auto text-gray-700 mb-12">
            Belajar langsung dari ahlinya! Instruktur kami adalah para profesional berpengalaman dengan latar belakang
            industri dan akademik yang kuat, siap mendampingi Anda meraih sertifikasi dan keterampilan unggul.
        </p>

        <!-- Grid Card -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

            @foreach ($instructors as $item)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <img src="{{ $item->image ? Storage::url($item->image) : "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png" }}"
                        alt="Instruktur 1" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900">{{ $item->name }}</h3>
                        <!-- <p class="text-blue-600 font-medium">Enterprise Architect</p> -->
                        <p class="mt-3 text-gray-600 text-sm leading-relaxed">{{ $item->description }}</p>
                    </div>
                </div>
            @endforeach

            
        </div>

        <!-- Tombol -->
        <div class="mt-12">
            <a href="{{route('instructor-front')}}"
                class="inline-block px-8 py-3 bg-blue-600 text-white font-medium rounded-full shadow hover:bg-blue-700 transition">
                Lihat Lainnya
            </a>
        </div>
    </div>
</section>

<!-- Dokumentasi -->
<section class="py-32">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Judul -->
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 inline-block relative">
                Dokumentasi Kami
                <span
                    class="absolute left-1/2 -bottom-2 transform -translate-x-1/2 w-16 h-1 bg-blue-600 rounded-full"></span>
            </h2>
            <p class="mt-6 text-gray-600 max-w-2xl mx-auto">
                Melalui dokumentasi ini, Anda dapat melihat berbagai kegiatan pelatihan dan sertifikasi yang telah kami
                laksanakan bersama peserta dari berbagai latar belakang. Setiap foto adalah cerita nyata dari perjalanan
                bersama Mobile Faculty.
            </p>
        </div>

        <!-- Grid Card -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

            @foreach($documentations as $item)
                <div class="bg-white rounded-2xl shadow-md hover:shadow-lg transition overflow-hidden">
                    <img src="{{ $item->image ? Storage::url($item->image) : asset('img/documentation-default.jpg') }}"
                        alt="{{ $item->title }}" class="w-full h-48 object-cover">
                    <div class="p-5">
                        <h3 class="text-base font-semibold text-blue-800 leading-snug">
                            {{ $item->title }}
                        </h3>
                        <p class="text-sm text-gray-500 mt-1">Dokumentasi</p>
                        <p class="text-sm text-gray-600 mt-1">Penulis: Admin Mobile Faculty</p>
                        <div class="text-sm text-gray-700 mt-3">
                            {{ \Illuminate\Support\Str::words(
                                trim(preg_replace('/\s+/', ' ', strip_tags(html_entity_decode($item->content)))),
                                20,
                                '...'
                            ) }}
                        </div>
                        <a href="{{ route('detail-front', $item->slug) }}"
                            class="mt-4 inline-block text-blue-700 font-medium hover:text-blue-900 transition">
                            Lihat Detail →
                        </a>
                    </div>
                </div>

            @endforeach

        </div>

        <!-- Tombol Lainnya -->
        <div class="text-center mt-12">
            <a href="{{ route('documentation-front') }}"
                class="px-6 py-3 bg-blue-700 text-white font-medium rounded-lg hover:bg-blue-800 transition">
                Lihat Lainnya
            </a>
        </div>

    </div>
</section>

{{-- Media Pembelajaran --}}
<section class="py-32 bg-gray-100">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Judul -->
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 inline-block relative">
                Media Pembelajaran
                <span
                    class="absolute left-1/2 -bottom-2 transform -translate-x-1/2 w-16 h-1 bg-blue-600 rounded-full"></span>
            </h2>
            <p class="mt-6 text-gray-600 max-w-2xl mx-auto">
                Kami percaya bahwa proses belajar haruslah dinamis dan relevan. Karena itu, Mobile Faculty menghadirkan
                media pembelajaran yang lengkap, praktis, dan sesuai dengan kebutuhan industri, agar setiap peserta
                dapat mengoptimalkan pengalaman belajarnya.
            </p>
        </div>

        <!-- Grid Card -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

            @foreach($lessons as $item)
                <div class="bg-white rounded-2xl shadow-md hover:shadow-lg transition overflow-hidden">
                    <img src="{{ $item->image ? Storage::url($item->image) : asset('img/lesson-default.jpg') }}" alt="{{$item->title}}"
                        class="w-full h-48 object-cover">
                    <div class="p-5">
                        <h3 class="text-base font-semibold text-blue-800 leading-snug">
                            {{$item->title}}
                        </h3>
                        <p class="text-sm text-gray-500 mt-1">Media Pembelajaran</p>
                        <p class="text-sm text-gray-600 mt-1">Penulis: Admin Mobile Faculty</p>
                        <div class="text-sm text-gray-700 mt-3">
                            {{ \Illuminate\Support\Str::words(
                                trim(preg_replace('/\s+/', ' ', strip_tags(html_entity_decode($item->content)))),
                                20,
                                '...'
                            ) }}
                        </div>
                        <a href="{{ route('detail-front', $item->slug) }}" class="mt-4 inline-block text-blue-700 font-medium hover:text-blue-900 transition">
                            Lihat Detail →
                        </a>
                    </div>
                </div>
            @endforeach

        </div>

        <!-- Tombol Lainnya -->
        <div class="text-center mt-12">
            <a href="#" class="px-6 py-3 bg-blue-700 text-white font-medium rounded-lg hover:bg-blue-800 transition">
                Lihat Lainnya
            </a>
        </div>

    </div>
</section>
@endsection
