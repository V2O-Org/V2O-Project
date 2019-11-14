<?php

namespace App\Http\Controllers\Auth\Vol;

use App\Http\Controllers\Controller;
use App\Volunteer;
use App\VolunteerProfile;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class VolunteerRegisterController extends Controller
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
    protected $redirectTo = '/vol/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:vol');
    }
    
    /**
     * Show the volunteer register form.
     * 
     */
    public function showRegistrationForm() {
        $vol = new Volunteer;
        $volProfile = new VolunteerProfile;

        return view('auth.vol-register')->with('volunteer', $vol)->with('vol_profile', $volProfile);
    }

    /**
     * Register the volunteer.
     * 
     */
    public function register(Request $request) {
        // Validate the data passed in.
        $data = $this->validator($request->all())->validate();
        
        // Handle profile image.
        $imagePath = null;

        // If image exists...
        if (Arr::exists($data, 'profile_img')) {
            $imagePath = $data['profile_img']->store('uploads/images/vol/profile/', 'public');
    
            $image = Image::make(public_path("storage/{$imagePath}"));
            $image->save();
        }

        // Add image path to data.
        $data['profile_img'] = $imagePath;

        // Create the volunteer record.
        $vol = $this->createVolunteer($data);

        // Create the volunteer profile record.
        $this->createVolunteerProfile($vol, $data);

        // Login the volunteer.
        if (Auth::guard('vol')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // If successful, then redirect to their intended location.
            return redirect()->route('vol.profile',Auth::id());
        }
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:volunteers'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'first_name' => ['required', 'string', 'max:191'],
            'last_name' => ['required', 'string', 'max:191'],
            'date_of_birth' => ['required', 'date',],
            'profile_img' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'street_address' => ['required', 'string', 'max:191'],
            'state' => ['required', 'string', 'max:191'],
            'city' => ['required', 'string', 'max:191'],
            'country' => ['required', 'string', 'max:191'],
        ]);
    }

    /**
     * Create the volunteer record in the database.
     */
    protected function createVolunteer(array $data) {
        return Volunteer::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Create the volunteer profile record in the database.
     */
    protected function createVolunteerProfile(Volunteer $vol, array $data) {
        return VolunteerProfile::create([
            'volunteer_id' => $vol->id,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'date_of_birth' => $data['date_of_birth'], 
            'profile_img' => $data['profile_img'],
            'street_address' => $data['street_address'],
            'state' => $data['state'],
            'city' => $data['city'],
            'country' => $data['country'],
        ]);
    }
}
