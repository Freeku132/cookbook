<?php

namespace App\Http\Livewire\Stats;

use App\Models\User;
use Livewire\Component;

class UsersCount extends Component
{
    public $usersCount;
    public $selectedDays;

    public function mount()
    {
        $this->selectedDays = 30;
        $this->updateStat();
    }

    public function updateStat()
    {
        $this->usersCount = User::where('created_at', '>=', now()->subDays($this->selectedDays))->count();

        $this->emit('updateTheStat');
    }
    public function render()
    {
        return view('livewire.stats.users-count');
    }
}
