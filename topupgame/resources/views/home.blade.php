<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=0, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home ItemCons</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');


*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-decoration: none;
    text-transform: capitalize;
    list-style: none;
    outline: none;
    border: none;
    transition: all 0.3s linear;
    font-family: 'Poppins', sans-serif;
    text-transform: uppercase;
}
html{
    overflow-x: hidden;
    scroll-behavior: smooth;
}
body{
   font-size: 65%; 
}


:root{
    --bg: #ffb320;
    --color: #5AB2FF;
}
.navbar{
    background: var(--color);
}
.home img{
    min-height: 90vh;
    object-fit: cover;
    position: relative;
}
.home .content{
    position: absolute;
    top: 50%;
    left: 15%;
    transform: translateY(-50%);
}
.home p{
    line-height: 2;
}



    .carousel-control-prev,
    .carousel-control-next {
    width: auto;
    height: auto;
    }

    .carousel-control-prev {
    left: 0;
    }

    .carousel-control-next {
    right: 0;
    }
</style>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand fs-1" href="#" style="color: white">
            ItemCons
          </a>
          <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active fs-5 text-white" aria-current="page" href="#home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-5 text-white" href="#game">Games</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-5 text-white" href="#blog">Category</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-5 text-white" href="#forms">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-5 text-white" href="#contact">Contact</a>
              </li>
            </ul>
          </div>
          <button type="button" class="log btn btn-warning text-uppercase text-white" href="/login">Sign Up</button>
        </div>
    </nav>

    <div class="home" id="home">
        <div id="carouselExampleFade" class="carousel slide carousel-fade">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="carousel1.jpg" class="w-100" alt="image"> 
              </div>
              <div class="carousel-item">
                <img src="carousel2.jpg" class="w-100" alt="image">        
              </div>
              <div class="carousel-item">
                <img src="carousel3.jpeg" class="w-100" alt="image">     
              </div>
              
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>  
    <div class="text-center p-5">
        <h1>Vouchers & Games</h1>
    </div>
    {{-- <div class="cards py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="images">
                        <img src="mlbb.jpeg" alt="images" >
                        <div class="content">
                            <span class="text-white bg-warning py-1 px-3 fs-6">starting</span>
                            <h4>Suspendisse ut justo tem por, rutrum</h4>
                            <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h6>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="images">
                        <img src="valorant.jpeg" alt="images">
                        <div class="content">
                            <span class="text-white bg-danger py-1 px-3 fs-6">new</span>
                            <h4>Suspendisse ut justo tem por, rutrum</h4>
                            <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h6>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="images">
                        <img src="pubg.jpg" alt="images">
                        <div class="content">
                            <span class="text-white bg-warning py-1 px-3 fs-6">game nowe</span>
                            <h4>Suspendisse ut justo tem por, rutrum</h4>
                            <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h6>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="images">
                        <img src="hsr.jpg" alt="images">
                        <div class="content">
                            <span class="text-white bg-danger py-1 px-3 fs-6">new</span>
                            <h4>Suspendisse ut justo tem por, rutrum</h4>
                            <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>