<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\User;
use Auth, Hash;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        $user = User::find(Auth::user()->id);
        return view('profile.edit', compact('user'));
    }

    public function password(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->route('profile.edit')
                        ->with('success','Password berhasil diperbarui');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        User::whereId(auth()->user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('profile.edit')
                        ->with('success','Profil berhasil diperbarui');
    }

    public function update_account(Request $request)
    {
        $this->validate($request, [
            'password' => 'same:confirm-password'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find(Auth::user()->id);
        $user->update($input);
    
        return redirect()->route('user_profil')
                        ->with('success','Akun berhasil diperbarui');
    }
}
