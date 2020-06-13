<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\User;
use App\Client;
use App\Order;

class TownController extends Controller
{ 
    

         
    public function show($id)
    {
        $items = Order::where('town_id', $id)->get();

        return view('admin.towns.show', compact('items','town_id'));
    }


}
