<div>
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-white mb-4">Client Listing Page</h1>
        <a href="{{ route('clients.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md">Add Client</a>
    </div>
    <div class="py-3 relative rounded-md shadow-sm">
         <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
        <input type="text" class="form-input rounded-md shadow-sm mt-1 block w-full pl-10 pr-3 py-2 text-white placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-gray-800 rounded-md border border-gray-700" 
           wire:model="search"
            placeholder="Search clients..." />
    </div>

    <div wire:loading class="text-white">
        Loading clients...
    </div>

    @if ($message)
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
            class="fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-md shadow">
            {{ session('message') }}
        </div>
    @endif
    @if (count($clients) > 0)
    <table class="min-w-full divide-y divide-gray-200 text-white">
        <thead class="bg-gray-700">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Name
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Email
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Phone Number
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody class="bg-gray-800 divide-y divide-gray-600" wire:key="clients-listing">
            @foreach ($clients as $client)
                <tr wire:loading.remove>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $client->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $client->email }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $client->phone_no }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('clients.edit', $client) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="text-red-600 hover:text-red-900"
                           onclick="event.preventDefault(); if(confirm('Are you sure?')) { 
                               Livewire.emit('deleteClient', {{ $client->id }}); 
                           }">
                           <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

        <div class="mt-4">
            {{ $clients->links() }}
        </div>
    @else
      <p class="text-center">No Clients found...</p>
    @endif  
</div>
