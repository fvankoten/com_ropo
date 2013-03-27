<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>

<tr><th colspan="2"><?php echo JText::_('COM_ROPO_IDENTIFICATIONDATA') ?></th></tr>

<tr><th colspan="2"><?php echo JText::_('COM_ROPO_IDENTIFICATIONDATA_FIELDSET_TYPE') ?></th></tr>
<tr>
	<td colspan="2">
		<input
			<?php if ($this->item->identificationdata_type_of_controller == 'NATURAL') : ?>
			checked="checked"
			<?php endif; ?>
			type="radio" readonly="readonly">
		<label><?php echo JText::_('COM_ROPO_IDENTIFICATIONDATA_CONTROLLER_TYPE_NATURAL') ?></label>
		&nbsp;&nbsp;&nbsp;
		<input 
			<?php if ($this->item->identificationdata_type_of_controller == 'LEGAL') : ?>
			checked="checked"
			<?php endif; ?>
			type="radio" readonly="readonly">
		<label><?php echo JText::_('COM_ROPO_IDENTIFICATIONDATA_CONTROLLER_TYPE_LEGAL') ?></label>
	</td>
</tr>

<tr><th colspan="2"><?php echo JText::_('COM_ROPO_IDENTIFICATIONDATA_FIELDSET_CONTROLLER') ?></th></tr>
<tr>
	<td><?php echo JText::_('COM_ROPO_IDENTIFICATIONDATA_CONTROLLER_NAME_LABEL') ?></td>
	<td><?php echo $this->item->identificationdata_controller_name ?></td>
</tr>
<tr>
	<td><?php echo JText::_('COM_ROPO_IDENTIFICATIONDATA_CONTROLLER_ADDRESS1_LABEL') ?></td>
	<td><?php echo $this->item->identificationdata_controller_address1 ?></td>
</tr>
<tr>
	<td>
		<?php echo JText::_('COM_ROPO_IDENTIFICATIONDATA_CONTROLLER_POSTALCODE_LABEL') ?>&nbsp;
		<?php echo JText::_('COM_ROPO_IDENTIFICATIONDATA_CONTROLLER_CITY_LABEL') ?>
	</td>
	<td>
		<?php echo $this->item->identificationdata_controller_postalcode ?>&nbsp;
		<?php echo $this->item->identificationdata_controller_city ?>
	</td>
</tr>
<tr>
	<td><?php echo JText::_('COM_ROPO_IDENTIFICATIONDATA_CONTROLLER_REGNO_LABEL') ?></td>
	<td><?php echo $this->item->identificationdata_controller_regno ?></td>
</tr>
<tr>
	<td><?php echo JText::_('COM_ROPO_IDENTIFICATIONDATA_CONTROLLLER_TELEPHONE_LABEL') ?></td>
	<td><?php echo $this->item->identificationdata_controller_telephone ?></td>
</tr>
<tr>
	<td><?php echo JText::_('COM_ROPO_IDENTIFICATIONDATA_CONTROLLER_TELEFAX_LABEL') ?></td>
	<td><?php echo $this->item->identificationdata_controller_telefax ?></td>
</tr>
<tr>
	<td><?php echo JText::_('COM_ROPO_IDENTIFICATIONDATA_CONTROLLER_MAIL_LABEL') ?></td>
	<td><?php echo $this->item->identificationdata_controller_mail ?></td>
</tr>
<tr>
	<td><?php echo JText::_('COM_ROPO_IDENTIFICATIONDATA_CONTROLLER_WEBSITE_LABEL') ?></td>
	<td><?php echo $this->item->identificationdata_controller_website ?></td>
</tr>

<tr><th colspan="2"><?php echo JText::_('COM_ROPO_IDENTIFICATIONDATA_FIELDSET_PROCESSOR') ?></th></tr>
<tr>
	<td><?php echo JText::_('COM_ROPO_IDENTIFICATIONDATA_PROCESSOR_NAME_LABEL') ?></td>
	<td><?php echo $this->item->identificationdata_processor_name ?></td>
</tr>
<tr>
	<td><?php echo JText::_('COM_ROPO_IDENTIFICATIONDATA_PROCESSOR_ADDRESS1_LABEL') ?></td>
	<td><?php echo $this->item->identificationdata_pocessor_address1 ?></td>
</tr>
<tr>
	<td>
		<?php echo JText::_('COM_ROPO_IDENTIFICATIONDATA_PROCESSOR_POSTALCODE_LABEL') ?>&nbsp;
		<?php echo JText::_('COM_ROPO_IDENTIFICATIONDATA_PROCESSOR_CITY_LABEL') ?>
	</td>
	<td>
		<?php echo $this->item->identificationdata_pocessor_postalcode ?>&nbsp;
		<?php echo $this->item->identificationdata_pocessor_city ?>
	</td>
</tr>
<tr>
	<td><?php echo JText::_('COM_ROPO_IDENTIFICATIONDATA_CONTROLLLER_TELEPHONE_LABEL') ?></td>
	<td><?php echo $this->item->identificationdata_pocessor_telephone ?></td>
</tr>
<tr>
	<td><?php echo JText::_('COM_ROPO_IDENTIFICATIONDATA_PROCESSOR_TELEFAX_LABEL') ?></td>
	<td><?php echo $this->item->identificationdata_pocessor_telefax ?></td>
</tr>
<tr>
	<td><?php echo JText::_('COM_ROPO_IDENTIFICATIONDATA_PROCESSOR_MAIL_LABEL') ?></td>
	<td><?php echo $this->item->identificationdata_pocessor_mail ?></td>
</tr>
<tr>
	<td><?php echo JText::_('COM_ROPO_IDENTIFICATIONDATA_PROCESSOR_OPERATIONS_LABEL') ?></td>
	<td><?php echo $this->item->identificationdata_pocessor_operations ?></td>
</tr>

<tr><th colspan="2"><?php echo JText::_('COM_ROPO_IDENTIFICATIONDATA_FIELDSET_PLACE') ?></th></tr>
<tr>
	<td><?php echo JText::_('COM_ROPO_IDENTIFICATIONDATA_PLACE_NAME_LABEL') ?></td>
	<td><?php echo $this->item->identificationdata_place_name ?></td>
</tr>
<tr>
	<td><?php echo JText::_('COM_ROPO_IDENTIFICATIONDATA_PLACE_ADDRESS1_LABEL') ?></td>
	<td><?php echo $this->item->identificationdata_place_address1 ?></td>
</tr>
<tr>
	<td>
		<?php echo JText::_('COM_ROPO_IDENTIFICATIONDATA_PLACE_POSTALCODE_LABEL') ?>&nbsp;
		<?php echo JText::_('COM_ROPO_IDENTIFICATIONDATA_PLACE_CITY_LABEL') ?>
	</td>
	<td>
		<?php echo $this->item->identificationdata_place_postalcode ?>&nbsp;
		<?php echo $this->item->identificationdata_place_city ?>
	</td>
</tr>