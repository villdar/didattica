<?php

namespace App\Http\Livewire;

use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Livewire\Component;

class AdminAnalytics extends Component
{
    public $ActivityFilter = ['Tools', 'Users'];

    public function setFilter($newFilter)
    {
        $this->ActivityFilter = $newFilter;
        $this->emit('queryStringUpdatedActivityFilter', $this->ActivityFilter);
    }

    public function render()
    {
        return view('livewire.admin-analytics');
    }
}
