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
use Lasallecrm\Lasallecrmapi\Repositories\BaseRepository;
use Lasallecrm\Lasallecrmapi\Models\People;


/**
 * Class PeopleRepository
 * @package Lasallecrm\Lasallecrmapi\Repositories
 */
class PeopleRepository extends BaseRepository
{
    /**
     * Instance of model
     *
     * @var Lasallecrm\Lasallecrmapi\Models\People
     */
    protected $model;

    /**
     * Inject the model
     *
     * @param  Lasallecrm\Lasallecrmapi\Models\People
     */
    public function __construct(People $model) {
        $this->model = $model;
    }

    /**
     * Does a record exist with the given "first_name" and "surname"?
     *
     * @param   string  $firstName                 The first name.
     * @param   string  $surname                   The surname.
     * @return  mixed
     */
    public function isFirstnameSurname($firstName, $surname) {
        $result = $this->model
            ->where('first_name', $firstName)
            ->where('surname', $surname)
            ->first()
        ;

        if ($result) {
            return $result->id;
        }

        return false;
    }

    /**
     * INSERT INTO 'peoples'
     *
     * @param   array   $data      The data to be saved, which is already validated, washed, & prepped.
     * @return  mixed              The new list_email.id when save is successful, false when save fails
     */
    public function createNewRecord($data) {
        $people = new $this->model;

        $people['user_id']        = $data['user_id'];
        $people['title']          = $data['title'];
        $people['salutation']     = $data['salutation'];
        $people['first_name']     = $data['first_name'];
        $people['middle_name']    = $data['middle_name'];
        $people['surname']        = $data['surname'];
        $people['position']       = $data['position'];
        $people['description']    = $data['description'];
        $people['comments']       = $data['comments'];

        $people['birthday']       = $data['birthday'];
        $people['anniversary']    = $data['anniversary'];

        $people['created_at']     = $data['created_at'];
        $people['created_by']     = $data['created_by'];
        $people['updated_at']     = $data['updated_at'];
        $people['updated_by']     = $data['updated_by'];

        $people['profile']        = $data['profile'];
        $people['featured_image'] = $data['featured_image'];

        if ($people->save()) {

            // Return the new ID
            return $people->id;
        }

        return false;
    }
}