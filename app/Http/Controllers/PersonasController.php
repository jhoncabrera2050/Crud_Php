<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use Illuminate\Http\Request;

class PersonasController extends Controller
{

    public function index()
    {
        // pagina de inicio de nuestro crud
        $datos = Personas::all();
        return view('Welcome', compact('datos'));
    }

    public function create()
    {
        // formulario donde nosotros agregamos datos
        return view('add');
    }

    public function store(Request $request)
    {
        // para almacenar los ddatos en la bd
        //valida los datos del formulario
        $request->validate([
            'paterno' => 'required',
            'materno' => 'required',
            'nombre' => 'required',
            'fecha_de_nacimiento' => 'required|date'
        ]);

        $persona = new Personas();
        $persona->paterno = $request->input('paterno');
        $persona->materno = $request->input('materno');
        $persona->nombre = $request->input('nombre');
        $persona->fecha_de_nacimiento = $request->input('fecha_de_nacimiento');

        $persona->save();

        return redirect()->route('persona.index');
    }

    public function show(Personas $personas)
    {
        // para obtener registro de nuestra tabla
    }

    public function edit($id)
    {
        // Busca la persona por su ID
        $persona = Personas::find($id);
    
        // Verifica si la persona existe
        if (!$persona) {
            return redirect()->route('persona.index')->with('error', 'La persona no existe');
        }
    
        // Muestra el formulario de edición
        return view('update', compact('persona'));
    }

    public function update(Request $request, $id)
    {
        // Busca la persona por su ID
        $persona = Personas::find($id);

        // Verifica si la persona existe
        if (!$persona) {
            return redirect()->route('persona.index')->with('error', 'La persona no existe');
        }

        // Valida los datos del formulario de actualización
        $request->validate([
            'paterno' => 'required',
            'materno' => 'required',
            'nombre' => 'required',
            'fecha_de_nacimiento' => 'required|date'
        ]);

        // Actualiza los datos de la persona
        $persona->paterno = $request->input('paterno');
        $persona->materno = $request->input('materno');
        $persona->nombre = $request->input('nombre');
        $persona->fecha_de_nacimiento = $request->input('fecha_de_nacimiento');

        $persona->save();

        // Redirige de vuelta a la lista de personas o a donde desees después de actualizar
        return redirect()->route('persona.index')->with('success', 'Persona actualizada correctamente');
    }

    public function destroy($id)
    {
        // Busca la persona por su ID
        $persona = Personas::find($id);
    
        // Verifica si la persona existe
        if (!$persona) {
            return redirect()->route('persona.index')->with('error', 'La persona no existe');
        }
    
        // Elimina la persona
        $persona->delete();
    
        // Redirige de vuelta a la lista de personas o a donde desees después de eliminar
        return redirect()->route('persona.index')->with('success', 'Persona eliminada correctamente');
    }
    
}
