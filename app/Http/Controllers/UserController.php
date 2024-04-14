<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::all();
        return view('admin.users.index'); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]
        );
        return redirect(route('admin.users.index'))->with('message', ['success' => 'Usuario añadido']);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

        $posts = $user->posts; // Cargar los posts del usuario
        return view('admin.users.show', compact('user', 'posts'));
        // return view('admin.users.show', compact('user','posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // dd($user);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
       // dd($request->all());
       $userData = [
        'name' => $request->input('name', $user->name),
        'email' => $request->input('email', $user->email),
    ];

    if ($request->filled('password')) {
        $request->validate([
            'password' => 'required|min:7|max:12',
        ]);

        $userData['password'] = bcrypt($request->password);
    }

    $user->update($userData);

    return redirect()->route('admin.users.index', $user->id)->with('message', ['success' => 'Actualizado correctamente.']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Eliminar todos los posts asociados al usuario
        $user->posts()->delete();

        // Eliminar el usuario
        $user->delete();

        return redirect(route('admin.users.index'))->with('message', ['success' => 'Usuario y sus posts eliminados correctamente.']);


    }
    
}
