function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = rgba(0,0,0,0.9);
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = white;
}

function btnsubmission(){
    if(document.getElementById('form').onsubmit()==true){
        window.alert("Order Succesful!!");
    }
    
    
}


let slideIndex = 1;
showSlides(slideIndex);


function plusSlides(n) {
showSlides(slideIndex += n);
}


function currentSlide(n) {
showSlides(slideIndex = n);
}

function showSlides(n) {
let i;
let slides = document.getElementsByClassName("mySlides");
let dots = document.getElementsByClassName("dot");
if (n > slides.length) {slideIndex = 1}
if (n < 1) {slideIndex = slides.length}
for (i = 0; i < slides.length; i++) {
slides[i].style.display = "none";
}
for (i = 0; i < dots.length; i++) {
dots[i].className = dots[i].className.replace(" active", "");
}
slides[slideIndex-1].style.display = "block";
dots[slideIndex-1].className += " active";
}


function validate() {
  
  if( document.myForm.Name.value == "" ) {
     alert( "Please provide your name!" );
     document.myForm.Name.focus() ;
     return false;
  }
  if( document.myForm.Address.value == "" ) {
     alert( "Please provide delevery address !" );
     document.myForm.Address.focus() ;
     return false;
  }
  if( document.myForm.Zip.value == "" || isNaN( document.myForm.Zip.value ) ||
     document.myForm.Zip.value.length != 5 ) {
     
     alert( "Please provide a zip in the format #####." );
     document.myForm.Zip.focus() ;
     return false;
  }
  if( document.myForm.EMail.value == "" ) {
     alert( "Please provide your Email!" );
     document.myForm.EMail.focus() ;
     return false;
  }
  if( document.myForm.plant.value == "-1" ) {
     alert( "Please select a plant!" );
     return false;
  }

    var getSelectedValue = document.querySelector( 'input[name="paymethod"]:checked');   
    if(getSelectedValue == null) {   
        alert("Select a payment metod !");
        return false;
    } 

  return( true );
} 
