<?php
 /**
 * SimpleCount
 *
 *
 * @category  PHP
 * @package   SimpleCount
 * @author    SvennD
 * @copyright 2015 (c) SvennD
 * @license   GNU General Public License v2
 */
 
 
namespace svennd\simplecount\migrations\v1_0_0;

/**
 * Class initial
 *
 * @package svennd\simplecount\migrations
 */
class initial extends \phpbb\db\migration\migration
{

	/**
	 * Initial config settings & ACP module
	 *
	 * @return array
	 */
	public function update_data()
	{
		return [
			['config.add', ['sc_active', 1]],
			['config.add', ['sc_version', '1.0.0']],
			['config.add', ['sc_posts', 1]],
			['config.add', ['sc_topics', 1]],
			['config.add', ['sc_clicks', 1]],
			['config.add', ['sc_viewforum_views', 1]],
			['config.add', ['sc_index_posts', 0]],
			['config.add', ['sc_index_topics', 0]],
			['config.add', ['sc_index_users', 0]],
			['module.add', ['acp', 'ACP_CAT_DOT_MODS', 'ACP_SIMPLECOUNT_TITLE']],
			['module.add', ['acp', 'ACP_SIMPLECOUNT_TITLE', ['module_basename' => '\svennd\simplecount\acp\simplecount_module', 'modes' => ['general'],],]],
		];
	}

	/**
	 * Remove FrontPage config data & module
	 *
	 * @return array
	 */
	public function revert_data()
	{
		return [
			['config.remove', ['sc_active']],
			['config.remove', ['sc_version']],
			['config.remove', ['sc_posts']],
			['config.remove', ['sc_topics']],
			['config.remove', ['sc_clicks']],
			['config.remove', ['sc_viewforum_views']],
			['config.remove', ['sc_index_posts']],
			['config.remove', ['sc_index_topics']],
			['config.remove', ['sc_index_users']],		
			['module.remove', ['acp', 'ACP_CAT_DOT_MODS', 'ACP_SIMPLECOUNT_TITLE']],
			['module.remove', ['acp', 'ACP_SIMPLECOUNT_TITLE', ['module_basename' => '\svennd\simplecount\acp\simplecount_module', 'modes' => ['general'],],]],
		
		];
	}
}
