<?php

namespace App\Http\Controllers;
use App\Http\Requests\OperationRequest;
use Illuminate\Http\Request;
use App\Models\Operation;

class OperationController extends Controller
{
    public function index()
    {
        $operations = Operation::all();
        return view('operation.index', [
            'operations' => $operations,
        ]);
    }

    public function create()
    {
        return view('operation.create');
    }

    public function store(OperationRequest $request)
    {
        Operation::create([
            'name' => strtoupper($request->name),
        ]);

        return to_route('operation.index');
    }
}