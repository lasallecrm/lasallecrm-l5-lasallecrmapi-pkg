<?php
namespace Lasallecrm\Lasallecrmapi\Models;

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

use Lasallecrm\Lasallecrmapi\Models\BaseModel;

class Address extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $table = 'addresses';


    /**
     * Which fields may be mass assigned
     * @var array
     */
    protected $fillable = [
        'address_type_id', 'street1', 'street2', 'street3', 'street4', 'city', 'province', 'country', 'postal_code', 'description', 'comments',
    ];


    /**
     * Sanitation rules for Create (INSERT)
     *
     * @var array
     */
    public $sanitationRulesForCreate = [
        'street1'     => 'trim|strip_tags',
        'street2'     => 'trim|strip_tags',
        'street3'     => 'trim|strip_tags',
        'street4'     => 'trim|strip_tags',
        'city'        => 'trim|strip_tags',
        'province'    => 'trim|strip_tags',
        'country'     => 'trim|strip_tags',
        'postal_code' => 'trim|strip_tags',
        'description' => 'trim',
        'comments'    => 'trim',
    ];

    /**
     * Sanitation rules for UPDATE
     *
     * @var array
     */
    public $sanitationRulesForUpdate = [
        'street1'     => 'trim|strip_tags',
        'street2'     => 'trim|strip_tags',
        'street3'     => 'trim|strip_tags',
        'street4'     => 'trim|strip_tags',
        'city'        => 'trim|strip_tags',
        'province'    => 'trim|strip_tags',
        'country'     => 'trim|strip_tags',
        'postal_code' => 'trim|strip_tags',
        'description' => 'trim',
        'comments'    => 'trim',
    ];


    /**
     * Validation rules for  Create (INSERT)
     *
     * @var array
     */
    public $validationRulesForCreate = [
        'address_type_id' => 'integer',
    ];

    /**
     * Validation rules for UPDATE
     *
     * @var array
     */
    public $validationRulesForUpdate = [
        'address_type_id' => 'integer',
    ];



    /*
     * One to one relationship with lookup_address_type
     *
     * @return Eloquent
     */
    public function lookup_address_type()
    {
        return $this->hasOne('Lasallecrm\Lasallecrmapi\Models\Lookup_address_type');
    }

    /*
     * One to one relationship with people
     *
     * @return Eloquent
     */
    public function people()
    {
        return $this->hasOne('Lasallecrm\Lasallecrmapi\Models\People');
    }

    /*
     * One to one relationship with company
     *
     * @return Eloquent
     */
    public function company()
    {
        return $this->hasOne('Lasallecrm\Lasallecrmapi\Models\Company');
    }
}