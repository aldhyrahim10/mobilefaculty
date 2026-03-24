<style>
.desc-content h1 {
    font-size: 2rem;
    font-weight: 700;
    margin: 1.5rem 0 1rem;
}

.desc-content h2 {
    font-size: 1.5rem;
    font-weight: 600;
    margin: 1.25rem 0 0.75rem;
}

.desc-content h3 {
    font-size: 1.25rem;
    font-weight: 600;
    margin: 1rem 0 0.5rem;
}

.desc-content p {
    margin: 0.75rem 0;
    line-height: 1.7;
}

.desc-content ul {
    list-style: disc;
    padding-left: 1.5rem;
    margin: 0.75rem 0;
}

.desc-content ol {
    list-style: decimal;
    padding-left: 1.5rem;
    margin: 0.75rem 0;
}
</style>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
    @forelse($academics as $item)
        <div
            class="group relative bg-white rounded-3xl border border-gray-100 shadow-sm hover:shadow-2xl transition-all duration-500 overflow-hidden flex flex-col h-full transform hover:-translate-y-2">

            <div class="relative overflow-hidden h-52">
                <div class="absolute top-4 left-4 z-10">
                    <span
                        class="backdrop-blur-md bg-white/80 px-3 py-1.5 rounded-xl text-[10px] font-extrabold uppercase tracking-widest shadow-sm flex items-center gap-1.5
                {{ $item->level == '1' ? 'text-green-600' : ($item->level == '2' ? 'text-orange-500' : 'text-red-600') }}">
                        <span
                            class="w-1.5 h-1.5 rounded-full {{ $item->level == '1' ? 'bg-green-600' : ($item->level == '2' ? 'bg-orange-500' : 'bg-red-600') }}"></span>
                        {{ $item->level == '1' ? 'Beginner' : ($item->level == '2' ? 'Intermediate' : 'Expert') }}
                    </span>
                </div>

                <img src="{{ $item->image ? Storage::url($item->image) : asset('img/course-default.jpg') }}"
                    alt="{{ $item->title }}"
                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">

                <div
                    class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-5">
                    <span class="text-white text-xs font-medium">Klik untuk detail modul <i
                            class="fas fa-arrow-right ml-1 text-[10px]"></i></span>
                </div>
            </div>

            <div class="p-6 flex flex-col flex-grow">
                <div class="flex justify-between items-start mb-3">
                    <span
                        class="inline-block px-2 py-1 rounded-lg bg-indigo-50 text-indigo-600 text-[10px] font-bold uppercase tracking-wider">
                        {{ $item->academicCategory->academic_category_name ?? 'Uncategorized' }}
                    </span>
                    <div class="text-gray-300 group-hover:text-indigo-200 transition-colors">
                        <i class="fas fa-bookmark text-lg"></i>
                    </div>
                </div>

                <h3
                    class="text-lg font-extrabold text-gray-900 leading-tight mb-3 group-hover:text-indigo-600 transition-colors line-clamp-2">
                    {{ $item->title }}
                </h3>

                <div class="flex items-center mb-4">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($item->instructor->name ?? 'Admin') }}&background=EEF2FF&color=4F46E5"
                        class="w-7 h-7 rounded-full border border-indigo-100 mr-2.5">
                    <p class="text-xs text-gray-500 font-semibold italic">
                        By <span
                            class="text-gray-800 not-italic">{{ $item->instructor->name ?? 'Admin Mobile Faculty' }}</span>
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-3 mb-6">
                    <div
                        class="flex items-center p-2 rounded-xl bg-gray-50 border border-gray-100/50 group-hover:bg-white transition-colors">
                        <div class="w-8 h-8 rounded-lg bg-white shadow-sm flex items-center justify-center mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-indigo-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="flex flex-col">
                            <span
                                class="text-[9px] text-gray-400 uppercase leading-none mb-0.5 font-bold tracking-wider">Durasi</span>
                            <span class="text-[11px] font-bold text-gray-700 leading-none">{{ $item->duration }}
                                Hari</span>
                        </div>
                    </div>

                    <div
                        class="flex items-center p-2 rounded-xl bg-gray-50 border border-gray-100/50 group-hover:bg-white transition-colors">
                        <div class="w-8 h-8 rounded-lg bg-white shadow-sm flex items-center justify-center mr-2">
                            @if($item->method == "1")
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-indigo-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.75 17L9 21h6l-.75-4M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-indigo-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            @endif
                        </div>
                        <div class="flex flex-col">
                            <span
                                class="text-[9px] text-gray-400 uppercase leading-none mb-0.5 font-bold tracking-wider">Metode</span>
                            <span class="text-[11px] font-bold text-gray-700 leading-none">
                                {{ $item->method == "1" ? 'Online' : 'Offline' }}
                            </span>
                        </div>
                    </div>
                </div>

                <button onclick="openModal('{{ $item->id }}')"
                    class="relative overflow-hidden mt-auto w-full group/btn flex items-center justify-center gap-2 py-3.5 rounded-2xl bg-indigo-600 text-white font-bold text-sm shadow-indigo-200 shadow-lg hover:shadow-indigo-300 hover:bg-indigo-700 transition-all duration-300 active:scale-95">
                    <span>Detail Kursus</span>
                    <i class="fas fa-chevron-right text-[10px] group-hover/btn:translate-x-1 transition-transform"></i>
                </button>
            </div>
        </div>

        <div id="modal-academic-{{ $item->id }}"
            class="fixed inset-0 z-[100] hidden flex items-start justify-center bg-black/60 backdrop-blur-sm p-4 overflow-y-auto animate-fadeIn">

            <div
                class="bg-white rounded-[32px] shadow-2xl w-full max-w-2xl overflow-hidden relative animate-slideUp my-8">

                <button onclick="closeModal('{{ $item->id }}')"
                    class="absolute top-4 right-4 z-[110] bg-[#54C392] hover:bg-[#45a37a] text-white w-10 h-10 rounded-xl flex items-center justify-center transition-all shadow-lg active:scale-90">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="p-8">
                    <h2 class="text-2xl font-extrabold text-[#2D31fa] mb-6">{{ $item->title }}</h2>

                    <div class="rounded-2xl overflow-hidden mb-6 h-56 shadow-inner border border-gray-100">
                        <img src="{{ $item->image ? Storage::url($item->image) : asset('img/course-default.jpg') }}"
                            class="w-full h-full object-cover">
                    </div>

                    <div class="mb-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $item->title }}</h3>
                        <div class="desc-content text-gray-600 text-sm leading-relaxed">
                            {!! $item->description !!}
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">

                        <div class="bg-[#F0F5FF] p-4 rounded-2xl flex flex-col items-center justify-center text-center">
                            <div
                                class="bg-white w-10 h-10 rounded-full flex items-center justify-center mb-2 shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span class="text-[10px] uppercase font-bold text-gray-400 tracking-widest">Durasi</span>
                            <span class="text-sm font-extrabold text-gray-800">{{ $item->duration }} Hari ({{ $item->method == "1" ? 'Online' : 'Offline' }})


                            </span>
                        </div>

                        <div class="bg-[#F0FFF8] p-4 rounded-2xl flex flex-col items-center justify-center text-center">
                            <div
                                class="bg-white w-10 h-10 rounded-full flex items-center justify-center mb-2 shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                            <span class="text-[10px] uppercase font-bold text-gray-400 tracking-widest">Level</span>
                            <span class="text-sm font-extrabold text-gray-800">
                                {{ $item->level == '1' ? 'Beginner' : ($item->level == '2' ? 'Intermediate' : 'Expert') }}
                            </span>
                        </div>

                        <div class="bg-[#F8F7FF] p-4 rounded-2xl flex flex-col items-center justify-center text-center">
                            <div
                                class="bg-white w-10 h-10 rounded-full flex items-center justify-center mb-2 shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-purple-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <span
                                class="text-[10px] uppercase font-bold text-gray-400 tracking-widest">Instruktur</span>
                            <span
                                class="text-[11px] font-extrabold text-gray-800">{{ $item->instructor->name ?? 'N/A' }}</span>
                        </div>

                        <div class="bg-[#FFFDF0] p-4 rounded-2xl flex flex-col items-center justify-center text-center">
                            <div
                                class="bg-white w-10 h-10 rounded-full flex items-center justify-center mb-2 shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <span
                                class="text-[10px] uppercase font-bold text-gray-400 tracking-widest">Sertifikat</span>
                            <span class="text-sm font-extrabold text-gray-800">
                                @if($item->certificate_type == "1")
                                    BNSP
                                @else
                                    Lainnya
                                @endif
                            </span>
                        </div>

                    </div>

                    <div class="grid grid-cols-2 gap-4 mt-3">

                        <div
                            class="col-span-2 bg-[#FFF4F0] p-5 rounded-2xl flex items-center justify-between shadow-sm border border-orange-100/50">
                            <div class="flex items-center">
                                <div
                                    class="bg-white w-12 h-12 rounded-full flex items-center justify-center mr-4 shadow-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-orange-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="flex flex-col text-left">
                                    <span
                                        class="text-[10px] uppercase font-bold text-gray-400 tracking-widest leading-none mb-1">Harga</span>
                                    <span class="text-xl font-extrabold text-gray-900">
                                        {{ $item->price == 0 ? 'Gratis' : 'Rp ' . number_format($item->price, 0, ',', '.') }}
                                    </span>
                                </div>
                            </div>

                            <a href="https://wa.me/6287887829208?text=Halo, saya tertarik dengan kursus {{ $item->title }}"
                                class="bg-[#2D31fa] hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-bold text-sm transition-all active:scale-95 shadow-lg shadow-blue-200">
                                Daftar Sekarang
                            </a>
                        </div>
                    </div>

                    {{-- Section Hashtag --}}
                    @if(!empty($item->tags))
                        @php
                            $tags = explode(',', $item->tags);
                        @endphp
                        <div class="hashtags mt-6">
                            <h4 class="text-sm font-bold mb-3 text-[#2D31fa] flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                </svg>
                                Hashtag Terkait:
                            </h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach($tags as $tag)
                                    @php $trimmedTag = trim($tag); @endphp
                                        <a href="{{ route('tags-front', $trimmedTag) }}"
                                            class="group/tag">
                                            <span
                                                class="bg-[#F0F5FF] text-[#2D31fa] text-[11px] font-bold px-4 py-1.5 rounded-full shadow-sm border border-blue-50/50 group-hover/tag:bg-[#2D31fa] group-hover/tag:text-white transition-all duration-300 inline-block">
                                                {{ $trimmedTag }}
                                            </span>
                                        </a>
                                    @endforeach
                            </div>
                        </div>
                    @endif
                </div>


            </div>


        </div>
    @empty
        <div class="col-span-full py-20 text-center">
            <img src="{{ asset('img/empty-state.svg') }}" class="w-32 mx-auto mb-4 opacity-20">
            <p class="text-gray-500 font-medium">Belum ada kursus yang tersedia saat ini.</p>
        </div>
    @endforelse
</div>

<div class="mt-12 flex justify-center">
    {{ $academics->links() }}
</div>

<style>
    /* Gunakan @@ agar Blade tidak menganggapnya sebagai perintah PHP/Blade */
    @keyframes fadeIn { 
        from { opacity: 0; } 
        to { opacity: 1; } 
    }
    
    @keyframes slideUp { 
        from { transform: translateY(50px); opacity: 0; } 
        to { transform: translateY(0); opacity: 1; } 
    }

    .animate-fadeIn {
        animation: fadeIn 0.3s ease-out;
    }

    .animate-slideUp {
        animation: slideUp 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }
    
    /* Tambahan agar modal bisa scroll jika kepanjangan */
    .modal-open {
        overflow: hidden;
    }
</style>

<script>
    function openModal(id) {
        document.getElementById('modal-academic-' + id).classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Lock scroll
    }

    function closeModal(id) {
        document.getElementById('modal-academic-' + id).classList.add('hidden');
        document.body.style.overflow = 'auto'; // Unlock scroll
    }

</script>
