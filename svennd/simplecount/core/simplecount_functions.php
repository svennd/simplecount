<?php
/**
 * SimpleCount
 *
 * Inject into the native phpBB forumrow.topics and forumrow.posts (taking care of link forums)
 * the simplified version of the text
 *
 * @category  PHP
 * @package   SimpleCount
 * @author    SvennD
 * @copyright 2015 (c) SvennD
 * @license   GNU General Public License v2
 */
 
namespace svennd\simplecount\core;

/**
 * Class simplecount_functions
 *
 * @package svennd\simplecount\core
 */
class simplecount_functions
{

	/** @var \phpbb\config\config */
	public $config;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;
	
	/**
	 * Constructor
	 *
	 * @param \phpbb\config\config              $config
	 * @param \phpbb\db\driver\driver_interface $db
	 * @param \phpbb\template\template          $template
	 * @param \phpbb\user                       $user
	 *
	 * @access public
	 */
	public function __construct(\phpbb\config\config $config, \phpbb\db\driver\driver_interface $db, \phpbb\template\template $template, \phpbb\user $user)
	{
		$this->config   = $config;
		$this->db       = $db;
		$this->template = $template;
		$this->user     = $user;
    $this->user->add_lang_ext('svennd/simplecount', 'simplecount_var');
	}

	/**
	 * the simple function
	 *
	 * @param int $int  number of posts/topic/clicks
	 *
	 * @return string
	 * @access public
	 */
  public function make_simple($int)
  {
    if ($int >= (1000*1000))
    {
      return $this->user->lang('MILLION', (int) floor($int/(1000*1000)));
    }
    else if ($int >= 1000)
    {
      return $this->user->lang('KILO', (int) floor($int/1000));
    }
    else
    {
      return $int;
    }
  }
  
	/**
	 * Assign Simplecount variables to the index
	 *
	 *
	 * @param array $row   Row data
	 * @param array $block Template vars array
	 *
	 * @return array Template vars array
	 * @access public
	 */
	public function set_simple_count($row, $block)
	{
	  # if the extension is switched off
	  if ($this->config['sc_active'] == false) { return $block; }
	   
	  # check if its post or click to determ the correct var to overwrite
	  $l_post_click_count = ($row['forum_type'] == FORUM_LINK) ? 'CLICKS' : 'POSTS';
		
		# its POSTS || CLICKS
		if (
		    ($row['forum_type'] != FORUM_LINK && $this->config['sc_posts'] == true) ||
		    (($row['forum_flags'] & FORUM_FLAG_LINK_TRACK) && $this->config['sc_clicks'] == true)
		    )
		{
		  $post_click_count = $this->make_simple($row['forum_posts']);
		}
		else
		{
		  $post_click_count = $row['forum_posts'];
		}
		
		# overwrite the original values
		$block = array_merge(
			$block,
			[
				'TOPICS' => (($this->config['sc_topics']) ? $this->make_simple($row['forum_topics']) : $row['forum_topics']),
				$l_post_click_count => $post_click_count,
			]
		);

		return $block;
	}

	/**
	 * Assign Simplecount variables to the viewforum
	 *
	 *
	 * @param array $topic_row   topic_row data
	 * @param array $block Template vars array
	 *
	 * @return array Template vars array
	 * @access public
	 */
	public function set_simple_count_viewforum($topic_row, $block)
	{
		# if the extension is switched off
		if ($this->config['sc_active'] == false) { return $block; }
		
		$block = array_merge(
			$block,
			[
				'VIEWS' 	=> (($this->config['sc_viewforum_views']) ?  $this->make_simple($topic_row['VIEWS']) : $topic_row['VIEWS']),
			]
		);
		return $block;
	}
	
	/**
	 * Assign Simplecount variables to the index
	 *
	 *
	 * @param array $totals array with totals of users, posts and topics
	 * @param array $block Template vars array
	 *
	 * @return array Template vars array
	 * @access public
	 */
	public function set_simple_count_stats($totals, $block)
	{
		# if the extension is switched off
		if ($this->config['sc_active'] == false) { return $block; }

		# overwrite the original values
		$block = 
			[
				'TOTAL_POSTS'	=> (($this->config['sc_index_posts']) ?
										$this->user->lang('SIMPLECOUNT_TOTAL_POSTS_COUNT', $this->make_simple((int)$this->config['num_posts']))
										:
										$this->user->lang('TOTAL_POSTS_COUNT', (int) $this->config['num_posts'])),
				'TOTAL_TOPICS'	=> (($this->config['sc_index_topics']) ?
										$this->user->lang('SIMPLECOUNT_TOTAL_TOPICS', $this->make_simple((int)$this->config['num_topics']))
										:
										$this->user->lang('TOTAL_TOPICS', (int) $this->config['num_topics'])),
				'TOTAL_USERS'	=> (($this->config['sc_index_users']) ? 
										$this->user->lang('SIMPLECOUNT_TOTAL_USERS', $this->make_simple((int)$this->config['num_users']))
										:
										$this->user->lang('TOTAL_USERS', (int) $this->config['num_users']))
			];
		return $block;
	}
}





