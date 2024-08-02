<?php

namespace WpMega\Admin;

if(! class_exists('WP_List_Table')){
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

/**
 * List Class
 */
class Address_List extends \WP_List_Table{

    function __construct(){
        parent::__construct([
            'singular' => 'contact',
            'plural' => 'contacts',
            'ajax' => false
        ]);
    }

    function no_items() {
        _e( 'No address found', 'wp-mega' );
    }

    function get_bulk_actions() {
        $actions = array(
            'trash'  => __( 'Move to Trash', 'wp-mega' ),
        );

        return $actions;
    }

    
    public function get_columns(){
        return [
            'cb' => '<input type"checkbox"',
            'name' => __('Name', 'wp-mega'),
            'address' => __('Address', 'wp-mega'),
            'phone' => __('Phone', 'wp-mega'),
            'created_at' => __('Date', 'wp-mega')
        ];
    }

    function get_sortable_columns() {
        $sortable_columns = [
            'name'       => [ 'name', true ],
            'created_at' => [ 'created_at', true ],
        ];

        return $sortable_columns;
    }

    protected function column_default($item, $column_name){

        switch($column_name){
            case 'value':
                break;
            default:
                return isset($item->$column_name) ? $item->$column_name : '';
        }

    }


    /**
     * Render the "name" column
     *
     * @param  object $item
     *
     * @return string
     */
    public function column_name( $item ) {

        $actions = [];

        $actions['edit']   = sprintf( '<a href="%s" title="%s">%s</a>', admin_url( 'admin.php?page=wp-mega&action=edit&id=' . $item->id ), $item->id, __( 'Edit', 'wp-mega' ), __( 'Edit', 'wp-mega' ) );
        $actions['delete'] = sprintf( '<a href="%s" class="submitdelete" onclick="return confirm(\'Are you sure?\');" title="%s">%s</a>', wp_nonce_url( admin_url( 'admin-post.php?action=wd-ac-delete-address&id=' . $item->id ), 'wd-ac-delete-address' ), $item->id, __( 'Delete', 'wp-mega' ), __( 'Delete', 'wp-mega' ) );

     
        return sprintf(
            '<a href="%1$s"><strong>%2$s</strong></a> %3$s', admin_url( 'admin.php?page=wp-mega&action=view&id' . $item->id ), $item->name, $this->row_actions( $actions )
        );
    }

    protected function column_cb( $item ) {
        return sprintf(
            '<input type="checkbox" name="address_id[]" value="%d" />', $item->id
        );
    }


    public function prepare_items(){

        $column = $this->get_columns();
        $hidden = [];
        $sortable = $this->get_sortable_columns();

        $per_page     = 2;
        $current_page = $this->get_pagenum();
        $offset       = ( $current_page - 1 ) * $per_page;

        $args = [
            'number' => $per_page,
            'offset' => $offset,
        ];

        $this->_column_headers = [$column, $hidden, $sortable];

        if ( isset( $_REQUEST['orderby'] ) && isset( $_REQUEST['order'] ) ) {
            $args['orderby'] = $_REQUEST['orderby'];
            $args['order']   = $_REQUEST['order'] ;
        }

        $this->items = wp_mega_get_addressess($args);

        $this->set_pagination_args([
            'total_items' => gazi_mega_addresss_count(),
            'per_page'=>  $per_page,
        ]);
    }
}