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
	
	<select name="data[Word][category]" >
        <option value="General">General</option>
        <option value="Przyroda">Przyroda</option>
		<option value="Natura">Natura</option>
		<option value="Relation">Relation</option>
		<option value="Feelings">Feelings</option>
        </select>
	<?php
	
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->end('Save Post');
?>