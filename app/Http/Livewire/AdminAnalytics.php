<?php

namespace App\Http\Livewire;

use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Livewire\Component;

class AdminAnalytics extends Component
{
    public bool $toggleA = true;

    public function render()
    {
        return view('livewire.admin-analytics');
    }
}
