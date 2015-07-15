<?php echo $this->Html->image('word2.gif', array('class' => 'hide', 'id' => 'loader')); ?>
<!DOCTYPE html> 
<head>
<?php
echo $this->Html->charset();
echo $this->Html->script(array('jquery.mixitup'));
echo $this->Html->css('mix');
?>
						<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
						<script>
						$(function(){
						  $('.container').mixItUp();
						});
						</script>
						<script>
						$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
						</script>


</head>
	<body>
		<div>

 <div class="controls">
  <label>Filter:</label>
  
  <button class="filter" data-filter="all">All</button>
  <? $categories = Hash::extract($words, '{n}.Word.category');
			$uniqueCategories = array_unique($categories);
			foreach ($uniqueCategories as $category) {
				echo '<button class="filter" data-filter=".category-' .$category. '">' . $category . '</button>';
			}?>
  
  <label>Sort:</label>
  
  <button class="sort" data-sort="myorder:asc">Asc</button>
  <button class="sort" data-sort="myorder:desc">Desc</button>
</div>

		
		
			<div id="grid-gallery" class="grid-gallery container">
				<section class="grid-wrap">
					<ul class="grid">
						<li class="grid-sizer"></li>
						<? foreach($words as $word): ?>
						<div class="mix <?php echo 'category-' . $word['Word']['category'] ?>" data-myorder="<?php echo $word['Word']['id'] ?>"> 
						<li>
							<figure>
								<img src="img/thumb/1.png" alt="img01"/>
								<figcaption><h3>
								<?= $word['Word']['pl_words'] ?>
								</h3><p><?= $word['Word']['category'] ?></p></figcaption>
							</figure>
						</li>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<? print $word['Word']['id'] ?>" data-whatever="@mdo">Open modal for @mdo</button>
						</div>
						<? endforeach; ?>
					</ul>
				</section>
				
				
				
					
						 <? foreach($words as $word): ?>
                                                                           
						<div class="modal fade" id="<? print $word['Word']['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
   
  <div class="modal-dialog" role="document">

    <div class="modal-content" data-toggle="lightbox" data-gallery="global-gallery" data-parent="">
	
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
      </div>
	  
      <div class="modal-body">
   
           <form data-word="<? print $word['Word']['en_words'] ?>">
                <div>
                  <span class="validation"></span>
                  <input class="word" type="text"/>
                  <input id="forma" type="submit" value="Check"/>
                </div>
              </form>
         <h3 id="check"><?php echo $word['Word']['pl_words'] ?></h3>									
                                <button onclick="reply_click(this)">Show</button>
								<h4 id="hidden_en" class="hidden_en"><?php echo $word['Word']['en_words'] ?></h4>	
       
      </div>
	  
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
	
  </div>
  
</div>
<? endforeach; ?>
									
			</div>
		</div>
                        <script>
                        $(document).ready(function() {
                          $('form').submit(function(event) {
                            var $form = $(this),
                              value = $form.find('.word').val(),
                              word = $form.data('word'),
                              valid = word === value.toLowerCase(),
                              message = function(){
							  if (valid == true){
							  $(this).next().css({"background": "#1DB51D", "color": "white"});
							  }

							  else { 
							  $(this).next().css({"background": "red", "color": "white"});
							  }
                        }
                            $form
                              .find('.validation')
                              .html(message)
                              .show();
                        
                            event.preventDefault();
                          });
						  
                        });
                        </script>
                        
                        <script>
                        function reply_click(btn)
                        {
                            $(btn).next("#hidden_en").toggle("slow");   
                        }
                        </script>
						
		
		
	</body>

</html>