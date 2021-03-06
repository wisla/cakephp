<?php echo $this->Html->image('word2.gif', array('class' => 'hide', 'id' => 'loader')); ?>
<?php
echo $this->Html->charset();
echo $this->Html->css(array('magnific-popup', 'mediaBoxes'));
?>
<!DOCTYPE html>


	<head>

	<style>
	.white-popup {
  position: relative;
  background: #FFF;
  padding: 20px;
  width: auto;
  max-width: 500px;
  margin: 20px auto;
}
	.media-boxes-drop-down {
  float: right;
  margin-left: 8px;
}
	</style>
	</head>
	<body>
	<div class="grid-section">
    <div class="content grid-container">
<div class="filters-container">
<!-- The searching text field -->
<input type="text" id="search" class="media-boxes-search" placeholder="Search By Title">
<!-- The sorting drop down -->
<div class="media-boxes-drop-down" id="sort">
    <div class="media-boxes-drop-down-header">
    </div>
    <ul class="media-boxes-drop-down-menu">
        <li><a class="selected" href="#" data-sort-by="title">Sort by Title</a></li>
		<li><a href="#" data-sort-by="date">Sort by Date</a></li>
        <li><a href="#" data-sort-by="text">Sort by Text</a></li>
    </ul>
</div>

<!-- The filter bar -->
<ul class="media-boxes-filter" id="filter">
  <li><a class="selected" href="#" data-filter="*">All</a></li>

  <? $categories = Hash::extract($words, '{n}.Word.category');
			$uniqueCategories = array_unique($categories);
			foreach ($uniqueCategories as $category) {
				echo '<li><a href="#" data-filter=".' . str_replace(' ', '', $category) . '">' . $category . '</a></li>';
			}?>
<!-- ' . str_replace(' ', '', $category) . ' -->
</ul>
</div>


<!-- The grid with media boxes -->
<div id="grid">

    <!-- --------- MEDIA BOX MARKUP --------- -->
		<? foreach($words as $word): ?>
    <div class="media-box <?php echo  str_replace(' ', '', $word['Word']['category']) ?>">
    <div class="media-box-image">
        <div data-thumbnail="img/thumb/1.png"></div>
		<div data-type="inline" data-popup="#<?php echo $word['Word']['id'] ?>"></div>
		<div class="thumbnail-overlay">
            <i class="fa fa-plus mb-open-popup"></i>
        </div>
	</div>
	<div class="media-box-content">
        <div class="media-box-title"><?= $word['Word']['category'] ?></div>
        <div class="media-box-date"><?php echo date('d.m.Y', strtotime($word['Word']['date_create'])); ?></div>
        <div class="media-box-text">
		<h3><?= $word['Word']['pl_words'] ?></h3>
            Lorem ipsum dolor sit amet psico dell consecteture adipisicing elit. Adipisci, fugit, eveniet, ut exercitationem.
        </div>
        <div class="media-box-more"> <a href="#">Go !</a> </div>
    </div>
    </div>
		<? endforeach; ?>
<?php
echo $this->Html->script(array('jquery-1.10.2.min', 'jquery.isotope.min', 'jquery.imagesLoaded.min', 'jquery.transit.min', 'jquery.easing', 'waypoints.min', 'modernizr.custom.min', 'jquery.magnific-popup.min', 'jquery.mediaBoxes', 'bootstrap.min'));
?>

	<!-- --------- Info inside popout --------- -->
	<? foreach($words as $word): ?>
 		<div id="<?php echo $word['Word']['id'] ?>" class="white-popup mfp-hide">
		<h3 id="check"><?php echo $word['Word']['pl_words'] ?></h3>
			<form data-word="<? print $word['Word']['en_words'] ?>">

                  <span class="validation"></span>
                  <input autofocus id="cours" class="word" type="text"/>
                  <input id="forma" type="submit" value="Check"/>

            </form>
        <button onclick="reply_click(this)">Show</button>
		<h4 id="hidden_en" class="hidden_en"><?php echo $word['Word']['en_words'] ?></h4>
		</div>
			<script>
				$('#prev_next').focus(function(){
				$(this).next('input').focus();
				})
				</script>
	<? endforeach; ?>
</div>
</div>
</div>
<div class="to-top" style="display: block;">
		<i class="glyphicon glyphicon-chevron-up"></i>
	</div>

<script>

    $('#grid').mediaBoxes({
        boxesToLoadStart: 25,
        boxesToLoad: 4,
        minBoxesPerFilter: 25,
        lazyLoad: true,
        horizontalSpaceBetweenBoxes: 15,
        verticalSpaceBetweenBoxes: 15,
        columnWidth: 'auto',
        columns: 7,
        resolutions: [
			{
				maxWidth: 1920,
				columnWidth: 'auto',
				columns: 7,
			},
            {
                maxWidth: 960,
                columnWidth: 'auto',
                columns: 3,
            },
            {
                maxWidth: 650,
                columnWidth: 'auto',
                columns: 2,
            },
            {
                maxWidth: 450,
                columnWidth: 'auto',
                columns: 1,
            },
        ],
        filterContainer: '#filter',
        filter: 'a',
        search: '#search',
        searchTarget: '.media-box-text',
        sortContainer: '#sort',
        sort: 'a',
        getSortData: {
          title: '.media-box-title',
          text: '.media-box-text',
		  date: '.media-box-date'
        },
        waitUntilThumbLoads: true,
        waitForAllThumbsNoMatterWhat: false,
        thumbnailOverlay: true,
        overlayEffect: 'fade',
        overlaySpeed: 200,
        overlayEasing: 'default',
        showOnlyLoadedBoxesInPopup: false,
        considerFilteringInPopup: true,
        deepLinking: true,
        gallery: true,
        LoadingWord: 'Loading...',
        loadMoreWord: 'Load More',
        noMoreEntriesWord: 'No More Entries',
    });

</script>

 <script>
                        $(document).ready(function() {
                          $('form').submit(function(event) {
                            var $form = $(this),
                              value = $form.find('.word').val(),
                              word = $form.data('word'),
                              valid = word.toLowerCase() === value.toLowerCase(),
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
