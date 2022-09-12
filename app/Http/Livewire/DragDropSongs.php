<?php

namespace App\Http\Livewire;

use App\Models\Song;
use Livewire\Component;

class DragDropSongs extends Component
{
    public function updateSongOrder($newOrder)
    {
        foreach ($newOrder as $order){

            Song::find($order['value'])->update([
                'order' => $order['order']
            ]);
        }
        $this->dispatchBrowserEvent('order-updated');

    }

    public function render()
    {

        return view('livewire.drag-drop-songs', [
                'songs' => Song::orderBy('order')->get()
            ]);
    }
}
