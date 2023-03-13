<div class="p-6">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-lg font-bold mb-4">Repeat one request for n loop at the same time...</h1>
        <form wire:submit.prevent="submitForm">
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="title">
                    Title
                </label>
                <input type="text" wire:model="title"
                       class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('title') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="body">
                    Body
                </label>
                <textarea wire:model="body"
                          class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                @error('body') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div class="flex items-center justify-end">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Create
                </button>
                @if ($success)
                    <div class="alert alert-success">
                        {{ $success }}
                    </div>
                @endif
            </div>
        </form>
    </div>
</div>
