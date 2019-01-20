<!DOCTYPE html>
<html>
<head>
<title></title>
	<?php
		require_once("header.php");
	?>
<script type="text/javascript" src="getData.js"></script>
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
				<input id="searchbar" class="form fieldinput" type="search" placeholder="Search" style="border-radius: 0%;">
			</div>
			<br>
			<!-- SORT  -->
			<div id="sortForm" class="form-group" style="display: -webkit-inline-box;">
				<h6>Sort</h6>
				<div class="custom-control custom-radio">
					<input type="radio" id="sortFormRadio1" name="sortFormRadio" class="custom-control-input sort fieldinput" value="" checked="">
					<label class="custom-control-label" for="sortFormRadio1"> None </label>
				</div>
				<div class="custom-control custom-radio">
					<input type="radio" id="sortFormRadio2" name="sortFormRadio" class="custom-control-input sort fieldinput" value="title"> <!-- value="&sort_by=original_title." -->
					<label class="custom-control-label" for="sortFormRadio2"> Name </label>
					<div id="sortFormName" class="">
						<select id="sortFormNameSelector" class="fieldinput">
							<option class="" value="asc" selected>A - Z</option> 
							<option class="" value="desc">Z - A</option> <!-- Ascending -->
						</select>						
					</div>
				</div>
				<div class="custom-control custom-radio">
					<input type="radio" id="sortFormRadio3" name="sortFormRadio" class="custom-control-input sort fieldinput" value="Year">
					<!-- value="&sort_by=release_date." -->
					<label class="custom-control-label" for="sortFormRadio3"> Year </label>
					<div id="sortFormYear" class="fieldinput">
						<select id="sortFormYearSelector">
							<option class="" value="asc" >Oldest - Newest</option> <!-- Ascending -->
							<option class="" value="desc" selected>Newest - Oldest</option> <!-- Descending release_date.desc primary_release_date.desc--> 
						</select>						
					</div>
				</div>
					<div class="custom-control custom-radio">
					<input type="radio" id="sortFormRadio4" name="sortFormRadio" class="custom-control-input sort fieldinput" value="imdbRating">
					<label class="custom-control-label" for="sortFormRadio4"> Rating </label>
					<div id="sortFormRating" class="">
						<select id="sortFormRatingSelector" class="fieldinput">
							<option class="" value="desc" selected>Highest - Lowest</option> <!-- Descending --> <!-- This I will have to make my own -->
							<option class="" value="asc">Lowest - Highest</option> <!-- Ascending -->
						</select>						
					</div>
				</div>
				<div class="custom-control custom-radio">
					<input type="radio" id="sortFormRadio5" name="sortFormRadio" class="custom-control-input sort fieldinput" value="genre_ids">
					<label class="custom-control-label" for="sortFormRadio5"> Genre </label>
					<div id="sortFormGenre" class="">
						<select id="sortFormGenreSelector" class="fieldinput">
							<option class="" value="28" selected>Action</option> <!-- 28 -->
							<option class="" value="12">Adventure</option> <!-- 12 -->
							<option class="" value="16">Animation</option> <!-- 16 -->
							<option class="" value="35">Comedy</option> <!-- 35 -->
							<option class="" value="80">Crime</option> <!-- 80 -->
							<option class="" value="99">Documentary</option> <!-- 99 -->
							<option class="" value="18">Drama</option> <!-- 18 -->
							<option class="" value="10751">Family</option> <!-- 10751 -->
							<option class="" value="14">Fantasy</option> <!-- 14 -->
							<option class="" value="36">History</option> <!-- 36 -->
							<option class="" value="27">Horror</option> <!-- 27 -->
							<option class="" value="10402">Music</option> <!-- 10402 -->
							<option class="" value="9648">Mystery</option> <!-- 9648 -->
							<option class="" value="10749">Romance</option> <!-- 10749 -->
							<option class="" value="878">Sci-Fi</option> <!-- 878 -->	 
							<option class="" value="53">Thriller</option> <!-- 53 -->
							<option class="" value="10752">War</option> <!-- 10752 -->
							<option class="" value="37">Western</option> <!-- 37 -->
						</select>							
					</div>
				</div>
			</div>
			<br>
			<!-- Filter  -->
			<div id="filterForm" class="form-group" style="display: -webkit-inline-box;">
				<h6>Filter</h6>
				<div class="custom-control custom-radio">
					<input type="radio" id="filterFormRadio1" name="filterFormRadio" class="custom-control-input filter fieldinput" value="" checked="">
					<label class="custom-control-label" for="filterFormRadio1"> None </label>
				</div>
				<div class="custom-control custom-radio">
					<input type="radio" id="filterFormRadio2" name="filterFormRadio" class="custom-control-input filter fieldinput" value="Year">
					<label class="custom-control-label" for="filterFormRadio2"> Year </label>
					<div class="">
						<select id="filterFormYearSelectorFrom" class="fieldinput">
						</select> 
						to 
						<select id="filterFormYearSelectorTo" class="fieldinput">
						</select>
					</div>
				</div>
					<div class="custom-control custom-radio">
					<input type="radio" id="filterFormRadio3" name="filterFormRadio" class="custom-control-input filter fieldinput" value="imdbRating">
					<label class="custom-control-label" for="filterFormRadio3"> Rating </label>
					<div class="">
						<select id="filterFormRatingSelectorFrom" class="fieldinput">
						</select>
						to
						<select id="filterFormRatingSelectorTo" class="fieldinput">
						</select>
					</div>
				</div>
				<div class="custom-control custom-radio">
					<input type="radio" id="filterFormRadio4" name="filterFormRadio" class="custom-control-input filter fieldinput" value="genre_ids">
					<label class="custom-control-label" for="filterFormRadio4"> Genre </label>
					<div class="">
						<select id="filterFormGenreSelector" class="fieldinput">
							<option class="" value="28" selected>Action</option> <!-- 28 -->
							<option class="" value="12">Adventure</option> <!-- 12 -->
							<option class="" value="16">Animation</option> <!-- 16 -->
							<option class="" value="35">Comedy</option> <!-- 35 -->
							<option class="" value="80">Crime</option> <!-- 80 -->
							<option class="" value="99">Documentary</option> <!-- 99 -->
							<option class="" value="18">Drama</option> <!-- 18 -->
							<option class="" value="10751">Family</option> <!-- 10751 -->
							<option class="" value="14">Fantasy</option> <!-- 14 -->
							<option class="" value="36">History</option> <!-- 36 -->
							<option class="" value="27">Horror</option> <!-- 27 -->
							<option class="" value="10402">Music</option> <!-- 10402 -->
							<option class="" value="9648">Mystery</option> <!-- 9648 -->
							<option class="" value="10749">Romance</option> <!-- 10749 -->
							<option class="" value="878">Sci-Fi</option> <!-- 878 -->	 
							<option class="" value="53">Thriller</option> <!-- 53 -->
							<option class="" value="10752">War</option> <!-- 10752 -->
							<option class="" value="37">Western</option> <!-- 37 -->
						</select>						
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">

			// Populate the sort/filter drop downs
			let currentYear = (new Date).getFullYear();

			for (let i = currentYear; i >= 1900; i--) 
			{	
				if (i == 0)
				{
					$('#filterFormYearSelectorTo').append('<option value='+ i +' selected>'+ i +'</option>');
					$('#filterFormYearSelectorFrom').append('<option value='+ i +' selected>'+ i +'</option>');
				}
				else 
				{
					$('#filterFormYearSelectorTo').append('<option value='+ i +'>'+ i +'</option>');
					$('#filterFormYearSelectorFrom').append('<option value='+ i +'>'+ i +'</option>');
				}
			}

			for (let i = 10; i >= 0; i--) 
			{
				if (i == 10)
				{
					$('#filterFormRatingSelectorTo').append('<option value='+ i +' selected>'+ i +' / 10</option>');
					$('#filterFormRatingSelectorFrom').append('<option value='+ i +' selected>'+ i +' / 10</option>');
				}
				else
				{
					$('#filterFormRatingSelectorTo').append('<option value='+ i +'>'+ i +' / 10</option>');
					$('#filterFormRatingSelectorFrom').append('<option value='+ i +'>'+ i +' / 10</option>');
				}
			}
		</script>
	</div>
	<div class="container-fluid">
		<div id="result" class="row">	
		</div>		
	</div>
</body>
</html>
<script type="text/javascript">

	// const api = "&api_key=4084c07502a720532f5068169281abff";
	// const endpoint = `https://api.themoviedb.org/3/search/movie?query=${search}${api}`;
	// const poster = "https://image.tmdb.org/t/p/w600/";

	//https://www.youtube.com/watch?v=67eJTr6_ylY
	//https://www.youtube.com/watch?v=aMKf3su6TjI
	//https://www.youtube.com/watch?v=bpHtxx_wmqw

	// SEARCH
	$(document).ready(function()
	{
		/*
			https://www.themoviedb.org/documentation/api?language=en-US

			"/search - Text based search is the most common way. You provide a query string and we provide the closest match. Searching by text takes into account all original, translated, alternative names and titles.

			/discover - Sometimes it useful to search for movies and TV shows based on filters or definable values like ratings, certifications or release dates. The discover method make this easy. For some example queries, and to get an idea about the things you can do with discover, take a look here.

			/find - The last but still very useful way to find data is with existing external IDs. For example, if you know the IMDB ID of a movie, TV show or person, you can plug that value into this method and we'll return anything that matches. This can be very useful when you have an existing tool and are adding our service to the mix."
		*/

		const moviedbAPI = "&api_key=4084c07502a720532f5068169281abff";		// https://www.themoviedb.org/documentation/api?language=en-US
		const omdbAPI = "&apikey=1f18a935"									// http://www.omdbapi.com/

		var moviedbMethod;

		var sort;
		var sortID;
		// var sortMethod;
		var filter;

		//SEARCH OPTIONS
		// check for a change in sort or filter radios 
		$("input[type='radio']").click(function()
		{	
			if (this.name == "sortFormRadio") //SORT OPTIONS 
				sort = $("input[name='"+ this.name +"']:checked").val();  //elem.target
			else if (this.name == "filterFormRadio") //FILTER OPTIONS
				filter = $("input[name='"+ this.name +"']:checked").val();
		});

		// SEARCH
		//$('#searchbar').on('input', function(event) 
		$('.fieldinput').change(function(event) 
		{
			$('#result').fadeOut();

			// to get search data - this fetches an array of movies with matches to the search
			// themoviedb has a much more powerful search functionality 
			// Whereas omdb has a better resources from on IMDB

			// var request = `https://api.themoviedb.org/3/${moviedbMethod}/movie?query=${event.target.value}${sort}${sortMethod}&api_key=4084c07502a720532f5068169281abff`;
			$.get(`https://api.themoviedb.org/3/search/movie?query=`+ $('#searchbar').val() +`&api_key=4084c07502a720532f5068169281abff`, function(rawdata)
			{	
				console.log("\n\n\n\n\n\n");
				console.log("filter");
				console.log(filter);
				console.log("sort");
				console.log(sort);
				// console.log("sortMethod");
				// console.log(sortMethod);
				console.log("\n\n\n\n\n\n");

				var result; 
				result = getMovieData(rawdata.results, "search");
				result = filterFunction(result, filter);
				result = sortFunction(result, sort);	

				$('#result').html('');
				result.forEach(function(moviedata) 
				{				
					console.log("OMDB")
					console.log(moviedata);
					var content;
					var imdbRating;
					var imdbURL;

					//ERROR CHECKING - so as not to get funny values displaying
					// check if there is a rating given
					var rating;
					imdbRating = moviedata.imdbRating;
					if (imdbRating === 'N/A' || imdbRating === 'undefined' || imdbRating === undefined || imdbRating === 'null' || imdbRating === null || isNaN(imdbRating)) /*imdbRating === NaN || imdbRating === "NaN" || movie.imdbID === NaN || movie.imdbID === "NaN"*/
						rating = 'N/A';
					else
						rating = imdbRating + "/10";	

					// check if there is an IMDB ID to have a URL
					if (moviedata.imdbID === 'N/A' || moviedata.imdbID === 'undefined' || moviedata.imdbID === undefined || moviedata.imdbID === 'null' || moviedata.imdbID === null || rating === 'N/A')
						imdbURL = "<p> </p>";
					else
						imdbURL = "<a href='"+ moviedata.imdbURL +"'>Go to IMDb Page</a>";

					//check if there is a year provided
					var yearRelease = moviedata.Year;
					if (yearRelease === 'N/A' || yearRelease === 'undefined' || yearRelease === undefined || yearRelease === 'null' || yearRelease === null || isNaN(yearRelease) || yearRelease <= 0) 
						yearRelease = 'N/A';

					// check if there is a movie poster avaliable
					var srcImage;
					if (!(moviedata.poster_path === null))
						srcImage = "https://image.tmdb.org/t/p/w342" + moviedata.poster_path;
					else if (!(moviedata.Poster === 'N/A' || moviedata.Poster === undefined))
						srcImage = moviedata.Poster;
					else 
						srcImage = "https://xulonpress.com/bookstore/images/ImageNotAvailable_300x450.jpg";	

					// AESTHETIC - This is just a font size chaninging effect for if the movie name is too long.
					var titleSize;
					if(moviedata.title.length <= 65) 
						titleSize = "font-size: 1.2rem";
					else
						 titleSize = "font-size: 100%";
					
					var original_title;
					if (moviedata.title != moviedata.original_title)
						original_title = `<h6>(`+ moviedata.original_title +`)</h6>`;
					else
						original_title = ""
					

					// this is creating a div with the content inside of it
					content = 
					`<div id="`+ moviedata.imdbID +`"class="moviecards col-sm-4 card border-secondary sm-3" style="max-width: 20rem; min-width: 20rem; align-items: center; border-color: #9933CC;" onmouseover="movieHoverIn(this)" onmouseout="movieHoverOut(this)" onclick="loadInfo('`+ moviedata.imdbID +`')">
						<div class="card-header">
							<h5 class="card-title" style="`+ titleSize +`">`+ moviedata.title +`</h5>
							`+ original_title +`
						</div>
						<div class="card-body">
							<i class="far fa-eye" style="float: right; font-size: large; display:none;"></i>
							<br>
							<img src="` + srcImage + `" style="width: 100%; height: 450px; spadding-top: 0.5rem;"/>
							<br>
							<p text-muted>Year Released: ` + yearRelease +`</p>
						</div>
						<div class="card-footer">
							<p><i class="fas fa-star"></i> `+ rating +`</p>
							<br>
							`+ imdbURL +`
						</div>
					</div>`;
				
					$('#result').append(content).hide().fadeIn(); 
							
				});
			});
		});		

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
	});

	function filterFunction(movieArray, filterType)
	{
		console.log("\n\n filter\n\n")
		if (filterType != "None")
		{
			if (filterType == "Year")
			{
				let to = $("#filterFormYearSelectorTo").children("option:selected").val();
				let from = $("#filterFormYearSelectorFrom").children("option:selected").val();

				movieArray = isBetweenValue(movieArray, filterType, from, to);
			}
			else if (filterType == "imdbRating")
			{
				let to = $("#filterFormRatingSelectorTo").children("option:selected").val();
				let from = $("#filterFormRatingSelectorFrom").children("option:selected").val();

				movieArray = isBetweenValue(movieArray, filterType, from, to);
			}
			else if (filterType == "genre_ids")
			{
				let genreId = $("#filterFormGenreSelector").children("option:selected").val();
				
				movieArray = sortGenre(movieArray, genreId , "filter");
			}
		}
		return movieArray;
	}

	function sortFunction(movieArray, sortType)
	{	
		console.log("\n\n SORT \n\n")
		if (sortType != "None")  
		{
			let sortID = getSortID(sortType);
			let sortMeth = $("#"+ sortID +"").children("option:selected").val();
			console.log(sortType);
			console.log(sortMeth);
			console.log(sortID);

			// SORT TYPES
			if (sortType == "genre_ids")
				movieArray = sortGenre(movieArray, sortMeth, "sort"); // sortMeth is the genre.id in this case

			// SORT METHODS
			if (sortMeth == "asc")
				movieArray = sortAscending(movieArray, sortType);
			else if (sortMeth == "desc")
				movieArray = sortDescending(movieArray, sortType);

			// this is used to remove or append movies that don't have ratings
			if (sortType == "imdbRating")
				movieArray = appendNoRating(movieArray, sortMeth); //movieArray = removeNoRating(movieArray); 
		}
		return movieArray;
	}

	function getSortID(sortType)
	{
		if (sortType == "title")
			return "sortFormNameSelector";
		if (sortType == "Year")
			return "sortFormYearSelector";
		if (sortType == "imdbRating")
			return "sortFormRatingSelector";
		if (sortType == "genre_ids")
			return "sortFormGenreSelector";
	}

	function isBetweenValue(result, sortType, value1, value2)
	{
		let arr = [];
		let small = parseFloat(value1);
		let big = parseFloat(value2);

		// this is just incase someone tries to invert the values
		if (small > big)
		{
			console.log("value2 bigger");
			[small, big] = [big, small]
		}

		for(let i = 0; i < result.length; i++) 
		{
			if (((small <= Number(result[i][sortType])) && (Number(result[i][sortType]) <= big)) || ((value1 == value2) && (result[i][sortType] == value2)))
				arr.push(result[i]);
		}

		return arr;	
	}

	function getMovieData(result, pageType)
	{
		for(let i = 0; i < result.length; i++) 
		{
			// get the IMDB ID
			jQuery.ajaxSetup({async:false});
			$.get("https://api.themoviedb.org/3/movie/"+ result[i].id +"/external_ids?api_key=4084c07502a720532f5068169281abff",function(movie)
			{
				appendMovieData(result[i], movie.imdb_id, "search");
				console.log("\n\n\nget ID:" + movie.imdb_id);
				console.log(result[i]);
			});			
		}
		return result;	
	}

	// remove results that have no rating
	function removeNoRating(result)
	{
		let arr = [];

		for(let i = 0; i < result.length; i++) 
		{
			if (!(result[i].imdbRating === 'N/A' || result[i].imdbRating === 'undefined' || result[i].imdbRating === undefined || result[i].imdbRating === 'null' && result[i].imdbRating === null || isNaN(result[i].imdbRating)))
			{
				arr.push(result[i]);
			}
		}
		return arr;	
	}

	// place not rating items at the end
	function appendNoRating(result, sort)
	{
		let arr = [];
		let arr2 = [];

		for(let i = 0; i < result.length; i++) 
		{
			if (!(result[i].imdbRating === 'N/A' || result[i].imdbRating === 'undefined' || result[i].imdbRating === undefined || result[i].imdbRating === 'null' && result[i].imdbRating === null || isNaN(result[i].imdbRating)))
			{
				arr.push(result[i]);
			}
			else 
				arr2.push(result[i]);
		}

		if (sort == "asc")
			arr = arr2.concat(arr);
		else if (sort == "desc")
			arr = arr.concat(arr2);
		return arr;	
	}

	// look for selected genre and put that at the top.
	// in the case that we want only the selected genre to show, remove the concat
	function sortGenre(result, genreID, type)
	{
		console.log("\nGENRE SORT\n")

		let arr = [];
		let arr2 = [];

		console.log(result);
		console.log(genreID);
		console.log(type);
		console.log(arr);

		// iterate through the movie arrays
		for(let i = 0; i < result.length; i++) 
		{
			console.log(result[i]);
			// iterate through the genre array
			for(let j = 0; j < result[i].genre_ids.length; j++) 
			{
				if (result[i].genre_ids[j] == genreID)
				{
					if (!(arr.includes(result[i]))) 
					{
						arr.push(result[i]);
						console.log(arr);
					}
				}

			}
			if ((!(arr.includes(result[i]))) && (!(arr.includes(result[i]))))
				arr2.push(result[i]);
		}
		if (type == "sort")
			arr = arr.concat(arr2);
		console.log(arr);
		return arr;	
	}

	function sortAscending(result, field) 
	{
		let arr = [];
		for(let i = 0; i < result.length; i++) 
		{
			for(let j = i; j < result.length; j++) 
			{
				if (result[i][field] > result[j][field]) 
					[result[i], result[j]] = [result[j], result[i]]; // simplified swap
			}
				arr.push(result[i]);
		}
		return arr;
	}

	function sortDescending(result, field) 
	{
		let arr = [];

		for(let i = 0; i < result.length; i++) 
		{
			for(let j = i; j < result.length; j++) 
			{
				if (result[i][field] < result[j][field]) 
					[result[i], result[j]] = [result[j], result[i]]; // simplified swap
			}
				arr.push(result[i]);
		}
		return arr;
	}

	// AESTHETIC - This is just a hovering affect
	function movieHoverIn(elem)
	{
		$(elem).removeClass('border-secondary');
		$(elem).addClass('border-info');

		$(elem).children().css("color", "white");
	};
	function movieHoverOut(elem)
	{
		$(elem).addClass('border-secondary');
		$(elem).removeClass('border-info');

		$(elem).children().css("color", "#888888");
	};

	function loadInfo(id)
	{
		location.href += 'movieInfoPage.php?id='+ id +'';
	};
	
</script>
