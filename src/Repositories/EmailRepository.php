<?php

namespace Lasallecrm\Lasallecrmapi\Repositories;

/**
 *
 * Internal API package for the LaSalle Customer Relationship Management package.
 *
 * Based on the Laravel 5 Framework.
 *
 * Copyright (C) 2015 - 2016  The South LaSalle Trading Corporation
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
 * @copyright  (c) 2015 - 2016, The South LaSalle Trading Corporation
 * @license    http://www.gnu.org/licenses/gpl-3.0.html
 * @author     The South LaSalle Trading Corporation
 * @email      info@southlasalle.com
 *
 */


// LaSalle Software
//use Lasallecrm\Lasallecrmapi\Repositories\BaseRepository;
use Lasallecms\Lasallecmsapi\Repositories\BaseRepository;
use Lasallecrm\Lasallecrmapi\Models\Email;

// Laravel facades
//use Illuminate\Support\Facades\DB;

/**
 * Class EmailRepository
 * @package Lasallecrm\Lasallecrmapi\Repositories
 */
class EmailRepository extends BaseRepository
{
    /**
     * Instance of model
     *
     * @var Lasallecrm\Lasallecrmapi\Models\Email
     */
    protected $model;

    /**
     * Inject the model
     *
     * @param  Lasallecrm\Lasallecrmapi\Models\People
     */
    public function __construct(Email $model) {
        $this->model = $model;
    }


    /**
     * Get the email title by ID
     *
     * @param  int  $emailID
     * @return string
     */
    public function getEmailByEmailId($emailID) {
        $email = $this->model->where('id', $emailID)->first();

        return $email->title;
    }

    /**
     * Get the email ID by title (ie, by the email address)
     *
     * @param  string   $title      Email address
     * @return int
     */
    public function getEmailIDByTitle($title) {
        $email = $this->model->where('title', $title)->first();

        // It is possible that we are asking for an email address that does not exist
        if ($email) {
            return $email->id;
        }

        return false;
    }

    /**
     * INSERT INTO 'email'
     *
     * @param   array   $data      The data to be saved, which is already validated, washed, & prepped.
     * @return  mixed              The new emails.id when save is successful, false when save fails
     */
    public function createNewRecord($data) {

        $email = new $this->model;

        $email->email_type_id = $data['email_type_id'];
        $email->title         = $data['title'];
        $email->description   = $data['description'];
        $email->comments      = $data['comments'];
        $email->created_at    = $data['created_at'];
        $email->created_by    = $data['created_by'];
        $email->updated_at    = $data['updated_at'];
        $email->updated_by    = $data['updated_by'];
        $email->locked_at     = null;
        $email->locked_by     = null;

        if ($email->save()) {

            // Return the new ID
            return $email->id;
        }

        return false;
    }
}