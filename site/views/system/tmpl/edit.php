<?php
// No direct access
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip');
?>
<form action="<?php echo JRoute::_('index.php?option=com_ropo&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm">

	<div>
		<?php echo $this->getToolbar(); ?>
	</div>
	<div class="clr"></div>
	
	<h1><?php echo $this->title; ?></h1>
	
	<table class="progressbar">
		<tr>
			<?php for ($i = 1; $i <= $this->lastChapter; $i++) : ?>
			<td class="progress <?php echo ($i <= $this->currentChapter ? 'done' : 'todo') ?>">&nbsp;</td>
			<?php endfor; ?>
		</tr>
	</table>
	
	<div class="chapterhelp">
		<?php echo JText::_($this->help); ?>
	</div>

	<?php foreach($this->form->getFieldsets() as $fieldset): ?>
	<fieldset class="adminform">
		<legend><?php echo JText::_($fieldset->name); ?></legend>
		<table class="systemdata">
			<?php foreach($this->form->getFieldset($fieldset->name) as $field): ?>
			<?php if ($field->fieldname == 'version') : ?>
			<?php elseif ($this->isNew && $field->fieldname == 'regno') : ?>
			<?php elseif ($this->isNew && $field->fieldname == 'created_time') : ?>
			<?php elseif ($this->isNew && $field->fieldname == 'created_user_id') : ?>
			<?php elseif ($this->isNew && $field->fieldname == 'modified_time') : ?>
			<?php elseif ($this->isNew && $field->fieldname == 'modified_user_id') : ?>
			<?php else : ?>
			<tr>
				<th><?php echo $field->label; ?></th>
				<td>
					<?php
						if ($field->fieldname == 'regno') {
							echo JText::sprintf('%d-%03d', $field->value, $this->form->getField('version')->value);
						} else { 
							echo $field->input;
						} 
					?>
				</td>
			</tr>
			<?php endif; ?>
			<?php endforeach; ?>	
		</table>
	</fieldset>
	<?php endforeach; ?>
	
	<div>
		<input type="hidden" name="task" value="system.edit" />
		<input type="hidden" name="systemview" value="system" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>
