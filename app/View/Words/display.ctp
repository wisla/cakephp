<?php
//echo $this->Html->charset();
	echo $this->Html->script('jquery');
	$this->Paginator->options(array(
	'update' => '#content',
	'before' => $this->Js->get('#loader')->effect('fadeIn', array('buffer'=> false)),
	'complete' => $this->Js->get('#loader')->effect('fadeOut', array('buffer'=> false))
	));
?>
<?php echo $this->Html->image('word2.gif', array('class' => 'hide', 'id' => 'loader')); ?>
<div id="wrapper">
  <h1>WORDs <?=$this->Html->link('ADD', array('controller' => 'words', 'action' => 'add'))?></h1>
  
  <table id="keywords" cellspacing="0" cellpadding="0">
    <thead>
      <tr>
        <th><span><?php echo $this->Paginator->sort('en_words', 'EN') ?></span></th>
        <th><span><?php echo $this->Paginator->sort('pl_words', 'PL') ?></span></th>
        <th><span><?php echo $this->Paginator->sort('category', 'Category') ?></span></th>
        <th colspan='2'>Action</th>
      </tr>
    </thead>
    <tbody>
	<? foreach($words as $word): ?>
      <tr>
	   <td><?= $word['Word']['en_words'] ?></td>
       <td><?= $word['Word']['pl_words'] ?></td>
       <td><?= $word['Word']['category'] ?></td>
       
	   <td><?php echo $this->Form->postLink('Usuń', array('action' => 'remove', $word['Word']['id']),
	   array('confirm' => 'Czy napewno?')); ?></td>
        <td><?php echo $this->Html->link('Edit', array('action' => 'edit', $word['Word']['id'])); ?></td>



      </tr>
	  <? endforeach; ?>
    </tbody>
	
  </table>
  <div class="paging">
  <?php
    echo $this->Paginator->numbers();
  ?>
  </div>
  <?php echo $this->Js->writeBuffer(); ?>
 </div> 
</body>
</html>