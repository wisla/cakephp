<?php

class Word extends AppModel
{
	var $name = 'Word';
    var $validate = array(
        'en_words' => array(
		'rule' => array('notEmpty', 'blank'),
        'on' => 'create'
		),
		'pl_words' => array(
		'rule' => array('notEmpty', 'blank'),
        'on' => 'create'
		)
    );

}

?>
