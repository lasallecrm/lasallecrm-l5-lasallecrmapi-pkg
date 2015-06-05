<?php

/**
 *
 * Internal API package for the LaSalle Customer Relationship Management package.
 *
 * Based on the Laravel 5 Framework.
 *
 * Copyright (C) 2015  The South LaSalle Trading Corporation
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 *
 * @package    Internal API package for the LaSalle Customer Relationship Management package
 * @link       http://LaSalleCRM.com
 * @copyright  (c) 2015, The South LaSalle Trading Corporation
 * @license    http://www.gnu.org/licenses/gpl-3.0.html
 * @author     The South LaSalle Trading Corporation
 * @email      info@southlasalle.com
 *
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Lasallecrm\Lasallecrmapi\Models\Lookup_address_type;
use Lasallecrm\Lasallecrmapi\Models\Lookup_email_type;
use Lasallecrm\Lasallecrmapi\Models\Lookup_social_type;
use Lasallecrm\Lasallecrmapi\Models\Lookup_telephone_type;
use Lasallecrm\Lasallecrmapi\Models\Lookup_website_type;

class LasallecrmapiTableSeeder extends Seeder
{

    /**
     * Run the LaSalleCRM database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // lookup_address_type table

        Lookup_address_type::create([
            'title'       => 'Billing',
            'description' => 'Billing',
            'enabled'     => 1,
            'created_at' => new DateTime,
            'created_by' => 1,
            'updated_at' => new DateTime,
            'updated_by' => 1,
        ]);

        Lookup_address_type::create([
            'title'       => 'Home',
            'description' => 'Home',
            'enabled'     => 1,
            'created_at' => new DateTime,
            'created_by' => 1,
            'updated_at' => new DateTime,
            'updated_by' => 1,
        ]);

        Lookup_address_type::create([
            'title'       => 'Other',
            'description' => '',
            'enabled'     => 1,
            'created_at' => new DateTime,
            'created_by' => 1,
            'updated_at' => new DateTime,
            'updated_by' => 1,
        ]);

        Lookup_address_type::create([
            'title'       => 'Shipping',
            'description' => 'Shipping',
            'enabled'     => 1,
            'created_at' => new DateTime,
            'created_by' => 1,
            'updated_at' => new DateTime,
            'updated_by' => 1,
        ]);

        Lookup_address_type::create([
            'title'       => 'Work',
            'description' => 'Work',
            'enabled'     => 1,
            'created_at' => new DateTime,
            'created_by' => 1,
            'updated_at' => new DateTime,
            'updated_by' => 1,
        ]);


        // lookup_email_type table

        Lookup_email_type::create([
            'title'       => 'Other',
            'description' => '',
            'enabled'     => 1,
            'created_at' => new DateTime,
            'created_by' => 1,
            'updated_at' => new DateTime,
            'updated_by' => 1,
        ]);

        Lookup_email_type::create([
            'title'       => 'Primary',
            'description' => 'Main email address',
            'enabled'     => 1,
            'created_at' => new DateTime,
            'created_by' => 1,
            'updated_at' => new DateTime,
            'updated_by' => 1,
        ]);

        Lookup_email_type::create([
            'title'       => 'Secondary',
            'description' => 'Use if the Primary email address is not working',
            'enabled'     => 1,
            'created_at' => new DateTime,
            'created_by' => 1,
            'updated_at' => new DateTime,
            'updated_by' => 1,
        ]);

        Lookup_email_type::create([
            'title'       => 'Work',
            'description' => 'Work',
            'enabled'     => 1,
            'created_at' => new DateTime,
            'created_by' => 1,
            'updated_at' => new DateTime,
            'updated_by' => 1,
        ]);


        // lookup_social_type table
        // http://en.wikipedia.org/wiki/List_of_social_networking_websites

        Lookup_social_type::create([
            'title'       => 'Twitter',
            'description' => 'Twitter @name',
            'enabled'     => 1,
            'created_at' => new DateTime,
            'created_by' => 1,
            'updated_at' => new DateTime,
            'updated_by' => 1,
        ]);

        Lookup_social_type::create([
            'title'       => 'Facebook',
            'description' => 'Facebook',
            'enabled'     => 1,
            'created_at' => new DateTime,
            'created_by' => 1,
            'updated_at' => new DateTime,
            'updated_by' => 1,
        ]);

        Lookup_social_type::create([
            'title'       => 'LinkedIn',
            'description' => 'LinkedIn',
            'enabled'     => 1,
            'created_at' => new DateTime,
            'created_by' => 1,
            'updated_at' => new DateTime,
            'updated_by' => 1,
        ]);

        Lookup_social_type::create([
            'title'       => 'Classmates.com',
            'description' => 'School, college, work and the military',
            'enabled'     => 1,
            'created_at' => new DateTime,
            'created_by' => 1,
            'updated_at' => new DateTime,
            'updated_by' => 1,
        ]);

        Lookup_social_type::create([
            'title'       => 'Flickr',
            'description' => 'Flickr.com',
            'enabled'     => 1,
            'created_at' => new DateTime,
            'created_by' => 1,
            'updated_at' => new DateTime,
            'updated_by' => 1,
        ]);

        Lookup_social_type::create([
            'title'       => 'Google+',
            'description' => 'plus.google.com',
            'enabled'     => 1,
            'created_at' => new DateTime,
            'created_by' => 1,
            'updated_at' => new DateTime,
            'updated_by' => 1,
        ]);

        Lookup_social_type::create([
            'title'       => 'Instagram',
            'description' => 'instagram.com',
            'enabled'     => 1,
            'created_at' => new DateTime,
            'created_by' => 1,
            'updated_at' => new DateTime,
            'updated_by' => 1,
        ]);

        Lookup_social_type::create([
            'title'       => 'Meetup',
            'description' => 'Meetup.com',
            'enabled'     => 1,
            'created_at' => new DateTime,
            'created_by' => 1,
            'updated_at' => new DateTime,
            'updated_by' => 1,
        ]);

        Lookup_social_type::create([
            'title'       => 'Pinterest',
            'description' => 'Pinterest.com',
            'enabled'     => 1,
            'created_at' => new DateTime,
            'created_by' => 1,
            'updated_at' => new DateTime,
            'updated_by' => 1,
        ]);

        Lookup_social_type::create([
            'title'       => 'SoundCloud',
            'description' => 'SoundCloud.com',
            'enabled'     => 1,
            'created_at' => new DateTime,
            'created_by' => 1,
            'updated_at' => new DateTime,
            'updated_by' => 1,
        ]);

        Lookup_social_type::create([
            'title'       => 'Yelp',
            'description' => 'Yelp is the best way to find great local businesses',
            'enabled'     => 1,
            'created_at'  => new DateTime,
            'created_by'  => 1,
            'updated_at'  => new DateTime,
            'updated_by'  => 1,
        ]);

        Lookup_social_type::create([
            'title'       => 'Other',
            'description' => '',
            'enabled'     => 1,
            'created_at'  => new DateTime,
            'created_by'  => 1,
            'updated_at'  => new DateTime,
            'updated_by'  => 1,
        ]);


        // lookup_telephone_type table

        Lookup_telephone_type::create([
            'title'       => 'Cell',
            'description' => 'Cell',
            'enabled'     => 1,
            'created_at'  => new DateTime,
            'created_by'  => 1,
            'updated_at'  => new DateTime,
            'updated_by'  => 1,
        ]);

        Lookup_telephone_type::create([
            'title'       => 'Home',
            'description' => 'Home',
            'enabled'     => 1,
            'created_at'  => new DateTime,
            'created_by'  => 1,
            'updated_at'  => new DateTime,
            'updated_by'  => 1,
        ]);

        Lookup_telephone_type::create([
            'title'       => 'Other',
            'description' => '',
            'enabled'     => 1,
            'created_at'  => new DateTime,
            'created_by'  => 1,
            'updated_at'  => new DateTime,
            'updated_by'  => 1,
        ]);

        Lookup_telephone_type::create([
            'title'       => 'Work',
            'description' => 'Work',
            'enabled'     => 1,
            'created_at'  => new DateTime,
            'created_by'  => 1,
            'updated_at'  => new DateTime,
            'updated_by'  => 1,
        ]);


        // lookup_website_type table

        Lookup_website_type::create([
            'title'       => 'Blog',
            'description' => 'Blog',
            'enabled'     => 1,
            'created_at' => new DateTime,
            'created_by' => 1,
            'updated_at' => new DateTime,
            'updated_by' => 1,
        ]);

        Lookup_website_type::create([
            'title'       => 'Podcast',
            'description' => 'Podcast',
            'enabled'     => 1,
            'created_at' => new DateTime,
            'created_by' => 1,
            'updated_at' => new DateTime,
            'updated_by' => 1,
        ]);

        Lookup_website_type::create([
            'title'       => 'Ecommerce',
            'description' => 'Ecommerce',
            'enabled'     => 1,
            'created_at' => new DateTime,
            'created_by' => 1,
            'updated_at' => new DateTime,
            'updated_by' => 1,
        ]);

        Lookup_website_type::create([
            'title'       => 'Business',
            'description' => 'The main site for the business.',
            'enabled'     => 1,
            'created_at' => new DateTime,
            'created_by' => 1,
            'updated_at' => new DateTime,
            'updated_by' => 1,
        ]);

        Lookup_website_type::create([
            'title'       => 'Client',
            'description' => 'This site is a client of someone.',
            'enabled'     => 1,
            'created_at' => new DateTime,
            'created_by' => 1,
            'updated_at' => new DateTime,
            'updated_by' => 1,
        ]);

        Lookup_website_type::create([
            'title'       => 'Other',
            'description' => 'No website type seems to apply.',
            'enabled'     => 1,
            'created_at' => new DateTime,
            'created_by' => 1,
            'updated_at' => new DateTime,
            'updated_by' => 1,
        ]);
    }
}