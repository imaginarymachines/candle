<?php

/**
 * Register food block
 */
add_action('init', function () {
    if( file_exists(dirname(__FILE__, 3). "/build/block-food.asset.php") ) {
        register_block_type_from_metadata(__DIR__);
    }
});
