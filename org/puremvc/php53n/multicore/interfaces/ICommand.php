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


/**
 * The interface definition for a PureMVC Command.
 *
 * @see org\puremvc\php53n\multicore\interfaces\INotifier
 * @see org\puremvc\php53n\multicore\interfaces\INotification
 *
 */
interface ICommand extends INotifier
{
    /**
     * Execute Command
     *
     * Execute the <kbd>ICommand</kbd>'s logic to handle a given <kbd>INotification</kbd>.
     *
     * @param INotification $notification The <b>INotification</b> to handle.
     * @return void
     */
    public function execute( INotification $notification );

}
