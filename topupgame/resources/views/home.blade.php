
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=0, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home ItemCons</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-TlZzthgzo+Oj0bgdJ2yRbYNzeIW2alA0wulb1LV2a4oYYMMsmWi+0MaZ2MtbAs+leEKRkYOyBjZfHKR7FVT8wg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

    .cardBag {
        background-image: url('ninja.jpg');
        background-repeat: no-repeat;
    }

    .site-footer{
      padding: 5em 0;
      background: #5AB2FF;
      font-size: 14px;
      color: rgb(243, 236, 236);
    }

    .site-footer p:last-child{
      margin-bottom: 0;
    }

    .site-footer a {
      color: #ffc107;
      border-bottom: 1px solid transparent;
    }

    .site-footer a:hover{
      color: #fff;
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    .site-footer h2{
      font-size: 22px;
      margin-bottom: 28px;
      letter-spacing: .05em;
      color: #fff;
      font-weight: bold;
    }

    .site-footer .footer-link li {
      line-height: 1.5;
      margin-bottom: 15px;
    }

    .footer-social a{
      line-height: 0;
      border-radius: 50%;
      margin: 0 5px 5px 0;
      border: 1px solid rgba(255, 255, 255, 0.1);
      width: 30px;
      height: 30px;
      text-align: center;
      display: inline-block;
    }

    .footer-social a:hover{
      background: #fff;
      border-color: #fff;
      color: #000;
    }

    .footer-social .fa{
      margin-top: 7px;
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
                <a class="nav-link fs-5 text-white" href="#category">Games</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-5 text-white" href="#about">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-5 text-white" href="#contact">Contact</a>
              </li>
            </ul>
          </div>
          @if(Session::has('user'))
                <span class="navbar-text text-white me-2">
                    Welcome, {{ Session::get('user') }}!
                </span>
                <a class="btn btn-danger text-uppercase text-white" href="/logout">Logout</a> &nbsp;
                <a class="btn btn-success text-uppercase text-white" href="/cruduser">ADD Barang</a>
            @else
                <a class="btn btn-warning text-uppercase text-white" href="/signup">Sign Up</a>
            @endif
        </div>
    </nav>

    <div class="home" id="home">
      <div id="carouselExampleFade" class="carousel slide carousel-fade">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="carousel1.jpg" class="w-100" alt="image">
              <div class="content col-8">
                  <h1 class="text-white display-3">The Best <span class="text-warning">Game</span></h1>
                  <h1 class="text-white display-3">Marketplace</h1>
                  <div class="container">
                    <div class="row justify-content-start">
                      <div class="col-md-8 col-lg-6">
                        <p class="text-white fs-6 fw-light py-3 px-2">
                          Discover a Wide Range of Exciting Products, Only at ItemCons !
                        </p>
                      </div>
                    </div>
                  </div>
                  <button class="btn btn-warning text-uppercase text-white fs-5">read more</button>
              </div>
            </div>
            <div class="carousel-item">
              <img src="carousel2.jpg" class="w-100" alt="image">
              <div class="content col-8">
                <h1 class="text-white display-3">The Best <span class="text-warning">Game</span></h1>
                <h1 class="text-white display-3">Marketplace</h1>                  
                <div class="container">
                  <div class="row justify-content-start">
                    <div class="col-md-8 col-lg-6">
                      <p class="text-white fs-6 fw-light py-3 px-2">
                        Discover a Wide Range of Exciting Products, Only at ItemCons !
                      </p>
                    </div>
                  </div>
                </div>
                <button class="btn btn-warning text-uppercase text-white fs-5">read more</button>
              </div>
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

  <div class="cardBag p-5" id="category">
    <h1 class="text-center">Vouchers & Games</h1>
    <div class="d-flex justify-content-center p-3">
        <button class="btn btn-primary me-2" id="allBtn">All</button>
        @foreach($categories as $category)
            <button class="btn btn-primary me-2" id="{{ strtoupper($category->nama_kategori) }}Btn">{{ $category->nama_kategori }}</button>
        @endforeach
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3" id="MOBILE">
                <div class="card h-100">
                    <img src="mlbb.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Mobile Legends</h5>
                        <p class="card-text">Mobile Legends: Bang Bang is a popular MOBA game where players can top up diamonds to purchase hero skins. These skins change the hero's appearance and provide special effects, enhancing the gaming experience.</p>
                        <button class="btn btn-primary">See More</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3" id="MOBILE">
                <div class="card h-100">
                    <img src="pubg.jpg" class="card-img-top" alt="..." height="245px">
                    <div class="card-body">
                        <h5 class="card-title">PUBG Mobile</h5>
                        <p class="card-text">PUBG is a widely-played battle royale game where players can purchase Unknown Cash (UC) to buy skins and outfits. These cosmetic items change the appearance of characters and gear, offering a personalized gaming experience.</p>
                        <button class="btn btn-primary">See More</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3" id="PC">
                <div class="card h-100">
                    <img src="valorant.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Valorant</h5>
                        <p class="card-text">Valorant is a popular tactical shooter where players can top up Valorant Points (VP) to buy weapon skins. These skins alter the appearance of weapons and add visual flair, making gameplay more engaging.</p>
                        <button class="btn btn-primary">See More</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3" id="PC">
                <div class="card h-100">
                    <img src="genshin.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Genshin Impact</h5>
                        <p class="card-text">Genshin Impact is an open-world action RPG where players can top up Genesis Crystals to buy skins and other in-game items. Skins provide characters with new looks and enhance the visual appeal of the game.</p>
                        <button class="btn btn-primary">See More</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3" id="STREAMING">
                <div class="card h-100">
                    <img src="netflix.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">NETFLIX</h5>
                        <p class="card-text">Netflix is an American subscription video on-demand over-the-top streaming service. The service primarily distributes original and acquired films and television shows from various genres, and it is available internationally in multiple languages.</p>
                        <button class="btn btn-primary">See More</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3" id="VOUCHER">
                <div class="card h-100">
                    <img src="steam.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">STEAM</h5>
                        <p class="card-text">Steam is a video game digital distribution service and storefront developed by Valve Corporation. It was launched as a software client in September 2003 to provide game updates automatically for Valve's games, and expanded to distributing third-party titles in late 2005.</p>
                        <button class="btn btn-primary">See More</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <footer class="site-footer">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-3 mb-5">
            <h2>About Us</h2>
            <p>Itemcons is a game marketplace where players can buy, sell, and trade in-game items and currencies. It offers a wide range of products for various popular games, providing a secure and convenient platform for gamers to enhance their gaming experience.</p>
            <p><a href="">Click here to learn more</a></p>
          </div>

          <div class="col-md-3 mb-5">
            <h2>Contact &amp; Address</h2>
            <ul class="list-unstyled footer-link">
              <li class="d-flex">
                <span class="me-3">Address:</span><span class="text-white">Jl Manyar Kertajaya 21, Surabaya, Indoensia.</span>
              </li>
              <li class="d-flex">
                <span class="me-3">Telephone:</span><span class="text-white">+121 255 333</span>
              </li>
              <li class="d-flex">
                <span class="me-3">Email:</span><span class="text-white">itemCons@gmail.com</span>
              </li>
            </ul>
          </div>

          <div class="col-md-3 mb-5">
            <h2>Quick Links</h2>
            <ul class="list-unstyled footer-link">
              <li><a href="#">Home</a></li>
              <li><a href="#">Games</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Contact Us</a></li>
            </ul>
          </div>

          <div class="col-md-3">
            <h2>Our Social Media</h2>
            <ul class="list-unstyled footer-link d-flex">
              <li><a href="#"><span class="ms-2"></span><img src="facebook.png" alt="" width="40px"></a></li>
              <li><a href="#"><span class="ms-2"></span><img src="twitter.png" alt="" width="40px"></a></li>
              <li><a href="#"><span class="ms-2"></span><img src="tiktok.png" alt="" width="40px"></a></li>
              <li><a href="#"><span class="ms-2"></span><img src="instagram.png" alt="" width="40px"></a></li>
            </ul>
          </div>

        </div>
      </div>
    </footer>
    
    <script>
   document.addEventListener("DOMContentLoaded", function() {
  var categoryButtons = document.querySelectorAll("#category button");
  var allButton = document.getElementById("allBtn");
  categoryButtons.forEach(function(button) {
    button.addEventListener("click", function() {
      var categoryId = this.id.replace("Btn", "").toUpperCase();
      var cards = document.querySelectorAll("#category .col-md-4");
      cards.forEach(function(card) {
        card.style.display = "none";
      });
      if (categoryId === "ALL") {
        cards.forEach(function(card) {
          card.style.display = "block";
        });
      } else {
        var selectedCards = document.querySelectorAll("#category .col-md-4#" + categoryId);
        selectedCards.forEach(function(card) {
          card.style.display = "block";
        });
      }
    });
  });
  allButton.addEventListener("click", function() {
    var cards = document.querySelectorAll("#category .col-md-4");
    cards.forEach(function(card) {
      card.style.display = "block";
    });
  });
});
</script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>