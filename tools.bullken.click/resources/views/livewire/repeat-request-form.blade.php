<div class="p-6">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-lg font-bold mb-4">Repeat one request for n loop at the same time...</h1>
        <form wire:submit.prevent="submitForm">
            <div class="p-4">
                <label class="block text-gray-700 font-bold mb-2" for="url">
                    Url
                </label>
                <input type="text" placeholder="https://..." wire:model="url"
                       class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('url') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div class="p-4">
                <label class="block text-gray-700 font-bold mb-2" for="headers">
                    Headers
                </label>
                @if($headers)
                    @foreach ($headers as $index => $item)
                        <div class="grid grid-cols-2 gap-2 items-center mb-4">
                            <div class="relative z-0 w-full mb-6 group">
                                <label class="block text-gray-700 text-sm" for="key{{ $index }}">Key:</label>
                                <input
                                    class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="key{{ $index }}" type="text" wire:model="headers.{{ $index }}.key"/>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label class="block text-gray-700 text-sm" for="value{{ $index }}">Value:</label>
                                <input
                                    class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="value{{ $index }}" type="text" wire:model="headers.{{ $index }}.value"/>
                            </div>
                        </div>
                    @endforeach
                @endif
                <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                        wire:click="addData()">Add
                </button>
                @error('headers') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div class="p-4">
                <label class="block text-gray-700 font-bold mb-2" for="body">
                    Body raw
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
            </div>
            @if ($success)
                <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                     role="alert">
                    <span class="block sm:inline">{{$success}}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3"></span>
                </div>
            @endif
        </form>
    </div>
</div>
