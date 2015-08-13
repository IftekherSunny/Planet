<?php

namespace App\Controllers;

use Flash;
use Hash;
use Mail;
use Redirect;
use Request;
use Session;
use Validator;
use View;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * To show login form
     *
     * @return \Sun\View\View
     */
    public function getLogin()
    {
        return View::render('auth.login');
    }

    /**
     * To check user credentials
     *
     * @return \Sun\Http\Redirect
     */
    public function postLogin()
    {
        $validate = Validator::validate([
            'email' => [Request::input('email'), 'required'],
            'password' => [Request::input('password'), 'required']
        ]);

        if ($validate->fails()) {

            return Redirect::backWith('errors', $validate->errors()->all());
        }

        $user = User::whereEmail(Request::input('email'))->first();

        if (!$user) {
            Flash::error('The email address is not registered.');

            return Redirect::back();
        }

        if (!$user->active) {
            Flash::error('Please, confirm your email address.');

            return Redirect::back();
        }

        if (Hash::verify(Request::input('password'), $user->password)) {
            Session::create('login', true);
            Session::create('loginUserId', $user->id);

            Flash::overlay('Message', "Welcome back, {$user->name}");

            return Redirect::to('/home');
        }

        Flash::error('Email / Password do not match.');

        return Redirect::back();
    }

    /**
     * To show registration form
     *
     * @return \Sun\View\View
     */
    public function getRegister()
    {
        return View::render('auth.register');
    }

    /**
     * To register a user
     *
     * @return \Sun\Http\Redirect
     */
    public function postRegister()
    {
        $validate = Validator::validate([
            'name' => [Request::input('name'), 'required|min(3)|max(30)'],
            'email' => [Request::input('email'), 'required|email|max(60)|unique(email)'],
            'password' => [Request::input('password'), 'required|min(8)'],
            'password_confirmation| confirm password' => [Request::input('password_confirmation'), 'required|matches(password)']
        ]);

        if ($validate->fails()) {

            return Redirect::backWith('errors', $validate->errors()->all());
        }

        $user = new User;
        $user->name = Request::input('name');
        $user->email = Request::input('email');
        $user->password = Hash::make(Request::input('password'));
        $user->temp_password = '';
        $user->code = md5(rand());
        $user->active = 0;

        if ($user->save()) {
            $body = View::render('emails.registration', [
                'code' => $user->code,
                'name' => $user->name
            ]);

            Mail::send($user->email, $user->name, '[' . config('app.name') . '] Confirm your email address.', $body);

            Flash::success('Your confirmation email has been sent.');

            return Redirect::to('/auth/login');
        }

    }

    /**
     * To check email confirmation code
     *
     * @param $code
     *
     * @return \Sun\Http\Redirect
     */
    public function getEmailConfirm($code)
    {
        $user = User::whereCode($code)->first();

        if ($user) {
            $user->active = 1;
            $user->code = '';
            $user->save();
            $body = View::render('emails.registration', [
                'code' => $user->code,
                'name' => $user->name
            ]);

            Mail::send($user->email, $user->name, '[' . config('app.name') . '] Confirm your email address.', $body);

            Flash::success('Thank you for your registration.');
        } else {
            Flash::error('You use wrong email confirmation code.');
        }

        return Redirect::to('/auth/login');
    }

    /**
     * To show password reset form
     *
     * @return \Sun\View\View
     */
    public function getReset()
    {
        return View::render('auth.reset');
    }

    /**
     * To send reset password verification email
     *
     * @return \Sun\Http\Redirect
     */
    public function postReset()
    {
        $validate = Validator::validate([
            'email' => [Request::input('email'), 'required']
        ]);

        if ($validate->fails()) {
            return Redirect::backWith('errors', $validate->errors()->all());
        }

        $user = User::whereEmail(Request::input('email'))->first();

        if ($user) {
            $tempPassword = rand(111111, 999999);

            $user->temp_password = Hash::make($tempPassword);
            $user->code = md5(rand());
            $user->save();

            $body = View::render('emails.reset', [
                'password' => $tempPassword,
                'code' => $user->code,
                'name' => $user->name
            ]);

            Mail::send($user->email, $user->name, '[' . config('app.name') . '] Your new password.', $body);

            Flash::success('Your new password has been sent.');

            return Redirect::back();
        }

        Flash::error('Invalid email address.');

        return Redirect::back();
    }

    /**
     * To reset user password
     *
     * @param $code
     *
     * @return \Sun\Http\Redirect
     */
    public function getResetConfirm($code)
    {
        $user = User::whereCode($code)->first();

        if ($user) {
            $user->code = '';
            $user->password = $user->temp_password;
            $user->temp_password = '';
            $user->save();

            Flash::success('Your password has been reset successfully.');
        } else {
            Flash::error('You use wrong reset password confirmation code.');
        }

        return Redirect::to('/auth/login');
    }

    /**
     * To show change password form
     *
     * @return \Sun\View\View
     */
    public function getChangePassword()
    {
        return View::render('auth.changePassword');
    }

    /**
     * To change password
     *
     * @return \Sun\Http\Redirect
     */
    public function postChangePassword()
    {
        $validate = Validator::validate([
            'old_password| Old password' => [Request::input('old_password'), 'required|verify'],
            'new_password| New password' => [Request::input('new_password'), 'required|min(8)'],
            'new_password_confirmation| Confirm new password' => [Request::input('new_password_confirmation'), 'required|matches(new_password)']
        ]);

        if ($validate->fails()) {

            return Redirect::backWith('errors', $validate->errors()->all());
        }

        $user = User::find(Session::get('loginUserId'));

        $user->password = Hash::make(Request::input('new_password'));

        if ($user->save()) {
            Flash::overlay('Message', 'Your password has been updated successfully.');
        }

        return Redirect::to('/');
    }

    /**
     * To logout a user
     *
     * @return \Sun\Http\Redirect
     */
    public function getLogout()
    {
        Session::destroy();

        return Redirect::to('/');
    }
}
