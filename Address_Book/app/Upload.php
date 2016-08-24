<?php

namespace App;
class Upload extends \Eloquent  {

	//public $timestamps = false;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
		protected $table = 'upload';
        public $timestamps = false;

        public static $rules = array();
        protected $guarded = array();
    }