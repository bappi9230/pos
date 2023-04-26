<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        if  ($request->file('photo'))
        {
            $image = $request->file('photo');
            $image_rename = hexdec(uniqid('', false)) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(150, 150)->save('upload/admin_image/' . $image_rename);
            $image_save = 'upload/admin_image/' . $image_rename;
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'photo' => $image_save,
                'password' => Hash::make($request->password),
            ]);

            $notification = array(
                'message'   => 'Register Successfully',
                'alert-type'=> 'success',
            );

            event(new Registered($user));

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME)->with($notification);
        }
        else
        {
            $image ='upload/no_image.jpg';
            $image_rename = hexdec(uniqid('', false));
            Image::make($image)->resize(150, 150)->save('upload/admin_image/' . $image_rename);
            $image_save = 'upload/admin_image/' . $image_rename;
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'photo' => $image_save,
                'password' => Hash::make($request->password),
            ]);
            $notification = array(
                'message'   => 'Register without image Successfully',
                'alert-type'=> 'success',
            );

            event(new Registered($user));

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME)->with($notification);
        }
    }
}

