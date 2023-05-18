<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Http\Resposne;
use Illuminate\Support\Facades\Cache;
use App\Models\Click;
use App\Models\Client;
use App\Events\ClickEvent;
class ClickController extends Controller
{
    public function generateClick(Request $request, $click){
         if (!is_numeric($click))
            return Response()->json([
                'error' => 'Invalid Click number.'
            ], 400);

            $clients = Client::all();
            if ($clients->isEmpty()){
                return Response([
                    'error' => 'No clients were found.'
                ], 400);
            }   

            $lastAssignedClient = Cache::get('last_assigned_client', 0);

            $next_client =  $clients->filter(function($client) use ($lastAssignedClient) {
               return $client->id  > $lastAssignedClient;
            })->first();

            if (!$next_client){
                $next_client = $clients->first();
            }

            $new_click = new Click();
            $new_click->client_id = $next_client->id;
            $new_click->click_number =  $click;
            $new_click->save();

            //Send the email notification to the client for the click received
            event(new ClickEvent($new_click));

            Cache::put('last_assigned_client', $next_client->id);

            return Response([
              'success' => 'Click assigned successfully to client',
              'click_number' => $click,
              'client' => [
                'id' => $next_client->id,
                'name' => $next_client->name
              ]
            ], 200);         
    }
}
