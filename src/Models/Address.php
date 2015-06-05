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

// LaSalle Software
use Lasallecms\Lasallecmsapi\Models\BaseModel;

class Address extends BaseModel
{
    ///////////////////////////////////////////////////////////////////
    ///////////     MANDATORY USER DEFINED PROPERTIES      ////////////
    ///////////              MODIFY THESE!                /////////////
    ///////////////////////////////////////////////////////////////////


    // LARAVEL MODEL CLASS PROPERTIES

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


    // PACKAGE PROPERTIES

    /*
     * Name of this package
     *
     * @var string
     */
    public $package_title = "LaSalleCRM";


    // MODEL PROPERTIES

    /*
     * Model class namespace.
     *
     * Do *NOT* specify the model's class.
     *
     * @var string
     */
    public $model_namespace = "Lasallecrm\Lasallecrmapi\Models";

    /*
     * Model's class.
     *
     * Convention is capitalized and singular -- which is assumed.
     *
     * @var string
     */
    public $model_class = "Address";


    // RESOURCE ROUTE PROPERTIES

    /*
     * The base URL of the resource routes.
     *
     * Frequently is the same as the table name.
     *
     * By convention, plural.
     *
     * Lowercase.
     *
     * @var string
     */
    public $resource_route_name   = "crmaddresses";


    // FORM PROCESSORS PROPERTIES.
    // THESE ARE THE ADMIN CRUD COMMAND HANDLERS.
    // THE ONLY REASON YOU HAVE TO CREATE THESE COMMAND HANDLERS AT ALL IS THAT
    // THE EVENTS DIFFER. EVERYTHING THAT HAPPENS UP TO THE "PERSIST" IS PRETTY STANDARD.

    /*
     * Namespace of the Form Processors
     *
     * MUST *NOT* have a slash at the end of the string
     *
     * @var string
     */
    public $namespace_formprocessor = 'Lasallecrm\Lasallecrmapi\Addresses';

    /*
     * Class name of the CREATE Form Processor command
     *
     * @var string
     */
    public $classname_formprocessor_create = 'CreateAddressFormProcessing';

    /*
     * Namespace and class name of the UPDATE Form Processor command
     *
     * @var string
     */
    public $classname_formprocessor_update = 'UpdateAddressFormProcessing';

    /*
     * Namespace and class name of the DELETE (DESTROY) Form Processor command
     *
     * @var string
     */
    public $classname_formprocessor_delete = 'DeleteAddressFormProcessing';


    // SANITATION RULES PROPERTIES

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


    // VALIDATION RULES PROPERTIES

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


    // USER GROUPS & ROLES PROPERTIES

    /*
     * User groups that are allowed to execute each controller action
     *
     * @var array
     */
    public $allowed_user_groups = [
        ['index'   => ['Super Administrator']],
        ['create'  => ['Super Administrator']],
        ['store'   => ['Super Administrator']],
        ['edit'    => ['Super Administrator']],
        ['update'  => ['Super Administrator']],
        ['destroy' => ['Super Administrator']],
    ];


    // FIELD LIST PROPERTIES

    /*
     * Field list
     *
     * ID and TITLE must go first.
     *
     * Forms will list fields in the order fields are listed in this array.
     *
     * @var array
     */
    public $field_list = [
        [
            /*  "Composite Title" field. Database tables that are related to each other need a "Title" field.
                 There is no natural field that can serve as the "Title" field. The "Composite Title" field
                 concatenates other fields during create and updates automatically.

                 * not for lookup tables
                 * include  'index_skip' => true,  so existing code will exclude from index listing
                 * MySQL field type "text" so not run out of space concatenating multiple varchar(255) fields
             */
            'name'                  => 'composite_title',
            'type'                  => 'composite_title',
            'fields_to_concatenate' => ['street1', 'street2', 'city'],
            'index_skip'            => true,
        ],
        [
            'name'                   => 'id',
            'type'                   => 'int',
            'info'                   => false,
            'index_skip'             => false,
            'index_align'            => 'center',
        ],
        [
            'name'                   => 'address_type_id',
            'alternate_form_name'    => 'Address Type',
            'type'                   => 'related_table',
            'related_table_name'     => 'lookup_address_types',
            'related_namespace'      => 'Lasallecrm\Lasallecrmapi\Models',
            'related_model_class'    => 'Lookup_address_type',
            'related_fk_constraint'  => false,
            'related_pivot_table'    => false,
            'nullable'               => false,
            'info'                   => 'Type of address.',
            'index_skip'             => false,
            'index_align'            => 'center',
        ],
        [
            'name'                   => 'street1',
            'type'                   => 'varchar',
            'info'                   => false,
            'index_skip'             => false,
            'index_align'            => 'center',
            'persist_wash'           => 'title',
        ],
        [
            'name'                   => 'street2',
            'type'                   => 'varchar',
            'info'                   => false,
            'index_skip'             => true,
            'index_align'            => 'center',
            'persist_wash'           => 'title',
        ],
        [
            'name'                   => 'street3',
            'type'                   => 'varchar',
            'info'                   => false,
            'index_skip'             => true,
            'index_align'            => 'center',
            'persist_wash'           => 'title',
        ],
        [
            'name'                   => 'street4',
            'type'                   => 'varchar',
            'info'                   => false,
            'index_skip'             => true,
            'index_align'            => 'center',
            'persist_wash'           => 'title',
        ],
        [
            'name'                   => 'city',
            'type'                   => 'varchar',
            'info'                   => false,
            'index_skip'             => false,
            'index_align'            => 'center',
            'persist_wash'           => 'title',
        ],
        [
            'name'                   => 'province',
            'type'                   => 'varchar',
            'info'                   => 'Province or State',
            'index_skip'             => true,
            'index_align'            => 'center',
            'persist_wash'           => 'title',
        ],
        [
            'name'                   => 'country',
            'type'                   => 'varchar',
            'info'                   => false,
            'index_skip'             => true,
            'index_align'            => 'center',
            'persist_wash'           => 'title',
        ],
        [
            'name'                   => 'postal_code',
            'type'                   => 'varchar',
            'info'                   => false,
            'index_skip'             => true,
            'index_align'            => 'center',
            'persist_wash'           => 'title',
        ],
        [
            'name'                   => 'description',
            'type'                   => 'text-no-editor',
            'info'                   => 'Description is optional. 255 character maximum.',
            'index_skip'             => false,
        ],
        [
            'name'                   => 'comments',
            'type'                   => 'text-with-editor',
            'info'                   => 'Optional.',
            'index_skip'             => true,
            'persist_wash'           => 'content',
        ],
        [
            'name'                  => 'companies',
            'alternate_form_name'   => 'Company/Organization',
            'type'                  => 'related_table',
            'related_table_name'    => 'companies',
            'related_namespace'     => 'Lasallecrm\Lasallecrmapi\Models',
            'related_model_class'   => 'Company',
            'related_fk_constraint' => false,
            'related_pivot_table'   => true,
            'nullable'              => true,
            'info'                  => 'Optional. Usually an address belongs to a company or to a person.',
            'index_skip'            => false,
            'index_align'           => 'center',
        ],
        [
            'name'                  => 'peoples',
            'alternate_form_name'   => 'People',
            'type'                  => 'related_table',
            'related_table_name'    => 'peoples',
            'related_namespace'     => 'Lasallecrm\Lasallecrmapi\Models',
            'related_model_class'   => 'People',
            'related_fk_constraint' => false,
            'related_pivot_table'   => true,
            'nullable'              => true,
            'info'                  => 'Optional. Usually an address belongs to a company or to a person.',
            'index_skip'            => false,
            'index_align'           => 'center',
        ],
    ];


    // MISC PROPERTIES

    /*
     * Suppress the delete button when just one record to list, in the listings (index) page
     *
     * true  = suppress the delete button when just one record to list
     * false = display the delete button when just one record to list
     *
     * @var bool
     */
    public $suppress_delete_button_when_one_record = false;

    /*
     * DO NOT DELETE THESE CORE RECORDS.
     *
     * Specify the TITLE of these records
     *
     * Assumed that this database table has a "title" field
     *
     * @var array
     */
    public $do_not_delete_these_core_records = [];


    ///////////////////////////////////////////////////////////////////
    //////////////        RELATIONSHIPS             ///////////////////
    ///////////////////////////////////////////////////////////////////

    /*
     * One to one relationship with lookup_address_type
     *
     * Method name must be:
     *    * the model name,
     *    * NOT the table name,
     *    * singular;
     *    * lowercase.
     *
     * @return Eloquent
     */
    public function lookup_address_type()
    {
        return $this->hasOne('Lasallecrm\Lasallecrmapi\Models\Lookup_address_type');
    }

    /*
     * Many to many relationship with companies.
     *
     * Method name must be:
     *    * the model name,
     *    * NOT the table name,
     *    * singular;
     *    * lowercase.
     *
     * @return Eloquent
     */
    public function company()
    {
        return $this->belongsToMany('Lasallecrm\Lasallecrmapi\Models\Company', 'company_address');
    }

    /*
     * Many to many relationship with peoples.
     *
     * Method name must be:
     *    * the model name,
     *    * NOT the table name,
     *    * singular;
     *    * lowercase.
     *
     * @return Eloquent
     */
    public function people()
    {
        return $this->belongsToMany('Lasallecrm\Lasallecrmapi\Models\People', 'people_address');
    }


    ///////////////////////////////////////////////////////////////////
    //////////////        OTHER METHODS             ///////////////////
    ///////////////////////////////////////////////////////////////////

    // none
}