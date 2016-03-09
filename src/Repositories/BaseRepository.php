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

// Laravel classes
use Illuminate\Container\Container as Container;


class BaseRepository
{
    ///////////////////////////////////////////////////////////////////
    //////////////////////       PROPERTIES       /////////////////////
    ///////////////////////////////////////////////////////////////////

    /*
     * @var Illuminate\Container\Container
     */
    protected $app;

    /*
     * @var  namespace and class of relevant model
     */
    protected $model;


    ///////////////////////////////////////////////////////////////////
    /////////////////////       CONSTRUCTOR       /////////////////////
    ///////////////////////////////////////////////////////////////////

    /*
     * Inject a new instance of the container in order to inject the relevant model.
     */
    public function __construct()
    {
        $this->app = new Container;
    }

    ///////////////////////////////////////////////////////////////////
    //////////////////////    MODEL INJECTION     /////////////////////
    ///////////////////////////////////////////////////////////////////
    /*
     *
     * Inject the container, then use the container to inject the model object
     * "Resolve something out of the container"
     * http://laravel.com/docs/5.0/container#basic-usage
     *
     * Called from controller
     *
     * @param  string   $modelNamespaceClass  The model's concatenated namespace and class name
     *
     * @return object
     */
    public function injectModelIntoRepository($modelNamespaceClass)
    {
        //$this->model = $this->app->make($modelNamespaceClass);
    }



    ///////////////////////////////////////////////////////////////////
    ////       LARAVEL MODEL METHODS IN REPOSITORY FORM       /////////
    ///////////////////////////////////////////////////////////////////

    /**
     * Return specific model
     *
     * @param  int       $id         Post ID
     * @return model
     */
    public function getFind($id)
    {
        return $this->model->findOrfail($id);
    }



    ///////////////////////////////////////////////////////////////////
    ////                      OTHER METHODS                   /////////
    ///////////////////////////////////////////////////////////////////

    /**
     * Get the first work email found for a specific People ID
     *
     * @param    int    $id    PeopleID
     * @return   text
     */
    public function getFirstWorkEmail($id) {

        $people =  $this->model->findOrfail($id);

        // The first email that is type "work"
        foreach ($people->email as $email) {

            if ($email->email_type_id == 3) {
                return $email->title;
            }
        }

        return "there is no email address";
    }


    /**
     * Get the first work telephone number found for a specific People ID
     *
     * @param    int    $id    PeopleID
     * @return   text
     */
    public function getFirstWorkTelephone($id) {

        $people =  $this->model->findOrfail($id);

        // The first telephone number that is they type "work"
        foreach ($people->telephone as $telephone) {

            if ($telephone->telephone_type_id == 1) {
                return $telephone->title;
            }
        }

        return "there is no telephone number";
    }
}