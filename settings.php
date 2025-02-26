<div class="wrap">
	<h2>Critique Settings</h2>           
	<form method="post" action="">
		<input type="hidden" name="critique_action" value="critique_update" />
		<h3 class="title">Active Post Types</h3>
		<table class="form-table">
			<p class="description">After enabling Critique in a post type you may need to go to your Screen Options and select it to be displayed. If you disable critique from a post type preview reviews from that type will no longer be shown.</p>
			<tr valign="top">
				<th scope="row">Enable in Posts Types</th>
				<td>
					<p class="description">Critique can be enabled in any of the following post types with user interfaces.</p>
					<?php $post_types = get_post_types(array('show_ui'=>true),'objects');
					foreach($post_types as $name => $data){ ?>
						<label for="post_types[<?php echo esc_attr($name) ?>]" class="one_fifth">
							<input type="hidden" name="post_types[<?php echo esc_attr($name) ?>]" value="off" />
							<input name="post_types[<?php echo esc_attr($name) ?>]" type="checkbox" id="post_types[<?php echo esc_attr($name) ?>]" value="on" <?php echo esc_attr(($this->settings['post_types'][$name]=='on'?'checked':'')) ?> >
							<?php echo esc_html($data->labels->name) ?>
						</label>
					<?php } ?>
				</td>
			</tr>
		</table>

		<h3 class="title">Display Options</h3>
		<table class="form-table">
			<p class="description">These will take effect immediately. Some themes or other plug-ins may effect formatting, if it's looking odd on your site let me know the theme and I'll try and get it looking better.</p>
			<tr valign="top">
				<th scope="row">Show full in short posts</th>
				<td>
					<fieldset>
						<legend class="screen-reader-text"><span>Show full in short posts</span></legend>
						<label for="show_options_full_in_short">
							<input name="show_options" type="radio" id="show_options_full_in_short" value="full_in_short" <?php echo ($this->settings['show_options']=='full_in_short'?'checked':'') ?> >
							Show the full blog review block in excerpts or short posts (like on the blog homepage).
						</label>
					</fieldset>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">Show overall average in short posts</th>
				<td>
					<fieldset>
						<legend class="screen-reader-text"><span>Show full in short posts</span></legend>
						<label for="show_options_overall_in_short">
							<input name="show_options" type="radio" id="show_options_overall_in_short" value="overall_in_short" <?php echo ($this->settings['show_options']=='overall_in_short'?'checked':'') ?> >
							Show only the overall average in excerpts or  short posts (like on the blog homepage). Overall averages must be enabled below.
						</label>
					</fieldset>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">Do not show score block</th>
				<td>
					<fieldset>
						<legend class="screen-reader-text"><span>Do not show score block</span></legend>
						<label for="show_options_do_not_show">
							<input name="show_options" type="radio" id="show_options_do_not_show" value="do_not_show" <?php echo ($this->settings['show_options']=='do_not_show'?'checked':'') ?> >
							You will need to insert a shortcode where you want the review block to show, see before for details on the shortcode.
						</label>
					</fieldset>
				</td>
			</tr>
		</table>

		<h3 class="title">Shortcode Information</h3>
		<p>
			You can place a copy of the critique score box by using the shortcode <code>[critique_score]</code> in any post or page with a critique. If you would like to include the critique score box on another page, or would like to include a score box for a different review on a page you can pass the page ID attribute like this: <code>[critique_score page="123"]</code>. When using shortcodes you may want to opt not to show the default critique score box by selecting "Do not show score block" from the "Display Options" section above.
		</p>

		<h3 class="title">Review Settings</h3>
		<p class="description">Changes to the review system are not retroactive, so if you go from a 5 Star system to a # out of 100 system critiques already made will still be 5 star. New sections are added, however they will be left blank, blank sections do not show up in the display and do not factor into the overall average.</p>
		<table class="form-table">
			<tr valign="top">
				<th scope="row"><label for="scale">Review Scale</label></th>
				<td><select name="scale" id="scale">
					<option value="5-stars" <?php echo ($this->settings['scale']=='5-stars'?'selected':'') ?> >5 Stars</option>
					<option value="out-of-100" <?php echo ($this->settings['scale']=='out-of-100'?'selected':'') ?> ># out of 100</option>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="sections">Review Sections</label></th>
				<td>
					<input name="sections" type="text" id="sections" value="<?php echo esc_attr($this->settings['sections']) ?>" class="regular-text">
					<p class="description">If you want to review multiple aspects of something (build quality, performance, price, ect.) add each section here in a comma separated list.</p>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">Add Overall Average</th>
				<td>
					<fieldset>
						<legend class="screen-reader-text"><span>Add Overall Average</span></legend>
						<label for="add_average">
							<input type="hidden" name="add_average" value="off" />
							<input name="add_average" type="checkbox" id="add_average" value="on" <?php echo ($this->settings['add_average']=='on'?'checked':'') ?> >
							When using multiple review sections add an "Overall" item at the bottom that averages each individual section.
						</label>
					</fieldset>
				</td>
			</tr>
		</table>

		<?php wp_nonce_field( 'updating-critique-settings' ); ?>

		<p class="submit">
			<input type="submit" id="submit" class="button button-primary" value="Save Changes">
		</p>
	</form>

	<h3 class="title">Miscellaneous</h3>
	<table class="form-table">
		<tr valign="top">
			<th scope="row"><label for="nothing">Have a problem</label></th>
			<td>
				Having trouble getting the plug-in working? Expected results? Feel like direction your repentant rage at someone far far away? Just have a general usage question? You can try the <a href="http://wordpress.org/support/plugin/critique" target="_blank">plug-ins support form</a> or, if you want an answer from the source, feel free to email me at <a href="mailto:phillip.gooch@gmail.com" target="_blank">phillip.gooch@gmail.com</a>.
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="nothing">Check out the code</label></th>
			<td>
				Want to see how it all works, you can check out the on the <a href="http://plugins.svn.wordpress.org/critique/trunk/" target="_blank">WordPress SVN</a> or, even better, <a href="https://github.com/pgooch/critique" target="_blank">fork it on GitHub</a>. Feel free to make changes and submit pull requests, good ideas will be added to the master branch.
			</td>
		</tr>
		<tr valign="top">
			<th scope="row">Donate</th>
			<td>
				Like the plug-in and want to support further development? Thanks, thats just awesome!
				Consider <a href="https://buymeacoffee.com/pgooch" target="_blank">buying me a coffee</a> to support further open source development or if you're looking to get some work done yourself <a href="mailto:phillip.gooch@gmail.com" target="_blank">get in touch</a> and we'll talk code.
			</td>
		</tr>
	</table>
</div>



