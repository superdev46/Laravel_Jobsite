<?php

namespace App\Http\Controllers\Charity\Auth;

use Auth;
use App\Charity;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Jrean\UserVerification\Traits\VerifiesUsers;
use Jrean\UserVerification\Facades\UserVerification;
use App\Http\Requests\Front\CompanyFrontRegisterFormRequest;
use Illuminate\Auth\Events\Registered;
use App\Events\CompanyRegistered;

class RegisterController extends Controller
{
    /*
      |--------------------------------------------------------------------------
      | Register Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users as well as their
      | validation and creation. By default this controller uses a trait to
      | provide this functionality without requiring any additional code.
      |
     */

use RegistersUsers;
use VerifiesUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/charity-home';
	protected $userTable = 'charities';
	protected $redirectIfVerified = '/charity-home';
	protected $redirectAfterVerification = '/charity-home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('charity.guest', ['except' => ['getVerification','getVerificationError']]);
    }


    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('charity');
    }
	
	public function register(CompanyFrontRegisterFormRequest $request)
    {
        $charity = new Charity();
		$charity->email = $request->input('email');
        $charity->password = bcrypt($request->input('password'));
        $charity->is_active = 0;
        $charity->verified = 0;
        $charity->save();		
		/***********************/
		$charity->slug = str_slug($charity->name, '-').'-'.$charity->id;
		$charity->update();
		/***********************/
		
        // event(new Registered($charity));
		// event(new CompanyRegistered($charity));
        $this->guard()->login($charity);
        // UserVerification::generate($charity);
        // UserVerification::send($charity, 'Company Verification', config('mail.recieve_to.address'), config('mail.recieve_to.name'));
        return $this->registered($request, $charity) ?: redirect($this->redirectPath());
    }

}
