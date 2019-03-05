<br>
<div class="acf-columns-2">
    <div class="acf-column-1">
        <div class="acf-box">
            <div class="title">
                <h3>Fields</h3>
            </div>
            <div class="inner">
                <p>Easily create your own Gutenberg blocks.</p>
                <?php sacf\admin\render_example('example-blocks.php'); ?>
            </div>
        </div>
    </div>
    <div class="acf-column-2">
        <div class="acf-box">
            <div class="title">
                <h3>API in short</h3>
            </div>
            <div class="inner">
<pre><code>sacf\block($title, $name, $args)
  ->description()
  ->category()
  ->icon()
  ->keywords()
  ->supports()
  ->render_callback()
  ->render_template()
  ->use_align()
  ->use_mode()
  ->use_html()
  ->register();</code></pre>
            </div>
        </div>
    </div>
</div>
