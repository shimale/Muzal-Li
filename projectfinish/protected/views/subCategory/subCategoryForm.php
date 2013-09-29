<?php
return array(
    'name'=>'SubCategoryFrom',
    
    'elements'=>array(
        'name'=>array(
            'type'=>'text',
            'label'=> 'שם תת קטגוריה',
            ),
         'id' =>array( 'type'=>'hidden'),
          'idcategory'  =>array( 'type'=>'hidden'),          
        
        ),
    'buttons'=>array(
        'submit'=>array(
            'type'=>'submit',
            'label'=>'הוסף',
            'data-theme'=>'e',
            
            ),
        ),
    );
?>