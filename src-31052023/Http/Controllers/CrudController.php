<?php

namespace Vip\Crud\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Vip\Crud\Models\Record;

class CrudController extends Controller
{
    public function index()
    {
        $records = Record::all();

        return view('crud::index')->with(compact('records'));
    }

    public function create()
    {
        return view('crud::create');
    }

    public function store(Request $request)
    {
        $input = $request->only('name', 'email');
        Record::create($input);
        return redirect()->route('index');
    }
}
