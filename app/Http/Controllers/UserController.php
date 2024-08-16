<?php

namespace App\Http\Controllers;

use App\Interfaces\UserInterface;
use App\Mail\passwordMail;
use App\Models\User;
use DB;
use Hash;
use Illuminate\Http\Request;
use Mail;

class UserController extends Controller
{

    private UserInterface $userInterface;

    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->userInterface->index();

        return view('admin.user.list', [
            'page' => 'Listes des utilisateurs',
            'users' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $data = [
            'name' => $request->fullname,
            'email' => $request->email,
        ];

        $user = User::where('email', $request->email)->first();

        if (!$user) {

            $randomPassword = rand(121111, 989898);

            $data['password'] = $randomPassword;

            DB::beginTransaction();

            try {

                $this->userInterface->create($data);

                DB::commit();

                Mail::to($request->email)->send(new passwordMail($request->fullname, $randomPassword));

                return redirect()->route('userList');
            } catch (\Throwable $th) {
                return back()->with('error', 'Une erreur de type inconnu est survenue !');;
            }
        }else {
            return back()->with('error', 'L\'utilisateur existe déjà !');
        }
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
        $user = $this->userInterface->show($id);
        return view('admin.user.editUser', [
            'page' => 'Utilisateurs',
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            "name" => $request->fullname,
        ];

        DB::beginTransaction();

        try {
            $this->userInterface->update($data, $id);
            DB::commit();

            return redirect()->route('userList');
        } catch (\Throwable $th) {
            return back()->with('error', 'Mis à jour impossible.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->userInterface->delete($id);
        return "Effectué";
    }
}
