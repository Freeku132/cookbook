<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChartOrders extends Component
{
    public $thisYearOrders;
    public $lastYearOrders;
    public $selectedYear;

    public function mount()
    {
        $this->selectedYear = date('Y');
        $this->updateOrdersCount();
    }

    public function updateOrdersCount()
    {
        $this->thisYearOrders = \App\Models\Order::getYearOrders( $this->selectedYear)->groupByMonth();
        $this->lastYearOrders = \App\Models\Order::getYearOrders($this->selectedYear -1)->groupByMonth();

        $this->emit('updateTheChart');
    }

    public function render()
    {
        $availableYears = [
            date('Y'), date('Y') -1, date('Y') -2, date('Y') -3];



        return view('livewire.chart-orders', [
            'availableYears' => $availableYears,
        ]);
    }

}
