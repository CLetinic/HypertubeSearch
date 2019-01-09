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
	</style>
</head>
<body>
	<div class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
		<div class="container">
			<a href="#" class="navbar-brand">Hypertube</a>        
		</div>
	</div>
	<br>
	<div class="card border-info mb-3">                
		<div class="card-body">
			<h4 class="card-title">Search for a Movie</h4>
			<!-- IF YOU WANT TO HAVE A SEARCH BUTTON --> 
			<!-- <form id="searchForm" class="form-inline my-2 my-lg-0">
				<input class="form" type="search" placeholder="Search" style="border-radius: 0%;">
				<button id="searchText" type="submit"><i class="fa fa-search"></i></button> 
			</form> -->
			<div id="searchForm" class="form-inline my-2 my-lg-0">
				<input id="searchbar" class="form" type="search" placeholder="Search" style="border-radius: 0%;" onkeyup="getMovies(document.getElementById('searchbar').value)">
			</div>
		</div>
	</div>
	<div class="card border-info mb-3" id="result">  
		</div>
	<!-- <div class="container">
		<div id="movies" class="row"></div>
	</div> -->
</body>
</html>
<script type="text/javascript">
	// $(document).ready(function()
	// {
	// 	$('#searchForm').on('submit', function(e)
	// 	{
	// 		let searchText = $('#searchText').val();
	// 		getMovies(searchText);
	// 		e.preventDefault();
	// 	});
	// });

	//https://www.youtube.com/watch?v=67eJTr6_ylY
	//https://www.youtube.com/watch?v=aMKf3su6TjI
	//https://www.youtube.com/watch?v=bpHtxx_wmqw
	function getMovies(e)
	{
		$.get("http://www.omdbapi.com/?s="+e+"&apikey=1f18a935",function(rawdata)
		{
			var rawstring = JSON.stringify(rawdata);
			data = JSON.parse(rawstring)
			var title = data.Search[0].Title; 
			var year = data.Search[0].Year;
			var imdbURL = "https://www.imdb.com/title/"+data.Search[0].imdbID+"/";
			var posterURL = data.Search[0].Poster;
			document.getElementById('result').innerHTML="<h1>"+title+"</h1><br><img src='"+posterURL+"'/><br><p>Year Released: "+year+"</p><br><p>IMDb: <a href="+imdbURL+">"+imdbURL+"</a></p>";
		});
	}

	// $("#searchbar".value).keyup(function() 
	// {
	// 	alert( "Handler for .keyup() called." );
	// });
</script>