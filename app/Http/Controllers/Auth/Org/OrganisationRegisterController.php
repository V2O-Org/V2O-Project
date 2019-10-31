<?php

namespace App\Http\Controllers\Auth\Org;

use App\Http\Controllers\Controller;
use App\Organisation;
use App\OrganisationProfile;
use App\OrganisationPhoneNumber;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Symfony\Component\HttpFoundation\Request;

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
    protected $redirectTo = '/org';

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
    public function register() {
        // Validate the data passed in.
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

        // Create the organisation
        $orgProfile = $this->createOrganisationProfile($org, $data);

        return redirect(route('org.dashboard'));
    }

    protected function createOrganisation(array $data) {
        return Organisation::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

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
