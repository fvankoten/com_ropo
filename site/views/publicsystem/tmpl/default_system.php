<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>

<tr><th colspan="2"><?php echo JText::_('COM_ROPO_SYSTEM_FIELDSET') ?></th></tr>

<tr><th colspan="2"><?php echo JText::_('COM_ROPO_SYSTEM_TITLE_LABEL') ?></th></tr>
<tr><td colspan="2"><?php echo $this->item->title ?></th></tr>

<tr><th colspan="2"><?php echo JText::_('COM_ROPO_SYSTEM_REGNO_LABEL') ?></th></tr>
<tr><td colspan="2"><?php echo $this->item->regno ?>-<?php echo $this->item->version ?></th></tr>

<tr><th colspan="2"><?php echo JText::_('COM_ROPO_SYSTEM_PURPOSE_LABEL') ?></th></tr>
<tr><td colspan="2"><?php echo $this->item->purpose ?></th></tr>