<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientStoreRequest;
use App\Http\Requests\ClientUpdateRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('crm.clients.index',['clients' => Client::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crm.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientStoreRequest $request)
    {
        $clients = $request->validated();
        Client::create($clients);
        return to_route('crm.clients.index')->with('success', 'Client Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('crm.clients.show',['client' => $client]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('crm.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientUpdateRequest $request, Client $client)
    {
        $clients = $request->validated();
        $client->update($clients);
        return to_route('crm.clients.index')->with('success', 'Client Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return to_route('crm.clients.index')->with('success', 'Client Deleted Successfully!');
    }
}
