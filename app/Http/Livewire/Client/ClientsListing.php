<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Client;



class ClientsListing extends Component
{
    use WithPagination;
    public $search = '';
    public $message;

    protected $listeners = ['deleteClient'];

    public function render()
    {
        $clients = Client::where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%')
                        ->orWhere('phone_no', 'like', '%' . $this->search . '%')
                        ->orderBy('created_at', 'desc') 
                        ->paginate(10);
        $this->message = session('message');

        return view('livewire.client.clients-listing', [
            'clients' => $clients,
            'message' => $this->message
        ]);
    }
     
    public function deleteClient($clientId)
    {
        $client = Client::find($clientId);
        if ($client) {
            $client->delete();
            session()->flash('message', 'Client deleted successfully.');
        }
    }

    
}
