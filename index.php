<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>AC2FL</title>
    <title>Formulaire d'adhésion</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand"   img src="Ressources/A2CFL.png" alt="logo" ></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#acti">Nos Activités</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="#catégorie">
                  Catégories d'ULM 
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#"></a></li>
                  <li><a class="dropdown-item" href="#"></a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#"></a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#moyens">Les Moyens Pédagogiques</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#equipe">L'Équipe</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#evenement">Évènements</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Review</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Galerie</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact </a>
              </li>
              
            </ul>
           
            <form class="d-flex">
              <input class="form-control me-2"+ type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
     
      <div class="container-fluid p-0" data-section="slide03">
        <div id="blog-carousel" class="carousel slide" data-ride="carousel" data-bs-ride="carousel">
      
          <!-- Ajout des classes "carousel-sm" pour un carrousel plus petit -->
          <div class="carousel-inner carousel-sm">
            <div class="carousel-item active">
              <!-- Ajout des classes "img-fluid" pour rendre l'image réactive et "h-100" pour la hauteur maximale -->
              <img src="Ressources/avion1.jpg" class="d-block w-100 img-fluid h-100" alt="avion1">
            </div>
            <div class="carousel-item">
              <!-- Utilisation des classes "img-fluid" et "h-100" pour l'image -->
              <img src="Ressources/avion2.jpg" class="d-block w-100 img-fluid h-100" alt="avion2">
            </div>
            <div class="carousel-item">
              <!-- Utilisation des classes "img-fluid" et "h-100" pour l'image -->
              <img src="Ressources/avion3.jpg" class="d-block w-100 img-fluid h-100" alt="avion3">
            </div>
          </div>
      
          <a class="carousel-control-prev" href="#blog-carousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only"></span>
          </a>
          <a class="carousel-control-next" href="#blog-carousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only"></span>
          </a>
        </div>
      </div>
      
      
      

      <div class="container my-5">
        <div class="row">
          <div class="col-md-6">
            <h2 id="acti" class="text-center">Nos activités</h2>
            <p>
              L'aéro-club est une association loi 1901, agréée Jeunesse et Sports, adhérente à la FFULM (Fédération Française d'ULM). Elle est enregistrée sous le numéro 04674 et agréée sous le numéro AS70986858. Son siège social est situé au 62, avenue de la République, 70200 Lure.
            </p><br>
          </div>
          
          <div class="col-md-6">
            <ul class="list-group">
              <li class="list-group-item">Formation de pilotes et d'instructeurs</li>
              <li class="list-group-item">Baptêmes de l'air</li>
              <li class="list-group-item">Maintenance des ULM (moteur, structure)</li>
              <li class="list-group-item">Montage des ULM et de tout instrument de navigation (compas, radio, transpondeur)</li>
              <li class="list-group-item">Service de restauration rapide</li>
              <li class="list-group-item">Hébergement (trois studios et six chambres pour les élèves stagiaires)</li>
              <li class="list-group-item">Location d'emplacement ULM dans des hangars pour les particuliers</li>
            </ul>
          </div>
        </div>
      </div>
      
      <h1 id="catégorie"> Les catégories d'ULM</h1>
      <hr>

      <div  class="container">
        <div class="row justify-content-center mt-4">
            <!-- First Card -->
            <div class="col-md-3 mb-4">
                <div class="card" style="width: 18rem;">
                    <img src="Ressources/paramoteur.jpg" class="card-img-top" alt="image paramoteur">
                    <div class="card-body">
                        <h5 class="card-title">Le paramoteur</h5>
                        <p class="card-text">Un ULM paramoteur est un aéronef sustenté par une voilure souple, de type parachute.</p>
                        <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight1" aria-controls="offcanvasRight1">En savoir plus</button>
    
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight1" aria-labelledby="offcanvasRightLabel1">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasRightLabel1">Le paramoteur</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body small">
                                Un ULM paramoteur est un aéronef sus-
                                tenté par une voilure souple, de type
                                parachute. Il répond aux conditions techniques suivantes :
                                La puissance maximale continue est
                                inférieure ou égale à 81 cv. pour les
                                monoplaces et 102 cv. pour les
                                biplaces. La vitesse minimum de vol
                                est inférieure ou égale à 65 km/h.
                                La masse maximale est inférieure ou
                                égale à 300 kg pour les monoplaces et
                                à 450 kg pour les biplaces.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Second Card -->
            <div class="col-md-3 mb-4">
                <div class="card" style="width: 18rem;">
                    <img src="Ressources/pendulaire.jpg" class="card-img-top" alt="image pendulaire">
                    <div class="card-body">
                        <h5 class="card-title">Le pendulaire</h5>
                        <p class="card-text">Un ULM pendulaire est un aéronef sustenté par une voilure rigide sous laquelle est généralement accrochée un chariot motorisé.</p>
                        <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight2" aria-controls="offcanvasRight2">En savoir plus</button>
    
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight2" aria-labelledby="offcanvasRightLabel2">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasRightLabel2">Le pendulaire</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body small">
                                Un ULM pendulaire est un aéronef sustenté par une
                                voilure rigide sous laquelle est généralement accroché un chariot motorisé. Il répond aux conditions
                                techniques suivantes :
                                La puissance maximale continue est inférieure ou
                                égale à 81 cv. pour les monoplaces et 102 cv.
                                pour les biplaces. La vitesse minimum de vol est
                                inférieure ou égale à 65 km/h.
                                La masse maximale est inférieure ou égale à 300
                                kg pour les monoplaces et à 450 kg pour les
                                biplaces. Ces masses peuvent être augmentées
                                de 5% dans le cas où l'ULM est équipé d'un
                                parachute de secours et de 10 % dans le cas ou
                                l'ULM est équipé de flotteurs. Ces augmentations
                                ne sont pas cumulables.
                                La vitesse de décrochage est inférieure ou égale
                                à 65 km/h ou la charge alaire à la masse maxi-
                                male est inférieure à 30kg/m 2
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Third Card -->
            <div class="col-md-3 mb-4">
                <div class="card" style="width: 18rem;">
                    <img src="Ressources/multiaxes.jpg" class="card-img-top" alt="image multiaxes">
                    <div class="card-body">
                        <h5 class="card-title">Le multiaxes</h5>
                        <p class="card-text">Un ULM multiaxes est un aéronef sustenté par
                            une voilure fixe.</p>
                        <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight3" aria-controls="offcanvasRight3">En savoir plus</button>
    
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight3" aria-labelledby="offcanvasRightLabel3">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasRightLabel3">Le multiaxes</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body small">
                                Un ULM multiaxes est un aéronef sustenté par
                                une voilure fixe. Il répond aux conditions techniques suivantes :
                                k La puissance maximale continue est inférieure
                                ou égale à 81 cv. pour les monoplaces et 102
                                cv. pour les biplaces. La vitesse minimum de
                                vol est inférieure ou égale à 65 km/h.
                                k La masse maximale est inférieure ou égale à
                                300 kg pour les monoplaces et à 450 kg pour
                                les biplaces. Ces masses peuvent être aug-
                                mentées de 5% dans le cas où l'ULM est équi-
                                pé d'un parachute de secours et de 10 % dans
                                le cas ou l'ULM est équipé de flotteurs. Ces
                                augmentations ne sont pas cumulables.
                                k La vitesse de décrochage est inférieure ou
                                égale à 65 km/h ou la charge alaire à la masse
                                maximale est inférieure à 30kg/m2.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="row justify-content-center mt-4">
            <!-- Fourth Card -->
            <div class="col-md-3 mb-4">
                <div class="card" style="width: 18rem;">
                    <img src="Ressources/autogire.jpg" class="card-img-top" alt="image autogire">
                    <div class="card-body">
                        <h5 class="card-title">L’autogire ultraléger</h5>
                        <p class="card-text">Appareil volant dont le rotor assure la sustentation (et non la propulsion, comme dans l'hélicoptère).</p>
                        <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight4" aria-controls="offcanvasRight4">En savoir plus</button>
    
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight4" aria-labelledby="offcanvasRightLabel4">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasRightLabel4">L’autogire ultraléger</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body small">
                                Un autogire ultra-léger répond aux
                                conditions techniques suivantes :
                                k La puissance maximale continue est inférieure ou
                                égale à 102 cv. pour les monoplaces et 122 cv. pour
                                les biplaces. La vitesse minimum de vol est inférieure
                                ou égale à 65 km/h.
                                k La masse maximale est inférieure ou égale à 300 kg
                                pour les monoplaces et à 450 kg pour les biplaces.
                                k La charge rotorique à la masse
                                maximale est comprise entre
                                4,5 et 12kg/m2
                                .
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Fifth Card -->
            <div class="col-md-3 mb-4">
                <div class="card" style="width: 18rem;">
                    <img src="Ressources/aerostat.jpg" class="card-img-top" alt="image aérostat">
                    <div class="card-body">
                        <h5 class="card-title">L’aérostat ultraléger</h5>
                        <p class="card-text">Véhicule aérien sans moteur plus léger que l'air. Les aérostats ultra-légers sont caractérisés par leur poids extrêmement faible et leur capacité à rester en suspension dans l'air en exploitant la différence de densité entre l'hélium ou l'hydrogène.</p>
                        <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight5" aria-controls="offcanvasRight5">En savoir plus</button>
    
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight5" aria-labelledby="offcanvasRightLabel5">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasRightLabel5">L’aérostat ultraléger</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body small">
                                Un aérostat ultra-léger répond aux conditions
                                techniques suivantes :
                                k La puissance maximale continue est inférieure
                                ou égale à 102 cv. pour les monoplaces et 122
                                cv. pour les biplaces. La vitesse minimum de
                                vol est inférieure ou égale à 65 km/h.
                                k Le volume de l'enveloppe d'hélium est inférieur
                                ou égal à 900 m3.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Sixth Card -->
            <div class="col-md-3 mb-4">
                <div class="card" style="width: 18rem;">
                    <img src="Ressources/helico.jpg" class="card-img-top" alt="image hélico ultraléger">
                    <div class="card-body">
                        <h5 class="card-title">L’hélicoptère ultraléger</h5>
                        <p class="card-text">L'hélicoptère ultra léger est un hélico monomoteur dont la puissance maximale est inférieure ou égale à 116 CV (monoplace) ou à 143 CV (biplaces).</p>
                        <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight6" aria-controls="offcanvasRight6">En savoir plus</button>
    
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight6" aria-labelledby="offcanvasRightLabel6">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasRightLabel6">Offcanvas right</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body small">
                                Un hélico ultra-léger répond aux conditions
                                techniques suivantes :
                                k La puissance maximale continue est inférieure
                                ou égale à 109 cv. pour les monoplaces et 136
                                cv. pour les biplaces. La vitesse minimum de
                                vol est inférieure ou égale à 65 km/h.
                                k La masse maximale est inférieure ou égale à
                                300 kg pour les monoplaces et à 450 kg pour
                                les biplaces.
                                k La charge rotorique à la masse maximale est
                                comprise entre 4,5 et 12kg/m2.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <main>
      <section>
        <h1 id ="moyens">Nos moyens pédagogiques</h1>
        <h3>Un aérodrome privé avec la possibilité d'un hébergement dans un environnement exceptionnel</h3>
        <hr>
       
        <img src="images/aerodrome.jpg" alt="Aérodrome">
      </section>
      
      <div class="container text-center mt-5">
        <div class="accordion" id="accordionPanelsStayOpenExample" style="max-width: 1000px; margin: 0 auto;">
            <!-- First Accordion Item -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        Une surface totale de 45 hectares dégagés
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                        <strong>Image à inclure</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>
    
            <!-- Second Accordion Item -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                        Deux pistes en X de 800 et 450 m
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                        <strong>Image à inclure</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>
    
            <!-- Third Accordion Item -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                        Un hydrosurface de 8 hectares
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                    <div class="accordion-body">
                        <strong>Image à inclure</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>
    
            <!-- Fourth Accordion Item -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                        Trois hangars avec surface couverte de 4300 m²
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
                    <div class="accordion-body">
                        <strong>Image à inclure</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>
    
            <!-- Fifth Accordion Item -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
                        Locaux administratifs informatisés
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFive">
                    <div class="accordion-body">
                        <strong>Image à inclure</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>
    
            <!-- Sixth Accordion Item -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingSix">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false" aria-controls="panelsStayOpen-collapseSix">
                        Salle de cours multimédia avec simulateur de vol
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSix">
                    <div class="accordion-body">
                        <strong>Image à inclure</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>
    
            <!-- Seventh Accordion Item -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingSeven">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="false" aria-controls="panelsStayOpen-collapseSeven">
                        Un atelier d'entretien et de réparation
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSeven">
                    <div class="accordion-body">
                        <strong>Image à inclure</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>
    
            <!-- Eighth Accordion Item -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingEight">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseEight" aria-expanded="false" aria-controls="panelsStayOpen-collapseEight">
                        Des capacités d'accueil et de restauration sur place
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseEight" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingEight">
                    <div class="accordion-body">
                        <strong>Image à inclure</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>
    
            <!-- Ninth Accordion Item -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingNine">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseNine" aria-expanded="false" aria-controls="panelsStayOpen-collapseNine">
                        Connexion WIFI gratuit sur toute la base
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseNine" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingNine">
                    <div class="accordion-body">
                        <strong>Image à inclure</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>
        </div>
    </div>
    
      
      
        <h1 id="equipe">Notre Équipe</h1>
        <hr>
        <div class="container">

          <!-- Carte en haut -->
          <div class="row justify-content-center mt-4">
            <div class="card" style="width: 18rem;">
              <img src="chemin/vers/photo1.jpg" class="card-img-top" alt="Photo 1">
              <div class="card-body">
                <h5 class="card-title">Jacques ADIT</h5>
                <p class="card-text">Président</p>
              </div>
            </div>
          </div>
        
          <!-- Quatre cartes au centre -->
          <div class="row justify-content-center mt-4">
            <div class="col-md-3">
              <div class="card" style="width: 18rem;">
                <img src="chemin/vers/photo2.jpg" class="card-img-top" alt="Photo 2">
                <div class="card-body">
                  <h5 class="card-title">Igor CLEPLATTE</h5>
                  <p class="card-text">Mécanicien</p>
                </div>
              </div>
            </div>
            <!-- Répétez ce bloc trois fois pour les cartes suivantes -->
            
            <div class="col-md-3">
              <div class="card" style="width: 18rem;">
                <img src="chemin/vers/photo3.jpg" class="card-img-top" alt="Photo 3">
                <div class="card-body">
                  <h5 class="card-title">Kévin SAITOUT</h5>
                  <p class="card-text">Chef Pilote</p>
                </div>
              </div>
            </div>
        
            <div class="col-md-3">
              <div class="card" style="width: 18rem;">
                <img src="chemin/vers/photo4.jpg" class="card-img-top" alt="Photo 4">
                <div class="card-body">
                  <h5 class="card-title">Céline LAPLUME</h5>
                  <p class="card-text">Secrétaire</p>
                </div>
              </div>
            </div>
        
            <div class="col-md-3">
              <div class="card" style="width: 18rem;">
                <img src="chemin/vers/photo5.jpg" class="card-img-top" alt="Photo 5">
                <div class="card-body">
                  <h5 class="card-title">Claudine MONET</h5>
                  <p class="card-text">Trésorière</p>
                </div>
              </div>
            </div>
        
          </div>
        
          <!-- Deux cartes en bas -->
          <div class="row justify-content-center mt-4">
            <div class="col-md-3">
              <div class="card" style="width: 18rem;">
                <img src="chemin/vers/photo6.jpg" class="card-img-top" alt="Photo 6">
                <div class="card-body">
                  <h5 class="card-title">Justine VOLAVU</h5>
                  <p class="card-text">Pilote ULM <br>Institutrice</p>
                </div>
              </div>
            </div>
          
            <!-- Ajout de la dernière carte -->
            <div class="col-md-3">
              <div class="card" style="width: 18rem;">
                <img src="chemin/vers/photo7.jpg" class="card-img-top" alt="Photo 7">
                <div class="card-body">
                  <h5 class="card-title">Alain STRUMENT</h5>
                  <p class="card-text">Pilote ULM<br>Instructeur</p>
                </div>
              </div>
            </div>
          
          </div>
         
          <h1 id="evenement">Évènements à venir</h1>
          <hr>

          <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="événement 1" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="événement 2" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="événement 3" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
<?php
class Form {
    private $action;
    private $method;
    private $fields = [];

    public function __construct($action = "", $method = "post") {
        $this->action = $action;
        $this->method = $method;
    }

    public function addField($label, $type, $name, $options = []) {
        $this->fields[] = [
            'label' => $label,
            'type' => $type,
            'name' => $name,
            'options' => $options,
        ];
    }

    public function getForm() {
        $form = '<form action="' . $this->action . '" method="' . $this->method . '">';
        foreach ($this->fields as $field) {
            $form .= '<label>' . $field['label'] . ':</label><br>';
            if ($field['type'] === 'select') {
                $form .= '<select name="' . $field['name'] . '">';
                foreach ($field['options'] as $option) {
                    $form .= '<option value="' . $option . '">' . $option . '</option>';
                }
                $form .= '</select><br>';
            } elseif ($field['type'] === 'checkbox') {
                foreach ($field['options'] as $option) {
                    $form .= '<input type="checkbox" name="' . $field['name'] . '[]" value="' . $option . '">' . $option . '<br>';
                }
            } elseif ($field['type'] === 'radio') {
                foreach ($field['options'] as $option) {
                    $form .= '<input type="radio" name="' . $field['name'] . '" value="' . $option . '" required>' . $option . ' ';
                }
                $form .= '<br>';
            } else {
                $form .= '<input type="' . $field['type'] . '" name="' . $field['name'] . '"';
                if (isset($field['options']['required'])) {
                    $form .= ' required';
                }
                $form .= '><br>';
            }
        }
        $form .= '<input type="submit" value="Soumettre"></form>';
        return $form;
    }
}

$form = new Form("traitement.php");

// Ajout des champs au formulaire
$form->addField("Civilité", "radio", "civilite", ["M.", "Mme."]);
$form->addField("Nom*", "text", "nom", ['required' => true]);
$form->addField("Prénom*", "text", "prenom", ['required' => true]);
$form->addField("Date de naissance", "date", "date_naissance");
$form->addField("Adresse", "text", "numero_rue");
$form->addField("Code postal", "number", "code_postal", ['placeholder' => 'code postal'] );
$form->addField("Ville", "text", "ville", ['placeholder' => 'Ville']);
$form->addField("Email*", "email", "email", ['required' => true]);
$form->addField("Téléphone portable", "tel", "telephone", ['pattern' => '[0-9]{10}', 'title' => 'Le numéro de portable doit comporter 10 chiffres']);
$form->addField("Activités demandées", "checkbox", "activites", ["Formation de pilote", "Baptême de l'air", "Réparation"]);

echo $form->getForm(); // Affiche le formulaire
?>



            
          </body>
          </html>
          
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="bootstrap.js"></script>
</body>
</html>

