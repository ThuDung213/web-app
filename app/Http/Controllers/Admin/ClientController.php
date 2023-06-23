<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\Client\ClientServiceInterface;
use App\Service\User\UserServiceInterface;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    private $clientService;
    private $userService;

    public function __construct(ClientServiceInterface $clientService, UserServiceInterface $userService)
    {
        $this->clientService = $clientService;
        $this->userService = $userService;
    }
    public function index()
    {
        $clients = $this->clientService->all();
        return view('admin.client.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.client.add');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        //Add Client data to user table
        $clientData = [
            'name' => $data['client_name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'role' => 0,
        ];
        $clientUser = $this->userService->create($clientData);
        //Get the user id of the client user
        $clientId = $clientUser->id;
        // Remove the password from the client data
        unset($data['password']);
        //Add the user ID tp the client data
        $data['user_id'] = $clientId;

        $client = $this->clientService->create($data);
        return redirect()->route('admin.client.index');
    }

    public function edit($id)
    {
        $client = $this->clientService->find($id);
        return view('admin.client.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->clientService->update($id, $data);
        return redirect()->route('admin.client.index');
    }

    public function destroy($id)
    {
        $this->clientService->delete($id);
        return redirect()->route('admin.client.index');
    }
}
