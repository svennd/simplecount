<?php
/**
 * SimpleCount - Admin Control Panel - language file
 *
 * @category  PHP
 * @package   SimpleCount
 * @author    SvennD
 * @copyright 2015 (c) SvennD
 * @license   GNU General Public License v2
 */

/**
 * DO NOT CHANGE
 */
if (defined('IN_PHPBB') === FALSE)
{
   exit;
}

if (empty($lang) || is_array($lang) === FALSE)
{
   $lang = [];
}

$lang = array_merge(
   $lang,
   [
      // module category and section titles
      'ACP_SIMPLECOUNT_TITLE'           => 'SimpleCount',
      'ACP_SIMPLECOUNT_SETTINGS' 		=> 'Algemene Instellingen',
   ]
);
