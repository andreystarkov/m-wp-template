
<?
function menu_db() {

	$labels = array(
		'name'                => _x( 'Меню', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Меню', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Меню (блюда)', 'text_domain' ),
		'name_admin_bar'      => __( 'Меню', 'text_domain' ),
		'parent_item_colon'   => __( 'Родитель', 'text_domain' ),
		'all_items'           => __( 'Позиции меню', 'text_domain' ),
		'add_new_item'        => __( 'Добавить', 'text_domain' ),
		'add_new'             => __( 'Новая позиция', 'text_domain' ),
		'new_item'            => __( 'Новый', 'text_domain' ),
		'edit_item'           => __( 'Редактировать', 'text_domain' ),
		'update_item'         => __( 'Обновить', 'text_domain' ),
		'view_item'           => __( 'Просмотр', 'text_domain' ),
		'search_items'        => __( 'Поиск', 'text_domain' ),
		'not_found'           => __( 'Не найдено', 'text_domain' ),
		'not_found_in_trash'  => __( 'Не найдено в корзине', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'Меню ресторанов', 'text_domain' ),
		'description'         => __( 'Вкусные штуки', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'excerpt', 'thumbnail', 'page-attributes', 'post-formats', 'cost' ),
		'taxonomies'          => array( 'category', 'menu_db' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => false,
		'capability_type'     => 'page',
	);
	register_post_type( 'menu_db', $args );

}

function main_slider() {

	$labels = array(
		'name'                => _x( 'Рестораны на главной', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Рестораны на главной', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Рестораны на главной', 'text_domain' ),
		'name_admin_bar'      => __( 'Рестораны', 'text_domain' ),
		'parent_item_colon'   => __( 'Родитель', 'text_domain' ),
		'all_items'           => __( 'Все', 'text_domain' ),
		'add_new_item'        => __( 'Добавить', 'text_domain' ),
		'add_new'             => __( 'Добавить новый', 'text_domain' ),
		'new_item'            => __( 'Новый', 'text_domain' ),
		'edit_item'           => __( 'Редактировать', 'text_domain' ),
		'update_item'         => __( 'Обновить', 'text_domain' ),
		'view_item'           => __( 'Просмотр', 'text_domain' ),
		'search_items'        => __( 'Поиск', 'text_domain' ),
		'not_found'           => __( 'Не найдено', 'text_domain' ),
		'not_found_in_trash'  => __( 'Не найдено в корзине', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'Слайдер рестораны', 'text_domain' ),
		'description'         => __( 'Главный Слайдер', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats', ),
		'taxonomies'          => array( 'category', 'main_slider' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => false,
		'capability_type'     => 'page',
	);
	register_post_type( 'main_slider', $args );

}
/*function create_my_taxonomies() {
    register_taxonomy(
        'menu_db_categories',
        'menu_db',
        array(
            'labels' => array(
                'name' => 'Разделы меню',
                'add_new_item' => 'Добавить раздел'
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );
}*/

/*add_action( 'init', 'create_my_taxonomies', 0 );*/
add_action( 'init', 'main_slider', 0 );
add_action( 'init', 'menu_db', 0 );
?>

