<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	<div><label class="screen-reader-text" for="s"><?php _e( 'Search', 'fertig' ); ?></label>
		<input type="search" value="" placeholder="<?php _e( 'Search', 'fertig' ); ?>" autosave="<?php echo home_url( '/' ); ?> Search" results="5" name="s" id="s" />
		<input type="submit" id="searchsubmit" value="Search" />
	</div>
</form>
