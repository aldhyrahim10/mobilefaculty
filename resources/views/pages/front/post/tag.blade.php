@extends('layouts.app')

@section('title', 'Mobile Faculty - Media Pembelajaran')

@section('content')
<section class="py-48 h-[700px] text-white relative"
    style="background-image: url('{{ asset('img/bg-header.jpg') }}'); background-size: cover; background-position: center;">
    <div class="w-[90%] lg:w-[80%] mx-auto px-6 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mt-10 mb-6">
            <span class="text-yellow-300">{{ $tag }}</span>
        </h1>
        {{-- <p class="w-[70%] m-auto text-lg md:text-xl mb-8">
            Kami percaya bahwa proses belajar haruslah dinamis dan relevan. Karena itu, Mobile Faculty menghadirkan
            media pembelajaran yang lengkap, praktis, dan sesuai dengan kebutuhan industri.
        </p> --}}
    </div>
</section>

<section class="py-24 bg-white">
    <div class="max-w-6xl mx-auto px-6">
       

        <!-- Container hasil pencarian -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($posts as $item)
                <div class="card-item bg-white rounded-2xl shadow-md hover:shadow-lg transition overflow-hidden">
                    <img src="{{ $item->image ? Storage::url($item->image) : asset('img/lesson-default.jpg') }}"
                        alt="{{ $item->title }}" class="w-full h-48 object-cover">
                    <div class="p-5">
                        <h3 class="title text-base font-semibold text-blue-800 leading-snug">
                            {{ $item->title }}
                        </h3>
                        <p class="text-sm text-gray-500 mt-1">Media Pembelajaran</p>
                        <p class="text-sm text-gray-600 mt-1">Penulis: Admin Mobile Faculty</p>
                        <p class="text-sm text-gray-700 mt-3">
                            {{ \Illuminate\Support\Str::words(strip_tags($item->content), 20, '...') }}
                        </p>
                        <a href="{{ route('detail-front', $item->slug) }}"
                            class="mt-4 inline-block text-blue-700 font-medium hover:text-blue-900 transition">
                            Lihat Detail →
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500 mt-12 col-span-full">
                    Tidak ada media pembelajaran yang cocok.
                </p>
            @endforelse
        </div>
    </div>
</section>
@endsection
