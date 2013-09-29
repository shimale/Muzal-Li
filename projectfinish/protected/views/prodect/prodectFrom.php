<?php
return array(
    'name'=>'prodectFrom',
    'attributes' => array(
        'enctype' => 'multipart/form-data',
    ),

    'elements'=>array(
       'name'=>array(
        'type'=>'text',
        'label'=> 'שם מוצר',
        ),
      /* 'minprice'=>array(
        'type'=>'text',
        'label'=> 'מחיר מינמלי',
        ),
       'maxprice'=>array(
        'type'=>'text',
        'label'=> 'מחיר מקסמילי',
        ),*/
        
       
       'id' =>array( 'type'=>'hidden'),
       'idSubcategory'  =>array( 'type'=>'hidden'),
       'idCategory'  =>array( 'type'=>'hidden'),
       
       
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