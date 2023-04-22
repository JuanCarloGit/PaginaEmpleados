<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use PDF;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = request('busqueda') ? Employee::where('description', 'like', '%' . request('busqueda') . '%')->paginate(10) : Employee::paginate(10);
        return view('empleados.index', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = Employee::all();
        return view('empleados.create', compact('employee'));
    }

    public function imprimir()
    {
        $employee = Employee::all();
        $pdf = PDF::loadView('empleados.pdf', compact('employee'));
        return $pdf->stream();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'cedula' => 'required|unique:employees',
            'nombre' => 'required',
            'correo' => 'required',
            'cargo' => 'required',
            'ciudad' => 'required',
            'salario' => 'required',
        ],
        [
            'cedula.required' => 'La cédula es obligatoria',
            'cedula.unique' => 'La cédula ya existe',
            'nombre.required' => 'El nombre es obligatorio',
            'correo.required' => 'El correo es obligatorio',
            'cargo.required' => 'El cargo es obligatorio',
            'ciudad.required' => 'La ciudad es obligatoria',
            'salario.required' => 'El salario es obligatorio',
        ]);

        $employee = new Employee();
        $employee->cedula = $request->cedula;
        $employee->nombre = $request->nombre;
        $employee->correo = $request->correo;
        $employee->cargo = $request->cargo;
        $employee->ciudad = $request->ciudad;
        $employee->salario = $request->salario;
        $employee->save();

        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $employee = Employee::find($employee->id);
        return view('empleados.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request -> validate([
            'cedula' => 'required',
            'nombre' => 'required',
            'correo' => 'required',
            'cargo' => 'required',
            'ciudad' => 'required',
            'salario' => 'required',
        ],
        [
            'cedula.required' => 'La cédula es obligatoria',
            'cedula.unique' => 'La cédula ya existe',
            'nombre.required' => 'El nombre es obligatorio',
            'correo.required' => 'El correo es obligatorio',
            'cargo.required' => 'El cargo es obligatorio',
            'ciudad.required' => 'La ciudad es obligatoria',
            'salario.required' => 'El salario es obligatorio',
        ]);

        $employee = Employee::find($employee->id);
        $employee->cedula = $request->cedula;
        $employee->nombre = $request->nombre;
        $employee->correo = $request->correo;
        $employee->cargo = $request->cargo;
        $employee->ciudad = $request->ciudad;
        $employee->salario = $request->salario;
        $employee->save();

        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index');
    }
}
