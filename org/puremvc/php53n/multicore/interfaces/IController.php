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
	
require_once 'org/puremvc/php53n/multicore/interfaces/INotification.php';

/**
 * The interface definition for a PureMVC Controller.
 *
 * In PureMVC, an <b>IController</b> implementor
 * follows the 'Command and Controller' strategy, and
 * assumes these responsibilities:
 *
 * - Remembering which <b>ICommand</b>s are intended to handle
 *   which <b>INotifications</b>.
 * - Registering itself as an <b>IObserver</b> with the <b>IView</b>
 *   for each <b>INotification</b> that it has an <b>ICommand</b>
 *   mapping for.
 * - Creating a new instance of the proper <b>ICommand</b> to handle
 *   a given <b>INotification</b> when notified by the <b>IView</b>.
 * - Calling the <b>ICommand</b>'s <b>execute</b> method, passing
 *   in the <b>INotification</b>.
 *
 * @see org\puremvc\php53n\multicore\interfaces\INotification
 * @see org\puremvc\php53n\multicore\interfaces\ICommand
 *
 */
interface IController
{
    /**
     * Register Command
     *
     * Register a particular <b>ICommand</b> class as the handler
     * for a particular <b>INotification</b>.
     *
     * @param string $notificationName Name of the <b>INotification</b>.
     * @param string $commandClassRef FULLY QUALIFIED Class name of the <b>ICommand</b> implementation to register.
     * @return void
     */
    public function registerCommand( $notificationName, $commandClassRef);

    /**
     * Execute Command
     *
     * Execute the <b>ICommand</b> previously registered as the
     * handler for <b>INotification</b>s with the given notification name.
     *
     * @param INotification $notification The <b>INotification</b> to execute the associated <b>ICommand</b> for.
     * @return void
     */
    public function executeCommand( INotification $notification );

    /**
     * Remove Command
     *
     * Remove a previously registered <b>ICommand</b> to <b>INotification</b> mapping.
     *
     * @param string $notificationName Name of the <b>INotification</b> to remove the <b>ICommand</b> mapping for.
     * @return void
     */
    public function removeCommand( $notificationName );

    /**
     * Has Command
     *
     * Check if a <b>Command</b> is registered for a given <b>INotification</b>
     *
     * @param string $notificationName Name of the <b>INotification</b> to check for.
     * @return bool Boolean: Whether a <b>Command</b> is currently registered for the given <var>notificationName</var>.
     */
    public function hasCommand( $notificationName );

}
