<?php

namespace App\Http\Livewire\Backend;

use App\Models\Subscriber;
use Livewire\Component;
use Livewire\WithPagination;

class Subscribers extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm;
    public $subscriberDetails = [];

    public function remove($subscriber)
    {
        $subscribers = Subscriber::find($subscriber);
        $subscribers->delete();
    }

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $subscribers = Subscriber::where('phone_num', 'LIKE', $searchTerm)
            ->orWhere('unique_id', 'LIKE', $searchTerm)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
        return view('livewire.backend.subscribers', [
            'subscribers' => $subscribers,
        ]);
    }
}
