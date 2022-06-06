<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

/**
 * @property-read Collection|DailyScores[] $scores
 * @property-read int $total
 */
class DailyScores extends Component
{
    public User $user;

    protected $listeners = [
        'dailyScore::saved' => '$refresh',
    ];

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render() //Factory|View|Application
    {
        return view('livewire.daily-scores');
    }

    public function getScoresProperty()
    {
        return $this->user->dailyScores;
    }

    public function getTotalProperty()
    {
        return $this->user->dailyScores()->sum('points');
    }
}
