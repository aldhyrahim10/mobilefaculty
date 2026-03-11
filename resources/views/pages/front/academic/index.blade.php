@extends('layouts.app')

@section('title', 'Mobile Faculty - Program Akademik')

@section('content')
{{-- Hero Section --}}
<section class="py-48 h-[700px] text-white relative flex items-center"
    style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ asset('img/bg-header.jpg') }}'); background-size: cover; background-position: center;">
    <div class="w-[90%] lg:w-[80%] mx-auto px-6 text-center">
        <h1 class="text-4xl md:text-6xl font-extrabold mt-10 mb-6 tracking-tight text-white">
            Program <span class="text-yellow-400 font-serif italic">Akademik</span>
        </h1>
        <p class="max-w-3xl m-auto text-lg md:text-xl mb-8 text-gray-100 leading-relaxed">
            Asah keterampilan profesional Anda dengan kurikulum berbasis industri. 
            Dari pemula hingga mahir, temukan jalur belajar yang tepat untuk karier masa depan Anda.
        </p>
    </div>
</section>

<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        
        <div class="flex justify-center mb-16">
            <div class="relative w-full max-w-2xl group">
                <span class="absolute inset-y-0 left-0 flex items-center pl-5 text-gray-400 transition-colors group-focus-within:text-indigo-600">
                    <i class="fas fa-search"></i>
                </span>
                <input id="academicSearch" type="text" placeholder="Cari judul kursus atau kategori..."
                    class="w-full pl-14 pr-6 py-5 rounded-3xl shadow-xl border-none focus:ring-4 focus:ring-indigo-100 text-gray-700 placeholder-gray-400 transition-all duration-300" />
            </div>
        </div>

        <div id="academicContainer">
            {{-- Pastikan Anda sudah membuat file resources/views/partials/academic-list.blade.php --}}
            @include('partials.academic-list', ['academics' => $academics])
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
$(document).ready(function () {
    let debounceTimer;

    // Fungsi Fetch khusus Academic
    function fetchAcademics(query = '', pageUrl = "{{ route('academic-front') }}") {
        $.ajax({
            url: pageUrl,
            method: 'GET',
            data: { search: query },
            beforeSend: function() {
                $('#academicContainer').css('opacity', '0.5'); // Efek transisi halus
            },
            success: function (data) {
                $('#academicContainer').html(data).css('opacity', '1');
                
                // Scroll halus kembali ke atas container setelah load (opsional)
                $('html, body').animate({
                    scrollTop: $("#academicContainer").offset().top - 150
                }, 500);
            },
            error: function() {
                $('#academicContainer').html(`
                    <div class="text-center py-12">
                        <p class="text-red-500 font-medium font-bold">Terjadi kesalahan saat memuat data. Silakan coba lagi.</p>
                    </div>
                `).css('opacity', '1');
            }
        });
    }

    // Event Search dengan Debounce 800ms (lebih responsif dari 1 detik)
    $('#academicSearch').on('keyup', function () {
        const query = $(this).val();
        clearTimeout(debounceTimer);

        debounceTimer = setTimeout(() => {
            fetchAcademics(query);
        }, 800); 
    });

    // Pagination AJAX khusus link di dalam academicContainer
    $(document).on('click', '#academicContainer .pagination a', function (e) {
        e.preventDefault();
        const url = $(this).attr('href');
        const query = $('#academicSearch').val();
        fetchAcademics(query, url);
    });
});
</script>

<style>
/* Animasi Loading Spinner disesuaikan ke Indigo untuk Academic */
.loading-spinner {
    border-top-color: #4F46E5;
    animation: spinner 0.6s linear infinite;
}

@keyframes spinner {
    to { transform: rotate(360deg); }
}

/* Transisi konten */
#academicContainer {
    transition: opacity 0.3s ease-in-out;
}
</style>
@endsection