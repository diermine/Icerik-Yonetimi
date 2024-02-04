<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_newsbloglayout
 *
 * @copyright   (C) 2021 svtemplates.com
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;
use Joomla\Module\ArticlesTop\Site\Helper\ArticlesTopHelper;

$list = ArticlesTopHelper::getList($params);

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');

require ModuleHelper::getLayoutPath('mod_verticalpopularnews', $params->get('layout', 'default'));
