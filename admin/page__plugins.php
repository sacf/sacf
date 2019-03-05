<br>
<div class="acf-columns-2">
    <div class="acf-column-1">
        <div class="acf-box">
            <div class="title">
                <h3>Plugins</h3>
            </div>
            <div class="inner">
                <p>Use all ACF Plugins with the generic field type.</p>
                <?php sacf\admin\render_example('example-plugins.php'); ?>
            </div>
        </div>
        <br>
        <div class="acf-box">
            <div class="title">
                <h3>An example Plugin</h3>
            </div>
            <div class="inner">
                <p>Or create your own plugin files for better reuse and place them in <code>../themes/your-theme/includes/sacf-plugins/</code> for autoloading.</p>
                <?php sacf\admin\render_example('example-plugin.php'); ?>
            </div>
        </div>
    </div>
    <div class="acf-column-2">
        <div class="acf-box">
            <div class="title">
                <h3>API</h3>
            </div>
            <div class="inner">
<pre><code>sacf\field\plugin\type($title, $name)
->help()
->options()</code></pre>
            </div>
        </div>
    </div>
</div>
