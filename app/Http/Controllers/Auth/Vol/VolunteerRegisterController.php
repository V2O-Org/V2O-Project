<?php

namespace App\Http\Controllers\Auth\Vol;

use App\Http\Controllers\Controller;
use App\Volunteer;
use App\VolunteerProfile;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Symfony\Component\HttpFoundation\Request;

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
    protected $redirectTo = '/vol';

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
    public function register() {
        // Validate the data passed in.
        $data = request()->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'first_name' => ['required', 'string', 'max:191'],
            'last_name' => ['required', 'string', 'max:191'],
            'date_pf_birth' => [ 'required', 'date', ],
            'profile_img' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'street_address' => ['required', 'string', 'max:191'],
            'state' => ['required', 'string', 'max:191'],
            'city' => ['required', 'string', 'max:191'],
            'country' => ['required', 'string', 'max:191'],
        ]);

        // Handle profile image.
        $imagePath = null;

        // If image exists...
        if (Arr::exists($data, 'profile_img')) {
            $imagePath = $data['profile_img']->store('uploads/images/vol/profile/', 'public');
    
            $image = Image::make(public_path("storage/{$imagePath}"));
            $image->save();
        }

        // Add image path to data
        $data['profile_img'] = $imagePath;

        // Create the volunteer.
        $vol = $this->createVolunteer($data);

        // Create the volunteer
        $volProfile = $this->createVolunteerProfile($vol, $data);

        return redirect(route('vol.dashboard'));
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
