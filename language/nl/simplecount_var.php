<?php
/**
 * SimpleCount - LANGUAGE FILE
 *
 * This file contains the (NL) language definitions for
 * the labels on the index page
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
		'ACP_SIMPLECOUNT_GENERAL_SETTINGS'	=> 'Algemene instellingen',
		'ACP_SIMPLECOUNT_EXPLAIN'           => 'Deze extensie maakt het mogelijk om een simpelere weergave van nummers te tonen;',
		'ACP_SIMPLECOUNT_DISPLAY_SETTINGS'  => 'Instellingen',
		'ACP_SIMPLECOUNT_ON_OFF'            => 'Zet extensie',
		'ACP_SIMPLECOUNT_TOPICS'            => 'Zet eenvoudige telling voor aantal topics',
		'ACP_SIMPLECOUNT_POSTS'             => 'Zet eenvoudige telling voor aantal posts',
		'ACP_SIMPLECOUNT_CLICKS'            => 'Zet eenvoudige telling voor aantal clicks',
		'ACP_SIMPLCOUNT_VIEWFORUM_VIEWS'    => 'Zet eenvoudige telling voor aantal views in viewforum',
		'ACP_SIMPLECOUNT_INDEX_OPTION'		=> 'Geavanceerde index opties',
		'ACP_SIMPLECOUNT_INDEX_WARNING'		=> 'Waarschuwing: Deze opties zullen enkel werken wanneer er een update aan de code van index.php is gedaan, indien dit niet gebeurt is; zullen deze opties niet functioneren.',
		'ACP_SIMPLECOUNT_INDEX_POSTS'		=> 'Zet eenvoudige telling voor totaal aantal posts',
		'ACP_SIMPLECOUNT_INDEX_USERS'		=> 'Zet eenvoudige telling voor totaal users posts',
		'ACP_SIMPLECOUNT_INDEX_TOPICS'		=> 'Zet eenvoudige telling voor totaal topics posts',
		'ACP_SIMPLECOUNT_FORUM_ROW'			=> 'Forum lijst Instellingen',
		
		# overwriting default language definitions
		# changed from %d to %s
		'SIMPLECOUNT_TOTAL_POSTS_COUNT'	=> array(
									2	=> 'Totaal berichten <strong>%s</strong>',
									),
		'SIMPLECOUNT_TOTAL_TOPICS'		=> array(
									2	=> 'Totaal onderwerpen <strong>%s</strong>',
								),
		'SIMPLECOUNT_TOTAL_USERS'		=> array(
									2	=> 'Totaal leden <strong>%s</strong>',
								),
	]
);
