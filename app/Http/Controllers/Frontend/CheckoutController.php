<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Invoice;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Iyzipay\Request\CreatePaymentRequest;


class CheckoutController extends Controller
{
    /**
     * Shows the payment form
     *
     * @return View
     */
    public function showCheckoutForm(): View
    {
        return view("frontend.cart.checkout_form");
    }

    public function checkout(Request $request): View
    {
     $name= $request->get("name");
     $card_no= $request->get("card_no");
     $expire_month= $request->get("expire_month");
     $expire_year= $request->get("expire_year");
     $cvc = $request->get("cvc");


// KULLANICIYI AL
$user=Auth::user();

// SEPETTEKİ ÜRÜNLERİN TOPLAM TUTARINI HESAPLA
$total = $this->calculateCartTotal();


// SEPETİ GETİR
$cart = $this->getOrCreateCart();


// ÖDEME İSTEĞİ OLUŞTUR
$request = new CreatePaymentRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId($cart->code);
$request->setPrice($total);
$request->setPaidPrice($total);
$request->setCurrency(\Iyzipay\Model\Currency::TL);
$request->setInstallment(1);
$request->setBasketId($cart->code);
$request->setPaymentChannel(\Iyzipay\Model\PaymentChannel::WEB);
$request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);


// PAYMENTCART NESNESİNİ OLUŞTUR
$paymentCard = new \Iyzipay\Model\PaymentCard();
$paymentCard->setCardHolderName($name);
$paymentCard->setCardNumber($card_no);
$paymentCard->setExpireMonth($expire_month);
$paymentCard->setExpireYear($expire_year);
$paymentCard->setCvc($cvc);
$paymentCard->setRegisterCard(0);
$request->setPaymentCard($paymentCard);

// BUYER NESNESİNİ OLUŞTUR
$buyer = new \Iyzipay\Model\Buyer();
$buyer->setId($user->user_id);
$buyer->setName($user->name);
$buyer->setSurname("Budak");
$buyer->setGsmNumber("+905366927125");
$buyer->setEmail($user->email);
$buyer->setIdentityNumber("40588218084");
$buyer->setLastLoginDate("2024-01-02 12:43:35");
$buyer->setRegistrationDate("2023-12-21 15:12:09");
$buyer->setRegistrationAddress("Kağıthane Mehmet akif ersoy mahallesi");
$buyer->setIp(\request()->ip());
$buyer->setCity("Istanbul");
$buyer->setCountry("Turkey");
$buyer->setZipCode("34400");
$request->setBuyer($buyer);


// KARGO ADRESİ NESNESİNİ OLUŞTUR
$shippingAddress = new \Iyzipay\Model\Address();
$shippingAddress->setContactName($user->name);
$shippingAddress->setCity("Istanbul");
$shippingAddress->setCountry("Turkey");
$shippingAddress->setAddress("Kağıthane Mehmet akif ersoy mahallesi");
$shippingAddress->setZipCode("34400");
$request->setShippingAddress($shippingAddress);


// FATURA ADRESİ NESNESİNİ OLUŞTUR
$billingAddress = new \Iyzipay\Model\Address();
$billingAddress->setContactName($user->name);
$billingAddress->setCity("Istanbul");
$billingAddress->setCountry("Turkey");
$billingAddress->setAddress("Kağıthane Mehmet akif ersoy mahallesi");
$billingAddress->setZipCode("34400");
$request->setBillingAddress($billingAddress);


//SEPETTEKİ ÜRÜNLERİ (CARTDETAİLS) BASKETİTEM LİSTESİ OLARAK HAZIRLA
$basketItems= $this->getBasketItems();
 $request->setBasketItems($basketItems);

// OPTİON NESNESİ OLUŞTUR
$options = new \Iyzipay\Options();
$options->setApiKey(env("TEST_IYZI_API_KEY"));
$options->setSecretKey(env("TEST_IYZI_SECRET_KEY"));
$options->setBaseUrl(env("TEST_IYZI_BASE_URL"));


//ÖDEME YAP

        $payment = \Iyzipay\Model\Payment::create($request, $options);


// SİPARİŞ İŞLEMİ SONUCU
if ($payment->getStatus() == "success"){

   // Siparişi oluştur
    $cart->is_active = false;
    $cart->save();
    $order = New Order([
        "cart_id" => $cart->cart_id,
        "code" => $cart->code
    ]);
    $order->save();

    // Siparişi  Detayını oluştur

    $order->details()->create($cart->details->toArray());
    


        // Fatura  Detayını oluştur
$invoice = New Invoice([
    "cart_id"=>$order->order_id,
    "code"=>$order->code
]);

// Fatura detaylarını ekle

    $invoice->details()->create($order->details->toArray());

            return view("frontend.checkout.success");


  }else{
    $errorMessage = $payment->getErrorMessage();
        return view("frontend.checkout.error",["message"=>$errorMessage]);

  }

    }


    /**
     * @return float
     */
     private function calculateCartTotal():float
    {
        $total = 0 ;
        $cart = $this->getOrCreateCart();
        $cartDetails = $cart->details;
        foreach ($cartDetails as $detail){
           $total += $detail->product->price * $detail->quantity;
        }
        return $total;
    }



     private function getOrCreateCart(): Cart
    {
        $user = Auth::user();
        $cart = Cart::firstOrCreate(
            ['user_id' => $user->user_id, 'is_active' => true],
            ['code' => Str::random(8)]
        );
        return $cart;
    }

    /**
     * @return array
     */
    private function getBasketItems(): array
    {
        $basketItems = array();
         $cart = $this->getOrCreateCart();
        $cartDetails = $cart->details;
        foreach ($cartDetails as $detail){
            $item = new \Iyzipay\Model\BasketItem();
            $item->setId($detail->product->product_id);
            $item->setName($detail->product->name);
            $item->setCategory1($detail->product->category->name);
            $item->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
            $item->setPrice($detail->product->price);

            for ($i = 0; $i < $detail->quantity; $i++){
array_push($basketItems,$item);
            }

        }


        return  $basketItems;
    }


}
