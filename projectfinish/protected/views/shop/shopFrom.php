<?php
return array(
    'name'=>'shopFrom',
    
    'elements'=>array(
        'name'=>array(
            'type'=>'text',
            'label'=> 'שם חנות',
            ),
        'phone'=>array(
            'type'=>'text',
            'label'=> 'טלפון חנות',
            ),
        'email'=>array(
            'type'=>'text',
            'label'=> 'דואר אלקטרוני חנות',
            ),
        'link'=>array(
            'type'=>'text',
            'label'=> 'כתובת אינטרנט',
            ),

        'adress'=>array(
            'type'=>'text',
            'label'=> 'כתובת',
             'class'=>'geocomplete',
             'placeholder'=>"חפש כתובת" ,
            
            ),
         
           'id'=>array(
            'type'=>'hidden',
           
            ),
           
        
        
        ),
    'buttons'=>array(
        'submit'=>array(
            'type'=>'submit',
            'label'=>'Login',
            'data-theme'=>'e',
           
             'id' =>'shop',
            ),
        ),
    );
?>