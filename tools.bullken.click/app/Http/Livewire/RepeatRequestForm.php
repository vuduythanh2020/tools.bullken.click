<?php

namespace App\Http\Livewire;

use App\Http\Services\ToolService;
use Exception;
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
        'url' => 'required|url',
        'body' => '',
        'headers' => 'array'
    ];

    public function submitForm()
    {
        $this->validate();
        session()->flash('success', (new ToolService())->repeatRequest($this->url, $this->headers, $this->body));
        $this->reset(['url', 'headers', 'body']);
    }

    public function addData()
    {
        $this->headers[] = [
            'key' => '',
            'value' => ''
        ];
    }

    public function updatedBody()
    {
        try {
            $json = json_decode($this->body);
            $this->body = is_array($json) ? json_encode($json, JSON_PRETTY_PRINT) : $this->body;
        } catch (Exception $e) {
            // Nếu nội dung nhập vào không phải định dạng JSON, bỏ qua.
        }
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $success = session('success');
        return view('livewire.repeat-request-form', [
            'success' => $success,
        ]);
    }
}
