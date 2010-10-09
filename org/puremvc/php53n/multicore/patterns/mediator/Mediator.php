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
namespace org\puremvc\php53n\multicore\patterns\mediator;

use org\puremvc\php53n\multicore\interfaces\INotification;
use org\puremvc\php53n\multicore\interfaces\IMediator;
use org\puremvc\php53n\multicore\interfaces\INotifier;
use org\puremvc\php53n\multicore\patterns\observer\Notifier;


require_once 'org/puremvc/php53n/multicore/interfaces/INotification.php';
require_once 'org/puremvc/php53n/multicore/interfaces/IMediator.php';
require_once 'org/puremvc/php53n/multicore/interfaces/INotifier.php';
require_once 'org/puremvc/php53n/multicore/patterns/observer/Notifier.php';
	
	
/**
 * A base <b>IMediator</b> implementation.
 *
  * In PureMVC, <b>IMediator</b> implementors assume these responsibilities:
 *
 * - Implement a common method which returns a list of all <b>INotification</b>s
 *   the <b>IMediator</b> has interest in.
 * - Implement a notification callback method.
 * - Implement methods that are called when the IMediator is registered or removed from the View.
 *
 * Additionally, <b>IMediator</b>s typically:
 *
 * - Act as an intermediary between one or more view components such as text boxes or
 *   list controls, maintaining references and coordinating their behavior.
 * - This is often the place where event listeners are added to view
 *   components, and their handlers implemented.
 * - Respond to and generate <b>INotifications</b>, interacting with of
 *   the rest of the PureMVC app.
 *
 * When an <b>IMediator</b> is registered with the <b>IView</b>,
 * the <b>IView</b> will call the <b>IMediator</b>'s
 * <b>listNotificationInterests</b> method. The <b>IMediator</b> will
 * return an <b>Array</b> of <b>INotification</b> names which
 * it wishes to be notified about.
 *
 * The <b>IView</b> will then create an <b>Observer</b> object encapsulating
 * that <b>IMediator</b>'s (<b>handleNotification</b>) method and
 * register it as an Observer for each <b>INotification</b> name
 * returned by <b>listNotificationInterests</b>.
 *
 * @see org\puremvc\php53n\multicore\core\View
 * 
 */
class Mediator extends Notifier implements IMediator, INotifier
{

    /**
     * The default name of the <b>Mediator</b>.
     *
     * Typically, a <b>Mediator</b> will be written to serve
     * one specific control or group controls and so,
     * will not have a need to be dynamically named.
     */
    const NAME = 'Mediator';

    /**
     * the mediator name
     * @var string
     */
    protected $mediatorName;

    /**
     * The view component
     * @var mixed
     */
    protected $viewComponent;

    /**
     * Constructor.
     */
    public function __construct( $mediatorName="", $viewComponent=null )
    {
        $this->mediatorName =  !empty($mediatorName) ? $mediatorName : Mediator::NAME;
        $this->setViewComponent( $viewComponent );
    }

    /**
     * Get Mediator Name
     *
     * Get the <b>IMediator</b> instance name
     *
     * @return string The <b>IMediator</b> instance name.
     */
    public function getMediatorName()
    {
        return $this->mediatorName;
    }

    /**
     * Get View Component
     *
     * Get the <b>IMediator</b>'s view component.
     *
     * @return mixed The view component
     */
    public function getViewComponent()
    {
        return $this->viewComponent;
    }

    /**
     * Set View Component
     *
     * Set the <b>IMediator</b>'s view component.
     *
     * @param mixed $viewComponent The view component.
     * @return void
     */
    public function setViewComponent( $viewComponent )
    {
        $this->viewComponent = $viewComponent;
    }

    /**
     * List Notifications Interests.
     *
     * List <b>INotification</b> interests.
     *
     * @return array An <b>Array</b> of the <b>INotification</b> names this <b>IMediator</b> has an interest in.
     */
    public function listNotificationInterests()
    {
        return array();
    }

    /**
     * Handle Notification
     *
     * Handle an <b>INotification</b>.
     *
     * @param INotification $notification The <b>INotification</b> to be handled.
     * @return void
     */
    public function handleNotification( INotification $notification )
    {
    }

    /**
     * onRegister event
     *
     * Called by the <b>View</b> when the <b>Mediator</b> is registered.
     *
     * @return void
     */
    public function onRegister( )
    {
    }

    /**
     * onRemove event
     *
     * Called by the <b>View</b> when the <b>Mediator</b> is removed.
     *
     * @return void;
     */
    public function onRemove( )
    {
    }

}
