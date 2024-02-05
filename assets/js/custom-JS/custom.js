$(document).ready(function(){

  $(window).scroll(function(){
    if(this.scrollY > 60){
        $(".top-header").addClass('top-header-active'); 
        $("#header").css({"padding-bottom": "10px" });
    }
    else {  $(".top-header").removeClass('top-header-active');
            $("#header").css("padding-bottom", "20px");
    }
    });

    // Open Page for FACEBOOK, TWITTER, LINKEDIN, PINTEREST, INSTAGRAM
    $(".facebook").click(function(){
        window.open("https://www.facebook.com");
    });
    $(".google-plus").click(function(){
        window.open("https://in.pinterest.com");
    });
    $(".linkedin").click(function(){
        window.open("https://www.linkedin.com");
    });
    $(".twitter").click(function(){
        window.open("https://www.twitter.com");
    });
    $(".instagram").click(function(){
        window.open("https://www.instagram.com");
    });
});

//========== Chat Popup Start=========
function openForm() {
    document.getElementById("userForm").style.display = "block";
  }
  function closeForm() {
    document.getElementById("userForm").style.display = "none";
  }
  // ===========Chat Popup End==========
  
  // ==========Login User Popup Start========
  
  // Get the modal
  var modal = document.getElementById("myModal");
  
  // Get the button that opens the modal
  var btn = document.getElementById("myBtn");
  
  // Get the <span> element that closes the modal
  var button = document.getElementsByClassName("close")[0];
  
  // When the user clicks the button, open the modal 
  btn.onclick = function() {
    modal.style.display = "block";
  }
  
  // When the user clicks on <span> (x), close the modal
  button.onclick = function() {
    modal.style.display = "none";
  }
  
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
  // =========Login User Popup End============
  
  
  