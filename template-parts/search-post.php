<?php
/**
 * User: Francis Li
 * Date: 5/4/2018
 * Time: 12:56 PM
 */
?>
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div class="input-group">
        <input type="text" class="input-group-field" value="" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'foundationpress' ); ?>">
        <input type="hidden" name="post_type" value="post">
        <div class="input-group-button">
            <input type="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'foundationpress' ); ?>" class="button">
        </div>
    </div>
</form>
