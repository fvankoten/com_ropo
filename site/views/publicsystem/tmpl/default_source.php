<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>

<tr><th colspan="2"><?php echo JText::_('COM_ROPO_MANNER_OF_COLLECTION') ?></th></tr>
 
 <tr><th colspan="2"><?php echo JText::_('COM_ROPO_ORIGIN_OF_PERSONAL_DATA_FIELDSET') ?></th></tr>
 <tr>
	<td><?php echo JText::_('COM_ROPO_SOURCES_SOURCE_OF_INFORMATION_LABEL') ?></td>
	<td><?php echo $this->item->sources_source_of_information ?></td>
</tr>
<tr>
	<td><?php echo JText::_('COM_ROPO_SOURCES_SOURCE_MEDIUM_LABEL') ?></td>
	<td><?php echo $this->item->sources_source_medium ?></td>
</tr>
 
 <tr><th colspan="2"><?php echo JText::_('COM_ROPO_MANNER_OF_COLLECTION_FIELDSET') ?></th></tr>
 <tr>
	<td>
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->sources_manner_manual == 1) : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_SOURCES_MANNER_MANUAL_LABEL') ?></label>
	</td>
	<td>	
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->sources_manner_automatic == 1) : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_SOURCES_MANNER_AUTOMATIC_LABEL') ?></label>
	</td>
</tr>