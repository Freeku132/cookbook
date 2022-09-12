<x-layout>
    @push('styles')
        <style>
            .sortable-drag{
                background: silver;
            }
        </style>
    @endpush
    <div>
        <livewire:drag-drop-songs />
    </div>
    @push('scripts')
{{--            <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>--}}
            <script src="https://unpkg.com/@nextapps-be/livewire-sortablejs@0.2.0/dist/livewire-sortable.js"></script>
            <script>
                window.addEventListener('order-updated', event => {
                    alert('Order was updated!');
                })
            </script>
    @endpush
</x-layout>
