<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $usuarios = User::paginate();
        
        return view('home', compact('usuarios'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $usuario = new User();

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);

        $usuario->save();
        return redirect()->route('home');

    }

    public function edit(User $usuario)
    {
        return view('edit', compact('usuario'));
    }
    
    public function update(Request $request, User $usuario)
    {
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        //$usuario->password = $request->password;

        $usuario->save();
        return redirect()->route('home');

    }

    public function destroy($usuario)
    {
        $Eusuario = User::find($usuario);

        $Eusuario->delete();

        Session::flash('El usuario'. $Eusuario->name. 'ha sido borrado de forma exitosa');

        return redirect()->route('home');
    }
}
