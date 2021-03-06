<?php
global $wpdb;
?>
<div id="guif-export" class="wrap">
	<h2 class="title">Export Data</h2>
	<form method="POST" name="form" action="">
		<input type="hidden" name="name" value="">
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><label for="format">Format</label></th>
					<td>
						<select name="format">
							<option value="csv">CSV</option>
						</select>	
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="form">Select Form</label></th>
					<td>
						<?php
						
						$cols = $wpdb->get_results( "SELECT id, title FROM $wpdb->guiform ORDER BY id ASC" );
				
						?>
						<select name="form">
							<option value="">Select</option>
							<?php
								foreach ( $cols as $form ) {
									echo "<option value='$form->id'>#$form->id : $form->title</option>";
								}
							?>
						</select>	
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="format">Date Range</label></th>
					<td>
						<input style="width: 172px;" placeholder="From:" type="text" class="regular-text ltr" value="" id="from" name="from">
						<input style="width: 172px;" placeholder="TO:" type="text" class="regular-text ltr" value="" id="to" name="to">
						<p class="description">Empty this fields to include all entry.</p>
					</td>
				</tr>
				<tr id="row-fields" valign="top">
					<th scope="row"><label for="fields">Select Fields</label></th>
					<td>
						<div id="display-fields"></div>
					</td>
				</tr>
				<tr id="row-button" valign="top">
					<th scope="row"></th>
					<td>
						<p class="submit"><input type="submit" value="Download File" class="button button-primary" id="submit" name="export"></p>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</div>

