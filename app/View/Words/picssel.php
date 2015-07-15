<?php echo $this->Html->image('word2.gif', array('class' => 'hide', 'id' => 'loader')); ?>
<?php
echo $this->Html->charset();
echo $this->Html->script(array('isotope.pkgd', 'jquery.fancybox.pack', 'jquery.fancybox-buttons'));
echo $this->Html->css(array('isotope', 'jquery.fancybox', 'jquery.fancybox-buttons', 'mix'));
?>
<!DOCTYPE html> 
<style type="text/css">
/* this demo specific styles */
.imgContainer {
  width: 100px;
  height: 100px;
  overflow: hidden;
  text-align: center;
  margin: 10px 20px 10px 0;
  float: left;
  border: solid 1px #999;
  display: block;
}
.imgContainer:hover{
  border-bottom: solid 1px #444;
  border-left: solid 1px #444;
  margin: 9px 19px 11px 1px;
 -webkit-box-shadow: -3px 3px 10px 1px #777;
    -moz-box-shadow: -3px 3px 10px 1px #777;
         box-shadow: -3px 3px 10px 1px #777;
}
#galleryTab {
  margin: 10px 5px 20px 0;
  top: 26px;
  width: 450px;
}
.galleryWrap {
  padding: 0 0 30px;
}
.filter {
  border: 1px solid #ccc;
  color: #333333;
  float: left;
  font-size: 12px;
  margin: 0 12px 0 0;
  padding: 5px 15px;
  text-align: center;
  text-decoration: none;
  text-transform: capitalize;
 -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
         border-radius: 3px;
}
.filter:hover {
  background-color: #f8f8f8;
  margin: -1px 11px 1px 1px;
  border-bottom: solid 1px #aaa;
  border-left: solid 1px #aaa;
 -webkit-box-shadow: -2px 2px 5px 1px #a3a3a3;
    -moz-box-shadow: -2px 2px 5px 1px #a3a3a3;
         box-shadow: -2px 2px 5px 1px #a3a3a3;
}
.filter.active {
  background-color: #e2e2e2;
  border: 1px solid #ccc;
  color: #000;
  cursor: default;
  margin: 0 12px 0 0;
 -webkit-box-shadow: none;
    -moz-box-shadow: none;
         box-shadow: none;  
}
</style>
<style id="style-1-cropbar-clipper">/* Copyright 2014 Evernote Corporation. All rights reserved. */
.en-markup-crop-options {
    top: 18px !important;
    left: 50% !important;
    margin-left: -100px !important;
    width: 200px !important;
    border: 2px rgba(255,255,255,.38) solid !important;
    border-radius: 4px !important;
}

.en-markup-crop-options div div:first-of-type {
    margin-left: 0px !important;
}
</style>
						<script>

						jQuery(function($){
						  // The Fancybox script
						  $(".fancybox").fancybox({
							modal: true,
							helpers : { buttons: { } }
						  });
						  // The category selector jQuery script
						  $(".filter").on("click", function () {
							var $this = $(this);
							// if we click the active tab, do nothing
							if (!$this.hasClass("active")) {
							  $(".filter").removeClass("active");
							  $this.addClass("active"); // set the active tab
							  var $filter = $this.data("rel"); // get the data-rel value from selected tab and set as filter
							  $filter == 'all' ? // if we select "view all", return to initial settings and show all
								$(".fancybox").attr("data-fancybox-group", "gallery").not(":visible").fadeIn() 
								: // otherwise
								$(".fancybox").fadeOut(0).filter(function () { 
								  return $(this).data("filter") == $filter; // set data-filter value as the data-rel value of selected tab
								}).attr("data-fancybox-group", $filter).fadeIn(1000); // set data-fancybox-group and show filtered elements
							} // if
						  }); // on
						}); // ready

						</script>
	<body>
		<div>

 <div class="controls">
  <label>Filter:</label>
  
  <button class="filter" data-filter="all">All</button>
  <? $categories = Hash::extract($words, '{n}.Word.category');
			$uniqueCategories = array_unique($categories);
			foreach ($uniqueCategories as $category) {
				echo '<div id="galleryTab" class="cf">
				<a data-rel="' .$category. '" href="javascript:;" class="filter">' . $category . '</a>
				</div>';
			}?>

  <label>Sort:</label>
  
  <button class="sort" data-sort="myorder:asc">Asc</button>
  <button class="sort" data-sort="myorder:desc">Desc</button>
</div>

		
		
			<div class="galleryWrap cf">
				
						<? foreach($words as $word): ?>
						 <a class="fancybox" data-fancybox-group="gallery" data-filter="<?php echo $word['Word']['category'] ?>">
						 <figure>
								<img src="img/thumb/1.png" alt="img01"/>
								<figcaption><h3>
								<?= $word['Word']['pl_words'] ?>
								</h3><p><?= $word['Word']['category'] ?></p></figcaption>
							</figure></a>
									 
						
						
						
						<? endforeach; ?>
			</div>
				
				
				<script>
jQuery(function(e){var t,n,r,i=navigator.userAgent.match(/msie/i)?true:false;if(!document.referrer==""){if(document.referrer.indexOf(location.protocol+"//"+location.host)===0){n=true}}if(history.length==0&&i||history.length==1&&!i){t=false}else{t=true}if(t){if(n){r='<a class="button" href="'+document.referrer+'"> &larr; Go back to previous page </a>'}else{r='<a class="button" href="javascript:;" onclick="javascript: history.go(-1)"> &larr; Go back to previous page </a>'}e(r).appendTo("#wrap")}});
</script>
                       
                        
						
		
		
	</body>

</html>