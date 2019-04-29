<form class="search-form" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>/">

    <input type="text" name="s" class="search" title="Rechercher" placeholder="Rechercher" value="<?php echo esc_attr( get_search_query() ); ?>">

  <button type="submit" class="btnSearch"><i class="fa fa-search"></i></button>
</form>
