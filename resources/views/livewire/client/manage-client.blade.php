<form wire:submit.prevent="saveClient" class="space-y-4 text-white">
    <div>
        <input wire:model.lazy="name" type="text" id="name" class="form-input w-full border rounded-md px-4 py-2 bg-gray-700" placeholder="Name" />
        @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>

    <div>
        <input wire:model.lazy="email" type="email" id="email" class="form-input w-full border rounded-md px-4 py-2 bg-gray-700" placeholder="Email" />
        @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>

    <div>
        <input wire:model.lazy="phone_no" type="text" id="phone_no" class="form-input w-full border rounded-md px-4 py-2 bg-gray-700" placeholder="Phone Number" />
        @error('phone_no') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>

    @if (session()->has('error'))
        <div class="text-red-500">{{ session('error') }}</div>
    @endif

    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md" wire:loading.attr="disabled">
        <span wire:loading wire:target="saveClient">Loading...</span>
        <span wire:loading.remove>
            @if ($clientId)
               Update Client
            @else
               Add Client
            @endif
        </span>
    </button>
</form>
