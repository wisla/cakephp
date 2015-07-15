<?php
echo $this->Html->charset();
echo $this->Html->css('bootstrap');
?>
<form id="AdminAddForm" method="post" action="">

<h1>Add new WORDs
        <span>Please insert word in the fields.</span>
    </h1>
   <label>
        <span>
    <select name="select-native-14" id="select-native-14">
        <option value="ukraine">Ukraine</option>
        <option value="poland">Poland</option>
        <option value="english">English</option>
		<option value="serbian">Serbian</option>
		<option value="spanish">Spanish</option>
		<option value="french">French</option>
		<option value="german">German</option>
		<option value="french">French</option>
		<option value="italian">Italian</option>
    </select>
		</span>
		<input name="data[Word][en_words]" type="text" placeholder="English word"/>
    </label>
    
    <label>
        <span>
		<select name="select-native-14" id="select-native-14">
        <option value="ukraine">Ukraine</option>
        <option value="poland">Poland</option>
        <option value="english">English</option>
		<option value="serbian">Serbian</option>
		<option value="spanish">Spanish</option>
		<option value="french">French</option>
		<option value="german">German</option>
		<option value="french">French</option>
		<option value="italian">Italian</option>
    </select>
		</span>
		<input name="data[Word][pl_words]" type="text" placeholder="Polish word"/>
    </label> 
     <label>
        <span>Category :</span><select name="data[Word][category]" >
        <option value="General">General</option>
        <option value="Przyroda">Przyroda</option>
		<option value="Natura">Natura</option>
		<option value="Relation">Relation</option>
		<option value="Feelings">Feelings</option>
        </select>
    </label>  
    <select style="display: none;" name="data[Word][role]">  
    <option value="<?php print $this->Session->read('Auth.User.username'); ?>"></option>
    </select>
     <label>
        <span>&nbsp;</span> 
        <input type="submit" class="button" value="Save" name="btnSubmit"/> <?php
echo $this->Form->end();
?>
    </label> 

