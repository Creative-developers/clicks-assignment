<?php

namespace App\Http\Livewire\Client;
use Livewire\Component;

use App\Events\ClientWelcome;
use App\Models\Client;

class ManageClient extends Component
{
    public $clientId; 
    public $name;
    public $email;
    public $phone_no;

   


    public function mount($clientId = null)
    {
        if ($clientId) {
            $client = Client::find($clientId);
            if ($client) {
                $this->clientId = $clientId;
                $this->name = $client->name;
                $this->email = $client->email;
                $this->phone_no = $client->phone_no;
            }
        }
    }

    public function saveClient() {
        try {
            $rules = [
                'name' => 'required',
                'email' => 'required|email|unique:clients,email',
                'phone_no' => 'required',
            ];
    
            // Check if it's an edit operation
            if ($this->clientId) {
                $rules['email'] .= ',' . $this->clientId;
            }
    
            $this->validate($rules, [
                'email.unique' => 'The email has already been taken.',
            ]);
    
            if ($this->clientId) {
                $client = Client::find($this->clientId);
                if ($client) {
                    $client->update([
                        'name' => $this->name,
                        'email' => $this->email,
                        'phone_no' => $this->phone_no,
                    ]);
                }
            } else {
                Client::create([
                    'name' => $this->name,
                    'email' => $this->email,
                    'phone_no' => $this->phone_no,
                ]);
            }
    
            session()->flash('message', 'Client ' . ($this->clientId ? 'updated' : 'added') . ' successfully.');
    
            return redirect()->route('clients');
        } catch (\Illuminate\Validation\ValidationException $e){
             throw $e;
        }  catch (\Exception $e) {
            session()->flash('error', 'An error occurred while saving the client: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.client.manage-client');
    }
}
