<?php
return array(
    'name'=>'shopFrom',
    
    'elements'=>array(
       /* 'price'=>array(
            'type'=>'number',
            'label'=> 'מחיר',
             'data-type'=>'range' ,
             'data-track-theme'=>'b',
              'data-theme'=>'b',

            ),*/
          'idsubcategory'=>array('type'=>'hidden'),
          'idshop'=> array('type'=>'hidden'),
          'idprodect'=> array('type'=>'hidden'),
          'id'=> array('type'=>'hidden'),
        ),

    'buttons'=>array(
        'submit'=>array(
            'type'=>'submit',
            'label'=>'עדכן',
            'data-theme'=>'e',
            'class'=>'submit',
            ),
        ),
    );
?>