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

require_once 'org/puremvc/php53n/multicore/interfaces/INotifier.php';
require_once 'org/puremvc/php53n/multicore/interfaces/INotification.php';
require_once 'org/puremvc/php53n/multicore/interfaces/IProxy.php';
require_once 'org/puremvc/php53n/multicore/interfaces/IMediator.php';


/**
 * The interface definition for a PureMVC Facade.
 *
 * The <b>Facade</b> Pattern suggests providing a single
 * class to act as a central point of communication
 * for a subsystem.
 *
 * In PureMVC, the <b>Facade</b> acts as an interface between
 * the core MVC actors (Model, View, Controller) and
 * the rest of your application.
 *
 * @see org\puremvc\php53n\multicore\interfaces\IModel
 * @see org\puremvc\php53n\multicore\interfaces\IView
 * @see org\puremvc\php53n\multicore\interfaces\IController
 * @see org\puremvc\php53n\multicore\interfaces\ICommand
 * @see org\puremvc\php53n\multicore\interfaces\INotification
 *
 */
interface IFacade extends INotifier
{

    /**
     * Register Proxy
     *
     * Register an <b>IProxy</b> with the <b>Model</b>.
     *
     * @param IProxy $proxy The <b>IProxy</b> to be registered with the <b>Model</b>.
     * @return void
     */
    public function registerProxy( IProxy $proxy );

    /**
     * Retreive Proxy
     *
     * Retrieve a previously registered <b>IProxy</b> from the <b>Model</b> by name.
     *
     * @param string $proxyName Name of the <b>IProxy</b> instance to be retrieved.
     * @return IProxy The <b>IProxy</b> previously regisetered by <var>proxyName</var> with the <b>Model</b>.
     */
    public function retrieveProxy( $proxyName );

    /**
     * Remove Proxy
     *
     * Remove a previously registered <b>IProxy</b> instance from the <b>Model</b> by name.
     *
     * @param string $proxyName Name of the <b>IProxy</b> to remove from the <b>Model</b>.
     * @return IProxy The <b>IProxy</b> that was removed from the <b>Model</b>.
     */
    public function removeProxy( $proxyName );

    /**
     * Has Proxy
     *
     * Check if a Proxy is registered for the given <var>proxyName</var>.
     *
     * @param string $proxyName Name of the <b>Proxy</b> to check for.
     * @return bool Boolean: Whether a <b>Proxy</b> is currently registered with the given <var>proxyName</var>.
     */
    public function hasProxy( $proxyName );

    /**
     * Register Command
     *
     * Register an <b>ICommand</b> with the <b>Controller</b>.
     *
     * @param string $noteName Name of the <b>INotification</b>
     * @param object|string $commandClassRef <b>ICommand</b> object to register. Can be an object OR a class name.
     * @return void
     */
    public function registerCommand( $noteName, $commandClassRef );

    /**
     * Remove Command
     *
     * Remove a previously registered <b>ICommand</b> to <b>INotification</b> mapping.
     *
     * @param string $notificationName Name of the <b>INotification</b> to remove the <b>ICommand</b> mapping for.
     */
    public function removeCommand( $notificationName );

    /**
     * Has Command
     *
     * Check if a <b>Command</b> is registered for a given <b>Notification</b>
     *
     * @param string $notificationName Name of the <b>INotification</b> to check for.
     * @return bool Whether a <b>Command</b> is currently registered for the given <var>notificationName</var>.
     */
    public function hasCommand( $notificationName );

    /**
     * Register Mediator
     *
     * Register an <b>IMediator</b> instance with the <b>View</b>.
     *
     * @param IMediator $mediator Reference to the <b>IMediator</b> instance.
     */
    public function registerMediator( IMediator $mediator );

    /**
     * Retreive Mediator
     *
     * Retrieve a previously registered <b>IMediator</b> instance from the <b>View</b>.
     *
     * @param string $mediatorName Name of the <b>IMediator</b> instance to retrieve.
     * @return IMediator The <b>IMediator</b> previously registered with the given <var>mediatorName</var>.
     */
    public function retrieveMediator( $mediatorName );

    /**
     * Remove Mediator
     *
     * Remove a previously registered <b>IMediator</b> instance from the <b>View</b>.
     *
     * @param string $mediatorName Name of the <b>IMediator</b> instance to be removed.
     * @return IMediator The <b>IMediator</b> instance previously registered with the given <var>mediatorName</var>.
     */
    public function removeMediator( $mediatorName );

    /**
     * Has Mediator
     *
     * Check if a <b>IMediator</b> is registered or not.
     *
     * @param string $mediatorName The name of the <b>IMediator</b> to check for.
     * @return bool Boolean: Whether a <b>IMediator</b> is registered with the given <var>mediatorName</var>.
     */
    public function hasMediator( $mediatorName );

    /**
     * Notify <b>Observer</b>s.
     *
     * This method is left public mostly for backward
     * compatibility, and to allow you to send custom
     * notification classes using the facade.
     *
     * Usually you should just call sendNotification
     * and pass the parameters, never having to
     * construct the notification yourself.
     *
     * @param INotification $notification The <b>INotification</b> to have the <b>View</b> notify <b>Observers</b> of.
     * @return void
     */
    public function notifyObservers( INotification $notification );

}
