<x-layout>
    <div class="bg-white xl:w-1/2 mx-auto rounded-lg shadow-md mt-4 overflow-hidden">
        <div class="bg-purple-800 text-white">
            <h3 class="text-2xl text-center font-bold px-4 py-4">{{$announcement->titleText}}</h3>
        </div>
        <div class="text-gray-600 p-5">
            {!!  $announcement->content!!}
            {{$announcement->content}}
            <div class="mt-8">
                <a href="{{$announcement->buttonLink}}" class="bg-blue-600 rounded inline-block text-white px-4 py-4" style="background:{{$announcement->buttonColor}}">{{$announcement->buttonText}}</a>
            </div>
        </div>
    </div>
</x-layout>
