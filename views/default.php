<div class="missing-template">
	<h3>MISSING TEMPLATE</h3>

	<pre><?= ($data['missing-template']); ?></pre>


	<?php if (is_array($data)) : ?>
		<br><br><hr><br><br>

		<h3>Extracted vars:</h3>
		<?php foreach($data as $k=>$v): ?>
			&lt;?= $data['<?=$k?>'] ?&gt;<br>
		<?php endforeach; ?>
	<?php endif; ?>
</div>