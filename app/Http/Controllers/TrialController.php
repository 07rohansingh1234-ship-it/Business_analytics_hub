<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class TrialController extends Controller
{
    //
    public function trial(Request $req,$id)
    {
      $user = User::find($id);
      $department = $user->department->name;
      return view('Trial',['dep'=>$department]);
    }
}
