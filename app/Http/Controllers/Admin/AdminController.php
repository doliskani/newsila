<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Crawler;
use App\Setting;
use App\User;
use function Faker\Provider\pt_BR\check_digit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboard()
    {
//        User::create([
//           'name' => 'majid nazari',
//           'email' => 'majid.nazari.d@gmail.com',
//           'password' => Hash::make('123456'),
//        ]);

        return view('Admin.dashboard.index');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile()
    {
        $user = auth()->user();
        return view('Admin.dashboard.profile', compact('user'));
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function securityEdit($user)
    {

        return view('Admin.dashboard.security', compact('user'));
    }


    public function securityUpdate(Request $request, User $user)
    {
        $this->validate($request, [
            'new'     => 'required|min:5',
            'confirm' => 'required||min:5',
        ]);

        if (!Hash::check($request->old, $user->password)) {
            alert()->error('The password entered is incorrect', 'Wrong password')->persistent('OK');
            return redirect()->back();
        }

        if ($request->new != $request->confirm) {
            alert()->error('passwords not match', 'Failed')->persistent('OK');
            return redirect()->back();
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        alert()->success('The password was successfully updated', 'Successful')->persistent('OK');
        return redirect()->back();
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function settingsEdit()
    {

        $setting = Setting::first();
        return view('Admin.dashboard.settings', compact('setting'));
    }


    public function settingsUpdate(Request $request)
    {
        $this->validate($request, [
            'title_seo'       => 'required',
            'description_seo' => 'required|',

        ]);
        $setting = Setting::first();


        $setting->update([
            'index_title_seo'       => $request->title_seo,
            'index_description_seo' => $request->description_seo,
            'index_keyword_seo'     => $request->keyword_seo,
        ]);

        alert()->success('The settings was successfully updated', 'Successful')->persistent('OK');
        return redirect()->back();
    }


}
