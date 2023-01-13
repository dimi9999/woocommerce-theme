<?php
if (!defined('ABSPATH')) {
    exit;
}

  
$file_size_live=(file_exists(wc_get_log_file_path('eh_stripe_pay_live'))?$this->file_size(filesize(wc_get_log_file_path('eh_stripe_pay_live'))):'');
$file_size_dead=(file_exists(wc_get_log_file_path('eh_stripe_pay_dead'))?$this->file_size(filesize(wc_get_log_file_path('eh_stripe_pay_dead'))):'');
return array(

    'eh_stripe_credit_title' => array(
        'class'=> 'eh-css-class',
        'title' => sprintf('<span style="font-weight: bold; font-size: 15px; color:#23282d;font-size:15px;">'.__( 'Stripe Credentials','payment-gateway-stripe-and-woocommerce-integration' ).'<span>'),
        'type' => 'title',
        'description' => sprintf(__( 'API keys can be located in your   <a href="https://dashboard.stripe.com/dashboard" target="_blank"> Stripe dashboard. </a>  Transaction mode(test/live) is dictated by the respective API keys.','payment-gateway-stripe-and-woocommerce-integration' )),
        
    ),
    'eh_stripe_mode' => array(
        'title' => __('Transaction Mode', 'payment-gateway-stripe-and-woocommerce-integration'),
        'type' => 'select',
        'options' => array(
            'test' => __('Test Mode', 'payment-gateway-stripe-and-woocommerce-integration'),
            'live' => __('Live Mode', 'payment-gateway-stripe-and-woocommerce-integration')
        ),
        'class' => 'wc-enhanced-select',
        'default' => 'test',
        'desc_tip' => __('Choice of test or live modes. Use Test from the drop down to configure the plugin as per your expectation and validate your transactions. Switch to Live mode when you have set up the configurations to your liking.', 'payment-gateway-stripe-and-woocommerce-integration')
    ),
    
    'eh_stripe_test_publishable_key' => array(
        'title' => __('Test Publishable Key', 'payment-gateway-stripe-and-woocommerce-integration'),
        'type' => 'text',
        'description' => __('Copy and paste the stripe test mode publishable key from the stripe dashboard into the text field.', 'payment-gateway-stripe-and-woocommerce-integration'),
        'placeholder' => 'Test Publishable Key',
        'desc_tip' => true
    ),
    'eh_stripe_test_secret_key' => array(
        'title' => __('Test Secret Key', 'payment-gateway-stripe-and-woocommerce-integration'),
        'type' => 'password',
        'description' => __('Copy and paste the stripe test mode secret key from the stripe dashboard into the text field.', 'payment-gateway-stripe-and-woocommerce-integration'),
        'placeholder' => 'Test Secret Key',
        'default'     => '',
        'desc_tip' => true
    ),
    'eh_stripe_live_publishable_key' => array(
        'title' => __('Live Publishable Key', 'payment-gateway-stripe-and-woocommerce-integration'),
        'type' => 'text',
        'description' => __('Copy and paste the stripe live mode publishable key from the stripe dashboard into the text field.', 'payment-gateway-stripe-and-woocommerce-integration'),
        'placeholder' => 'Live Publishable Key',
        'desc_tip' => true
    ),
    'eh_stripe_live_secret_key' => array(
        'title' => __('Live Secret Key', 'payment-gateway-stripe-and-woocommerce-integration'),
        'type' => 'password',
        'description' => __('Copy and paste the stripe live mode secret key from the stripe dashboard into the text field.', 'payment-gateway-stripe-and-woocommerce-integration'),
        'placeholder' => 'Live Secret Key',
        'default'     => '',
        'desc_tip' => true
    ),
    'eh_stripe_settings_title' => array(
        'class'=> 'eh-css-class',
        'title' => sprintf('<span style="font-weight: bold; font-size: 15px; color:#23282d;">'.__( 'Stripe Settings','payment-gateway-stripe-and-woocommerce-integration' ).'<span>'),
        'type' => 'title'
    ),

    'enabled' => array(
        'title' => __('Stripe Payment', 'payment-gateway-stripe-and-woocommerce-integration'),
        'label' => __('Enable', 'payment-gateway-stripe-and-woocommerce-integration'),
        'type' => 'checkbox',
        'default' => 'no',
        'desc_tip' => __('Enable this option to have a stripe payment option in your checkout.', 'payment-gateway-stripe-and-woocommerce-integration'),
    ),
    'overview' => array(
        'title' => __('Stripe Overview Page', 'payment-gateway-stripe-and-woocommerce-integration'),
        'label' => __('Enable', 'payment-gateway-stripe-and-woocommerce-integration'),
        'type' => 'checkbox',
        'description' => sprintf('<a href="' . admin_url('admin.php?page=eh-stripe-overview') . '" target="_blank">'.__( 'Stripe Overview ','payment-gateway-stripe-and-woocommerce-integration' ).'</a>'),
        'default' => 'yes',
        'desc_tip' => __('Stripe overview provides a consolidated view of all your transactions. You will also be able to manage your orders, process partial or full refunds, capture payments and change order status from this view.', 'payment-gateway-stripe-and-woocommerce-integration'),
    ),
    'title' => array(
        'title' => __('Title', 'payment-gateway-stripe-and-woocommerce-integration'),
        'type' => 'text',
        'description' => __('The texts entered in this field will be displayed as the title for the stripe payment at the checkout.', 'payment-gateway-stripe-and-woocommerce-integration'),
        'default' => __('Stripe', 'payment-gateway-stripe-and-woocommerce-integration'),
        'desc_tip' => true
    ),
    'description' => array(
        'title' => __('Description', 'payment-gateway-stripe-and-woocommerce-integration'),
        'type' => 'textarea',
        'css' => 'width:25em',
        'description' => __('The texts entered in this field will be displayed as a short description for the stripe payment at the checkout.', 'payment-gateway-stripe-and-woocommerce-integration'),
        'default' => __('Secure payment via Stripe.', 'payment-gateway-stripe-and-woocommerce-integration'),
        'desc_tip' => true
    ),
    'eh_stripe_order_button' => array(
        'title' => __('Order Button Text', 'payment-gateway-stripe-and-woocommerce-integration'),
        'type' => 'text',
        'description' => __('You can key in with the text of your choice that will appear as the order button label on the checkout page.', 'payment-gateway-stripe-and-woocommerce-integration'),
        'default' => __('Pay via Stripe', 'payment-gateway-stripe-and-woocommerce-integration'),
        'desc_tip' => true
    ),
    'eh_stripe_checkout_cards' => array(
        'title' => __('Preferred Cards', 'payment-gateway-stripe-and-woocommerce-integration'),
        'type' => 'multiselect',
        'class' => 'chosen_select',
        'css' => 'width: 350px;',
        'desc_tip' => __('Choose the preferred cards from the list for which the payment can be accepted. Transactions will be limited to the selected cards and the rest will be declined.', 'payment-gateway-stripe-and-woocommerce-integration'),
        'options' => array(
            'mastercard' => 'MasterCard',
            'visa' => 'Visa',
            'amex' => 'American Express',
            'discover' => 'Discover',
            'jcb' => 'JCB',
            'diners' => 'Diners Club'
        ),
        'default' => array(
            'mastercard',
            'visa',
            'diners',
            'discover',
            'amex',
            'jcb'
        )
    ),
   
    'eh_stripe_pay_actions_title' => array(
        'title' => sprintf('<span style="font-weight: bold; font-size: 15px; color:#23282d;">'.__( 'Stripe Actions','payment-gateway-stripe-and-woocommerce-integration' ).'<span>'),
        'type' => 'title'
    ),
    'eh_stripe_capture' => array(
        'title' => __('Capture Payment', 'payment-gateway-stripe-and-woocommerce-integration'),
        'label' => __('Capture Payment Immediately', 'payment-gateway-stripe-and-woocommerce-integration'),
        'type' => 'checkbox',
        'description' => __('When enabled, the payment will be captured immediately upon successful completion of the transaction. Disabling this option will require the shop manager to manually capture the payments corresponding to every transaction, within 7 days from transactional date. This can be done via the stripe overview page or the stripe dashboard. This method is most widely used to reserve funds from the card holder and then capture them after the business completes the service.', 'payment-gateway-stripe-and-woocommerce-integration'),
        'default' => 'yes',
        'desc_tip' => true
    ),
    
    'eh_stripe_email_receipt' => array(
        'title' => __('Email Transaction Receipt', 'payment-gateway-stripe-and-woocommerce-integration'),
        'label' => __('Enable ', 'payment-gateway-stripe-and-woocommerce-integration'),
        'type' => 'checkbox',
        'description' => __('Enable this option to send transaction receipts via email to customers.', 'payment-gateway-stripe-and-woocommerce-integration'),
        'default' => 'no',
        'desc_tip' => true
    ),
    'eh_stripe_statement_descriptor' => array(
        'title' => __('Statement Descriptor', 'payment-gateway-stripe-and-woocommerce-integration'),
        'description' => __('You can enter a statement descriptor which will appear on customers\' bank statements in capital letters. It may contain 22 characters with at least one letter and no special characters.', 'payment-gateway-stripe-and-woocommerce-integration'),
        'type' => 'text',
        'placeholder' => 'Statement Descriptor',
        'desc_tip' => true
    ),
    
    'eh_stripe_log_title' => array(
        'title' => sprintf('<span style="font-weight: bold; font-size: 15px; color:#23282d;">'.__( 'Debugging','payment-gateway-stripe-and-woocommerce-integration' ).'<span>'),
        'type' => 'title',
        'description' => __('Enable Logging to save Stripe payment logs into log file.', 'payment-gateway-stripe-and-woocommerce-integration')
    ),
    'eh_stripe_logging' => array(
        'title' => __('Logging', 'payment-gateway-stripe-and-woocommerce-integration'),
        'label' => __('Enable', 'payment-gateway-stripe-and-woocommerce-integration'),
        'type' => 'checkbox',
        'description' => sprintf('<span style="color:green">'.__( 'Success Log File','payment-gateway-stripe-and-woocommerce-integration' ).'</span>: ' . strstr(wc_get_log_file_path('eh_stripe_pay_live'), 'wp-content') . ' ( ' . $file_size_live . ' )<br> <br><span style="color:red">'.__( 'Failure Log File','payment-gateway-stripe-and-woocommerce-integration' ).'</span >: ' . strstr(wc_get_log_file_path('eh_stripe_pay_dead'), 'wp-content') . ' ( ' . $file_size_dead . ' ) '),
        'default' => 'yes',
        'desc_tip' => __('Enabling the logging option will save each transaction information into the log file. You can see the file path and the size of the log file which will help in tracking disputes.', 'payment-gateway-stripe-and-woocommerce-integration')
    )
);
