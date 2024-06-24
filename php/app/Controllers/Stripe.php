<?php namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
 
class Stripe extends Controller
{
 
 
    public function index()
    {
        return view('stripe/checkout');
    }
        
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function payment()
    {
       require_once('stripe-php/init.php');
     
       $stripeSecret = 'sk_test_51JmLyNB02dNGS7M53t1X9Ni7Nb0NroYzbikxqUn9aBOPcDNOvXPnP00EgUHuHRIeHnikPZiIxMp0nREyVRMsI7AA00Io1T7pmD';
 
       \Stripe\Stripe::setApiKey($stripeSecret);
      
        $total = $this->request->getVar('amount')*100 ;
        $stripe = \Stripe\Charge::create ([
                "amount" => $this->request->getVar('amount'),
                "currency" => "usd",
                "source" => $this->request->getVar('tokenId'),
                "description" => "Test payment from umatone.com."
        ]);
             
       // after successfull payment, you can store payment related information into your database
              
        $data = array('success' => true, 'data'=> $stripe);
 
        echo json_encode($data);
    }
 
}