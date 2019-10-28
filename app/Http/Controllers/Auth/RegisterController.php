<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Organisation;
use App\Volunteer;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Request;

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

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the volunteer register form.
     * 
     */
    public function showVolunteerRegisterForm() {
        $user = new User;
        $volunteer = new Volunteer;

        return view('auth.vol-register')->with('user', $user)->with('volunteer', $volunteer);
    }

    /**
     * Register the volunteer.
     * 
     */
    public function registerVolunteer() {
        // Validate all data passed in
        $data = request()->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'first_name' => ['required', 'string', 'max:191'],
            'last_name' => ['required', 'string', 'max:191'],
            'profile_img' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'date_of_birth' => ['required', 'date'],
            'street_address' => ['required', 'string', 'max:191'],
            'state' => ['required', 'string', 'max:191'],
            'city' => ['required', 'string', 'max:191'],
            'country' => ['required', 'string', 'max:191'],
        ]);

        // Handle profile image
        $imagePath = null;

        // If image exists, 
        if ($data['profile_img'] == 1) {
            $imagePath = $data['profile_img']->store('uploads/images/activity', 'public');
    
            $image = Image::make(public_path("storage/{$imagePath}"));
            $image->save();
        }

        // Create the user 
        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Create the volunteer
        Volunteer::create([
            'user_id' => $user->id,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'profile_img' => $imagePath,
            'date_of_birth' => $data['date_of_birth'],
            'street_address' => $data['street_address'],
            'state' => $data['state'],
            'city' => $data['city'],
            'country' => $data['country'],
        ]);

        return redirect(url('/'));
    }
    
    /**
     * Show the organisation register form.
     * 
     */
    public function showOrganisationRegisterForm() {
        $user = new User;
        $organisation = new Organisation;

        return view('auth.org-register')->with('user', $user)->with('organisation', $organisation);
    }

    /**
     * Register the organisation.
     * 
     */
    public function registerOrganisation() {
        // Validate all data passed in
        $data = request()->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'name' => ['required', 'string', 'max:191'],
            'profile_img' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'street_address' => ['required', 'string', 'max:191'],
            'state' => ['required', 'string', 'max:191'],
            'city' => ['required', 'string', 'max:191'],
            'country' => ['required', 'string', 'max:191'],
            'org_url' => ['required', 'string', 'max:191'],
            'fax' => ['required', 'string', 'max:191'],
            'mailing_address' => ['required', 'string', 'max:191' ],
        ]);

        // Handle profile image
        $imagePath = null;

        // If image exists, 
        if ($data['profile_img'] == 1) {
            $imagePath = $data['profile_img']->store('uploads/images/activity', 'public');
    
            $image = Image::make(public_path("storage/{$imagePath}"));
            $image->save();
        }

        // Create the user 
        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'ORGANISATION',
        ]);

        // Create the organisation
        Organisation::create([
            'user_id' => $user->id,
            'name' => $data['name'],
            'profile_img' => $imagePath,
            'street_address' => $data['street_address'],
            'state' => $data['state'],
            'city' => $data['city'],
            'country' => $data['country'],
            'org_url' => $data['org_url'],
            'fax' => $data['fax'],
            'mailing_address' => data['mailing_address'],
        ]);

        return redirect(url('/'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
