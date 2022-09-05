<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    } // end method

    // profile
    public function profile(){
      $id = Auth::user()->id;
      $adminData = User::find($id);

      return view('admin.admin_profile_view', compact('adminData'));
    }

    //edit
    public function editProfile(){
      $id = Auth::user()->id;
      $editData = User::find($id);

      return view('admin.admin_profile_edit', compact('editData'));
    }
}