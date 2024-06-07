const sections = document.querySelectorAll('.section');
const sectButtonContainer  = document.querySelectorAll('.control-buttons-container');
const sectButtons = document.querySelectorAll('.control-button');
const allSections = document.querySelector('.main-content');

function PageTransitions(){
	//Button click active class
	//loop through the button divs under control class
	for(let i = 0; i < sectButtons.length; i++){
		//if clicked one of the buttons, do the function
		sectButtons[i].addEventListener('click', function(){
			let currentBtn = document.querySelectorAll('.active-button');
			//remove the active-button class from default div
			currentBtn[0].className = currentBtn[0].className.replace('active-button','');
			//assign the active-button class to clicked one
			this.className += ' active-button'; //NOTE: keyword 'this' does not exit in arrow funciton
		})
	}


	//Section activated class
	//div under main content class contains all sections along with their id
	//if there is a click, loop through the sections
	allSections.addEventListener('click',(e) => {
		//this dataset.id takes the data-id value from the elements under control class
		const id = e.target.dataset.id;
		if(id){

			//remove active class for all button divs
			sectButtons.forEach((btn) => {
				btn.classList.remove('active');
			})
			//assign an active class to selected button div
			e.target.classList.add('active');

			//hide other sections by removing active class
			sections.forEach((section) => {
				section.classList.remove('active');
			})

			//this element is a selected section and assign the active class to it
			const element = document.getElementById(id);	
			element.classList.add('active')	
		}
	})

	//Theme changing button
	const themeButton = document.querySelector('.theme-button')
	themeButton.addEventListener('click', () => {
		//select the elements between body tag
		let element = document.body;
		//whenever clicked, the list will toggle this class on and off
		element.classList.toggle('light-mode');		
	})
}

PageTransitions();