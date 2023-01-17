<?php

namespace App;

use App\Cart\Item;
use App\Cart\ShoppingCart;
use App\Order\Order;
use App\Invoice\TextInvoice;
use App\Invoice\PDFInvoice;
use App\Customer\Customer;
use App\Payments\CashOnDelivery;
use App\Payments\CreditCardPayment;
use App\Payments\PaypalPayment;

class Application
{
    public static function run()
    {
        $nike = new Item('Nike', 'Low Blazers' , 8000);
        $puma = new Item('Puma', 'Shuffle Sneakers' , 5500);

        $shopping_cart = new ShoppingCart();
        $shopping_cart->addItem($nike, 5);
        $shopping_cart->addItem($puma, 2);
        $customer = new Customer('Jesel De Jesus', 'Telabastagan', 'dejesus.jeselaurvic@auf.edu.ph');
        $order = new Order($customer, $shopping_cart);

        $invoice = new PDFInvoice();
        $order->setInvoiceGenerator($invoice);
        $invoice->generate($order);

        $payment = new PaypalPayment('dejesusjesel.paypal@gmail.com', 'sheeshable');
        $order->setPaymentMethod($payment);
        $order->payInvoice();
    }
}