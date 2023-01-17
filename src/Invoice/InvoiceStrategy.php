<?php

namespace App\Invoice;

use App\Order\Order;

interface InvoiceStrategy
{
	public function generate(Order $order);
}