@extends('layouts.app')

@section('title', 'Mobile Faculty - Media Pembelajaran')

@section('content')
<section class="py-48 h-[700px] text-white relative"
    style="background-image: url('{{ asset('img/bg-header.jpg') }}'); background-size: cover; background-position: center;">
    <div class="w-[90%] lg:w-[80%] mx-auto px-6 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mt-10 mb-6">
            <span class="text-yellow-300">Media Pembelajaran</span>
        </h1>
        <p class="w-[70%] m-auto text-lg md:text-xl mb-8">
            Kami percaya bahwa proses belajar haruslah dinamis dan relevan. Karena itu, Mobile Faculty menghadirkan
            media pembelajaran yang lengkap, praktis, dan sesuai dengan kebutuhan industri.
        </p>
    </div>
</section>

<section class="py-24 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <!-- Search -->
        <div class="flex justify-center mb-12">
            <input id="searchInput" type="text" placeholder="Cari Media Pembelajaran..."
                class="w-full max-w-2xl px-6 py-4 rounded-2xl shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-600 text-gray-600" />
        </div>

        <!-- Container hasil pencarian -->
        <div id="lessonContainer">
            @include('partials.lesson-list', ['lessons' => $lessons])
        </div>
    </div>
</section>
@endsection

@section('scripts')

<script>
$(document).ready(function () {
    let debounceTimer;

    function fetchLessons(query = '', pageUrl = "{{ route('lesson-front') }}") {
        $.ajax({
            url: pageUrl,
            method: 'GET',
            data: { search: query },
            beforeSend: function() {
                $('#lessonContainer').fadeOut(200, function() {
                    $(this).html(`
                        <div class="flex flex-col items-center justify-center py-12 animate-fadeIn">
                            <svg class="animate-spin h-10 w-10 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                            </svg>
                            <p class="mt-4 text-gray-600 font-medium">Sedang mencari data...</p>
                        </div>
                    `).fadeIn(200);
                });
            },
            success: function (data) {
                $('#lessonContainer').fadeOut(200, function() {
                    $(this).html(data).fadeIn(300);
                });
            }
        });
    }

    // Auto search dengan debounce
    $('#searchInput').on('keyup', function () {
        const query = $(this).val();

        clearTimeout(debounceTimer); // reset timer setiap user ketik

        // Jalankan fetch setelah 1 detik user berhenti mengetik
        debounceTimer = setTimeout(() => {
            fetchLessons(query);
        }, 1000); // ubah ke 5000 kalau mau 5 detik
    });

    // Pagination AJAX
    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();
        const url = $(this).attr('href');
        const query = $('#searchInput').val();
        fetchLessons(query, url);
    });
});
</script>

<style>
@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}
.animate-fadeIn {
  animation: fadeIn 0.3s ease-in-out;
}
</style>
@endsection

