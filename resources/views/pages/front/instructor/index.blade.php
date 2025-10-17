@extends('layouts.app')

@section('title')
Mobile Faculty - Instruktur
@endsection

@section('content')

<section class="py-48 h-[700px] text-white relative"
    style="background-image: url(img/bg-header.jpg); background-size: cover;">
    <div class="w-[90%] lg:w-[80%] mx-auto px-6 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mt-10 mb-6">
            <span class="text-yellow-300">Instruktur</span>
        </h1>
        <p class="w-[70%] m-auto  text-lg md:text-xl mb-8">
            Belajar langsung dari ahlinya! Instruktur kami adalah para profesional berpengalaman dengan latar belakang
            industri dan akademik yang kuat, siap mendampingi Anda meraih sertifikasi dan keterampilan unggul.
        </p>
    </div>
</section>

<section class="py-32 bg-white">
    <div class="max-w-6xl mx-auto px-6 text-center">

        <!-- Search Bar -->
        <div class="flex justify-center mb-12">
            <input type="text" placeholder="Cari Instruktur..."
                class="form-search w-full max-w-2xl px-6 py-4 rounded-2xl shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-600 text-gray-600" />
        </div>

        <!-- Grid Card -->
        <div id="instructor-list" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($instructors as $item)
                <div
                    class="item-content bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <img src="{{ $item->image ? Storage::url($item->image) : 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png' }}"
                        alt="Instruktur {{ $item->name }}" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="name text-xl font-semibold text-gray-900">{{ $item->name }}</h3>
                        <p class="mt-3 text-gray-600 text-sm leading-relaxed">{{ $item->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pesan jika kosong -->
        <p class="empty-list hidden mt-12 text-gray-500 text-lg">Instruktur tidak ditemukan.</p>

    </div>
</section>

@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('.form-search').on('keyup', function () {
            var searchValue = $(this).val().toLowerCase();
            var visibleCount = 0;

            $('.item-content').each(function () {
                var articleName = $(this).find('.name').text().toLowerCase();
                if (articleName.includes(searchValue)) {
                    $(this).fadeIn();
                    visibleCount++;
                } else {
                    $(this).fadeOut();
                }
            });

            if (visibleCount === 0) {
                $('.empty-list').fadeIn();
            } else {
                $('.empty-list').fadeOut();
            }
        });
    });
</script>
@endsection
