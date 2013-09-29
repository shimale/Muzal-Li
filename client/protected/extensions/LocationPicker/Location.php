<?php
/**
 * Company: ToXSL Technologies Pvt. Ltd. < www.toxsl.com >
 * Author : Shiv Charan Panjeta < shiv@toxsl.com >
 */
/**
 * Location class.
 * Location is the data structure for location info
 */
class Shop extends CFormModel
{
	public $name;
	public $phone;
	public $email;
	public $adress;
	public $link;
	public $lat;
	public $lng;


	/**
	 * Declares the validation rules.
	 */
	 public function rules()
    {
        return array(
            array('name,phone,email,adress,link,lat,lng', 'required'),
            array('email','email'),

        );
    }

}