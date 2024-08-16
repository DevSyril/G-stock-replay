<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class ViewController extends Controller
{

    public function userDashboard() {

        // if (Auth::check()) {
        //     return redirect()->route('userList');
        // }

        return view('users.dashboard');
    }

    public function createUser() {

        return view('admin.user.createUser');
    }

    public function authentication() {

        return view('login');
    }

    public function logout()
    {

        Auth::logout();
        return redirect('/');

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
