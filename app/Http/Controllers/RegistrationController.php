<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
  public function index()
  {
    return view('registration.index');
  }

  public function show(){
    return view('registration.show');
  }

  public function create(){
    return view('registration.create');
  }

  public function edit(){
    return view('registration.edit');
  }

  public function store(Request $request){

  }

  public function update(Request $request){

  }

  public function destroy(Request $request){

  }
}
