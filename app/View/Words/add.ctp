<?php
echo $this->Html->charset();
echo $this->Html->css('bootstrap');
?>
<form class="form-horizontal" id="AdminAddForm" method="post" action="">
<h1>Add new WORDs
        <span>Please insert word in the fields.</span>
    </h1>
	<div class="form-group form-group-lg">
        <div class="col-sm-4">
		<select class="form-control" id="sel_lang_first" name="data[Word][language_in]">
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
		</div>
		<div class="col-sm-8">
		<input class="form-control" name="data[Word][en_words]" type="text" placeholder="Enter the word"/>
		</div>
    </div>


	<div class="form-group form-group-lg">
        <div class="col-sm-4">
		<select class="form-control" id="sel_lang_sec" name="data[Word][language_out]">
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
<script>
(function(){
    var selects = document.querySelectorAll('select');
    for (var i = 0, select; select = selects[i]; i++) {
        if (localStorage[select.id] !== undefined) {
            select.selectedIndex = localStorage[select.id];
        }
        select.onchange = function() {
            localStorage[this.id] = this.selectedIndex;
        }
    }
})()
</script>
		</div>
		<div class="col-sm-8">
		<input class="form-control" name="data[Word][pl_words]" type="text" placeholder="Enter the word"/>
		</div>
	</div>
	<div class="form-group form-group-lg">
        <div class="col-sm-4"><h4>Category :</h4></div>
		<div class="col-sm-4">
		<select class="form-control" name="data[Word][category]" >
        <option value="General">General</option>
        <option value="Przyroda">Przyroda</option>
		<option value="Natura">Natura</option>
		<option value="Relation">Relation</option>
		<option value="Feelings">Feelings</option>
        </select>
		</div>

    <select style="display: none;" name="data[Word][role]">
    <option value="<?php print $this->Session->read('Auth.User.username'); ?>"></option>
    </select>
	</div>
     <label class="col-sm-2 control-label">
        <span>&nbsp;</span>
        <input type="submit" class="button" value="Save" name="btnSubmit"/> <?php
echo $this->Form->end();
?>
<! change test -->
