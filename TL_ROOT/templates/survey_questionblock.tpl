<?php foreach ($this->surveypage as $objWidget): ?>
	<div class="surveyblock qid-<?php echo $objWidget->id; ?>">
<?php if ($objWidget->showTitle): ?>
		<div class="title">
			<?php echo $objWidget->title; ?><?php if ($objWidget->mandatory): ?><span class="mandatory">*</span><?php endif; ?>
			<?php if (strlen($objWidget->help)): ?><div class="help"><?php echo $objWidget->help; ?></div><?php endif; ?>
		</div>
<?php endif; ?>
<?php if (strlen($objWidget->question)): ?>
		<div class="question"><?php echo $objWidget->question; ?></div>
<?php endif; ?>
		<div class="widget <?php echo $objWidget->class; ?>">
			<?php echo $objWidget->generateLabel(); ?> <?php echo $objWidget->generateWithError(); ?>
		</div>
	</div>
<?php endforeach; ?>
