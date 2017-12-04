<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{ 

		protected $fillable = array(
		'user_id_of_payment',
		'ad_id_of_payment',
		'membership_id_of_payment',
		'promotion_id_of_payment',
		'amount',
		'card_details'
		);

		// var $user_id_of_payment;
		// var $ad_id_of_payment;
		// var $membership_id_of_payment;
		// var $promotion_id_of_payment;
		// var $amount;
		// var $card_details;
       // var $payment_date;  the time stamp 'created at' will give this info



	function __construct($user_id_of_payment, $amount, $card_details) {	
	 	parent::__construct();	
		$this->user_id_of_payment = $user_id_of_payment;
		$this->amount = $amount;
		$this->card_details = $card_details;

	}
}
