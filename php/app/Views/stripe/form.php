<html>

<?php
require 'vendor/autoload.php';
 \Stripe\Stripe::setApiKey($key);
 
 

  $checkout_session = \Stripe\Checkout\Session::create([
      'success_url' => 'https://umatone.com/user/home/payment2?session_id={CHECKOUT_SESSION_ID}',
      'cancel_url' => 'https://umatone.com/user/home/exit',
      'payment_method_types' => ['card'],
      'mode' => 'subscription',
      'customer_email' => $emaQuiz['ema'],
      //'customer' => 'cus_Lj6OA2db1dVZnH',
      
      /*
      'line_items' => [[ 
              'price' => [ 
                    'product_data' => [ 
                        'name' => "www", 
                        'metadata' => [ 
                            'pro_id' => "111" 
                        ] 
                    ], 
                    'unit_amount' => 1000, 
                    'currency' => 'usd', 
                ], 
                'quantity' => 1, 
                'description' => "wwwwww", 
            ]], 
            */
      'line_items' => [[
        'price' => $plan,
        // For metered billing, do not pass quantity
        'quantity' => 1,
      ]],
    ]);

?>
<head>
  <title>Stripe Subscription Checkout</title>
  <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
  <script type="text/javascript">
    var stripe = Stripe('<?=$keyp?>');
    var session = "<?php echo $checkout_session['id']; ?>";
    
    stripe.redirectToCheckout({ sessionId: session }).then(function(result) {
          // If `redirectToCheckout` fails due to a browser or network
          // error, you should display the localized error message to your
          // customer using `error.message`.
          if (result.error) {
            alert(result.error.message);
          }
        }).catch(function(error) {
          console.error('Error:', error);
        });
  </script>

</body>

</html>
