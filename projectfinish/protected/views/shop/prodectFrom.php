<?php
return array(
    'name'=>'shopFrom',
    
    'elements'=>array(
       /* 'price'=>array(
            'type'=>'number',
            'label'=> 'מחיר',
             'data-type'=>'range' ,
             'data-track-theme'=>'b',
              'data-theme'=>'a',

            ),*/
          'idsubcategory'=>array('type'=>'hidden'),
           'idcategory'=>array('type'=>'hidden'),
          'id'=> array('type'=>'hidden'),
        ),

    'buttons'=>array(
        'submit'=>array(
            'type'=>'submit',
            'label'=>'הוסף',
            'data-theme'=>'e',
            'class'=>'submit',
            ),
        ),
    );
?>