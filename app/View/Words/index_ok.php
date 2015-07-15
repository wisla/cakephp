<?php echo $this->Html->image('word2.gif', array('class' => 'hide', 'id' => 'loader')); ?>
<?php
echo $this->Html->charset();
echo $this->Html->script(array('jquery.mixitup'));
echo $this->Html->css('mix');
?>
<!DOCTYPE html> 
						<script>
						$(function(){
						  $('.container').mixItUp();
						});
						</script>
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
								<img src="../img/thumb/1.png" alt="img01"/>
								<figcaption><h3>
								<?= $word['Word']['pl_words'] ?>
								</h3><p><?= $word['Word']['category'] ?></p></figcaption>
							</figure>
						</li>
						</div>
						<? endforeach; ?>
					</ul>
				</section>
				
				
				
					
						<section class="slideshow">
					<ul>
					<? foreach($words as $word): ?>
						<li> 
							<figure>
								<figcaption>				
              <form data-word="<? print $word['Word']['en_words'] ?>">
                <div>
                  <span class="validation"></span>
                  <input class="word" type="text"/>
                  <input id="forma" type="submit" value="Check"/>
                </div>
              </form>
            <span id="spans"></span>
								</figcaption>
								<h3 id="check"><?php echo $word['Word']['pl_words'] ?></h3>									
                                <button onclick="reply_click(this)">Show</button>
								<h4 id="hidden_en" class="hidden_en"><?php echo $word['Word']['en_words'] ?></h4>	
							</figure>
						</li>
						<? endforeach; ?>
					</ul>

					<nav>
						<span class="icon nav-prev"></span>
						<span class="icon nav-next"></span>
						<span class="icon nav-close"></span>
					</nav>
					<div class="info-keys icon">Navigate with arrow keys</div>
				</section>
									
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
						<script>
							new CBPGridGallery( document.getElementById( 'grid-gallery' ) );
						</script>
						
		
		
	</body>

</html>