<?php
/**
 * SimpleCount - Event Listener
 *
 * @category  PHP
 * @package   SimpleCount
 * @author    SvennD
 * @copyright 2015 (c) SvennD
 * @license   GNU General Public License v2
 */
 
namespace svennd\simplecount\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Event listener
 */
class listener implements EventSubscriberInterface
{

	/** @var svennd\simplecount\core\simplecount_functions */
	protected $simplecount_functions;

	/**
	 * Constructor
	 *
	 * @param \svennd\simplecount\core\simplecount_functions %simplecount_functions functions
	 *
	 * @access public
	 */
	public function __construct(\svennd\simplecount\core\simplecount_functions $simplecount_functions)
	{
		$this->simplecount_functions = $simplecount_functions;
	}

	/**
	 * Bind functions to event listeners
	 *
	 * @return array
	 * @static
	 * @access public
	 */
	static public function getSubscribedEvents()
	{
		return [
			'core.display_forums_modify_template_vars' 	=> 'modify_forum_row',
			'core.index_modify_page_title' 				=> 'modify_forum_stats',
			'core.viewforum_modify_topicrow' 			=> 'modify_viewforum_row',
		];
	}

	/**
	 * Modify category template vars to replace postcount
	 *
	 * @param object $event The event object
	 *
	 * @return void
	 * @access public
	 */
	public function modify_forum_row($event)
	{
		$block         = $event['forum_row'] ? 'forum_row' : 'tpl_ary';
		$event[$block] = $this->simplecount_functions->set_simple_count($event['row'], $event[$block]);
	}
	
	/**
	 * Modify stats down in index
	 *
	 * @param object $event The event object
	 *
	 * @return void
	 * @access public
	 */
	public function modify_forum_stats($event)
	{
		$block         = $event['totals'] ? 'totals' : 'tpl_ary';
		$event[$block] = $this->simplecount_functions->set_simple_count_stats($event['totals'], $event[$block]);
	}
	
	/**
	 * Modify viewforum
	 *
	 * @param object $event The event object
	 *
	 * @return void
	 * @access public
	 */
	public function modify_viewforum_row($event)
	{
		$block         = $event['topic_row'] ? 'topic_row' : 'tpl_ary';
		$event[$block] = $this->simplecount_functions->set_simple_count_viewforum($event['topic_row'], $event[$block]);
	}
}
