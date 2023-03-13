<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class RepeatRequestForm extends Component
{
    public $title;
    public $body;

    protected $rules = [
        'title' => 'required|min:6',
        'body' => 'required',
    ];

    public function submitForm()
    {
        $this->validate();
        Log::debug($this->title);
        session()->flash('success', 'Content created successfully!');
        $this->reset(['title', 'body']);
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $success = session('success');
        return view('livewire.repeat-request-form', [
            'success' => $success,
        ]);
    }
}
