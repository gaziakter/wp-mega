<div class="wrap">

    <h1 class="wp-heading-inline"><?php _e('Edit Address', 'wp-mega'); ?></h1>

    <?php if ( isset( $_GET['address-updated'] ) ) { ?>
        <div class="notice notice-success">
            <p><?php _e( 'Address has been updated successfully!', 'wp-mega' ); ?></p>
        </div>
    <?php } ?>

    <form action="" method="post">
        <table class="form-table">
            <tbody>
                <tr class="row <?php echo $this->has_error('name') ? 'form-invalid': '';?>">
                    <th class="row">
                        <label for="name"><?php _e('Name', 'wp-mega'); ?></label>
                    </th>
                    <td>
                        <input type="text" name="name" id="name" class="regular-text" value="<?php echo esc_attr($address->name); ?>">
                        <?php if ( $this->has_error( 'name' ) ) { ?>
                            <p class="description error"><?php echo $this->get_error( 'name' ); ?></p>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <th class="row">
                        <label for="address"><?php _e('Address', 'wp-mega'); ?></label>
                    </th>
                    <td>
                        <textarea name="address" id="address" class="regular-text"><?php echo esc_textarea($address->address); ?></textarea>
                    </td>
                </tr>
                <tr class="row <?php echo $this->has_error('phone') ? 'form-invalid': '';?>">
                    <th class="row">
                        <label for="phone"><?php _e('Phone', 'wp-mega'); ?></label>
                    </th>
                    <td>
                        <input type="text" name="phone" id="phone" class="regular-text" value="<?php echo esc_attr($address->phone); ?>">
                        <?php if ( $this->has_error( 'phone' ) ) { ?>
                            <p class="description error"><?php echo $this->get_error( 'phone' ); ?></p>
                        <?php } ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <input type="hidden" name="id" id="id" value="<?php echo esc_attr($address->id); ?>">
        <?php wp_nonce_field( 'new-address' ); ?>
        <?php submit_button( __('Update Address', 'wp-mega'), 'primary', 'submit_address', true, null ); ?>
    </form>
</div>