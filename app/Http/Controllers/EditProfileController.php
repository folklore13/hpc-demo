<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;

class EditProfileController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if (!Gate::allows('edit-profile')) {
            abort(403);
        }

        $data = Validator::make($request->all(), [
            'name' => 'string',
            'email' => 'email',
            'password' => 'string|min:8'
        ]);

        User::findOrFail(auth()->user()->id)->update([
            'name' => $data->validated()['name'],
            'email' => $data->validated()['email'],
            'password' => Hash::make($data->validated()['password']),
        ]);

        if ($data->fails()) {
            Alert::error($data->errors()->first());
            return redirect()->to('/');
        }

        Alert::success('Profile Successfully Updated!', 'Your profile is now updated');

        return redirect()->to('/');
    }
}
