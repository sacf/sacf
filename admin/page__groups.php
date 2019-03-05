<br>
<div class="acf-columns-2">
    <div class="acf-column-1">
        <div class="acf-box">
            <div class="title">
                <h3>Groups</h3>
            </div>
            <div class="inner">
                <p>Define field groups in SACF.</p>
                <?php sacf\admin\render_example('example-groups.php'); ?>
            </div>
        </div>
        <br>
        <div class="acf-box">
            <div class="title">
                <h3>Options page</h3>
            </div>
            <div class="inner">
                <p>Use the ACF Pro opion pages.</p>
                <?php sacf\admin\render_example('example-options.php'); ?>
            </div>
        </div>
    </div>
    <div class="acf-column-2">
        <div class="acf-box">
            <div class="title">
                <h3>API in short</h3>
            </div>
            <div class="inner">
<pre><code>sacf\group($title, $name)
  ->help()
  ->menu_order()
  ->position()
  ->style()
  ->label_placement()
  ->instruction_placement()
  ->hide_on_screen()
  ->active()
  ->inactive()
  ->description()
  ->location()
  ->on()
  ->and()
  ->or()
  ->copy()
  ->add()
  ->on_post_type()
  ->on_post_template()
  ->on_page_template()
  ->on_front_page()
  ->on_block()
  ->on_options()
  ->on_user_form()
  ->on_user_role()
  ->register();</code></pre>
            </div>
        </div>
    </div>
</div>
