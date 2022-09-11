<x-layout>
    @if (session('success_message'))
        <div class="bg-green-200 text-green-800 px-4 py-2">
            {{ session('success_message') }}
        </div>
    @endif
@foreach($posts as $post)
    <div class="border border-gray-400">
    <div>
        <a href="{{route('show-post', $post->slug)}}">
    {{$post->title}}
        </a>
    </div>
    <div>
        {{$post->excerpt}}
    </div>
    </div>
@endforeach
</x-layout>
