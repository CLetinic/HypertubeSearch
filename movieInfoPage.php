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
		<div class="card-header">
			<h4 id="movieName" class="card-title">rawdata.Title</h4>
			<p class="card-title">(rawdata.Year)</p>
		</div>        
		<div class="card-body">
			<!-- <h4 class="card-title">Heading</h4> -->		
			<div class="container-fluid">
				<div id="result" class="row">
					<div class="col-sm-4 gallery-pad">
						<img src="` + srcImage + `" style="width: 100%; height: 450px;"/>
						<p></p>
					</div>
					<div class="col-sm-8 gallery-pad">
						<p>
					</div>
				</div>
			</div>
		</div>
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
				//rawdata.Search[0](function(rawdata) 
				
					console.log(rawdata.Title);
					var content;
					var movieid = rawdata.imdbID;
					var srcImage;

					if(rawdata.Poster === 'N/A')
						srcImage = "https://xulonpress.com/bookstore/images/ImageNotAvailable_300x450.jpg";
					else 
						srcImage = rawdata.Poster;

					content = 
					``;
					// `<div class="moviecards col-md-4 card border-secondary mb-3" style="max-width: 20rem; min-width: 20rem; align-items: center; border-color: #9933CC;" onmouseover="movieHoverIn(this)" onmouseout="movieHoverOut(this)" onclick="loadInfo('` + movieid + `')">
					// 	<div class="card-header">
					// 		<h5 id="movieName" class="card-title">`+ rawdata.Title +`</h5>
					// 	</div>
					// 	<div class="card-body">
					// 		<br>
					// 		<img src="` + srcImage + `" style="width: 100%; height: 450px;"/>
					// 		<br>
					// 		<p>Year Released: ` + rawdata.Year +`</p>
					// 	</div>
					// </div>`;
				
					$('#result').append(content).hide().fadeIn(); 
			}
		});
	}

</script>
