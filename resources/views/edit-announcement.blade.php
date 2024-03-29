<x-layout>
    @push('styles')
        <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />

        <link
            href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
            rel="stylesheet"
        />


        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    @endpush
    @if(session('success_message'))
        <div class="bg-green-200 text-green-800 px-4 py-2 rounded-lg">
            {{session('success_message')}}
        </div>
    @endif
    @if(count($errors) > 0)
        <div class="bg-red-200 text-red-700 px-4 py-2 rounded-lg">
            <ul class="list-disc ml-4">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="bg-white xl:w-1/2 mx-auto rounded-lg shadow-md mt-4 overflow-hidden">
        <h3 class="text-xl m-6 font-semibold"> Edit Announcement</h3>
        <form action="{{route('update-announcement')}}" method="POST" class="max-w-2xl mt-4" id="updateAnnouncement" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
        <div class="my-8 p-6">
        <div>
            <h4 class="font-semibold">Is Active?</h4>
            <div class="mt-2">
                <div>
                    <input type="radio" name="isActive" id="isActiveYes" value="1" @checked($announcement->isActive) required>
                    <label for="isActiveYes">Yes</label>
                </div>
                <div>
                    <input type="radio" name="isActive" id="isActiveNo" value="0"  @checked(!$announcement->isActive) required>
                    <label for="isActiveNo">No</label>
                </div>
            </div>
            </div>

            <div class="mt-4">
                <label for="bannerText" class="font-semibold block">Banner Text</label>
                <input type="text" name="bannerText" id="bannerText" class="border border-gray-400 rounded w-full px-2 py-2 mt-2" value="{{$announcement->bannerText}}" required>
            </div>

            <div class="mt-4">
                <label for="bannerColor" class="font-semibold block">Banner Color</label>
                <input type="color" name="bannerColor" id="bannerColor" value="{{$announcement->bannerColor}}" required>
            </div>

            <div class="mt-4">
                <label for="titleText" class="font-semibold block">Title Text</label>
                <input type="text" name="titleText" id="titleText" class="border border-gray-400 rounded w-full px-2 py-2 mt-2" value="{{$announcement->titleText}}" required>
            </div>

            <div class="mt-4">
                <label for="titleColor" class="font-semibold block">Title Color</label>
                <input type="color" name="titleColor" id="titleColor" value="{{$announcement->titleColor}}" required>
            </div>

            <div class="mt-4">
                <label for="content" class="font-semibold block">Content</label>
                <textarea name="content" id="content" cols="30" rows="10" class="hidden border border-gray-400 rounded w-full px-2 py-2 mt-2" required>{{ $announcement->content }}</textarea>
                <div id="editor">
                    {!!  $announcement->content !!}
                </div>
            </div>

            <div class="mt-4">
                <label for="buttonText" class="font-semibold block">Button Text</label>
                <input type="text" name="buttonText" id="buttonText" class="border border-gray-400 rounded w-full px-2 py-2 mt-2" value="{{$announcement->buttonText}}" required>
            </div>

            <div class="mt-4">
                <label for="buttonColor" class="font-semibold block">Button Color</label>
                <input type="color" name="buttonColor" id="buttonColor" value="{{$announcement->buttonColor}}" required>
            </div>

            <div class="mt-4">
                <label for="buttonLink" class="font-semibold block">Button Link</label>
                <input type="url" name="buttonLink" id="buttonLink" class="border border-gray-400 rounded w-full px-2 py-2 mt-2" value="{{$announcement->buttonLink}}" required>
            </div>

            <div class="mt-4">
                <label for="imageUpload" class="font-semibold block">Image Upload</label>
                <input type="file" name="imageUpload" id="imageUpload" class="mt-2" accept="image/*">
                @if ($announcement->imageUpload)
                    <img src="{{ asset('/storage/'.$announcement->imageUpload) }}" alt="image" class="mx-auto">
                @endif
            </div>

            <div class="mt-4">
                <label for="imageUploadFilePond" class="font-semibold block">Image Upload FilePond</label>
                <input type="file" name="imageUploadFilePond" id="imageUploadFilePond" class="mt-2" accept="image/*">
                @if ($announcement->imageUploadFilePond)
                    <img src="{{ asset('/storage/'.$announcement->imageUploadFilePond) }}" alt="image" class="mx-auto">
                @endif
            </div>

            <div class="mt-8">
                <button type="submit" class="bg-blue-600 rounded inline-block text-white px-4 py-4">Update Announcement</button>
            </div>
        </div>
        </form>
    </div>
        @push('scripts')
                            <!-- Import -->
            <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

            <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

            <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>

            <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

            <script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>


            <script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>



            <!-- Initialize Quill editor -->
            <script>
                var quill = new Quill('#editor', {
                    theme: 'snow',
                    placeholder: 'Enter announcement details',
                });
                const form = document.querySelector('#updateAnnouncement');
                form.addEventListener('submit', e => {
                    e.preventDefault();
                    const quillEditor = document.querySelector('#editor');
                    const html = quillEditor.children[0].innerHTML;
                    document.querySelector('#content').value = html;
                    form.submit();
                })
            </script>
                        {{--Init FilePond--}}
            <script>
                //Plugin preview
                FilePond.registerPlugin(FilePondPluginImagePreview);
                //Plugin validate
                FilePond.registerPlugin(FilePondPluginFileValidateType);
                //Plugin transform
                FilePond.registerPlugin(FilePondPluginImageTransform);
                //Plugin resize
                FilePond.registerPlugin(FilePondPluginImageResize);



                // Get a reference to the file input element
                const inputElement = document.querySelector('#imageUploadFilePond');

                // Create a FilePond instance
                const pond = FilePond.create(inputElement,{
                    imageResizeTargetWidth: 800,
                    imageResizeMode: 'contain',
                    imageResizeUpscale : 'false',
                    server: {
                        url: '/upload',
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                        }
                    }
                });
            </script>

        @endpush
</x-layout>
