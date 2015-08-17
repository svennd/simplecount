<?php
/**
 * SimpleCount - ACP panel
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
 
namespace svennd\simplecount\acp;

/**
 * Module Information
 */
class simplecount_info
{
	/**
	 * ACP settings module
	 *
	 * @return array
	 */
	public function module()
	{
		return array(
			'filename' 	=> '\svennd\simplecount\acp\simplecount_module',
			'title'    	=> 'ACP_SIMPLECOUNT_TITLE',
			'version'	=> '1.0.0',
			'modes'    => array(
				'general'      => array(
					'title' => 'ACP_SIMPLECOUNT_SETTINGS',
					'auth'  => 'ext_svennd/simplecount && acl_a_board',
					'cat'   => array('ACP_SIMPLECOUNT_TITLE')
				),
			),
		);
	}

}
