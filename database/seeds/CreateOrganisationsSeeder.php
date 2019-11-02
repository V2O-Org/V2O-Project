<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
                'name' => 'Dummy Organisation',
                'email' => 'test.organisation@v2o.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Some Company Inc.',
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
        // $organisation = [
        //     [
        //         'user_id' => 2,
        //         'name' => 'Dummy Organisation',
        //         // 'profile_img' => '',
        //         'street_address' => 'Fontabelle',
        //         'state' => 'Saint Michael',
        //         'city' => 'Bridgetown',
        //         'country' => 'Barbados',
        //         'org_url' => 'https://www.w3schools.com',
        //         'fax' => '',
        //         'mailing_address' => 'Fontabelle, Saint Michael, Bridgetown, Barbados',
        //     ],
        //     [
        //         'user_id' => '',
        //         'name' => '',
        //         // 'profile_img' => '',
        //         'street_address_1' => '',
        //         'street_address_2' => '',
        //         'state' => '',
        //         'city' => '',
        //         'country' => '',
        //         'org_url' => '',
        //         'fax' => '',
        //         'mailing_address' => '',
        //     ],
        // ];
    }
}
