<?php

namespace App;
class AddressBook extends \Eloquent  {

	//public $timestamps = false;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
		protected $table = 'address_book';
        public $timestamps = false;

        public static $rules = array();
        protected $guarded = array();
    }