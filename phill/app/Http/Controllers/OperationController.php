<?php

namespace App\Http\Controllers;
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
}