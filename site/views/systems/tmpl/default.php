<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');

// load tooltip behavior
JHtml::_('behavior.tooltip');

?>
<form action="<?php echo JRoute::_('index.php?option=com_ropo'); ?>" method="post" id="adminForm" name="adminForm">
	<div>
		<?php echo $this->getToolbar(); ?>
	</div>
	<div class="clr"></div>
	
	<h1><?php echo JText::_("COM_ROPO_SYSTEMS")?></h1>
	
	<div style="margin: 1em 0;">
		<select name="filter_version" onchange="this.form.submit()">
			<?php echo JHtml::_('select.options', $this->f_versions, 'value', 'text', $this->state->get('filter.version'));?>
		</select>
	</div>
	
	<table style='table-layout: auto; width: 100%;'>
		<thead><?php echo $this->loadTemplate('head');?></thead>
		<tfoot><?php echo $this->loadTemplate('foot');?></tfoot>
		<tbody><?php echo $this->loadTemplate('body');?></tbody>
	</table>
	<div>
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="option" value="com_ropo" />
        <input type="hidden" name="boxchecked" value="0" />
        <input type="hidden" name="filter_order" value="<?php echo $this->sortColumn; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $this->sortDirection; ?>" />
        <?php echo JHtml::_('form.token'); ?>
	</div>
</form>
<div class="clr"></div>