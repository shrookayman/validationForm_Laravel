<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\userdata;
use Illuminate\Http\Request;
use App\Mail\NewUserMail;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    function insert(Request $request)
    {
        session_start();
        $username = $request->input('username');
        //Check if the user already exists
        $existingUser = userdata::where('username', $username)->first();
        if ($existingUser) {
            $lang = app()->getLocale();
            $route = '/' . $lang;
            return redirect( $route ) -> with ('error', 'User already exists!');
        }
        $fullname = $request->input('fullname');
        $birthdate = $request->input('birthdate');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $password = $request->input('password');
        $email = $request->input('email');
        // Handle image upload
        if ($request->hasFile('imageName')) {
            $imageName = $request->file('imageName')->getClientOriginalName();
            $request->file('imageName')->storeAs('images', $imageName, 'public');
        } else {
            $imageName = null; // Or provide a default image name if needed
        }

        $isInsertSuccess = userdata::insert([
            'fullname' => $fullname,
            'username' => $username,
            'birthdate' => $birthdate,
            'phone' => $phone,
            'address' => $address,
            'password' => $password,
            'imageName' => $imageName,
            'email' => $email
        ]);

        if ($isInsertSuccess) {
            Mail::to('20200380@stud.fci-cu.edu.eg')->send(new NewUserMail($username));
            $lang = app()->getLocale();
            $route = '/' . $lang;
            return redirect( $route ) -> with('success', 'Registration successful!');
        }
    }
}
