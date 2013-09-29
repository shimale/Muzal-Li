<?php
class SubCategoryForm extends CFormModel{
	public $name;
	
	
	 public function rules()
    {
        return array(
            array('name', 'required')
		);

    }

}
?>
