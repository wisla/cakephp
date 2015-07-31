<?php
echo $this->Html->charset();
echo $this->Html->css('add');
?>
<form id="AdminAddForm" method="post" action="">

	<h1>Edit WORDs
		<span>You can edit word in the fields.</span>
	</h1>

	<?php
    echo $this->Form->create('Word');
	echo $this->Form->input('en_words');
	echo $this->Form->input('pl_words');
	echo $this->Form->input('category');
	?>
	<fieldset>
		<legend>Choose category</legend>
		<div class="form-group form-group-lg">
			<div class="row">
				<div class="col-sm-4"><h4>Category:</h4></div>
				<div class="col-sm-4">
					<select class="form-control" name="data[Word][category]">
						<option value="" disabled selected>-- Wybierz kategorie --</option>
						<? $categories = Hash::extract($words, '{n}.Word.category');
			$uniqueCategories = array_unique($categories);
			foreach ($uniqueCategories as $category) {
				echo '<option value="' . $category . '">' . $category . '</option>';
						}?>
					</select>

				</div></div>

		</div>
	</fieldset>
	<?php

	echo $this->Form->input('id', array('type' => 'hidden'));
	echo $this->Form->end('Save Post');
	?>
