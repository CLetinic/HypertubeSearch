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
		.credit_table
		{
			width: 100%;
			overflow-x: scroll;
		}
		.cell_name
		{
			height: 45px;
			padding-bottom: 10px;
		}
		.cell_image
		{
			height: 90px;
		}
		.cell_role
		{
			height: 60px;
			font-size: smaller;
		}
		td:nth-child(even) 
		{
			background: #222222;
		}
		td:nth-child(odd)
		{
			background: #282828;
		}
		td
		{
			padding:0.25%;
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
			var result;

			jQuery.ajaxSetup({async:false});
			$.get("https://api.themoviedb.org/3/movie/"+ val +"?api_key=4084c07502a720532f5068169281abff",function(rawdata)
			{
				result = appendMovieData(rawdata, val, "info");
						
			});

			console.log(result);
			var content;

			//ERROR CHECKING - so as not to get funny values displaying
			// check if there is a rating given
			var rating;
			if (result.imdbRating === 'N/A' || result.imdbRating === 'undefined' || result.imdbRating === undefined || result.imdbRating === 'null' || result.imdbRating === null || isNaN(result.imdbRating)) 
				rating = 'N/A';
			else
				rating = result.imdbRating + "/10";	

			// check if there is an IMDB ID to have a URL
			var imdbURL;
			if (result.imdbID === 'N/A' || result.imdbID === 'undefined' || result.imdbID === undefined || result.imdbID === 'null' || result.imdbID === null || rating === 'N/A')
				imdbURL = "<p> </p>";
			else
				imdbURL = "<a href='"+ result.imdbURL +"'>Go to IMDb Page</a>";

			//check if there is a year provided
			var yearRelease = result.Year;
			if (yearRelease === 'N/A' || yearRelease === 'undefined' || yearRelease === undefined || yearRelease === 'null' || yearRelease === null || isNaN(yearRelease) || yearRelease <= 0) 
				yearRelease = 'N/A';

			// check if there is a movie poster avaliable
			var srcImage;
			if (!(result.poster_path === null))
				srcImage = "https://image.tmdb.org/t/p/w342" + result.poster_path;
			else if (!(result.Poster === 'N/A' || result.Poster === undefined))
				srcImage = result.Poster;
			else 
				srcImage = "http://i67.tinypic.com/10fc1lg.jpg";

			var originalTitle;
			if (result.title != result.original_title)
				originalTitle = `<h6>(`+ result.original_title +`)</h6>`;
			else
				originalTitle = ""

			var genreList;
			genreList = stringifyGenre(result.genres);

			// http://i63.tinypic.com/2hp39tg.png
			var cast = fillTable(result.cast, "cast");
			console.log(cast);
			var crew = fillTable(result.crew, "crew");
			console.log(crew);
					
					// this is creating a div with the content inside of it
					content =
					`<div class="card-header">
						<h4 id="movieName" class="card-title">`+ result.title+ `</h4>
						`+ originalTitle +`
						<p class="text-muted">(`+ result.Year +`)</p>
					</div>
					<div class="card-body">	
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm-4 gallery-pad">
									<img src="` + srcImage + `" style="width:100%;"/>
									<div class="row IMDb" style="padding: 5px;">
										<div class="col-sm gallery-pad">
											<p><i class="fas fa-star"></i> `+ rating +`</p>
										</div>
										<div class="vl"></div>
										<div class="col-sm gallery-pad">
											<a href="`+ result.imdbURL +`">Go to IMDb Page</a>
										</div>
									</div>
								</div>
								<div class="col-sm-8 gallery-pad">
									<p><b>Genre:</b> `+ genreList +`</p>
									<br>
									<p><b>Plot:</b> `+ result.Plot +`</p>
									<br>
								</div>
							</div>
							<div class="row">
								<div class="credit_table">
									<p><b>Cast:</b><p>
										<table>
											<tr>`+ cast +`</tr>
										</table>
								</div>
								<div class="credit_table">
									<p><b>Crew:<b><p>
									<table>
										<tr>`+ crew +`</tr>
									</table>
								</div>
							</div>
							<div class="row">
							</div>
						</div>
					</div>`;

				$('#result').append(content).hide().fadeIn(); 			
		});
	}

	function stringifyGenre(result)
	{
		let names = result.map(item => item.name);
		result = names.join(', ');

		return result;
	}

	function fillTable(result, type) // type = cast or crew
	{
		let content = "";

		for (var i = 0; i < result.length; i++) 
		{
			
			let role;

			let srcImage;
			if (!(result[i].profile_path === null))
			srcImage = "https://image.tmdb.org/t/p/w90_and_h90_face/" + result[i].profile_path; // w342 //https://image.tmdb.org/t/p/w90_and_h90_face/kU3B75TyRiCgE270EyZnHjfivoq.jpg
			else
				srcImage = "http://i63.tinypic.com/2hp39tg.png"
			
			if (type == "cast")
				role = result[i].character;
			if (type == "crew")
				role = result[i].job;  // ""+ result[i].job +" ("+ result[i].department +")";
			 
			content += 
			"<td><table><tr><div class='cell_name'><b>"+ result[i].name +"</b></div></tr><tr><div class='cell_image'><img src='"+ srcImage +"'/></div></tr><tr><div class='cell_role'><p>"+ role +"</p></div></tr></table></td>";
		}

		return content; 
	}

</script>
