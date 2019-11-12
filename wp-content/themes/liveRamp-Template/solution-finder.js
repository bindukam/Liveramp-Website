jQuery(function($){

	let response = document.querySelector('#sf-response'), // set-up variables
		form = document.querySelector('#solution-form'),
		submitButton = document.querySelector('#sf-submit'),
		sort_by = document.querySelector('#sort_by'),
		role = document.querySelector('#role'),
		interest = document.querySelector('#interest'),
		resultsContainer = document.querySelector('#sf-results'),
		showcase = document.querySelector('#sf-showcase'),
		loadmore = document.querySelector('#loadmore'),
		solutions = document.querySelectorAll('.solution-card');
	
	//SUBMIT DATA handler function
	submitButton.addEventListener("click", loadfunc); // end submit button click function =================================
	
	function loadfunc(){
	
		// Define filters
		let roleFilter = role.value,
			interestFilter = interest.value,
			sort_byFilter = sort_by.value;
	
		setTimeout(function(){ // timeout for animation (we want it to fire halfway through animation)
			submitButton.innerHTML = "Update Results"; // now that we have results - change button text
			showcase.innerHTML = "";
	
			// Sort response into results by filters
			solutions.forEach(function(solution,i){
				// First reset results into response container,
				response.append(solution);
				solution.classList.remove("shown-result");
				solution.classList.remove("waiting-result"); // and reset result classes
	
				// If card data matches the criteria set by the form...
				if(solution.dataset.interests.includes(interestFilter) && solution.dataset.roles.includes(roleFilter)){
	
					// Move all cards that match the speed to the top of results...
					if(solution.dataset.sort_bys.includes(sort_byFilter)){
						resultsContainer.prepend(solution);
					} else { // ..and all others below.
						resultsContainer.append(solution);
					}
					solution.classList.add("waiting-result");
	
				}
			});
			resultLoad();
		}, 500); // end timeout
	
	}
	
	// timeout for animation (we want it to fire halfway through animation)
	loadmore.addEventListener("click", function() {
		setTimeout(function(){
			resultLoad();
		}, 500)
	});
	
	
	var noresults = document.createElement("div");
	noresults.innerHTML = "No Results Found";
	noresults.classList.add("no-results", "margin-bottom-3");
	
	function resultLoad(){
		let results = document.querySelectorAll('.waiting-result.solution-card');
	
		// If there are more than 6 results - show loadmore button
		if (results.length > 6 && loadmore.classList.contains("hide")){
			loadmore.classList.remove("hide");
		} else if (results.length <= 6 && loadmore.classList.contains("hide") === false) {
			loadmore.classList.toggle("hide");
		}
	
		
		if (results.length == 0) {
			
			showcase.innerHTML = "";
			showcase.append(noresults);
		} else {
			// Create a group for each pack of 6 results
			var resultgroup = document.createElement('div');
			resultgroup.classList = "g-col-x3 margin-bottom-3"; // add style classes to the group
			showcase.append(resultgroup); // append group to showcase
		
			// Loop through results
			results.forEach(function (result,idx,arr) {
	
				if (idx < 6) {
					// Show the first 6 results only by moving them to showcase div
					resultgroup.append(result);
					result.classList.remove("waiting-result");
					result.classList.add("shown-result");
				}
			});
	
			resultgroup.classList.toggle('result-swap'); // add animation class...
			setTimeout(function(){
				resultgroup.classList.remove('result-swap'); // ...then remove animation class
			}, 1100);
		}
	} //end resultLoad()
	
	
	
	
	
	
	let roles = document.querySelectorAll('.role .select-options li'),
		roletoggle = document.querySelector('.role .select-styled'),
		interesttoggle = document.querySelector('.interest .select-styled'),
		interests = document.querySelectorAll('.interest .select-options li');
	
	roletoggle.addEventListener('click', interestFilter);
	roles.forEach( thisro => thisro.addEventListener('click', interestFilter));
	interestFilter();
	let firstoption = document.querySelectorAll('.interest .select-options li:not(.hide)')[0];
	interest.value = firstoption.getAttribute('rel');
	interesttoggle.setAttribute('data-matching-the-role', firstoption.getAttribute('rel') );
	interesttoggle.innerHTML = firstoption.innerHTML;
	loadfunc();
	
	// hiding options that are not valid combinations
	function interestFilter() {
		let roleFilter = role.value,
		theinterestfilter = interesttoggle.dataset.id;		
	
		if (interesttoggle.getAttribute('data-matching-the-role') === 0){ // if the newly chosen role has no reults with the currently chosen interest
			console.log('YOU BROKE ME');
		}
	
		interests.forEach(function(thisinterest){
			let count = 0,
			thisrel = thisinterest.getAttribute('rel');
	
			solutions.forEach(function(solution){
				if (
					solution.dataset.roles.includes(roleFilter) 
					&& solution.dataset.interests.includes(thisinterest.getAttribute('rel')) 
				) {
					count = count + 1;
				}
			})
	
			thisinterest.setAttribute('data-matching-the-role', count);
	
			if (count == 0) {
				thisinterest.classList.add('hide');
			} else {
				thisinterest.classList.remove('hide');
			}
	
			if (theinterestfilter.includes(thisrel)) {
				interesttoggle.setAttribute('data-matching-the-role', count);
				if (count === 0)  {
					interesttoggle.innerHTML = '... ';
					interesttoggle.setAttribute('data-id', '');
				}
			}
			
		});
	
	
		console.log('did stuff!');
	}
	
	});
	