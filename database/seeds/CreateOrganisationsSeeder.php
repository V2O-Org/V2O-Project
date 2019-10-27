<?php

use Illuminate\Database\Seeder;
use App\Organisation;

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
                'user_id' => 2,
                'name' => 'Dummy Organisation',
                // 'profile_img' => '',
                'street_address_1' => 'Fontabelle',
                'street_address_2' => '',
                'state' => 'Saint Michael',
                'city' => 'Bridgetown',
                'country' => 'Barbados',
                'org_url' => 'https://www.w3schools.com',
                'fax' => '',
                'mailing_address' => 'Fontabelle, Saint Michael, Bridgetown, Barbados',
            ],
            // [
            //     'user_id' => '',
            //     'name' => '',
            //     // 'profile_img' => '',
            //     'street_address_1' => '',
            //     'street_address_2' => '',
            //     'state' => '',
            //     'city' => '',
            //     'country' => '',
            //     'org_url' => '',
            //     'fax' => '',
            //     'mailing_address' => '',
            // ],
        ];
  
        foreach ($organisation as $key => $value) {
            Organisation::create($value);
        }
    }
}
