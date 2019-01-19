<!DOCTYPE html>
<html>
<title></title>
	<?php
		require_once("header.php");
	?>

	<style type="text/css">
		.vl
		{
			width: 1px;
			background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgb(139, 139, 139) 50%, rgba(0, 0, 0, 0) 100%);
		}
	</style>
</head>
<body>
	<div class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
		<div class="container">
			<a href="#" class="navbar-brand">Hypertube</a>        
		</div>
	</div>
	<br>
	<div id="result" class="card border-info mb-3">		
	</div>
</body>
</html>
<script type="text/javascript">

	var val = "<?php echo $_GET['id'] ?>";
	console.log(val);
	if (val)
	{
		$(document).ready(function()
		{
			$.get("https://api.themoviedb.org/3/movie/"+ val +"?api_key=4084c07502a720532f5068169281abff",function(rawdata)
			{
				var result = appendMovieData(rawdata, val, "info");
				console.log(result);		
			});
			
		});

		// 			var content;
		// 			var imdbRating;
		// 			var srcImage;
		// 			var imdbURL = "https://www.imdb.com/title/" + rawdata.imdbID +"/";

		// 			// check if there is a rating given
		// 			var rating;
		// 			imdbRating = rawdata.imdbRating;
		// 			if (imdbRating !== 'N/A')
		// 				var rating = imdbRating+"/10";
		// 			else
		// 				var rating = 'N/A';						

		// 			// check if there is a movie poster avaliable
		// 			if(rawdata.Poster === 'N/A')
		// 				srcImage = "https://xulonpress.com/bookstore/images/ImageNotAvailable_300x450.jpg";
		// 			else 
		// 				srcImage = rawdata.Poster;	

		// 			content = 
		// 			`<div class="card-header">
		// 				<h4 id="movieName" class="card-title">`+ rawdata.Title+ `</h4>
		// 				<p class="text-muted">(` + rawdata.Year +`)</p>
		// 			</div>
		// 			<div class="card-body">	
		// 				<div class="container-fluid">
		// 					<div class="row">
		// 						<div class="col-sm-4 gallery-pad">
		// 							<img src="` + srcImage + `"/>
		// 							<div class="row IMDb" style="padding: 5px;">
		// 								<div class="col-sm gallery-pad">
		// 									<p><i class="fas fa-star"></i> `+ rating +`</p>
		// 								</div>
		// 								<div class="vl"></div>
		// 								<div class="col-sm gallery-pad">
		// 									<a href="`+ imdbURL +`">Go to IMDb Page</a>
		// 								</div>
		// 							</div>
		// 						</div>
		// 						<div class="col-sm-8 gallery-pad">
		// 							<p><b>Genre:</b> `+ rawdata.Genre +`</p>
		// 							<br>
		// 							<p><b>Plot:</b> `+ rawdata.Plot +`</p>
		// 							<br>
		// 							<p><b>Cast:</b> `+ rawdata.Actors +`</p>
		// 						</div>
		// 					</div>
		// 					<div class="row">
		// 					</div>
		// 					<div class="row">
		// 					</div>
		// 				</div>
		// 			</div>`;
			
		// 			$('#result').append(content).hide().fadeIn(); 
		// 	}
		// });
	}

</script>
