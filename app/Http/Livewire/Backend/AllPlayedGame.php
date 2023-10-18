<?php

namespace App\Http\Livewire\Backend;

use App\Models\Game;
use App\Models\GamePlay;
use Livewire\Component;
use Livewire\WithPagination;

class AllPlayedGame extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm;
    public $game = [];

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $this->game = Game::where('game_name', 'LIKE', $searchTerm)->get();
        if (count($this->game) > 1) {
            $playedGames = GamePlay::paginate(10);
        } else {
            $playedGames = GamePlay::paginate(10);
        }

        if (count($this->game) == 1) {
            $playedGames = GamePlay::where('game_id', 'LIKE', $this->game->first()->id ?? '')
                ->paginate(10);
        }

        return view('livewire.backend.all-played-game', [
            'playedGames' => $playedGames,
        ]);
    }
}
