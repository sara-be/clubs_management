<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>club parascolair</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('frontend/assets2/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets2/css/templatemo-scholar.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets2/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets2/css/animate.css') }}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 586 Scholar

https://templatemo.com/tm-586-scholar

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                      <img src="{{ asset('images/logoofppt.png') }}" class="img-fluid rounded-circle w-100 h-80">
                       
                    </a> 
                    {{-- <h1 class="mt-2 ms-2 text-white">Clubs </h1> --}}
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Serach Start ***** -->
                    <!-- <div class="search-input">
                      <form id="search" action="#">
                        <input type="text" placeholder="Type Something" id='searchText' name="searchKeyword" onkeypress="handle" />
                        <i class="fa fa-search"></i>
                      </form>
                    </div> -->
                    <!-- ***** Serach Start ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav"> 
                    
                      <li class="scroll-to-section"><a href="#top" class="active">Acceuil</a></li>
                      <li class="scroll-to-section"><a href="#courses">Clubs</a></li>
                      <li class="scroll-to-section"><a href="#events">Evénements</a></li>
                      <li class="scroll-to-section"><a href="#team">Résponsables</a></li>

                      <li class="scroll-to-section"><a href="{{ route('login') }}">Se connecter</a></li>
						        <!-- @if (Route::has('register'))
                      <li class="scroll-to-section"><a href="{{ route('register') }}">Registrer</a></li>
                    @endif -->
                      
                  </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="main-banner" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-carousel owl-banner">
            <div class="item item-1">
              <div class="header-text">
                <span class="category">Nos CLUBS</span>
                <h2>
                  Avec Scholar, tout est plus facile.</h2>
                <!-- <p>Scholar is free CSS template designed by TemplateMo for online educational related websites. This layout is based on the famous Bootstrap v5.3.0 framework.</p> -->
                <div class="buttons">
                  <!-- <div class="main-button">
                    <a href="#">Request Demo</a>
                  </div>
                  <div class="icon-button">
                    <a href="#"><i class="fa fa-play"></i> What's Scholar?</a>
                  </div> -->
                </div>
              </div>
            </div>
            <div class="item item-2">
              <div class="header-text">
                <span class="category">Evénements</span>
                <h2>Obtenez le meilleur résultat de vos efforts</h2>
                <!-- <p>You are allowed to use this template for any educational or commercial purpose. You are not allowed to re-distribute the template ZIP file on any other website.</p> -->
                <div class="buttons">
                  <!-- <div class="main-button">
                    <a href="#">Request Demo</a>
                  </div>
                  <div class="icon-button">
                    <a href="#"><i class="fa fa-play"></i> What's the best result?</a>
                  </div> -->
                </div>
              </div>
            </div>
            <div class="item item-3">
              <div class="header-text">
                <span class="category">Clubs en ligne</span>
                <h2>Les clubs en ligne vous aident à connaître les activités des clubs ISTA NTIC. </h2>
                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temporious incididunt ut labore et dolore magna aliqua suspendisse.</p> -->
                <div class="buttons">
                  <!-- <div class="main-button">
                    <a href="#">Request Demo</a>
                  </div>
                  <div class="icon-button">
                    <a href="#"><i class="fa fa-play"></i> What's Online Course?</a>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Clubs + images --}}
  <section class="section courses" id="courses" >
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="section-heading">
           
            <h2>Clubs</h2>
          </div>
        </div>
      </div>
      
      <div class="row event_box">
        @foreach ($clubs as $club)
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 design">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="{{ asset('storage/images/' . $club->photo) }}" width='300' height='250'  alt="club photo"></a>
              <span class="category">{{ $club->responsable->name}}</span>
            </div>
            <div class="down-content">
              <span class="author"><h1>{{ $club->name}}</h1></span>
              <p>{{ $club->description}}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- ***** CLUBS ***** -->
  <!-- {{-- <div class="services section" id="services">
    <div class="container">
      <div class="row">
        @foreach ($clubs as $club)
        <div class="col-lg-4 col-md-6">
          
          <div class="service-item">
            <div class="icon">
              <img src="{{ asset('frontend/assets2/images/service-01.png') }}" alt="online degrees">
            </div>
            <div class="main-content">
              
              <h4>{{ $club->name}}</h4>
              <p>{{ $club->description}}</p>
              <p>{{ $club->responsable->name}}</p>
              
              <div class="main-button">
                <a href="{{ route('userFront.show', $club->id) }}">Voir plus</a>
              </div>
            </div>
          </div>
        </div> @endforeach
    </div>
    </div>


 </div> --}} -->
  <!-- *****Résponsables ***** -->
      <div class="col-lg-12 text-center mt-5"id="team">
          <div class="section-heading">
           <h2>Résponsables</h2>
            
          </div>
        
        <div class="team section" >
    
        <div class="container">
          <div class="row">
            @foreach ($responsables as $responsable)
            <div class="col-lg-4 col-md-6" style="margin-bottom: 10px;">
              <div class="team-member">
                <div class="main-content">
                  <img src="{{ asset('storage/images/' . $responsable->photo) }}" alt="Responsable photo">
                  <span class="category"></span>
                  <h4>{{ $responsable->name}}</h4>
                  <h6 class="text-gray-200" > <i class="fas fa-envelope m-2"></i>{{ $responsable->email}}</h6>
                <h6>  <i class="fas fa-phone-alt m-4"></i>{{ $responsable->phone}}</h6>
                </div>
              </div>
            </div>
            @endforeach

        </div>
       </div>
        </div>
  </div>

  <!-- *****événements ***** -->
  <div class="section events" id="events">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="section-heading">
            
            <h2>événements prochains</h2>
          </div>
        </div>
      @foreach ($events as $event)
        <div class="col-lg-12 col-md-6">
          <div class="item">
            <div class="row">
              
              <div class="col-lg-3">
                <div class="image">
                <a class="w-80 h-80"><i class="fas fa-calendar-alt" style="font-size: 60px;"></i></a>
                </div>

                
              </div>
              <div class="col-lg-9">
                <ul>
                  <li>
                    <h2 class="category">{{ $event->name }}</h2>
                  </li>
                   <li>
                    <span>Club:</span>
                    <h6>{{ $event->club->name }}</h6>
                  </li> 
                  <li>
                    <span>Date:</span>
                    <h6>{{ \Carbon\Carbon::parse($event->date)->format('Y-m-d')}}</h6>
                  </li>
                <li>
                    <span>Déscription :</span>
                    <h6>{{ $event->description }}</h6>
                  </li>
                </ul>
                <!-- <a href="{{ route('userFront.showEvent', $event->id) }}"><i class="fa fa-angle-right"></i></a> -->
              </div>
            </div>
          </div>
        </div>
        @endforeach
 <!-- ***** about us ***** -->
  <div class="section about-us">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-1">
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Où devrions-nous commencer ?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Découvrez un monde d'opportunités passionnantes avec nos clubs parascolaires à l'ISTA NTIC Syba. Qu'il s'agisse du large gamme de choix, chaque club offre une expérience unique pour les étudiants avides de découvrir de nouvelles passions et de s'impliquer dans des activités enrichissantes en dehors des cours.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Événements Dynamiques
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Nos clubs organisent régulièrement une gamme diversifiée d'événements dynamiques qui captivent et inspirent nos étudiants. Des festivals culturels colorés et des tournois sportifs animés aux conférences technologiques innovantes, chaque événement est conçu pour stimuler l'apprentissage, la créativité et le développement personnel</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Leadership et Coordination
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Chaque club est dirigé par des étudiants talentueux et dévoués qui assurent le leadership et la coordination des activités. Nos responsables de club travaillent en étroite collaboration avec les membres pour créer un environnement inclusif, dynamique et propice à l'épanouissement personnel et collectif.</div>
              </div>
            </div>
            <div class="accordion-item">
              {{-- <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  Do we get the best support?
                </button>
              </h2> --}}
              {{-- <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  You can also search on Google with specific keywords such as <code>templatemo business templates, templatemo gallery templates, admin dashboard templatemo, 3-column templatemo, etc.</code>
                </div>
              </div> --}}
            </div>
          </div>
        </div>
        <div class="col-lg-5 align-self-center">
          <div class="section-heading">
            <h6>À propos</h6>
            <h2>
              Qu'est-ce qui fait de nous la meilleure académie en ligne ?</h2>
            <p>Rejoignez-nous dans cette aventure passionnante et découvrez un monde de possibilités au sein de nos clubs parascolaires à l'ISTA NTIC Syba.</p>
            <div class="main-button">
              <a href="#services">Découvrir</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** statistiques ***** -->
  <div class="section fun-facts">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="wrapper">
            <div class="row">
              <div class="col-lg-3 col-md-6">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="{{ $totalClubs }}" data-speed="1000"></h2>
                   <p class="count-text ">Clubs</p>
                </div>
              </div>
              <div class="col-lg-3 col-md-6">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="{{ $totalEvents }}" data-speed="1000"></h2>
                  <p class="count-text ">Evénements</p>
                </div>
              </div>
              <div class="col-lg-3 col-md-6">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="{{ $totalMembers }}" data-speed="1000"></h2>
                  <p class="count-text ">Membres</p>
                </div>
              </div>
              <div class="col-lg-3 col-md-6">
                <div class="counter end">
                  <h2 class="timer count-title count-number" data-to="{{ $totalResponsables }}" data-speed="1000"></h2>
                  <p class="count-text ">Résponsables</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

 
    <!-- ***** commentaires  ***** -->
 
    {{-- <div class="section testimonials">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <div class="owl-carousel owl-testimonials">
              <div class="item">
                <p>“Please tell your friends or collegues about TemplateMo website. Anyone can access the website to download free templates. Thank you for visiting.”</p>
                <div class="author">
                  <img src="assets/images/testimonial-author.jpg" alt="">
                  <span class="category">Full Stack Master</span>
                  <h4>Claude David</h4>
                </div>
              </div>
              <div class="item">
                <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravid.”</p>
                <div class="author">
                  <img src="assets/images/testimonial-author.jpg" alt="">
                  <span class="category">UI Expert</span>
                  <h4>Thomas Jefferson</h4>
                </div>
              </div>
              <div class="item">
                <p>“Scholar is free website template provided by TemplateMo for educational related websites. This CSS layout is based on Bootstrap v5.3.0 framework.”</p>
                <div class="author">
                  <img src="assets/images/testimonial-author.jpg" alt="">
                  <span class="category">Digital Animator</span>
                  <h4>Stella Blair</h4>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5 align-self-center">
            <div class="section-heading">
              <h6>TESTIMONIALS</h6>
              <h2>What they say about us?</h2>
              <p>You can search free CSS templates on Google using different keywords such as templatemo portfolio, templatemo gallery, templatemo blue color, etc.</p>
            </div>
          </div>
        </div>
      </div>
    </div> --}}
  
  
    <!-- ***** Contact us ***** -->
  <div class="contact-us section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-6  align-self-center">
          <div class="section-heading">
            <h6>Contactez-nous</h6>
<h2>N'hésitez pas à nous contacter à tout moment</h2>
<p>Veuillez remplir le formulaire de contact </p>
<div class="special-offer">
  <h1 >Rejoignez-nous</h1>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="contact-us-content">

            <form id="contact-form" action="{{ route('messages.store') }}" method="post">
              @csrf
              <div class="row">
                  <div class="col-lg-12">
                      <fieldset>
                          <input type="text" name="name" id="name" placeholder="Votre nom complet..." autocomplete="on" required>
                      </fieldset>
                  </div>
                  <div class="col-lg-12">
                      <fieldset>
                          <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Votre e-mail..." required>
                      </fieldset>
                  </div>
                  <div class="col-lg-12">
                      <fieldset>
                          <textarea name="message" id="message" placeholder="Votre message"></textarea>
                      </fieldset>
                  </div>
                  <div class="col-lg-12">
                      <fieldset>
                          <button type="submit" id="form-submit" class="orange-button">Envoyer</button>
                      </fieldset>
                  </div>
              </div>
          </form>          
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="col-lg-12">
        <p> 2024 ISTA NTIC SYBA.</p>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('frontend/assets2/js/isotope.min.js') }}"></script>
  <script src="{{ asset('frontend/assets2/js/owl-carousel.js') }}"></script>
  <script src="{{ asset('frontend/assets2/js/counter.js') }}"></script>
  <script src="{{ asset('frontend/assets2/js/custom.js') }}"></script>

  </body>
</html>