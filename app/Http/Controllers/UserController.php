<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAllUsers();
        return view('pages.users.index', compact('users'));
    }
    public function create()
    {
        $data = $this->userService->getCreatePageData();
        // dd($data);
        return view('pages.users.create',$data);
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'username' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role_id' => 'required',
        ]);

        // dd($data);

        $this->userService->createUser($data);
        return redirect()->route('users.index');
    }
    public function edit($id)
    {
        $user = $this->userService->getUserById($id);
        $data = $this->userService->getCreatePageData();
        return view('pages.users.edit', compact('user'),$data);
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'username' => 'required',
            'contact' => 'required',
            'email' => 'required|email',
            'role_id' => 'required',
            'password' => 'sometimes|nullable|min:8',
        ]);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $this->userService->updateUser($id, $data);
        return redirect()->route('users.index');
            
    }
}
