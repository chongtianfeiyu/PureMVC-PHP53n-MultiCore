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
namespace org\puremvc\php53n\multicore\patterns\command;

use org\puremvc\php53n\multicore\interfaces\ICommand;
use org\puremvc\php53n\multicore\interfaces\INotification;
use org\puremvc\php53n\multicore\interfaces\INotifier;
use org\puremvc\php53n\multicore\patterns\observer\Notifier;

require_once 'org/puremvc/php53n/multicore/interfaces/ICommand.php';
require_once 'org/puremvc/php53n/multicore/interfaces/INotification.php';
require_once 'org/puremvc/php53n/multicore/interfaces/INotifier.php';
require_once 'org/puremvc/php53n/multicore/patterns/observer/Notifier.php';
	
	
/**
 * A base <b>ICommand</b> implementation that executes other <b>ICommand</b>s.
 *
 * A <b>MacroCommand</b> maintains an list of
 * <b>ICommand</b> Class references called <i>SubCommands</i>.
 *
 * When <b>execute</b> is called, the <b>MacroCommand</b>
 * instantiates and calls <b>execute</b> on each of its <i>SubCommands</i> turn.
 * Each <i>SubCommand</i> will be passed a reference to the original
 * <b>INotification</b> that was passed to the <b>MacroCommand</b>'s
 * <b>execute</b> method.
 *
 * Unlike <b>SimpleCommand</b>, your subclass
 * should not override <b>execute</b>, but instead, should
 * override the <b>initializeMacroCommand</b> method,
 * calling <b>addSubCommand</b> once for each <i>SubCommand</i>
 * to be executed.
 *
 * @see org\puremvc\php53n\multicore\core\Controller
 * @see org\puremvc\php53n\multicore\patterns\observer\Notification
 * @see org\puremvc\php53n\multicore\patterns\command\SimpleCommand
 * 
 */
class MacroCommand extends Notifier implements ICommand, INotifier
{

    private $subCommands;

    /**
     * Constructor.
     *
     * Your subclass MUST define a constructor, be
     * sure to call <b>parent::__construct();</b> to
     * have PHP instanciate the whole parent/child chain.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->subCommands = array();
        $this->initializeMacroCommand();
    }

    /**
     * Initialize the <b>MacroCommand</b>.
     *
     * In your subclass, override this method to
     * initialize the <b>MacroCommand</b>'s <i>SubCommand</i>
     * list with <b>ICommand</b> class references like
     * this:
     *
     * <code>
     *      // Initialize MyMacroCommand
     *      protected function initializeMacroCommand( ) : void
     *      {
     *          $this->addSubCommand( 'FirstCommand' );
     *          $this->addSubCommand( 'SecondCommand' );
     *          $this->addSubCommand( 'ThirdCommand' );
     *      }
     * </code>
     *
     * Note that <i>SubCommand</i>s may be any <b>ICommand</b> implementor,
     * <b>MacroCommand</b>s or <b>SimpleCommands</b> are both acceptable.
     *
     * @return void
     */
    protected function initializeMacroCommand()
    {
    }

    /**
     * Add a <i>SubCommand</i>.
     *
     * The <i>SubCommands</i> will be called in First In/First Out (FIFO)
     * order.
     *
     * @param string $commandClassRef The <b>Class name</b> of the <b>ICommand</b>.
     * @return void
     */
    protected function addSubCommand( $commandClassRef )
    {
        array_push($this->subCommands,$commandClassRef);
    }

    /**
     * Execute this <b>MacroCommand</b>'s <i>SubCommands</i>.
     *
     * The <i>SubCommands</i> will be called in First In/First Out (FIFO)
     * order.
     *
     * @param INotification $notification The <b>INotification</b> object to be passsed to each <i>SubCommand</i>.
     * @return void
     */
    public final function execute( INotification $notification )
    {
        while ( count($this->subCommands) > 0)
        {
            $commandClassName = array_shift( $this->subCommands );
            $commandInstance = new $commandClassName();
            $commandInstance->initializeNotifier( $this->multitonKey );
            $commandInstance->execute( $notification );
        }
    }

}
