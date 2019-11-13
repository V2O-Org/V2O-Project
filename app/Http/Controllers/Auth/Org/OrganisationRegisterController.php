<?php

namespace App\Http\Controllers\Auth\Org;

use App\Http\Controllers\Controller;
use App\Organisation;
use App\OrganisationProfile;
use App\OrganisationPhoneNumber;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class OrganisationRegisterController extends Controller
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
    protected $redirectTo = '/org/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:org');
    }
    
    /**
     * Show the organisation register form.
     * 
     */
    public function showRegistrationForm() {
        $org = new Organisation;
        $orgProfile = new OrganisationProfile;

        return view('auth.org-register')->with('organisation', $org)->with('org_profile', $orgProfile);
    }

    /**
     * Register the organisation.
     * 
     */
    public function register(Request $request) {
        // Validate the data passed in.
        $data = $this->validator($request->all())->validate();

        // Handle profile image.
        $imagePath = null;

        // If image exists...
        if (Arr::exists($data, 'profile_img')) {
            $imagePath = $data['profile_img']->store('uploads/images/org/profile/', 'public');
    
            $image = Image::make(public_path("storage/{$imagePath}"));
            $image->save();
        }

        // Add image path to data
        $data['profile_img'] = $imagePath;

        // Create the organisation.
        $org = $this->createOrganisation($data);

        // Create the organisation.
        $this->createOrganisationProfile($org, $data);

        // Login the organisation.
        if (Auth::guard('org')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // If successful, then redirect to their intended location.
            return redirect()->route('org.dashboard');
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:organisations'],
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
    }

    /**
     * Create the organisation record in the database.
     */
    protected function createOrganisation(array $data) {
        return Organisation::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Create the organisation profile record in the database.
     */
    protected function createOrganisationProfile(Organisation $org, array $data) {
        return OrganisationProfile::create([
            'organisation_id' => $org->id,
            'name' => $data['name'],
            'profile_img' => $data['profile_img'],
            'street_address' => $data['street_address'],
            'state' => $data['state'],
            'city' => $data['city'],
            'country' => $data['country'],
            'org_url' => $data['org_url'],
            'fax' => $data['fax'],
            'mailing_address' => $data['mailing_address'],
        ]);
    }
}
