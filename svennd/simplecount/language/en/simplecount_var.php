<?php
/**
 * SimpleCount - LANGUAGE FILE
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
		'KILO'      => '%d K',
		'MILLION'   => '%d M',
		
		# acp definitions
		'ACP_SIMPLECOUNT_GENERAL_SETTINGS'	=> 'General settings',
		'ACP_SIMPLECOUNT_EXPLAIN'           => 'This extension puts the numbers in a more simple format.',
		'ACP_SIMPLECOUNT_DISPLAY_SETTINGS'  => 'Settings',
		'ACP_SIMPLECOUNT_ON_OFF'            => 'Put extension',
		'ACP_SIMPLECOUNT_TOPICS'            => 'Put SimpleCount for topics',
		'ACP_SIMPLECOUNT_POSTS'             => 'Put SimpleCount for posts',
		'ACP_SIMPLECOUNT_CLICKS'            => 'Put SimpleCount for clicks',
		'ACP_SIMPLCOUNT_VIEWFORUM_VIEWS'    => 'Put SimpleCount for views in viewforum',
		'ACP_SIMPLECOUNT_INDEX_OPTION'		=> 'Advanced index options',
		'ACP_SIMPLECOUNT_INDEX_WARNING'		=> 'Warning: These options will only work when a hack is applied on index.php; Withouth this hack it will not work.',
		'ACP_SIMPLECOUNT_INDEX_POSTS'		=> 'Put SimpleCount for total amount of posts',
		'ACP_SIMPLECOUNT_INDEX_USERS'		=> 'Put SimpleCount for total amount of users',
		'ACP_SIMPLECOUNT_INDEX_TOPICS'		=> 'Put SimpleCount for total amount of topics',
		'ACP_SIMPLECOUNT_FORUM_ROW'			=> 'Forum row',
		
		# overwriting default language definitions
		# changed from %d to %s
		'SIMPLECOUNT_TOTAL_POSTS_COUNT'	=> array(
									2	=> 'Total posts <strong>%s</strong>',
									),
		'SIMPLECOUNT_TOTAL_TOPICS'		=> array(
									2	=> 'Total topics <strong>%s</strong>',
								),
		'SIMPLECOUNT_TOTAL_USERS'		=> array(
									2	=> 'Total members <strong>%s</strong>',
								),
	]
);
