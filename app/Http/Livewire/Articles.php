<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class Articles extends Component
{
    public $search = '';

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.articles', [
            'articles' => Article::where('title', 'like', "%{$this->search}%")->latest()->get(),
        ])->layout('layouts.guest');
    }
}
