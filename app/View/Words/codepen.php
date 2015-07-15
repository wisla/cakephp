<?php echo $this->Html->image('word2.gif', array('class' => 'hide', 'id' => 'loader')); ?>
<!DOCTYPE html> 
<head>
<?php
echo $this->Html->charset();
echo $this->Html->script(array('jquery.mixitup'));
echo $this->Html->css('mix');
?>
<link href='http://fonts.googleapis.com/css?family=Maven+Pro' rel='stylesheet' type='text/css'>
<script>
						$(function(){
						  $('.container').mixItUp();
						});
						</script>

<style>
body {
  padding: 4em;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  font-family: open sans;
  font-weight: 300;
  line-height: 1.5;
  font: 100%;
}

.services-grid {
  width: 668px;
  position: relative;
  display: table;
  margin-bottom: 2em;
}

.services-detail {
  position: absolute;
  background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuNSIgeTE9IjAuMCIgeDI9IjAuNSIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzQ4NDY0OCIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iIzMzMzEzMyIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
  background-size: 100%;
  background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #484648), color-stop(100%, #333133));
  background-image: -moz-linear-gradient(#484648, #333133);
  background-image: -webkit-linear-gradient(#484648, #333133);
  background-image: linear-gradient(#484648, #333133);
  display: table-cell;
  height: 100%;
  padding: 2em 4em;
  margin: -2em -4em;
  color: white;
}
.services-detail .next, .services-detail .previous, .services-detail .close {
  font-family: entypo;
  font-size: 3.75em;
  position: absolute;
  cursor: pointer;
  padding: .25em;
  top: 35%;
  color: rgba(255, 255, 255, 0.2);
  -moz-transition: color 0.1s;
  -o-transition: color 0.1s;
  -webkit-transition: color 0.1s;
  transition: color 0.1s;
}
.services-detail .next:hover, .services-detail .previous:hover, .services-detail .close:hover {
  color: rgba(255, 255, 255, 0.5);
}
.services-detail .next {
  right: 0;
}
.services-detail .previous {
  left: 0;
}
.services-detail .close {
  right: 0;
  top: -33px;
}
.services-detail h1 {
  font-family: Maven Pro;
  font-size: 2.618125em;
}
.services-detail p {
  margin-bottom: 2em;
}
.services-detail dl {
  display: inline-block;
  width: 29%;
  float: left;
  padding: 0 1em;
  font-size: .875em;
}
.services-detail dl dt {
  font-weight: bold;
  color: #c3c5c6;
}
.services-detail dl dd {
  margin-left: 2em;
  margin-bottom: 1em;
  display: list-item;
  list-style-type: disc;
}

ul {
  position: relative;
}

li {
  display: inline-block;
  width: 33.33%;
  padding: 3em 0;
  line-height: 1em;
  min-height: 60px;
  float: left;
  text-align: center;
  font-size: 1.618125em;
  font-family: Maven Pro;
  box-shadow: 0 0 1px 0 #c3c5c6 inset;
  color: #636667;
  cursor: pointer;
  -moz-transition: all 0.1s ease-in-out;
  -o-transition: all 0.1s ease-in-out;
  -webkit-transition: all 0.1s ease-in-out;
  transition: all 0.1s ease-in-out;
}
li:hover {
  color: #2da8de;
  background-color: rgba(0, 0, 0, 0.01);
}

</style>
						


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

		
		
			<div class="services-grid container">
  
  <ul>
						<? foreach($words as $word): ?>
						<li class="mix service <?php echo 'category-' . $word['Word']['category'] ?>" data-myorder="<?php echo $word['Word']['id'] ?>" data-detail="<? print $word['Word']['id'] ?>"> 
				        
							<figure>
								<img src="img/thumb/1.png" alt="img01"/>
								<figcaption><h3>
								<?= $word['Word']['pl_words'] ?>
								</h3><p><?= $word['Word']['category'] ?></p></figcaption>
							</figure>
                            
						</li>
					

						<? endforeach; ?>
					</ul>
				
				
				
				
					
						 <? foreach($words as $word): ?>
                                                                           
						<div class="services-detail" id="<? print $word['Word']['id'] ?>">
                        <div class="close">&#10060;</div>
                        <div class="next">&#59230;</div>
                        <div class="previous">&#59229;</div>
   
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
                        <? endforeach; ?>
		
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
                        $( ".services-detail" ).hide();

                            $( ".service" ).click(function() {
                              var id = $(this).data("detail");
                              
                              $( "#"+id ).animate({
                                        height: "toggle",
                                        opacity: "toggle"
                                    }, "fast");
                            });
                            
                            $( ".close" ).click(function() {
                              $(this).parent().animate({
                                        height: "toggle",
                                        opacity: "toggle"
                                    }, "fast");
                            });
                            
                            $( ".next" ).click(function() {
                              
                              $(this).parent().animate({
                                        opacity: "toggle"
                                    }, "fast");
                              var next = $(this).parent().next(".services-detail");
                              if (!next || next.length == 0) next = $(".services-detail:first");
                              
                              $(next).animate({
                                opacity: "toggle"
                              }, "fast");
                            });
                            
                            $( ".previous" ).click(function() {
                              $(this).parent().animate({
                                        opacity: "toggle"
                                    }, "fast");
                              
                              var prev = $(this).parent().prev(".services-detail");
                              if (!prev || prev.length == 0) prev = $(".services-detail:last");
                              
                              $(prev).animate({
                                opacity: "toggle"
                              }, "fast");
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