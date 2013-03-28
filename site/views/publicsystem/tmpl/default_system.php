<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>

<tr class="level1"><th colspan="2"><?php echo JText::_('COM_ROPO_SYSTEM_FIELDSET') ?></th></tr>

<tr class="level2"><th colspan="2"><?php echo JText::_('COM_ROPO_SYSTEM_TITLE_LABEL') ?></th></tr>
<tr><td colspan="2" class="col1"><?php echo $this->item->title ?></td></tr>

<tr class="level2"><th colspan="2"><?php echo JText::_('COM_ROPO_SYSTEM_REGNO_LABEL') ?></th></tr>
<tr><td colspan="2" class="col1"><?php echo $this->item->regno ?>-<?php echo $this->item->version ?></td></tr>

<tr class="level2"><th colspan="2"><?php echo JText::_('COM_ROPO_SYSTEM_PURPOSE_LABEL') ?></th></tr>
<tr><td colspan="2" class="col1"><?php echo $this->item->purpose ?></td></tr>