<?php

namespace Melenquizz\Http\Controllers;

use Illuminate\Http\Request;
use Melenquizz\Http\Requests\AddUserRequest;
use Melenquizz\Http\Requests\EditUserRequest;
use Melenquizz\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AddUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddUserRequest $request)
    {
        $user = User::add(
            $request->get('name'),
            $request->get('email'),
            $request->get('password')
        );

        $user->save();

        return redirect()->route('users.index')->with('users.success', 'Administrateur ajouté !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditUserRequest $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, User $user)
    {
        $user->edit(
            $request->get('name'),
            $request->get('email'),
            $request->get('password')
        );
        $user->save();

        return redirect()->route('users.index')->with('users.success', 'Administrateur modifié !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('users.success', 'Administrateur supprimé !');
    }
}
