<div class="wrap">
    <h1 class="wp-heading-inline"><?php _e('Address Book', 'wp-mega'); ?></h1>
    <a class="page-title-action" href="<?php echo admin_url('admin.php?page=wp-mega&action=new'); ?>"><?php _e('Add New', 'wp-mega'); ?></a>

    <?php if ( isset( $_GET['inserted'] ) ) { ?>
        <div class="notice notice-success">
            <p><?php _e( 'Address has been added successfully!', 'wp-mega' ); ?></p>
        </div>
    <?php } ?>

    <?php if ( isset( $_GET['address-deleted'] ) && $_GET['address-deleted'] == 'true' ) { ?>
        <div class="notice notice-success">
            <p><?php _e( 'Address has been deleted successfully!', 'wedevs-academy' ); ?></p>
        </div>
    <?php } ?>

    <form action="" method="post">
        <?php
        $table = new WpMega\Admin\Address_List;
        $table->prepare_items();
        $table->display();
        ?>
    </form>
</div>