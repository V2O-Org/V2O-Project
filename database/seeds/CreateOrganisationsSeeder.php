<?php

use Illuminate\Database\Seeder;
use App\Organisation;
use App\OrganisationProfile;
use App\OrganisationPhoneNumber;

class CreateOrganisationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organisation = [
            [
                'email' => 'test.organisation@v2o.com',
                'password' => bcrypt('password'),
            ],
            [
                'email' => 'test.organisation2@v2o.com',
                'password' => bcrypt('password'),
            ],
        ];

        $organisationProfile = [
            [
                'organisation_id' => 1,
                'name' => 'Dummy Organisation',
                'profile_img' => null,
                'street_address' => 'Fontabelle',
                'state' => 'Saint Michael',
                'city' => 'Bridgetown',
                'country' => 'Barbados',
                'org_url' => 'https://www.w3schools.com',
                'fax' => '(246) 009-3284',
                'mailing_address' => 'Fontabelle, Saint Michael, Bridgetown, Barbados',

            ],
            [
                'organisation_id' => 2,
                'name' => 'Some Company Inc.',
                'profile_img' => null,
                'street_address' => 'Hastings',
                'state' => 'Christ Church',
                'city' => 'Bridgetown',
                'country' => 'Barbados',
                'org_url' => 'https://www.microsoft.com',
                'fax' => '(246) 442-9284',
                'mailing_address' => 'Hastings, Christ Church, Barbados',
            ],
        ];
  
        // Create the organisation user.
        foreach ($organisation as $key => $value) {
            Organisation::create($value);
        }

        // Create the organisation profile.
        foreach ($organisationProfile as $key => $value) {
            OrganisationProfile::create($value);
        }
    }
}
