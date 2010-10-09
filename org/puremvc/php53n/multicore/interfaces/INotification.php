<?php
/**
 * PureMVC Multicore Port to PHP
 *
 * Partly based on PureMVC Port to PHP by:
 * - Omar Gonzalez <omar@almerblank.com>
 * - and Hasan Otuome <hasan@almerblank.com>
 *
 * Created on August 26, 2010
 *
 * @version 0.0.1
 * @author Michel Chouinard <michel.chouinard@gmail.com>
 * @copyright PureMVC - Copyright(c) 2006-2008 Futurescale, Inc., Some rights reserved.
 * @license http://creativecommons.org/licenses/by/3.0/ Creative Commons Attribution 3.0 Unported License
 */
/**
 *
 */
namespace org\puremvc\php53n\multicore\interfaces;

/**
 * The interface definition for a PureMVC Notification.
 *
 * PureMVC does not rely upon underlying event models such
 * as the one provided with others like Flash, and PHP does
 * not have an inherent event model.
 *
 * The Observer Pattern as implemented within PureMVC exists
 * to support event-driven communication between the
 * application and the actors of the MVC triad.
 *
 * PureMVC <b>Notification</b>s follow a 'Publish/Subscribe'
 * pattern. PureMVC classes need not be related to each other in a
 * parent/child relationship in order to communicate with one another
 * using <b>Notification</b>s.
 *
 * @see org\puremvc\php53n\multicore\interfaces\IView
 * @see org\puremvc\php53n\multicore\interfaces\IObserver
 *
 */
interface INotification
{
    /**
     * Name getter
     *
     * Get the name of the <b>INotification</b> instance.
     *
     * No setter, should be set by constructor only
     *
     * @return string Name of the <b>INotification</b> instance.
     */
    public function getName();

    /**
     * Body setter
     *
     * Set the body of the <b>INotification</b> instance.
     *
     * @param object $body The body of the <b>INotification</b> instance.
     * @return void
     */
    public function setBody( $body );

    /**
     * Body getter
     *
     * Get the body of the <b>INotification</b> instance.
     *
     * @return mixed The body of the <b>INotification</b> instance.
     */
    public function getBody();

    /**
     * Type setter
     *
     * Set the type of the <b>INotification</b> instance.
     *
     * @param string $type The type of the <b>INotification</b> instance.
     * @return void
     */
    public function setType( $type );

    /**
     * Type getter
     *
     * Get the type of the <b>INotification</b> instance.
     *
     * @return string The type of the <b>INotification</b> instance.
     */
    public function getType();

    /**
     * String representation
     *
     * Get the string representation of the <b>INotification</b> instance
     *
     * @return string
     */
    public function toString();

}
