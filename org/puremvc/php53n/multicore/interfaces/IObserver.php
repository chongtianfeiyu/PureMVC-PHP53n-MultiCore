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

//require_once 'org/puremvc/php53n/multicore/interfaces/INotification.php';

/**
 * The interface definition for a PureMVC Observer.
 *
 * In PureMVC, <b>IObserver</b> implementors assume these responsibilities:
 *
 * - Encapsulate the notification (callback) method of the interested object.
 * - Encapsulate the notification context (this) of the interested object.
 * - Provide methods for setting the interested object' notification method and context.
 * - Provide a method for notifying the interested object.
 *
 * PureMVC does not rely upon underlying event
 * models and PHP does not have an inherent
 * event model.
 *
 * The Observer Pattern as implemented within
 * PureMVC exists to support event driven communication
 * between the application and the actors of the
 * MVC triad.
 *
 * An Observer is an object that encapsulates information
 * about an interested object with a notification method that
 * should be called when an </b>INotification</b> is broadcast.
 * The Observer then acts as a proxy for notifying the interested object.
 *
 * Observers can receive <b>Notification</b>s by having their
 * <b>notifyObserver</b> method invoked, passing
 * in an object implementing the <b>INotification</b> interface, such
 * as a subclass of <b>Notification</b>.
 *
 * @see org\puremvc\php53n\multicore\interfaces\IView
 * @see org\puremvc\php53n\multicore\interfaces\INotification
 *
 */
interface IObserver
{
    /**
     * Set the notification method.
     *
     * The notification method should take one parameter of type <b>INotification</b>.
     *
     * @param string $notifyMethod The notification (callback) method name of the interested object.
     * @return void
     */
    public function setNotifyMethod( $notifyMethod );

    /**
     * Set the notification context.
     *
     * @param mixed $notifyContext The notification context ($this) of the interested object.
     * @return void
     */
    public function setNotifyContext( $notifyContext );

    /**
     * Notify the interested object.
     *
     * @param INotification $notification the <b>INotification</b> to pass to the interested object's notification method
     * @return void
     */
    public function notifyObserver( $notification );

    /**
     * Compare the given object to the notificaiton context object.
     *
     * @param object $object the object to compare.
     * @return bool Boolean indicating if the notification context and the object are the same.
     */
    public function compareNotifyContext( $object );
}
