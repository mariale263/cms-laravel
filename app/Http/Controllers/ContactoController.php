<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contacto;

class ContactoController extends Controller
{
    public function create()
    {
        return view('contacto.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'message' => 'required|max:5000',
            
        ]);
        $contact = Contacto::create($validatedData);

        $request->session()->flash('message', 'Registro guardado con exito');

        return redirect('/contactos/create');
    }

    public function index()
    {
        $contact = Contacto::all();

        return view('contacto.index', compact('contact'));
    }

    public function edit($id)
    {
        $contact = Contacto::findOrFail($id);

        return view('contacto.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'message' => 'required|max:5000',
        ]);
        Contacto::whereId($id)->update($validatedData);

        $request->session()->flash('message', 'Registro actualizado con exito');

        return redirect('/contactos');
    }

    public function destroy(Request $request, $id)
    {
        $contact = Contacto::findOrFail($id);
        $contact->delete();

        $request->session()->flash('message', 'Registro eliminado con exito');
        return redirect('/contactos');
    }

}


