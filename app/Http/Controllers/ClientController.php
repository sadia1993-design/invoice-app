<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientDatas = Client::all();
        return view('clients.index', compact('clientDatas'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
              'name'=> 'required|max:255|string',
              'username'=> 'required|max:255|string|unique:clients',
            ]);

        try {
            $clients = new Client;
            $clients->name = $request->input('name');
            $clients->username = $request->input('username');
            $clients->email = $request->input('email');
            $clients->phone = $request->input('phone');
            $clients->country = $request->input('country');
            $clients->status = $request->input('status');
            if($request->hasFile('picture')){
                $file = $request->file('picture');
                $extension = $file->getClientOriginalExtension();
                $fileName = time().'.'.$extension;
                $file->move('uploads/clients/', $fileName);
                $clients->picture = $fileName;
            }
            $clients->save();

            return response()->json([
               'status' => 201,
               'message' => 'Client Added successfully'
            ]);

        }catch(\Exception $e){
            return  $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
