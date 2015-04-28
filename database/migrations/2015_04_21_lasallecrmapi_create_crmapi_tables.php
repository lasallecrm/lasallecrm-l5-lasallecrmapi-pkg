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
        // START: Lookup tables

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

        // END: Lookup tables



        if (!Schema::hasTable('companies'))
        {
            Schema::create('companies', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

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

        if (!Schema::hasTable('peoples'))
        {
            Schema::create('peoples', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->integer('user_id')->nullable()->unsigned();
                $table->foreign('user_id')->references('id')->on('users');

                $table->string('salutation');
                $table->string('first_name');
                $table->string('middle_name');
                $table->string('surname');
                $table->string('position');
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

        if (!Schema::hasTable('addresses'))
        {
            Schema::create('addresses', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->integer('address_type_id')->nullable()->unsigned();
                $table->foreign('address_type_id')->references('id')->on('lookup_address_types');

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

                $table->integer('email_type_id')->nullable()->unsigned();
                $table->foreign('email_type_id')->references('id')->on('lookup_email_types');

                $table->string('email')->unique();
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

                $table->integer('social_type_id')->nullable()->unsigned();
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

                $table->integer('telephone_type_id')->nullable()->unsigned();
                $table->foreign('telephone_type_id')->references('id')->on('lookup_telephone_types');

                $table->string('telephone')->unique();
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

                $table->integer('website_type_id')->nullable()->unsigned();
                $table->foreign('website_type_id')->references('id')->on('lookup_website_types');

                $table->string('url')->unique();
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


        // START: Lookup tables

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

        // END: Lookup tables


        Schema::table('companies', function($table){
            $table->dropIndex('companies_title_unique');
            $table->dropForeign('companies_created_by_foreign');
            $table->dropForeign('companies_updated_by_foreign');
            $table->dropForeign('companies_locked_by_foreign');
        });
        Schema::dropIfExists('companiess');

        Schema::table('peoples', function($table){
            $table->dropIndex('peoples_title_unique');
            $table->dropForeign('peoples_user_id_foreign');
            $table->dropForeign('peoples_created_by_foreign');
            $table->dropForeign('peoples_updated_by_foreign');
            $table->dropForeign('peoples_locked_by_foreign');
        });
        Schema::dropIfExists('peoples');

        Schema::table('addresses', function($table){
            $table->dropForeign('addresses_address_type_id_foreign');
            $table->dropForeign('addresses_created_by_foreign');
            $table->dropForeign('addresses_updated_by_foreign');
            $table->dropForeign('addresses_locked_by_foreign');
        });
        Schema::dropIfExists('addresses');

        Schema::table('emails', function($table){
            $table->dropIndex('emails_email_unique');
            $table->dropForeign('emails_email_type_id_foreign');
            $table->dropForeign('emails_created_by_foreign');
            $table->dropForeign('emails_updated_by_foreign');
            $table->dropForeign('emails_locked_by_foreign');
        });
        Schema::dropIfExists('emails');

        Schema::table('socials', function($table){
            $table->dropIndex('socials_social_unique');
            $table->dropForeign('socials_social_type_id_foreign');
            $table->dropForeign('socials_created_by_foreign');
            $table->dropForeign('socials_updated_by_foreign');
            $table->dropForeign('socials_locked_by_foreign');
        });
        Schema::dropIfExists('telephones');

        Schema::table('telephones', function($table){
            $table->dropIndex('telephones_telephone_unique');
            $table->dropForeign('telephones_telephone_type_id_foreign');
            $table->dropForeign('telephones_created_by_foreign');
            $table->dropForeign('telephones_updated_by_foreign');
            $table->dropForeign('telephones_locked_by_foreign');
        });
        Schema::dropIfExists('telephones');

        Schema::table('websites', function($table){
            $table->dropIndex('websites_url_unique');
            $table->dropForeign('websites_website_type_id_foreign');
            $table->dropForeign('websites_created_by_foreign');
            $table->dropForeign('websites_updated_by_foreign');
            $table->dropForeign('websites_locked_by_foreign');
        });
        Schema::dropIfExists('websites');


        // Enable foreign key constraints
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}
}
