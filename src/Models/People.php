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


class People extends BaseModel
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
    public $table = 'peoples';

    /**
     * Which fields may be mass assigned
     * @var array
     */
    protected $fillable = [
        'user_id', 'salutation', 'first_name', 'middle_name', 'surname', 'position', 'description', 'comments',
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
    public $model_class = "People";


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
    public $resource_route_name   = "crmpeoples";


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
    public $namespace_formprocessor = 'Lasallecrm\Lasallecrmapi\Listeners\Peoples';

    /*
     * Class name of the CREATE Form Processor command
     *
     * @var string
     */
    public $classname_formprocessor_create = 'CreatePeopleFormProcessing';

    /*
     * Namespace and class name of the UPDATE Form Processor command
     *
     * @var string
     */
    public $classname_formprocessor_update = 'UpdatePeopleFormProcessing';

    /*
     * Namespace and class name of the DELETE (DESTROY) Form Processor command
     *
     * @var string
     */
    public $classname_formprocessor_delete = 'DeletePeopleFormProcessing';


    // SANITATION RULES PROPERTIES

    /**
     * Sanitation rules for Create (INSERT)
     *
     * @var array
     */
    public $sanitationRulesForCreate = [
        'user_id'     => 'trim|strip_tags',
        'first_name'  => 'trim|strip_tags',
        'middle_name' => 'trim|strip_tags',
        'surname'     => 'trim|strip_tags',
        'description' => 'trim',
        'comments'    => 'trim',
    ];

    /**
     * Sanitation rules for UPDATE
     *
     * @var array
     */
    public $sanitationRulesForUpdate = [
        'user_id'     => 'trim|strip_tags',
        'first_name'  => 'trim|strip_tags',
        'middle_name' => 'trim|strip_tags',
        'surname'     => 'trim|strip_tags',
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
        'user_id' => 'integer',
        'surname' => 'required|min:4',
    ];

    /**
     * Validation rules for UPDATE
     *
     * @var array
     */
    public $validationRulesForUpdate = [
        'address_type_id' => 'integer',
        'user_id' => 'integer',
        'surname' => 'required|min:4',
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
            'name'                   => 'composite_title',
            'type'                   => 'composite_title',
            'fields_to_concatenate'  => ['first_name', 'surname'],
            'index_skip'             => true,
        ],
        [
            'name'                   => 'id',
            'type'                   => 'int',
            'info'                   => false,
            'index_skip'             => false,
            'index_align'            => 'center',
        ],
        [
            'name'                   => 'salutation',
            'type'                   => 'varchar',
            'info'                   => 'Mr., Mrs., Dr., etc',
            'index_skip'             => false,
            'index_align'            => 'center',
            'persist_wash'           => 'description',
        ],
        [
            'name'                   => 'first_name',
            'type'                   => 'varchar',
            'info'                   => false,
            'index_skip'             => false,
            'persist_wash'           => 'description',
        ],
        [
            'name'                   => 'middle_name',
            'type'                   => 'varchar',
            'info'                   => false,
            'index_skip'             => false,
            'persist_wash'           => 'description',
        ],
        [
            'name'                   => 'surname',
            'type'                   => 'varchar',
            'info'                   => false,
            'index_skip'             => false,
            'persist_wash'           => 'description',
        ],
        [
            'name'                   => 'position',
            'type'                   => 'varchar',
            'info'                   => false,
            'index_skip'             => false,
            'persist_wash'           => 'description',
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
            'name'                  => 'birthday',
            'type'                  => 'date',
            'info'                  => 'Optional. Just click the x to clear.',
            'index_skip'            => true,
            'index_align'           => 'center',
            'persist_wash'          => 'birthday',
        ],
        [
            'name'                  => 'anniversary',
            'type'                  => 'date',
            'info'                  => 'Optional. Just click the x to clear.',
            'index_skip'            => true,
            'index_align'           => 'center',
            'persist_wash'          => 'birthday',
        ],
        [
            'name'                  => 'user_id',
            'alternate_form_name'   => 'LaSalle User',
            'type'                  => 'related_table',
            'related_table_name'    => 'users',
            'related_namespace'     => 'Lasallecms\Usermanagement\Models',
            'related_model_class'   => 'User',
            'related_fk_constraint' => false,
            'related_pivot_table'   => false,
            'nullable'              => true,
            'info'                  => 'Optional! A customer need NOT be a LaSalle Software user.',
            'index_skip'            => false,
            'index_align'           => 'center',
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
     * Many to many relationship with company..
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
        return $this->belongsToMany('Lasallecrm\Lasallecrmapi\Models\Company', 'company_people');
    }

    /*
     * One to one relationship with user_id.
     *
     * Method name must be:
     *    * the model name,
     *    * NOT the table name,
     *    * singular;
     *    * lowercase.
     *
     * @return Eloquent
     */
    public function user()
    {
        return $this->belongsTo('Lasallecms\Lasallecmsapi\Models\User');
    }

    /*
     * Many to many relationship with addresses..
     *
     * Method name must be:
     *    * the model name,
     *    * NOT the table name,
     *    * singular;
     *    * lowercase.
     *
     * @return Eloquent
     */
    public function address()
    {
        return $this->belongsToMany('Lasallecrm\Lasallecrmapi\Models\Address', 'people_address');
    }

    /*
    * Many to many relationship with emails.
    *
    * Method name must be:
    *    * the model name,
    *    * NOT the table name,
    *    * singular;
    *    * lowercase.
    *
    * @return Eloquent
    */
    public function email()
    {
        return $this->belongsToMany('Lasallecrm\Lasallecrmapi\Models\Email', 'people_email');
    }

    /*
    * Many to many relationship with socials.
    *
    * Method name must be:
    *    * the model name,
    *    * NOT the table name,
    *    * singular;
    *    * lowercase.
    *
    * @return Eloquent
    */
    public function social()
    {
        return $this->belongsToMany('Lasallecrm\Lasallecrmapi\Models\Social', 'people_social');
    }

    /*
    * Many to many relationship with telephones.
    *
    * Method name must be:
    *    * the model name,
    *    * NOT the table name,
    *    * singular;
    *    * lowercase.
    *
    * @return Eloquent
    */
    public function telephone()
    {
        return $this->belongsToMany('Lasallecrm\Lasallecrmapi\Models\Telephone', 'people_telephone');
    }

    /*
    * Many to many relationship with websites.
    *
    * Method name must be:
    *    * the model name,
    *    * NOT the table name,
    *    * singular;
    *    * lowercase.
    *
    * @return Eloquent
    */
    public function website()
    {
        return $this->belongsToMany('Lasallecrm\Lasallecrmapi\Models\Website', 'people_website');
    }


    /*
     * One to one relationship with projects.
     *
     * Method name must be:
     *    * the model name,
     *    * NOT the table name,
     *    * singular;
     *    * lowercase.
     *
     * @return Eloquent
     */
    public function project()
    {
        return $this->belongsTo('Lasallecms\Todo\Models\Project');
    }

    /*
     * One to one relationship with todo_item.
     *
     * Method name must be:
     *    * the model name,
     *    * NOT the table name,
     *    * singular;
     *    * lowercase.
     *
     * @return Eloquent
     */
    public function todo_item()
    {
        return $this->belongsTo('Lasallecms\Todo\Models\Todo_item');
    }


    ///////////////////////////////////////////////////////////////////
    //////////////        OTHER METHODS             ///////////////////
    ///////////////////////////////////////////////////////////////////

    // none
}