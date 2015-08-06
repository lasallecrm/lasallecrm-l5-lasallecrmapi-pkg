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


///////////////////////////////////////////////////////////////////////
////  This migration adds fields to the PEOPLES and COMPANIES      ////
////  tables for LaSalleCast                                       ////
///////////////////////////////////////////////////////////////////////


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyCrmapipeoplescompaniesTables extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        ///////////////////////////////////////////////////////////////////////
        ////                    Main Tables                                ////
        ///////////////////////////////////////////////////////////////////////

        if (Schema::hasTable('companies')) {
            Schema::table('companies', function (Blueprint $table) {
                $table->string('profile')->nullable();
                $table->string('featured_image')->nullable();
            });
        }

        if (Schema::hasTable('peoples')) {
            Schema::table('peoples', function (Blueprint $table) {
                $table->string('profile')->nullable();
                $table->string('featured_image')->nullable();
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
        //DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        // EMPTY!


        // Enable foreign key constraints
        //DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
