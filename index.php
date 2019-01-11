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
		/* AESTHETIC */
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
		.col-sm-4
		{
			padding-left: 0px;
			padding-right: 0px;
		}
		.card-body
		{
			padding: 0.5rem 1.25rem 1.25rem 1.25rem /*top right bottom left*/
		}
		.card-header
		{
			width: 100%;
			height: 100px;
			display: flex;
			justify-content: center;
			flex-direction: column;
			text-align: center;
		}
		.card-footer
		{
			width: 100%;
		}
		h5
		{
			text-align: center;
			vertical-align: middle;
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
				<input id="searchbar" class="form" type="search" placeholder="Search" style="border-radius: 0%;">
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div id="result" class="row">	
		</div>		
	</div>
</body>
</html>
<script type="text/javascript">

	//https://www.youtube.com/watch?v=67eJTr6_ylY
	//https://www.youtube.com/watch?v=aMKf3su6TjI
	//https://www.youtube.com/watch?v=bpHtxx_wmqw

	$('#searchbar').on('input', function(event) 
	{
		$('#result').fadeOut();

		// to get search data
		$.get(`https://www.omdbapi.com/?s=${event.target.value}&type=movie&apikey=1f18a935`, function(rawdata)
		{
			if(rawdata.Response) 
			{
				$('#result').html('');
				rawdata.Search.forEach(function(movie) 
				{
					// to get additional movie metadata
					$.get("https://www.omdbapi.com/?i="+ movie.imdbID +"&plot=full&type=movie&apikey=1f18a935",function(moviedata)
					{
						var content;
						var imdbRating;
						var srcImage;
						var imdbURL = "https://www.imdb.com/title/" + movie.imdbID +"/";

						// check if there is a rating given
						var rating;
						imdbRating = moviedata.imdbRating;
						if (imdbRating !== 'N/A')
							var rating = imdbRating+"/10";
						else
							var rating = 'N/A';						

						// check if there is a movie poster avaliable
						if(movie.Poster === 'N/A')
							srcImage = "https://xulonpress.com/bookstore/images/ImageNotAvailable_300x450.jpg";
						else 
							srcImage = movie.Poster;	

						// AESTHETIC - This is just a font size chaninging effect.
						var titleSize;
						if(movie.Title.length <= 65) 
							titleSize = "font-size: 1.2rem";
						else
							 titleSize = "font-size: 100%";

						content = 
						`<div class="moviecards col-sm-4 card border-secondary sm-3" style="max-width: 20rem; min-width: 20rem; align-items: center; border-color: #9933CC;" onmouseover="movieHoverIn(this)" onmouseout="movieHoverOut(this)" onclick="loadInfo('` + movie.imdbID + `')">
							<div class="card-header">
								<h5 class="card-title" style="`+ titleSize +`">`+ movie.Title +`</h5>
							</div>
							<div class="card-body">
								<i class="far fa-eye" style="float: right; font-size: large;"></i>
								<br>
								<img src="` + srcImage + `" style="width: 100%; height: 450px; spadding-top: 0.5rem;"/>
								<br>
								<p text-muted>Year Released: ` + movie.Year +`</p>
							</div>
							<div class="card-footer">
								<p><i class="fas fa-star"></i> `+ rating +`</p>
								<br>
								<a href="`+ imdbURL +`">Go to IMDb Page</a>
							</div>
						</div>`;
					
						$('#result').append(content).hide().fadeIn(); 
					});					
				});
			}
		});
	});

	function loadInfo(id)
	{
		location.href += 'movieInfoPage.php/?id='+ id +'';
	};


	// AESTHETIC - This is just a hovering affect
	function movieHoverIn(elem)
	{
		$(elem).removeClass('border-secondary');
		$(elem).addClass('border-info');

		$(elem).children().css("color", "white");
	};
	function movieHoverOut(elem)
	{
		console.log("hoveringOut");
		$(elem).addClass('border-secondary');
		$(elem).removeClass('border-info');

		$(elem).children().css("color", "#888888");
	};
</script>
