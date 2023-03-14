<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class RepeatRequestForm extends Component
{
    public $url;
    public $body;
    public $headers;

    protected $rules = [
        'url' => 'required|min:6',
        'body' => 'required',
        'headers' => 'required|array'
    ];

    public function submitForm()
    {
        $this->validate();
        Log::debug('headers', $this->headers);
        session()->flash('success', 'Content created successfully!');
        $this->reset(['url', 'headers', 'body']);
    }

    public function addData()
    {
        $this->headers[] = [
            'key' => '',
            'value' => ''
        ];
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $success = session('success');
        return view('livewire.repeat-request-form', [
            'success' => $success,
        ]);
    }
}
