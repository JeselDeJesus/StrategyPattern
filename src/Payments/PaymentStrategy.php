<?php

namespace App\Payments;

interface PaymentStrategy
{
	public function pay($amount);
}