<!DOCTYPE html>
<html>
<head>
<title></title>
	<script 
		src="https://unpkg.com/popper.js">
	</script>
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
<!-- 	<script 
		src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" 
		integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" 
		crossorigin="anonymous">
	</script> -->
	<link 
		rel="stylesheet" 
		href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
		integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
		crossorigin="anonymous">
	<link 
		rel="stylesheet" 
		href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" 
		integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" 
		crossorigin="anonymous">
	<link 
		href="https://stackpath.bootstrapcdn.com/bootswatch/4.2.1/cyborg/bootstrap.min.css" 
		rel="stylesheet" 
		integrity="sha384-e4EhcNyUDF/kj6ZoPkLnURgmd8KW1B4z9GHYKb7eTG3w3uN8di6EBsN2wrEYr8Gc" 
		crossorigin="anonymous">
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
			<br>
			<!-- SORT  -->
			<div id="sortForm" class="form-group" style="display: -webkit-inline-box;">
				<div class="custom-control custom-radio">
					<input type="radio" id="sortFormRadio1" name="sortFormRadio" class="custom-control-input" checked="">
					<label class="custom-control-label" for="sortFormRadio1"> None </label>
				</div>
				<div class="custom-control custom-radio">
					<input type="radio" id="sortFormRadio2" name="sortFormRadio" class="custom-control-input">
					<label class="custom-control-label" for="sortFormRadio2"> Name </label>
				</div>
				<div class="custom-control custom-radio">
					<input type="radio" id="sortFormRadio3" name="sortFormRadio" class="custom-control-input">
					<label class="custom-control-label" for="sortFormRadio3"> Year </label>
				</div>
					<div class="custom-control custom-radio">
					<input type="radio" id="sortFormRadio4" name="sortFormRadio" class="custom-control-input">
					<label class="custom-control-label" for="sortFormRadio4"> Rating </label>
				</div>
				<div class="custom-control custom-radio">
					<input type="radio" id="sortFormRadio5" name="sortFormRadio" class="custom-control-input">
					<label class="custom-control-label" for="sortFormRadio5"> Genre </label>
				</div>
			</div>
			<br>
			<!-- Filter  -->
			<div id="filterForm" class="form-group" style="display: -webkit-inline-box;">
				<div class="custom-control custom-radio">
					<input type="radio" id="filterFormRadio1" name="filterFormRadio" class="custom-control-input" checked="">
					<label class="custom-control-label" for="filterFormRadio1"> None </label>
				</div>
				<div class="custom-control custom-radio">
					<input type="radio" id="filterFormRadio2" name="filterFormRadio" class="custom-control-input">
					<label class="custom-control-label" for="filterFormRadio2"> Year </label>
				</div>
					<div class="custom-control custom-radio">
					<input type="radio" id="filterFormRadio3" name="filterFormRadio" class="custom-control-input">
					<label class="custom-control-label" for="filterFormRadio3"> Rating </label>
				</div>
				<div class="custom-control custom-radio">
					<input type="radio" id="filterFormRadio4" name="filterFormRadio" class="custom-control-input">
					<label class="custom-control-label" for="filterFormRadio4"> Genre </label>
				</div>
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

	// SEARCH
	$('#searchbar').on('input', function(event) 
	{
		$('#result').fadeOut();

		// to get search data - this fetches an array of movies with matches to the search
		$.get(`https://www.omdbapi.com/?s=${event.target.value}&type=movie&apikey=1f18a935`, function(rawdata)
		{
			if(rawdata.Response) 
			{
				// Call Sort By Name
				// result = SortMovie(rawdata.Search, "Year", "inDescending"); 
				//result = SortMovie(rawdata.Search); 
				//result = SortMovie(rawdata.Search, inDescending);
				result = remove_Dup(rawdata.Search);

				console.log(result);

				$('#result').html('');
				// for each array fetched, 
				result.forEach(function(movie) 
				{

					// take the movie id and return an object that stores all the meta data for that movie		
					jQuery.ajaxSetup({async:false});
					$.get("https://www.omdbapi.com/?i="+ movie.imdbID +"&plot=full&type=movie&apikey=1f18a935",function(moviedata)
					{
						if(moviedata.Response)
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

							// AESTHETIC - This is just a font size chaninging effect for if the movie name is too long.
							var titleSize;
							if(movie.Title.length <= 65) 
								titleSize = "font-size: 1.2rem";
							else
								 titleSize = "font-size: 100%";

							// this is creating a div with the content inside of it
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
						}
					});
					jQuery.ajaxSetup({async:true});

				});
			}
		});
	});

	function loadInfo(id)
	{
		location.href += 'movieInfoPage.php/?id='+ id +'';
	};

	// removes any duplicate movies just in case
	function remove_Dup(arr) 
	{
		var result = []; // this is what must be returned
		var temp = []; // this array will store the ID and can compare against 

		for (var i = 0; i < arr.length; i++) 
		{
			for (var j = 1; j < arr.length; j++) 
			{	
				if (arr[i].imdbID != arr[j].imdbID)
				{
					if (!(temp.includes(arr[i].imdbID)))
					{
						temp.push(arr[i].imdbID);
						if (!(result.includes(arr[i])))
							result.push(arr[i]);
					}
				}
			}			
		}

		return result;
	}

	//SORT
	// by YEAR
	function ascendingYear(a, b)
	{
		return a.Year - b.Year;		
	}
	function descendingYear(a, b)
	{
		return a.Year - b.Year;		
	}

	// by NAME
	function ascendingName(a, b)
	{
		return a.Name - b.Name;		
	}
	function descendingName(a, b)
	{
		return a.Name - b.Name;		
	}

	//by RATING
	// Descending
	// Ascending

	//by Genre

	// have a function that calls sort and have sorting files in its own script
	//function SortMovie(arr, metadata_type, sorting_type)
	// function SortMovie(arr, sorting_type)
	// {
	// 	//var metadata_type = Year;
	// 	var ret = arr.sort(sorting_type); 

		
		
	// 	//var ret = arr.sort(inDescending);

	// 	// ascending order
	// 	function inAscending(a, b)
	// 	{
	// 		return a.metadata_type - b.metadata_type;		
	// 	}

	// 	function inDescending(a, b)
	// 	{
			
	// 		// return b.metadata_type - a.metadata_type;
	// 		return b.Year - a.Year;
	// 	}

	// 	//return ((a.Name == b.Name) ? 0 : ((a.Name > b.Name) ? 1 : -1 ));

	// 	// console.log(ret);
	// 	return ret;

	// }
	
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
