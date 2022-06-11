<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Product,User,Transaction,TrxDetail};

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard.user.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
