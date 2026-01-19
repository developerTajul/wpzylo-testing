<form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="search-field-holder">
        <input type="search" class="main-search-input" name="s" 
               placeholder="<?php echo esc_attr__('What are you looking for?', 'zylo'); ?>" 
               value="<?php echo get_search_query(); ?>">
        <button type="submit" class="search-submit"><i class="fas fa-search"></i></button>
    </div>
</form>