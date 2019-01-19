function isBetweenValue(result, sortType, value1, value2)
	{
		let arr = [];
		let small;
		let big;

		// this is just incase someone tries to invert the values
		if (value1 > value2)
		{
			big = value1;
			small = value2;
		}
		else if (value1 < value2)
		{
			big = value2;
			small = value1;
		}

		for(let i = 0; i < result.length; i++) 
		{
			if ((small <= result[i][sortType]) && (result[i][sortType] <= big)) //if (value1 <= result && result <= )
			{
				console.log("works\n\n\n");
				arr.push(result[i]);
			}
		}
		return arr;	
	}