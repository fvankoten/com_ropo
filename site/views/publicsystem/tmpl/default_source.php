<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>

<tr class="level1"><th colspan="2"><?php echo JText::_('COM_ROPO_MANNER_OF_COLLECTION') ?></th></tr>
 
 <tr class="level2"><th colspan="2"><?php echo JText::_('COM_ROPO_ORIGIN_OF_PERSONAL_DATA_FIELDSET') ?></th></tr>
 <tr>
	<td class="col1"><?php echo JText::_('COM_ROPO_SOURCES_SOURCE_OF_INFORMATION_LABEL') ?></td>
	<td class="col2"><?php echo $this->item->sources_source_of_information ?></td>
</tr>
<tr>
	<td class="col1"><?php echo JText::_('COM_ROPO_SOURCES_SOURCE_MEDIUM_LABEL') ?></td>
	<td class="col2"><?php echo $this->item->sources_source_medium ?></td>
</tr>
 
 <tr class="level2"><th colspan="2"><?php echo JText::_('COM_ROPO_MANNER_OF_COLLECTION_FIELDSET') ?></th></tr>
 <tr>
	<td class="col1">
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->sources_manner_manual == 1) : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_SOURCES_MANNER_MANUAL_LABEL') ?></label>
	</td>
	<td class="col2">	
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->sources_manner_automatic == 1) : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_SOURCES_MANNER_AUTOMATIC_LABEL') ?></label>
	</td>
</tr>