<?php
echo $this->Html->charset();
echo $this->Html->css('add');
?>
<form id="AdminAddForm" method="post" action="">

	<h1>Edit WORDs
		<span>Please edit word in the fields.</span>
	</h1>

	<?php
    echo $this->Form->create('Word');
	echo $this->Form->input('en_words');
	echo $this->Form->input('pl_words');
	echo $this->Form->input('category');
	?>

	<?php

    echo $this->Form->input('id', array('type' => 'hidden'));
	echo $this->Form->end('Save Post');
	?>
