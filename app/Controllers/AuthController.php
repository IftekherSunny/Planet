<?php

namespace App\Controllers;

use Flash;
use View;
use Hash;
use Mail;
use Request;
use Session;
use Redirect;
use Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function getLogin()
    {
        return View::render('auth.login');
    }

    public function postLogin()
    {
        $user = User::whereEmail(Request::input('email'))->first();

        if(! $user) {
            Flash::error('The email address is not registered.');

            Redirect::back();
        }

        if(! $user->active) {
            Flash::error('Please, confirm your email address.');

            Redirect::back();
        }

        if(Hash::verify(Request::input('password'), $user->password)) {
            Session::create('login', true);
            Redirect::to('/home');
        }

        Flash::error('Email / Password do not match.');

        Redirect::back();
    }

    public function getRegister()
    {
        return View::render('auth.register');
    }

    public function postRegister()
    {
        $validate = Validator::validate([
            'name'              =>  [Request::input('name'), 'required|min(3)|max(30)'],
            'email'             =>  [Request::input('email'), 'required|email|max(60)'],
            'password'          => [Request::input('password'), 'required|min(8)'],
            'password_confirmation| confirm password'
                                => [Request::input('password_confirmation'), 'required|matches(password)']
        ]);

        if($validate->fails()) {
            Redirect::backWith('errors', $validate->errors()->all());
        }

        $user = new User;
        $user->name = Request::input('name');
        $user->email = Request::input('email');
        $user->password = Hash::make(Request::input('password'));
        $user->temp_password = '';
        $user->code = md5(rand());
        $user->active = 0;

        if($user->save()) {
            $body = View::render('emails.registration', [
                                'code'  => $user->code,
                                'name'  => $user->name
                            ]);

            Mail::send($user->email, $user->name, '[My Awesome App] Confirm your email address.', $body);
        }

        Flash::success('Your confirmation email has been sent.');

        Redirect::to('/auth/login');
    }

    public function getEamilConfrim($code)
    {
        $user = User::whereCode($code)->first();

        if($user) {
            $user->active = 1;
            $user->code = '';
            $user->save();
            $body = View::render('emails.registration', [
                'code'  => $user->code,
                'name'  => $user->name
            ]);

            Mail::send($user->email, $user->name, '[My Awesome App] Confirm your email address.', $body);

            Flash::success('Thank you for your registration.');
        } else {
            Flash::error('You use wrong email confirmation code.');
        }

        Redirect::to('/auth/login');
    }

    public function getReset()
    {
        return View::render('auth.reset');
    }

    public function postReset()
    {
        $validate = Validator::validate([
            'email'             =>  [Request::input('email'), 'required']
        ]);

        if($validate->fails()) {
            Redirect::backWith('errors', $validate->errors()->all());
        }

        $user = User::whereEmail(Request::input('email'))->first();

        if ($user) {
            $tempPassword = rand();

            $user->temp_password = Hash::make($tempPassword);
            $user->code = md5(rand());
            $user->save();

            $body = View::render('emails.reset', [
                'password'  => $tempPassword,
                'code'      => $user->code,
                'name'      => $user->name
            ]);

            Mail::send($user->email, $user->name, '[My Awesome App] Your new password.', $body);

            Flash::success('Your new password has been sent.');

            Redirect::back();
        }

        Flash::error('Invalid email address.');

        Redirect::back();
    }

    public function getResetConfirm($code)
    {
        $user = User::whereCode($code)->first();

        if($user) {
            $user->code = '';
            $user->password = $user->temp_password;
            $user->temp_password = '';
            $user->save();

            Flash::success('Your password has been reset successfully.');
        } else {
            Flash::error('You use wrong reset password confirmation code.');
        }

        Redirect::to('/auth/login');
    }

    public function getLogout()
    {
        Session::delete('login');

        Redirect::to('/');
    }
}