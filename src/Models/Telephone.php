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


class Telephone extends BaseModel
{
    ///////////////////////////////////////////////////////////////////
    ///////////     MANDATORY USER DEFINED PROPERTIES      ////////////
    ///////////              MODIFY THESE!                /////////////
    ///////////////////////////////////////////////////////////////////


    // LARAVEL MODEL CLASS PROPERTIES

    /**
     * The database table used by the model.
     *
     * The convention is plural -- and plural is assumed.
     *
     * Lowercase.
     *
     * @var string
     */
    public $table = 'telephones';


    /**
     * Which fields may be mass assigned
     * @var array
     */
    protected $fillable = [
        'telephone_type_id', 'title', 'description', 'comments',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * LaSalle Software handles the created_at and updated_at fields, so false.
     *
     * @var bool
     */
    public $timestamps = false;


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
    public $model_class = "Telephone";


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
    public $resource_route_name   = "crmtelephones";


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
    public $namespace_formprocessor = 'Lasallecrm\Lasallecrmapi\Formprocessing\Telephones';

    /*
     * Class name of the CREATE Form Processor command
     *
     * @var string
     */
    public $classname_formprocessor_create = 'CreateTelephoneFormProcessing';

    /*
     * Namespace and class name of the UPDATE Form Processor command
     *
     * @var string
     */
    public $classname_formprocessor_update = 'UpdateTelephoneFormProcessing';

    /*
     * Namespace and class name of the DELETE (DESTROY) Form Processor command
     *
     * @var string
     */
    public $classname_formprocessor_delete = 'DeleteTelephoneFormProcessing';


    // SANITATION RULES PROPERTIES

    /**
     * Sanitation rules for Create (INSERT)
     *
     * @var array
     */
    public $sanitationRulesForCreate = [
        'title'       => 'trim|strip_tags',
        'description' => 'trim',
        'comments'    => 'trim',
    ];

    /**
     * Sanitation rules for UPDATE
     *
     * @var array
     */
    public $sanitationRulesForUpdate = [
        'title'       => 'trim|strip_tags',
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
        'telephone_type_id' => 'required|integer',
        'title'             => 'required|min:7',
    ];

    /**
     * Validation rules for UPDATE
     *
     * @var array
     */
    public $validationRulesForUpdate = [
        'telephone_type_id' => 'required|integer',
        'title'             => 'min:7',
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
            'name'                  => 'id',
            'type'                  => 'int',
            'info'                  => false,
            'index_skip'            => false,
            'index_align'           => 'center',
        ],
        [
            'name'                  => 'telephone_type_id',
            'alternate_form_name'   => 'Telephone Type',
            'type'                  => 'related_table',
            'related_table_name'    => 'lookup_telephone_types',
            'related_namespace'     => 'Lasallecrm\Lasallecrmapi\Models',
            'related_model_class'   => 'Lookup_telephone_type',
            'related_fk_constraint' => false,
            'related_pivot_table'   => false,
            'nullable'              => false,
            'info'                  => 'Type of telephone.',
            'index_skip'            => false,
            'index_align'           => 'center',
        ],
        [
            'name'                  => 'title',
            'alternate_form_name'   => 'Telephone',
            'type'                  => 'varchar',
            'info'                  => false,
            'index_skip'            => false,
            'index_align'           => 'center',
            'persist_wash'          => 'title',
        ],
        [
            'name'                  => 'description',
            'type'                  => 'text-no-editor',
            'info'                  => 'Description is optional. 255 character maximum.',
            'index_skip'            => false,
        ],
        [
            'name'                  => 'comments',
            'type'                  => 'text-with-editor',
            'info'                  => 'Optional.',
            'index_skip'            => true,
            'persist_wash'          => 'content',
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
            'related_pivot_table_name' => 'company_telephone',
            'nullable'              => true,
            'info'                  => 'Optional. Usually belongs to a company or to a person.',
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
            'related_pivot_table_name' => 'people_telephone',
            'nullable'              => true,
            'info'                  => 'Optional. Usually belongs to a company or to a person.',
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
     * One to one relationship with Lookup_email_type
     *
     * Method name must be:
     *    * the model name,
     *    * NOT the table name,
     *    * singular;
     *    * lowercase.
     *
     * @return Eloquent
     */
    public function lookup_telephone_type()
    {
        return $this->hasOne('Lasallecrm\Lasallecrmapi\Models\Lookup_telephone_type');
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
        return $this->belongsToMany('Lasallecrm\Lasallecrmapi\Models\Company', 'company_telephone');
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
        return $this->belongsToMany('Lasallecrm\Lasallecrmapi\Models\People', 'people_telephone');
    }


    ///////////////////////////////////////////////////////////////////
    //////////////        OTHER METHODS             ///////////////////
    ///////////////////////////////////////////////////////////////////

    // none
}