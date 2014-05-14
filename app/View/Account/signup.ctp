<div class="row">
	<div class="large-12 columns">
		<h1>Mes réponses</h1>
	</div>
</div>



<div class="row">
	<div class="large-3 columns">
		<div id="answer-filter">

			<h3>Filtrer les annonces</h3>
			<p>
			  <label for="amount">Prix</label>
			  <input type="text" id="amount-price">
			</p>
			 
			<div id="slider-range-price"></div>

			<p>
			  <label for="amount">Localisation</label>
			  <input type="text" id="amount-local">
			</p>
			 
			<div id="slider-range-local"></div>

			<p>
			  <label for="amount">% de compatibilité</label>
			  <input type="text" id="amount-pourcent">
			</p>
			 
			<div id="slider-range-pourcent"></div>
			
			
			
		</div>
	</div>
	<div class="large-9 columns">
		<div id="answer">
			<table>
				<?php 
				$i =0;
				while($i<7){ ?>
				<tr>
					<td class="pourcent"><center><b style="color:#d6dd62;font-size:20px;">98%</b></center>
						<div style="width:80px; height:6px; background-color:#ccc; overflow:hidden; border-radius:6px;margin-top:10px;">
							<div style="width:60px; height:6px; background-color:#d6dd62;">
							</div>
						</div>
					</td>
					<td class="thumb"><?php echo $this->Html->image('house/house.jpg'); ?></td>
					<td class="content"><h3>Grand loft familial</h3><em>Lorem ipsum de la house super ce truc ds dsdds ddsds dsds dsd...</em></td>
					<td class="price"><b>145 000 €</b></td>
					<td><b class="location">Nice</b></td>
					<td class="link"><a href="#" class="button">Voir l'annonce</a></td>
				</tr>
				<?php $i++; } ?>

			</table>
		</div>
	</div>
	

</div>

<script>
  $(function() {
  	var sliderPrice = $( "#slider-range-price" );
  	var amountPrice = $( "#amount-price" );
    sliderPrice.slider({
      range: true,
      min: 50000,
      max: 4000000,
      values: [ 100000, 300000 ],
      slide: function( event, ui ) {
        amountPrice.val( "" + ui.values[ 0 ] + " € - " + ui.values[ 1 ]+' €' );
      }
    });
    amountPrice.val( "" + sliderPrice.slider( "values", 0 ) +
      " € - " + sliderPrice.slider( "values", 1 )+' €' );

    var sliderLocal = $( "#slider-range-local" );
  	var amountLocal = $( "#amount-local" );
    sliderLocal.slider({
      range: true,
      min: 1,
      max: 1000,
      values: [ 10, 100 ],
      slide: function( event, ui ) {
        amountLocal.val( "" + ui.values[ 0 ] + " Km - " + ui.values[ 1 ]+' Km' );
      }
    });
    amountLocal.val( "" + sliderLocal.slider( "values", 0 ) +
      " Km - " + sliderLocal.slider( "values", 1 )+' Km' );

    var sliderPourcent = $( "#slider-range-pourcent" );
  	var amountPourcent = $( "#amount-pourcent" );
    sliderPourcent.slider({
      range: true,
      min: 0,
      max: 100,
      values: [ 70, 90 ],
      slide: function( event, ui ) {
        amountPourcent.val( "" + ui.values[ 0 ] + " % - " + ui.values[ 1 ]+' %' );
      }
    });
    amountPourcent.val( "" + sliderPourcent.slider( "values", 0 ) +
      " % - " + sliderPourcent.slider( "values", 1 )+' %' );
  });
  </script>