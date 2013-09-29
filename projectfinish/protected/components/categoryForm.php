<?php
class CategoryForm extends CFormModel{
	public $name;
	public $idcategory;
	
	 public function rules()
    {
        return array(
            array('name', 'required')
		);

    }

}