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

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrmapiTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        ///////////////////////////////////////////////////////////////////////
        ////                    Lookup Tables                              ////
        ///////////////////////////////////////////////////////////////////////

        if (!Schema::hasTable('lookup_address_types'))
        {
            Schema::create('lookup_address_types', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->string('title')->unique();
                $table->string('description');

                $table->boolean('enabled')->default(true);

                $table->timestamp('created_at');
                $table->integer('created_by')->unsigned();
                $table->foreign('created_by')->references('id')->on('users');

                $table->timestamp('updated_at');
                $table->integer('updated_by')->unsigned();
                $table->foreign('updated_by')->references('id')->on('users');

                $table->timestamp('locked_at')->nullable();
                $table->integer('locked_by')->nullable()->unsigned();
                $table->foreign('locked_by')->references('id')->on('users');
            });
        }

        if (!Schema::hasTable('lookup_email_types'))
        {
            Schema::create('lookup_email_types', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->string('title')->unique();
                $table->string('description');

                $table->boolean('enabled')->default(true);

                $table->timestamp('created_at');
                $table->integer('created_by')->unsigned();
                $table->foreign('created_by')->references('id')->on('users');

                $table->timestamp('updated_at');
                $table->integer('updated_by')->unsigned();
                $table->foreign('updated_by')->references('id')->on('users');

                $table->timestamp('locked_at')->nullable();
                $table->integer('locked_by')->nullable()->unsigned();
                $table->foreign('locked_by')->references('id')->on('users');
            });
        }

        if (!Schema::hasTable('lookup_social_types'))
        {
            Schema::create('lookup_social_types', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->string('title')->unique();
                $table->string('description');

                $table->boolean('enabled')->default(true);

                $table->timestamp('created_at');
                $table->integer('created_by')->unsigned();
                $table->foreign('created_by')->references('id')->on('users');

                $table->timestamp('updated_at');
                $table->integer('updated_by')->unsigned();
                $table->foreign('updated_by')->references('id')->on('users');

                $table->timestamp('locked_at')->nullable();
                $table->integer('locked_by')->nullable()->unsigned();
                $table->foreign('locked_by')->references('id')->on('users');
            });
        }

        if (!Schema::hasTable('lookup_telephone_types'))
        {
            Schema::create('lookup_telephone_types', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->string('title')->unique();
                $table->string('description');

                $table->boolean('enabled')->default(true);

                $table->timestamp('created_at');
                $table->integer('created_by')->unsigned();
                $table->foreign('created_by')->references('id')->on('users');

                $table->timestamp('updated_at');
                $table->integer('updated_by')->unsigned();
                $table->foreign('updated_by')->references('id')->on('users');

                $table->timestamp('locked_at')->nullable();
                $table->integer('locked_by')->nullable()->unsigned();
                $table->foreign('locked_by')->references('id')->on('users');
            });
        }

        if (!Schema::hasTable('lookup_website_types'))
        {
            Schema::create('lookup_website_types', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->string('title')->unique();
                $table->string('description');

                $table->boolean('enabled')->default(true);

                $table->timestamp('created_at');
                $table->integer('created_by')->unsigned();
                $table->foreign('created_by')->references('id')->on('users');

                $table->timestamp('updated_at');
                $table->integer('updated_by')->unsigned();
                $table->foreign('updated_by')->references('id')->on('users');

                $table->timestamp('locked_at')->nullable();
                $table->integer('locked_by')->nullable()->unsigned();
                $table->foreign('locked_by')->references('id')->on('users');
            });
        }


        ///////////////////////////////////////////////////////////////////////
        ////                    Main Tables                                ////
        ///////////////////////////////////////////////////////////////////////


        if (!Schema::hasTable('companies'))
        {
            Schema::create('companies', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->string('title')->unique();;
                $table->string('description');
                $table->text('comments');

                $table->timestamp('created_at');
                $table->integer('created_by')->unsigned();
                $table->foreign('created_by')->references('id')->on('users');

                $table->timestamp('updated_at');
                $table->integer('updated_by')->unsigned();
                $table->foreign('updated_by')->references('id')->on('users');

                $table->timestamp('locked_at')->nullable();
                $table->integer('locked_by')->nullable()->unsigned();
                $table->foreign('locked_by')->references('id')->on('users');
            });
        }

        if (!Schema::hasTable('peoples'))
        {
            Schema::create('peoples', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->integer('user_id')->nullable()->unsigned();
                $table->foreign('user_id')->references('id')->on('users');

                // "Composite Title" that is comprised of the "first_name" and "surname"
                // concatenated automatically during persist operations
                $table->string('title');

                $table->string('salutation');
                $table->string('first_name');
                $table->string('middle_name');
                $table->string('surname');
                $table->string('position');
                $table->string('description');
                $table->text('comments');

                $table->date('birthday')->nullable();
                $table->date('anniversary')->nullable();

                $table->timestamp('created_at');
                $table->integer('created_by')->unsigned();
                $table->foreign('created_by')->references('id')->on('users');

                $table->timestamp('updated_at');
                $table->integer('updated_by')->unsigned();
                $table->foreign('updated_by')->references('id')->on('users');

                $table->timestamp('locked_at')->nullable();
                $table->integer('locked_by')->nullable()->unsigned();
                $table->foreign('locked_by')->references('id')->on('users');
            });
        }


        ///////////////////////////////////////////////////////////////////////
        ////          Tables Relating to the Main Tables                   ////
        ///////////////////////////////////////////////////////////////////////

        if (!Schema::hasTable('addresses'))
        {
            Schema::create('addresses', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->integer('address_type_id')->unsigned();
                $table->foreign('address_type_id')->references('id')->on('lookup_address_types');

                // "Composite Title" that is comprised of the ['street1', 'street2', 'city']
                // concatenated automatically during persist operations.
                $table->string('title');

                $table->string('street1');
                $table->string('street2');
                $table->string('street3');
                $table->string('street4');
                $table->string('city');
                $table->string('province');
                $table->string('country');
                $table->string('postal_code');
                $table->string('description');
                $table->text('comments');

                $table->timestamp('created_at');
                $table->integer('created_by')->unsigned();
                $table->foreign('created_by')->references('id')->on('users');

                $table->timestamp('updated_at');
                $table->integer('updated_by')->unsigned();
                $table->foreign('updated_by')->references('id')->on('users');

                $table->timestamp('locked_at')->nullable();
                $table->integer('locked_by')->nullable()->unsigned();
                $table->foreign('locked_by')->references('id')->on('users');
            });
        }


        if (!Schema::hasTable('emails'))
        {
            Schema::create('emails', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->integer('email_type_id')->unsigned();
                $table->foreign('email_type_id')->references('id')->on('lookup_email_types');

                $table->string('title')->unique();
                $table->string('description');
                $table->text('comments');

                $table->timestamp('created_at');
                $table->integer('created_by')->unsigned();
                $table->foreign('created_by')->references('id')->on('users');

                $table->timestamp('updated_at');
                $table->integer('updated_by')->unsigned();
                $table->foreign('updated_by')->references('id')->on('users');

                $table->timestamp('locked_at')->nullable();
                $table->integer('locked_by')->nullable()->unsigned();
                $table->foreign('locked_by')->references('id')->on('users');
            });
        }

        if (!Schema::hasTable('socials'))
        {
            Schema::create('socials', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->integer('social_type_id')->unsigned();
                $table->foreign('social_type_id')->references('id')->on('lookup_social_types');

                $table->string('title')->unique();
                $table->string('description');
                $table->text('comments');

                $table->timestamp('created_at');
                $table->integer('created_by')->unsigned();
                $table->foreign('created_by')->references('id')->on('users');

                $table->timestamp('updated_at');
                $table->integer('updated_by')->unsigned();
                $table->foreign('updated_by')->references('id')->on('users');

                $table->timestamp('locked_at')->nullable();
                $table->integer('locked_by')->nullable()->unsigned();
                $table->foreign('locked_by')->references('id')->on('users');
            });
        }

        if (!Schema::hasTable('telephones'))
        {
            Schema::create('telephones', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->integer('telephone_type_id')->unsigned();
                $table->foreign('telephone_type_id')->references('id')->on('lookup_telephone_types');

                $table->string('title');
                $table->string('description');
                $table->text('comments');

                $table->timestamp('created_at');
                $table->integer('created_by')->unsigned();
                $table->foreign('created_by')->references('id')->on('users');

                $table->timestamp('updated_at');
                $table->integer('updated_by')->unsigned();
                $table->foreign('updated_by')->references('id')->on('users');

                $table->timestamp('locked_at')->nullable();
                $table->integer('locked_by')->nullable()->unsigned();
                $table->foreign('locked_by')->references('id')->on('users');
            });
        }

        if (!Schema::hasTable('websites'))
        {
            Schema::create('websites', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->integer('website_type_id')->unsigned();
                $table->foreign('website_type_id')->references('id')->on('lookup_website_types');

                $table->string('title');
                $table->string('description');
                $table->text('comments');

                $table->timestamp('created_at');
                $table->integer('created_by')->unsigned();
                $table->foreign('created_by')->references('id')->on('users');

                $table->timestamp('updated_at');
                $table->integer('updated_by')->unsigned();
                $table->foreign('updated_by')->references('id')->on('users');

                $table->timestamp('locked_at')->nullable();
                $table->integer('locked_by')->nullable()->unsigned();
                $table->foreign('locked_by')->references('id')->on('users');
            });
        }


        ///////////////////////////////////////////////////////////////////////
        ////               Pivot Tables for COMPANIES                      ////
        ///////////////////////////////////////////////////////////////////////

        if (!Schema::hasTable('company_people'))
        {
            Schema::create('company_people', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->integer('company_id')->unsigned()->index();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                $table->integer('people_id')->unsigned()->index();
                $table->foreign('people_id')->references('id')->on('peoples')->onDelete('cascade');
            });
        }

        if (!Schema::hasTable('company_address'))
        {
            Schema::create('company_address', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->integer('company_id')->unsigned()->index();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                $table->integer('address_id')->unsigned()->index();
                $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            });
        }

        if (!Schema::hasTable('company_email'))
        {
            Schema::create('company_email', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->integer('company_id')->unsigned()->index();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                $table->integer('email_id')->unsigned()->index();
                $table->foreign('email_id')->references('id')->on('emails')->onDelete('cascade');
            });
        }

        if (!Schema::hasTable('company_social'))
        {
            Schema::create('company_social', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->integer('company_id')->unsigned()->index();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                $table->integer('social_id')->unsigned()->index();
                $table->foreign('social_id')->references('id')->on('socials')->onDelete('cascade');
            });
        }

        if (!Schema::hasTable('company_telephone'))
        {
            Schema::create('company_telephone', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->integer('company_id')->unsigned()->index();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                $table->integer('telephone_id')->unsigned()->index();
                $table->foreign('telephone_id')->references('id')->on('telephones')->onDelete('cascade');
            });
        }

        if (!Schema::hasTable('company_website'))
        {
            Schema::create('company_website', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->integer('company_id')->unsigned()->index();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                $table->integer('website_id')->unsigned()->index();
                $table->foreign('website_id')->references('id')->on('websites')->onDelete('cascade');
            });
        }


        ///////////////////////////////////////////////////////////////////////
        ////                 Pivot Tables for PEOPLES                      ////
        ///////////////////////////////////////////////////////////////////////

        if (!Schema::hasTable('people_address'))
        {
            Schema::create('people_address', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->integer('people_id')->unsigned()->index();
                $table->foreign('people_id')->references('id')->on('peoples')->onDelete('cascade');
                $table->integer('address_id')->unsigned()->index();
                $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            });
        }

        if (!Schema::hasTable('people_email'))
        {
            Schema::create('people_email', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->integer('people_id')->unsigned()->index();
                $table->foreign('people_id')->references('id')->on('peoples')->onDelete('cascade');
                $table->integer('email_id')->unsigned()->index();
                $table->foreign('email_id')->references('id')->on('emails')->onDelete('cascade');
            });
        }

        if (!Schema::hasTable('people_social'))
        {
            Schema::create('people_social', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->integer('people_id')->unsigned()->index();
                $table->foreign('people_id')->references('id')->on('peoples')->onDelete('cascade');
                $table->integer('social_id')->unsigned()->index();
                $table->foreign('social_id')->references('id')->on('socials')->onDelete('cascade');
            });
        }

        if (!Schema::hasTable('people_telephone'))
        {
            Schema::create('people_telephone', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->integer('people_id')->unsigned()->index();
                $table->foreign('people_id')->references('id')->on('peoples')->onDelete('cascade');
                $table->integer('telephone_id')->unsigned()->index();
                $table->foreign('telephone_id')->references('id')->on('telephones')->onDelete('cascade');
            });
        }

        if (!Schema::hasTable('people_website'))
        {
            Schema::create('people_website', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->integer('people_id')->unsigned()->index();
                $table->foreign('people_id')->references('id')->on('peoples')->onDelete('cascade');
                $table->integer('website_id')->unsigned()->index();
                $table->foreign('website_id')->references('id')->on('websites')->onDelete('cascade');
            });
        }
    }



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        // Disable foreign key constraints or these DROPs will not work
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');


        ///////////////////////////////////////////////////////////////////////
        ////                       Lookup Tables                           ////
        ///////////////////////////////////////////////////////////////////////

        Schema::table('lookup_address_types', function($table){
            $table->dropIndex('lookup_address_types_title_unique');
            $table->dropForeign('lookup_address_types_created_by_foreign');
            $table->dropForeign('lookup_address_types_updated_by_foreign');
            $table->dropForeign('lookup_address_types_locked_by_foreign');
        });
        Schema::dropIfExists('lookup_address_types');

        Schema::table('lookup_email_types', function($table){
            $table->dropIndex('lookup_email_types_title_unique');
            $table->dropForeign('lookup_email_types_created_by_foreign');
            $table->dropForeign('lookup_email_types_updated_by_foreign');
            $table->dropForeign('lookup_email_types_locked_by_foreign');
        });
        Schema::dropIfExists('lookup_email_types');

        Schema::table('lookup_social_types', function($table){
            $table->dropIndex('lookup_social_types_title_unique');
            $table->dropForeign('lookup_social_types_created_by_foreign');
            $table->dropForeign('lookup_social_types_updated_by_foreign');
            $table->dropForeign('lookup_social_types_locked_by_foreign');
        });
        Schema::dropIfExists('lookup_social_types');

        Schema::table('lookup_telephone_types', function($table){
            $table->dropIndex('lookup_telephone_types_title_unique');
            $table->dropForeign('lookup_telephone_types_created_by_foreign');
            $table->dropForeign('lookup_telephone_types_updated_by_foreign');
            $table->dropForeign('lookup_telephone_types_locked_by_foreign');
        });
        Schema::dropIfExists('lookup_telephone_types');

        Schema::table('lookup_website_types', function($table){
            $table->dropIndex('lookup_website_types_title_unique');
            $table->dropForeign('lookup_website_types_created_by_foreign');
            $table->dropForeign('lookup_website_types_updated_by_foreign');
            $table->dropForeign('lookup_website_types_locked_by_foreign');
        });
        Schema::dropIfExists('lookup_website_types');


        ///////////////////////////////////////////////////////////////////////
        ////                    Main Tables                                ////
        ///////////////////////////////////////////////////////////////////////

        Schema::table('companies', function($table){
            $table->dropIndex('companies_title_unique');
            $table->dropForeign('companies_created_by_foreign');
            $table->dropForeign('companies_updated_by_foreign');
            $table->dropForeign('companies_locked_by_foreign');
        });
        Schema::dropIfExists('companies');

        Schema::table('peoples', function($table){
            $table->dropForeign('peoples_user_id_foreign');
            $table->dropForeign('peoples_created_by_foreign');
            $table->dropForeign('peoples_updated_by_foreign');
            $table->dropForeign('peoples_locked_by_foreign');
        });
        Schema::dropIfExists('peoples');


        ///////////////////////////////////////////////////////////////////////
        ////          Tables Relating to the Main Tables                   ////
        ///////////////////////////////////////////////////////////////////////

        Schema::table('addresses', function($table){
            $table->dropForeign('addresses_address_type_id_foreign');
            $table->dropForeign('addresses_created_by_foreign');
            $table->dropForeign('addresses_updated_by_foreign');
            $table->dropForeign('addresses_locked_by_foreign');
        });
        Schema::dropIfExists('addresses');

        Schema::table('emails', function($table){
            $table->dropIndex('emails_title_unique');
            $table->dropForeign('emails_email_type_id_foreign');
            $table->dropForeign('emails_created_by_foreign');
            $table->dropForeign('emails_updated_by_foreign');
            $table->dropForeign('emails_locked_by_foreign');
        });
        Schema::dropIfExists('emails');

        Schema::table('socials', function($table){
            $table->dropIndex('socials_title_unique');
            $table->dropForeign('socials_social_type_id_foreign');
            $table->dropForeign('socials_created_by_foreign');
            $table->dropForeign('socials_updated_by_foreign');
            $table->dropForeign('socials_locked_by_foreign');
        });
        Schema::dropIfExists('socials');

        Schema::table('telephones', function($table){
            $table->dropForeign('telephones_telephone_type_id_foreign');
            $table->dropForeign('telephones_created_by_foreign');
            $table->dropForeign('telephones_updated_by_foreign');
            $table->dropForeign('telephones_locked_by_foreign');
        });
        Schema::dropIfExists('telephones');

        Schema::table('websites', function($table){
            $table->dropForeign('websites_website_type_id_foreign');
            $table->dropForeign('websites_created_by_foreign');
            $table->dropForeign('websites_updated_by_foreign');
            $table->dropForeign('websites_locked_by_foreign');
        });
        Schema::dropIfExists('websites');


        ///////////////////////////////////////////////////////////////////////
        ////               Pivot Tables for COMPANIES                      ////
        ///////////////////////////////////////////////////////////////////////

        Schema::table('company_people', function($table){
            $table->dropIndex('company_people_company_id_index');
            $table->dropForeign('company_people_company_id_foreign');
            $table->dropIndex('company_people_people_id_index');
            $table->dropForeign('company_people_people_id_foreign');
        });
        Schema::dropIfExists('company_people');

        Schema::table('company_address', function($table){
            $table->dropIndex('company_address_company_id_index');
            $table->dropForeign('company_address_company_id_foreign');
            $table->dropIndex('company_address_address_id_index');
            $table->dropForeign('company_address_address_id_foreign');
        });
        Schema::dropIfExists('company_people');

        Schema::table('company_email', function($table){
            $table->dropIndex('company_email_company_id_index');
            $table->dropForeign('company_email_company_id_foreign');
            $table->dropIndex('company_email_email_id_index');
            $table->dropForeign('company_email_email_id_foreign');
        });
        Schema::dropIfExists('company_email');

        Schema::table('company_social', function($table){
            $table->dropIndex('company_social_company_id_index');
            $table->dropForeign('company_social_company_id_foreign');
            $table->dropIndex('company_social_social_id_index');
            $table->dropForeign('company_social_social_id_foreign');
        });
        Schema::dropIfExists('company_social');

        Schema::table('company_telephone', function($table){
            $table->dropIndex('company_telephone_company_id_index');
            $table->dropForeign('company_telephone_company_id_foreign');
            $table->dropIndex('company_telephone_telephone_id_index');
            $table->dropForeign('company_telephone_telephone_id_foreign');
        });
        Schema::dropIfExists('company_telephone');

        Schema::table('company_website', function($table){
            $table->dropIndex('company_website_company_id_index');
            $table->dropForeign('company_website_company_id_foreign');
            $table->dropIndex('company_website_website_id_index');
            $table->dropForeign('company_website_website_id_foreign');
        });
        Schema::dropIfExists('company_website');


        ///////////////////////////////////////////////////////////////////////
        ////                 Pivot Tables for PEOPLES                      ////
        ///////////////////////////////////////////////////////////////////////

        Schema::table('people_address', function($table){
            $table->dropIndex('people_address_people_id_index');
            $table->dropForeign('people_address_people_id_foreign');
            $table->dropIndex('people_address_address_id_index');
            $table->dropForeign('people_address_address_id_foreign');
        });
        Schema::dropIfExists('people_address');

        Schema::table('people_email', function($table){
            $table->dropIndex('people_email_people_id_index');
            $table->dropForeign('people_email_people_id_foreign');
            $table->dropIndex('people_email_email_id_index');
            $table->dropForeign('people_email_email_id_foreign');
        });
        Schema::dropIfExists('people_email');

        Schema::table('people_social', function($table){
            $table->dropIndex('people_social_people_id_index');
            $table->dropForeign('people_social_people_id_foreign');
            $table->dropIndex('people_social_social_id_index');
            $table->dropForeign('people_social_social_id_foreign');
        });
        Schema::dropIfExists('people_social');

        Schema::table('people_telephone', function($table){
            $table->dropIndex('people_telephone_people_id_index');
            $table->dropForeign('people_telephone_people_id_foreign');
            $table->dropIndex('people_telephone_telephone_id_index');
            $table->dropForeign('people_telephone_telephone_id_foreign');
        });
        Schema::dropIfExists('people_telephone');

        Schema::table('people_website', function($table){
            $table->dropIndex('people_website_people_id_index');
            $table->dropForeign('people_website_people_id_foreign');
            $table->dropIndex('people_website_website_id_index');
            $table->dropForeign('people_website_website_id_foreign');
        });
        Schema::dropIfExists('people_website');


        // Enable foreign key constraints
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}
}
