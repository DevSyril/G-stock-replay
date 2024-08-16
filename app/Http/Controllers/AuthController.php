<?php

namespace App\Http\Controllers;

use App\Interfaces\UserInterface;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private UserInterface $userInterface;

    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function authenticate(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        try {

            if ($this->userInterface->login($data)) {

                $admin = User::where('role', "admin")->first();
                
                if ($admin->email == $request->email) {

                    return redirect()->route('userList');
                }

            return redirect()->route('userDashboard');

            } else {
                return back()->with('error', 'Email ou mot de passe incorrect(s).');
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Une erreur est survenue lors du traitement, Réessayez !');
        }
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
