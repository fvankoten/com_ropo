<?php
/**
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

require_once JPATH_SITE.'/components/com_content/router.php';

/**
 * ROPO Search plugin
 */
class plgSearchRopo extends JPlugin
{
	/**
	 * Constructor
	 *
	 * @param       object  $subject The object to observe
	 * @param       array   $config  An array that holds the plugin configuration
	 */
	public function __construct(& $subject, $config)
	{
		parent::__construct($subject, $config);
		$this->loadLanguage();
	}
	
	/**
	 * @return array An array of search areas
	 */
	function onContentSearchAreas()
	{
		static $areas = array(
				'ropo' => 'PLG_SEARCH_ROPO_PROCESSING_SYSTEMS'
		);
		return $areas;
	}

	/**
	 * Content Search method
	 * The sql must return the following fields that are used in a common display
	 * routine: href, title, section, created, text, browsernav
	 * @param string Target search string
	 * @param string mathcing option, exact|any|all
	 * @param string ordering option, newest|oldest|popular|alpha|category
	 * @param mixed An array if the search it to be restricted to areas, null if search all
	 */
	function onContentSearch($text, $phrase='', $ordering='', $areas=null)
	{
		$db		= JFactory::getDbo();
		$app	= JFactory::getApplication();
		$user	= JFactory::getUser();
		$groups	= implode(',', $user->getAuthorisedViewLevels());
		$tag = JFactory::getLanguage()->getTag();

		require_once JPATH_SITE . '/components/com_content/helpers/route.php';
		require_once JPATH_ADMINISTRATOR . '/components/com_search/helpers/search.php';

		$searchText = $text;
		if (is_array($areas)) {
			if (!array_intersect($areas, array_keys($this->onContentSearchAreas()))) {
				return array();
			}
		}

		$sContent		= $this->params->get('search_content',		1);
		$sAll			= $this->params->get('search_all',			1);
		$limit			= $this->params->def('search_limit',		50);
		$state			= array();
		if ($sContent) {
			$state[]=1;
		}
		if ($sAll) {
			$state[]=2;
		}

		$nullDate		= $db->getNullDate();
		$date = JFactory::getDate();
		$now = $date->toSql();

		$text = trim($text);
		if ($text == '') {
			return array();
		}

		$wheres = array();
		switch ($phrase) {
			case 'exact':
				$text		= $db->Quote('%'.$db->escape($text, true).'%', false);
				$wheres2	= array();
				$wheres2[]	= 's.title LIKE '.$text;
				$wheres2[]	= 's.purpose LIKE '.$text;
				$wheres2[]	= 's.identificationdata_controller_name LIKE '.$text;
				$wheres2[]	= 's.identificationdata_pocessor_name LIKE '.$text;
				$wheres2[]	= 's.identificationdata_place_name LIKE '.$text;
				$wheres2[]	= 's.purposes_purpose LIKE '.$text;
				$where		= '(' . implode(') OR (', $wheres2) . ')';
				break;

			case 'all':
			case 'any':
			default:
				$words = explode(' ', $text);
				$wheres = array();
				foreach ($words as $word) {
					$word		= $db->Quote('%'.$db->escape($word, true).'%', false);
					$wheres2	= array();
					$wheres2[]	= 's.title LIKE '.$word;
					$wheres2[]	= 's.purpose LIKE '.$word;
					$wheres2[]	= 's.identificationdata_controller_name LIKE '.$word;
					$wheres2[]	= 's.identificationdata_pocessor_name LIKE '.$word;
					$wheres2[]	= 's.identificationdata_place_name LIKE '.$word;
					$wheres2[]	= 's.purposes_purpose LIKE '.$word;
					$wheres[]	= implode(' OR ', $wheres2);
				}
				$where = '(' . implode(($phrase == 'all' ? ') AND (' : ') OR ('), $wheres) . ')';
				break;
		}
		
		if ($sAll == '0') {
			$approved = $db->quote('APPROVED', true);
			$where .= ' AND (s.state = ' . $approved . ')';
		}

		$order = '';
		switch ($ordering) {
			case 'oldest':
				$order = 's.created_time ASC';
				break;

			case 'newest':
				$order = 's.modified_time DESC';
				break;
				
			case 'popular':
			case 'alpha':
			case 'category':
			default:
				$order = 's.title ASC';
				break;
		}

		$rowsFilterd = array();
		$regnos = array();
		$query	= $db->getQuery(true);
		$plgName = JText::_('PLG_SEARCH_ROPO_PROCESSING_SYSTEMS');

		// search articles
		if (!empty($state))
		{
			$query->select('s.title AS title, s.created_time AS created, s.purpose AS text, s.id AS id, s.regno AS regno, s.version AS version');
			$query->from('#__ropo_systems AS s');
			$query->where($where);
			$query->order($order);
			
			$db->setQuery($query, 0, $limit);
			$rows = $db->loadObjectList('id');
			
			// filter older versions
			foreach($rows as $key => $row) {
				$rows[$key]->href = 'index.php?option=com_ropo&view=publicsystem&id='.$row->id;
				$rows[$key]->section = $plgName;
				$rows[$key]->browsernav = '2';
				
				if (isset($regnos[$row->regno]) && ($regnos[$row->regno] > $row->version)) {
					// skip
				} else {
					$rowsFilterd[$key] = $row;
					$regnos[$row->regno] = $row->version;
				}
			}
		}

		return $rowsFilterd;
	}
}
