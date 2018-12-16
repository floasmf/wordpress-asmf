<?php
/**
 * Created by PhpStorm.
 * User: florent
 * Date: 16/12/18
 * Time: 09:21
 */
function pagination($base, $max_num_pages) {
    global $paged;

    $paginate_links = paginate_links(array(
        'base'            => $base.'%_%',
        'format'          => '?page=%#%',
        'total'           => $max_num_pages,
        'current'         => $paged,
        'show_all'        => false,
        'end_size'        => 1,
        'mid_size'        => 2,
        'prev_next'       => True,
        'prev_text'       => __('«'),
        'next_text'       => __('»'),
        'type'            => 'plain',
        'add_args'        => false,
        'add_fragment'    => ''
    ));

    if ($paginate_links) {
        ?>
        <nav class='custom-pagination'><?php echo $paginate_links ?></nav>
        <?php
    }
}