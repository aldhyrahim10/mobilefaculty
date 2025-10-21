@extends('layouts.app')

@section('title')
{{ $post->title }}
@endsection

@section('content')
<div class="content-page mt-24">
    <div class="container mx-auto">
        <div class="content-detail w-11/12 mx-auto">
            <!-- Heading -->
            <div class="heading mb-12">
                <p class="title text-center text-4xl font-bold text-[#27548A] pt-12 pb-5">
                    {{ $post->title }}
                </p>
                <p class="text-center text-[#ABABAB] text-xl">
                    {{ $post->created_at->format('d-M-Y') }}</p>

                <div class="flex flex-col md:flex-row justify-between items-center mt-6 space-y-2 md:space-y-0">
                    <div class="flex justify-center">
                        <p class="text-base">Pembuat : <span class="font-medium">Admin Mobile Faculty</span></p>
                    </div>
                    <div class="flex justify-center">
                        <p class="text-base">
                            Kategori :
                            @if($post->post_category_id == 1)
                                <span class="font-medium">Dokumentasi</span>
                            @else
                                <span class="font-medium">Media Pembelajaran</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <!-- Gambar -->
            <div class="img-content">
                @if($post->post_category_id == 1)
                    <img class="w-full h-[600px] object-cover rounded-3xl"
                        src="{{ $post->image ? Storage::url($post->image) : asset('img/documentation-default.jpg') }}"
                        alt="{{ $post->title }}">
                @else
                    <img class="w-full h-[600px] object-cover rounded-3xl"
                        src="{{ $post->image ? Storage::url($post->image) : asset('img/lesson-default.jpg') }}"
                        alt="{{ $post->title }}">
                @endif
            </div>

            <!-- Konten -->
            <div class="desc-content my-12 prose max-w-none">
                {!! $post->content !!}
            </div>

            <!-- Hashtags -->
            @if(!empty($post->tags))
                @php
                    $tags = explode(',', $post->tags);
                @endphp
                <div class="hashtags my-24">
                    <h4 class="text-lg font-semibold mb-3 text-[#27548A]">Hashtag:</h4>
                    <div class="flex flex-wrap gap-2">
                        @foreach($tags as $tag)
                            <a href="{{route('tags-front', trim($tag))}}">
                                <span
                                    class="bg-[#E5F0FF] text-[#27548A] text-sm font-medium px-3 py-1 rounded-full shadow-sm">
                                    {{ trim($tag) }}
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif


        </div>
    </div>
</div>


@endsection
