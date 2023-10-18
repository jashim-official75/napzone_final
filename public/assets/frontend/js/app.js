
        AOS.init({
          
        });

   
       $('.gcarrousel__carrousel').slick({
            infinite: true,
            speed: 300,
             slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
             autoplaySpeed: 2000,
            responsive: [
                  {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }
            ]
        });

      $('.tandg__items').slick({
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
             autoplay: true,
             autoplaySpeed: 2000,
           responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
           ]
        });
        
      
var fullscreenBtn = document.getElementById("fullsecreen_btn");
var gameContainer = document.getElementById("gameplayScreen");


  fullscreenBtn.addEventListener("click", function () {
  if (gameContainer.requestFullscreen) {
    gameContainer.requestFullscreen();
  } else if (gameContainer.mozRequestFullScreen) {
    // Firefox
    gameContainer.mozRequestFullScreen();
  } else if (gameContainer.webkitRequestFullscreen) {
    // Chrome, Safari and Opera
    gameContainer.webkitRequestFullscreen();
  } else if (gameContainer.msRequestFullscreen) {
    // IE/Edge
    gameContainer.msRequestFullscreen();
  }
});





    // Function to enter fullscreen mode
    function enterFullscreen() {
      if (gameContainer.requestFullscreen) {
        gameContainer.requestFullscreen();
      } else if (gameContainer.mozRequestFullScreen) { // Firefox
        gameContainer.mozRequestFullScreen();
      } else if (gameContainer.webkitRequestFullscreen) { // Chrome, Safari and Opera
        gameContainer.webkitRequestFullscreen();
      } else if (gameContainer.msRequestFullscreen) { // IE/Edge
        gameContainer.msRequestFullscreen();
      }
    }

    // Function to handle keydown event
    function handleKeydown(event) {
      if (event.key === 'f' || event.key === 'F') {
        enterFullscreen();
      }
    }

    // Add event listener for keydown event
    document.addEventListener('keydown', handleKeydown);