<br>
<div class="acf-columns-2">
	<div class="acf-column-1">
		<div class="acf-box">
			<div class="title">
				<h3>Fields</h3>
			</div>
			<div class="inner">
				<p>Use all built in ACF Fields with fluid functions.</p>
				<?php sacf\admin\render_example('example-fields.php'); ?>
			</div>
		</div>
	</div>
	<div class="acf-column-2">
		<div class="acf-box">
			<div class="title">
				<h3>API</h3>
			</div>
			<div class="inner">
<pre><code>sacf\field\type($title, $name)
->help()
->instructions()
->required()
->wrapper()
->class()
->id()
->width()
->conditional_logic()
->if()
->and()
->or()
->add_to()</code></pre>
<p>Plus field specific functions.</p>
<p>Use <code>->help()</code> on a field to show them.</p>
			</div>
		</div>
	</div>
</div>
