jQuery(function($){ //start ($)

let response = document.querySelector('#partners-response'), // set-up variables
	form = document.querySelector('#partners-form'),
	search = document.querySelector('#search'),
	resultsContainer = document.querySelector('#partners-results'),
	showcase = document.querySelector('#partners-showcase'),
	loadmore = document.querySelector('#loadmore'),
	category = document.querySelector('#partners_categories + .select-styled'),
	regions = document.querySelector('#partners_regions + .select-styled'),
	useCases = document.querySelector('#partners_use_cases + .select-styled'),
	certifications = document.querySelector('#partners_certifications + .select-styled'),
	levels = document.querySelector('#partners_levels + .select-styled'),
	partners = document.querySelectorAll('.partner');


function oopscheck() {
	oops = $('.oops');
	if ( oops.length !== 0) {
		console.log(`oops, reloading`)
		setTimeout( function() {
			document.location.reload();

		}, 3500);
	}
}
oopscheck();


category.dataset.id = 'any';
regions.dataset.id = 'any';
useCases.dataset.id = 'any';
certifications.dataset.id = 'any';
levels.dataset.id = 'any';

partnerformfilter();

$('.select-options li').on("click", partnerformfilter);
$('#search').on("input", partnerformfilter);

$('#reset').on("click", function(){
	event.preventDefault();

	category.dataset.id = 'any';
	regions.dataset.id = 'any';
	useCases.dataset.id = 'any';
	certifications.dataset.id = 'any';
	levels.dataset.id = 'any';

	category.innerText = 'Any';
	regions.innerText = 'Any';
	useCases.innerText = 'Any';
	certifications.innerText = 'Any';
	levels.innerText = 'Any';

	search.value = '';

	partnerformfilter();
});

// FILTER function
function partnerformfilter() {
	console.log("partner form - response");

	// Define filters
	let categoryFilter = category.dataset.id,
	regionsFilter = regions.dataset.id,
	useCasesFilter = useCases.dataset.id,
	certificationsFilter = certifications.dataset.id,
	levelsFilter = levels.dataset.id,
	searchFilter = search.value.toUpperCase(),
	reset = document.querySelector('#reset');

	console.log(category);
	console.log(categoryFilter);


	setTimeout(function(){ // timeout for animation (we want it to fire halfway through animation)
		showcase.innerHTML = "";

		if(categoryFilter !== 'any' ||
			regionsFilter !== 'any' ||
			useCasesFilter !== 'any' ||
			certificationsFilter !== 'any' ||
			levelsFilter !== 'any' ||
			
			searchFilter !== '' 
		){
			reset.classList.remove('hide');
		} else {
			reset.classList.add('hide');
		}

		// Sort response into results by filters
		partners.forEach(function(partner,i){
			// First reset results into response container,
			response.append(partner);
			partner.classList.remove("shown-result");
			partner.classList.remove("waiting-result"); // and reset result classes
			console.log((partner.dataset.level.includes(levelsFilter) || levelsFilter == ''));
			// console.log(partner.dataset.region);
			// console.log(regionsFilter);

			// If card data matches the criteria set by the form...
			let name = partner.dataset.partnername.toUpperCase();
			if(
				(partner.dataset.categories.includes(categoryFilter) || categoryFilter == 'any') &&
				(partner.dataset.region.includes(regionsFilter) || regionsFilter == 'any') &&
				(partner.dataset.destination.includes(useCasesFilter) || useCasesFilter == 'any') &&
				(partner.dataset.certification.includes(certificationsFilter) || certificationsFilter == 'any') &&
				(partner.dataset.level.includes(levelsFilter) || levelsFilter == 'any')
				 &&
				(name.includes(searchFilter) || searchFilter == '')
			){

				partner.classList.add("waiting-result");

			}
		});

		sortbylevel();	// <------ uncomment to turn sorting by level on

		resultLoad();
	}, 500); // end timeout

}

// end submit button click function =================================

// timeout for animation (we want it to fire halfway through animation)
loadmore.addEventListener("click", function() {
	setTimeout(function(){
		resultLoad();
	}, 500)
});


// sorting results by level
function sortbylevel(){
	let results = document.querySelectorAll('.waiting-result');

	results.forEach(function(result){
		if(result.dataset.level.includes("35")) { //elite
			resultsContainer.append(result);
		}
	});
	results.forEach(function(result){ 
		if(result.dataset.level.includes("34")) { //select
			resultsContainer.append(result);
		}
	});
	results.forEach(function(result){ 
		if(result.dataset.level.includes("33")) { //integrated
			resultsContainer.append(result);
		}
	});
	results.forEach(function(result){ 
		if(result.dataset.level === "") {
			resultsContainer.append(result);
		}
	});
}


function resultLoad(){
	let results = document.querySelectorAll('.waiting-result.partner');


	// Create a group for each pack of 6 results
	var resultgroup = document.createElement('div');
	resultgroup.classList = "result-group"; // add style classes to the group
	showcase.append(resultgroup); // append group to showcase


	if (results.length == 0) {
		showcase.innerHTML = "No Results Found";
	} else {

		// Loop through results
		results.forEach(function (result,idx,arr) {

			if (idx < 24) {
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
	
	results = document.querySelectorAll('.waiting-result.partner');

	// If there are more than 6 results - show loadmore button
	if (results.length > 6 && loadmore.classList.contains("hide")){
		loadmore.classList.remove("hide");
	} else if (results.length <= 6 && loadmore.classList.contains("hide") === false) {
		loadmore.classList.toggle("hide");
	  }
}


}); // end ($)

