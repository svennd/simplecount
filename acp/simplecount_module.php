<?php
/**
 * SimpleCount - Admin Control Panel - General Settings Module
 *
 * @category  PHP
 * @package   SimpleCount
 * @author    SvennD
 * @copyright 2015 (c) SvennD
 * @license   GNU General Public License v2
 */
 
namespace svennd\simplecount\acp;

/**
 * Class simplecount
 *
 * @property string tpl_name
 * @property mixed  page_title
 */
class simplecount_module
{

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var string */
	protected $phpbb_root_path;

	/** @var \phpbb\request\request_interface */
	protected $request;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var $u_action */
	public $u_action;

	/**
	 * Main ACP module
	 *
	 * @param integer $id
	 * @param string  $mode
	 *
	 * @access public
	 * @return void
	 */
	public function main($id, $mode)
	{
		$this->config          = $GLOBALS['config'];
		$this->user            = $GLOBALS['user'];
		$this->phpbb_root_path = $GLOBALS['phpbb_root_path'];
		$this->request         = $GLOBALS['request'];
		$this->template        = $GLOBALS['template'];

		$this->user->add_lang('acp/common');
		$this->user->add_lang_ext('svennd/simplecount', 'simplecount_var');

		// initialize error container
		$error = '';

		// use switch for future module expansion cases
		switch ($mode)
		{
			case 'general':
				$this->tpl_name   = 'acp_sc_general';
				$this->page_title = $this->user->lang('ACP_SIMPLECOUNT_GENERAL_SETTINGS');
				$form_key         = 'acp_sc_general';

				add_form_key($form_key);

				if (empty($error) && $this->request->is_set_post('submit'))
				{

					if (check_form_key($form_key) === FALSE)
					{
						trigger_error($this->user->lang('FORM_INVALID').adm_back_link($this->u_action), E_USER_WARNING);
					}

					$this->config->set('sc_active', $this->request->variable('sc_active', 1));
					$this->config->set('sc_posts', $this->request->variable('sc_posts', 1));
					$this->config->set('sc_topics', $this->request->variable('sc_topics', 1));
					$this->config->set('sc_clicks', $this->request->variable('sc_clicks', 1));
					$this->config->set('sc_viewforum_views', $this->request->variable('sc_viewforum_views', 1));
					$this->config->set('sc_index_posts', $this->request->variable('sc_index_posts', 0));
					$this->config->set('sc_index_topics', $this->request->variable('sc_index_topics', 0));
					$this->config->set('sc_index_users', $this->request->variable('sc_index_users', 0));

					trigger_error($this->user->lang('CONFIG_UPDATED').adm_back_link($this->u_action));

				}//end if

				// set the template variables
				$this->template->assign_vars(
					[
						'SC_ACTIVE'           => (!empty($this->config['sc_active'])) ? $this->config['sc_active'] : 0,
						'SC_POSTS'            => (!empty($this->config['sc_posts'])) ? $this->config['sc_posts'] : 0,
						'SC_TOPICS'           => (!empty($this->config['sc_topics'])) ? $this->config['sc_topics'] : 0,
						'SC_CLICKS'           => (!empty($this->config['sc_clicks'])) ? $this->config['sc_clicks'] : 0,
						'SC_VIEWFORUM_VIEWS'   => (!empty($this->config['sc_viewforum_views'])) ? $this->config['sc_viewforum_views'] : 0,
						'SC_INDEX_POSTS'      => (!empty($this->config['sc_index_posts'])) ? $this->config['sc_index_posts'] : 0,
						'SC_INDEX_TOPICS'     => (!empty($this->config['sc_index_topics'])) ? $this->config['sc_index_topics'] : 0,
						'SC_INDEX_USERS'      => (!empty($this->config['sc_index_users'])) ? $this->config['sc_index_users'] : 0,
						'U_ACTION'            => $this->u_action,
					]
				);
				break;

			default:
				// obligatory default comment
				break;
		}//end switch

	}

}
