<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link 
		rel="stylesheet" 
		href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
		integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
		crossorigin="anonymous">
	<script
		src="https://code.jquery.com/jquery-3.3.1.js"
		integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
		crossorigin="anonymous">
	</script>
	<script 
		src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" 
		integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" 
		crossorigin="anonymous">
	</script>
	<link 
		rel="stylesheet" 
		href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" 
		integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" 
		crossorigin="anonymous">
		<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.2.1/cyborg/bootstrap.min.css" rel="stylesheet" integrity="sha384-e4EhcNyUDF/kj6ZoPkLnURgmd8KW1B4z9GHYKb7eTG3w3uN8di6EBsN2wrEYr8Gc" crossorigin="anonymous">
	<style type="text/css">
		.card
		{
			margin: auto;
			margin-top: 10%;
			width: 85%;
			outline: none;
			text-align: center;
		}
		.form
		{
			width: 75%;
			background: none;
		}
		#searchForm
		{
			position: relative;
			justify-content: center;
		}
		input
		{
			text-align: center;
			color: #888888;
			outline: none;
			display: block;
			border: none;
			background: transparent;
			border-bottom: 1px solid #888888;
		}

		input:focus
		{
			color: white;
			outline: none;
			border-bottom: 2px solid #9933CC;
		}
		button:focus
		{
			outline: none;
		}
		#searchText
		{
			color: #888888;
			border: none;
			outline: none;
			background: none;
		}
		#searchText:hover
		{
			color: white;
		}
		#searchText:focus
		{
			color: white;
		}
		.col-md-4
		{
			padding-left: 0px;
			padding-right: 0px;
		}
		.card-header
		{
			width: 100%
		}
		h5
		{
			font-size: 1.30rem;
		}
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
	if (val)
	{
		console.log(val);
		$.get("https://www.omdbapi.com/?i="+ val +"&plot=full&apikey=1f18a935",function(rawdata)
		{
			if(rawdata.Response) 
			{
				console.log(rawdata);
				$('#result').html('');
									
					var content;
					var imdbRating;
					var srcImage;
					var imdbURL = "https://www.imdb.com/title/" + rawdata.imdbID +"/";

					// check if there is a rating given
					var rating;
					imdbRating = rawdata.imdbRating;
					if (imdbRating !== 'N/A')
						var rating = imdbRating+"/10";
					else
						var rating = 'N/A';						

					// check if there is a movie poster avaliable
					if(rawdata.Poster === 'N/A')
						srcImage = "https://xulonpress.com/bookstore/images/ImageNotAvailable_300x450.jpg";
					else 
						srcImage = rawdata.Poster;	

					content = 
					`<div class="card-header">
						<h4 id="movieName" class="card-title">`+ rawdata.Title+ `</h4>
						<p class="text-muted">(` + rawdata.Year +`)</p>
					</div>
					<div class="card-body">	
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm-4 gallery-pad">
									<img src="` + srcImage + `" style="width: 100%; height: 450px;"/>
									<div class="row IMDb" style="padding: 5px;">
										<div class="col-sm gallery-pad">
											<p><i class="fas fa-star"></i> `+ rating +`</p>
										</div>
										<div class="vl"></div>
										<div class="col-sm gallery-pad">
											<a href="`+ imdbURL +`">Go to IMDb Page</a>
										</div>
									</div>
								</div>
								<div class="col-sm-8 gallery-pad">
									<p><b>Genre:</b> `+ rawdata.Genre +`</p>
									<br>
									<p><b>Plot:</b> `+ rawdata.Plot +`</p>
									<br>
									<p><b>Cast:</b> `+ rawdata.Actors +`</p>
								</div>
							</div>
						</div>
					</div>`;
			
					$('#result').append(content).hide().fadeIn(); 
			}
		});
	}

</script>
