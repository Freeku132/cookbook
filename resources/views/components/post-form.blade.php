@if($post->exists)
            <form action="{{route('update-post', $post->slug)}}" method="POST" class="lg:w-1/2">
                @method('PATCH')
@else
            <form action="/post/store" method="POST" class="lg:w-1/2">
@endif

    @csrf
    <div class="mt-4">
        <label for="title" class="font-semibold block">Title</label>
        <input type="text" name="title" id="title" class="border border-gray-400 rounded w-full px-2 py-2 mt-2" value="{{ $post->title }}">
        @error('title')
        <div class="bg-red-200 text-red-700 rounded-md px-4 py-2 mt-2">{{ $message }}</div>
        @enderror
    </div>
    <div class="mt-4">
        <label for="body" class="font-semibold block">Body</label>
        <textarea name="body" id="body" cols="30" rows="10" class="border border-gray-400 rounded w-full px-2 py-2 mt-2">{{ $post->body }}</textarea>
        @error('body')
        <div class="bg-red-200 text-red-700 rounded-md px-4 py-2 mt-2">{{ $message }}</div>
        @enderror
    </div>
    <div class="mt-8">
        <button type="submit" class="bg-blue-600 rounded inline-block text-white px-4 py-4">
           @if($post->exists)
               Update Post
            @else
               Create Post
           @endif
        </button>
    </div>
</form>
