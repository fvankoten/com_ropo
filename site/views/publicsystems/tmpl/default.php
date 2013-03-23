<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');

// load tooltip behavior
JHtml::_('behavior.tooltip');
?>
<h1><?php echo JText::_("COM_ROPO_SYSTEMS")?></h1>
<form action="<?php echo JRoute::_('index.php?option=com_ropo'); ?>" method="post" id="systemsForm" name="systemsForm">
	<table>
		<thead><?php echo $this->loadTemplate('head');?></thead>
		<tfoot><?php echo $this->loadTemplate('foot');?></tfoot>
		<tbody><?php echo $this->loadTemplate('body');?></tbody>
	</table>
	<div>
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="option" value="com_ropo" />
        <input type="hidden" name="boxchecked" value="0" />
        <?php echo JHtml::_('form.token'); ?>
	</div>
</form>
<div class="clr"></div>