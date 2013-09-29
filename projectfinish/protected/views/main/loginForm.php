<?php
return array(
    'name'=>'loginFrom',
    //'action'=>yii::app()->baseUrl. "/login",
    'elements'=>array(
        'username'=>array(
            'type'=>'text',
            'label'=> 'שם משתמש',
            ),
        'password'=>array(
            'type'=>'password',
            'label'=> 'סיסמה',
            ),
        
        ),
    'buttons'=>array(
        'login'=>array(
            'type'=>'submit',
            'label'=>'התחבר',
            'data-theme'=>'b',
            
            ),
        ),
    );
?>