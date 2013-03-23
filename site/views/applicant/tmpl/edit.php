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
		<ul class="adminformlist">
		<?php foreach($this->form->getFieldset($fieldset->name) as $field): ?>
			<li><?php echo $field->label;echo $field->input;?></li>
		<?php endforeach; ?>
		</ul>
	</fieldset>
	<?php endforeach; ?>
	
	<div>
		<input type="hidden" name="task" value="system.edit" />
		<input type="hidden" name="systemview" value="applicant" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>
