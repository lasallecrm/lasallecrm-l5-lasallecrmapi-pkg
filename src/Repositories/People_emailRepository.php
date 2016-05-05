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
use Lasallecrm\Lasallecrmapi\Models\People_email;


/**
 * Class People_emailRepository
 * @package Lasallecrm\Lasallecrmapi\Repositories
 */
class People_emailRepository extends BaseRepository
{
    /**
     * Instance of model
     *
     * @var Lasallecrm\Lasallecrmapi\Models\People_email
     */
    protected $model;

    /**
     * Inject the model
     *
     * @param  Lasallecrm\Lasallecrmapi\Models\People_email
     */
    public function __construct(People_email $model) {
        $this->model = $model;
    }


    /**
     * INSERT INTO 'people_email'
     *
     * @param   array   $data      The data to be saved, which is already validated, washed, & prepped.
     * @return  mixed              The new list_email.id when save is successful, false when save fails
     */
    public function createNewRecord($data) {
        $people_email = new $this->model;

        $people_email['people_id']     = $data['people_id'];
        $people_email['email_id']      = $data['email_id'];

        if ($people_email->save()) {

            // Return the new ID
            return $people_email->id;
        }

        return false;
    }
}