<div id="documentation-list" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
    @forelse($documentations as $item)
        <div class="item-content bg-white rounded-2xl shadow-md hover:shadow-lg transition overflow-hidden">
            <img src="{{ $item->image ? Storage::url($item->image) : asset('img/documentation-default.jpg') }}"
                alt="{{ $item->title }}" class="w-full h-48 object-cover">
            <div class="p-5">
                <h3 class="title text-base font-semibold text-blue-800 leading-snug">
                    {{ $item->title }}
                </h3>
                <p class="text-sm text-gray-500 mt-1">Dokumentasi</p>
                <p class="text-sm text-gray-600 mt-1">Penulis: Admin Mobile Faculty</p>
                <p class="text-sm text-gray-700 mt-3">
                    {{ \Illuminate\Support\Str::words(strip_tags($item->content), 25, '...') }}
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

<div class="mt-8">
    {{ $documentations->links() }}
</div>
