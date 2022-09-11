<x-layout>
    <div>
        <div class="bg-white rounded-md border my-8 px-6 py-6">
            <div>
                <h2 class="text-2xl font-semibold">Post</h2>

                @if (session('success_message'))
                    <div class="bg-green-200 text-green-800 px-4 py-2">
                        {{ session('success_message') }}
                    </div>
                @endif

                <div class="mt-4">
                    <div  class="lg:w-1/2">
                        @csrf
                        <div class="mt-4">
                            <label for="title" class="font-semibold block">Title</label>
                            <div   class="rounded w-full px-2 py-2 mt-2">{{$post->title}}</div>

                        </div>
                        <div class="mt-4">
                            <label for="body" class="font-semibold block">Body</label>
                            <div class="rounded w-full px-2 py-2 mt-2">{{ $post->body}}</div>
                        </div>
                        <div class="mt-8">
                            <a href="{{route('edit-post', $post->slug)}}" type="submit" class="bg-blue-600 rounded inline-block text-white px-4 py-4">Edit Post</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
