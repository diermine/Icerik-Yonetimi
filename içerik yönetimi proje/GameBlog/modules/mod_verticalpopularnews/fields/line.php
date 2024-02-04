<?php
/**
 * @copyright	@copyright	Copyright (c) 2019 svtemplates.com. All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
// no direct access

defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');
class JFormFieldLine extends JFormField {
	protected $type = 'Line';
	protected function getInput() {
		$text  	= (string) $this->element['text'];
		return '<div class="line_separator'.(($text != '') ? ' hasText' : '').'" title="'. JText::_($this->element['desc']) .'"><span>' . JText::_($text) . '</span></div>';
	}
}

?>
<style media="screen" type="text/css">
.line_separator.hasText{color:#fff !important; font-size:12px;line-height:1px !important;}
				.line_separator{background:#0078ff !important; clear:both;display:block; margin-bottom: 10px; height:2px !important; margin:2px 0 inherit;}
				.line_separator.hasText span{background:#0078ff !important; padding:4px 15px !important;}
				.text-limit{text-align:right !important;}
</style>