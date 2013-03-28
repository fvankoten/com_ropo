<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>

<tr class="level1"><th colspan="2"><?php echo JText::_('COM_ROPO_PERSONALDATA_CATEGORIES') ?></th></tr>

<tr class="level2"><th colspan="2"><?php echo JText::_('COM_ROPO_SPECIAL_CATEGORIES_OF_PERSONAL_DATA_FIELDSET') ?></th></tr>
<tr>
	<td colspan="2" class="col1">
		<input type="checkbox" 
			<?php if ($this->item->personaldata_health == 1) : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_PERSONALDATA_HEALTH_LABEL') ?></label>
	</td>
</tr>
<tr>
	<td colspan="2" class="col1">
		<input type="checkbox" 
			<?php if ($this->item->personaldata_political_opinions == 1) : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_PERSONALDATA_POLITICAL_OPINIONS_LABEL') ?></label>
	</td>
</tr>
<tr>
	<td colspan="2" class="col1">
		<input type="checkbox" 
			<?php if ($this->item->personaldata_racial_origin == 1) : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_PERSONALDATA_RACIAL_ORIGIN_LABEL') ?></label>
	</td>
</tr>
<tr>
	<td colspan="2" class="col1">
		<input type="checkbox" 
			<?php if ($this->item->personaldata_religious_beliefs == 1) : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_PERSONALDATA_RELIGIOUS_BELIEFS_LABEL') ?></label>
	</td>
</tr>
<tr>
	<td colspan="2" class="col1">
		<input type="checkbox" 
			<?php if ($this->item->personaldata_sexlife == 1) : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_PERSONALDATA_SEXLIFE_LABEL') ?></label>
	</td>
</tr>
<tr>
	<td colspan="2" class="col1">
		<input type="checkbox" 
			<?php if ($this->item->personaldata_trade_union_membership == 1) : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_PERSONALDATA_TRADE_UNION_MEMBERSHIP_LABEL') ?></label>
	</td>
</tr>

<tr class="level2"><th colspan="2"><?php echo JText::_('COM_ROPO_OTHER_CATEGORIES_OF_PERSONAL_DATA_FIELDSET') ?></th></tr>
<tr>
	<td class="col1">
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->personaldata_biometric_data == 1) : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_PERSONALDATA_BIOMETRIC_DATA_LABEL') ?></label>
	</td>
	<td class="col2">	
		<input type="checkbox" readonly="readonly" 
			<?php if ($this->item->personaldata_video_surveillance == 1) : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_PERSONALDATA_VIDEO_SURVEILLANCE_LABEL') ?></label>
	</td>
</tr>
<tr>
	<td class="col1">
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->personaldata_identification_data == 1) : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_PERSONALDATA_IDENTIFICATION_DATA_LABEL') ?></label>
	</td>
	<td class="col2">	
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->personaldata_economic_data == 1) : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_PERSONALDATA_ECONOMIC_DATA_LABEL') ?></label>
	</td>
</tr>
<tr>
	<td class="col1">
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->personaldata_personal_detail_data == 1) : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_PERSONALDATA_PERSONAL_DETAIL_DATA_LABEL') ?></label>
	</td>
	<td class="col2">	
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->personaldata_professional_life == 1) : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_PERSONALDATA_PROFESSIONAL_LIFE_LABEL') ?></label>
	</td>
</tr>
<tr>
	<td class="col1">
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->personaldata_address_detail_data == 1) : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_PERSONALDATA_ADDRESS_DETAIL_DATA_LABEL') ?></label>
	</td>
	<td class="col2">	
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->personaldata_audio == 1) : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_PERSONALDATA_AUDIO_LABEL') ?></label>
	</td>
</tr>
<tr>
	<td class="col1">
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->personaldata_residence_details == 1) : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_PERSONALDATA_RESIDENCE_DETAILS_LABEL') ?></label>
	</td>
	<td class="col2">	
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->personaldata_photo == 1) : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_PERSONALDATA_PHOTO_LABEL') ?></label>
	</td>
</tr>
<tr>
	<td class="col1">
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->personaldata_other != '') : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_PERSONALDATA_OTHER_LABEL') ?></label>
	</td>
	<td class="col2"><?php echo $this->item->personaldata_other ?></td>
</tr>