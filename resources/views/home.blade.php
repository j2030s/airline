<!-- layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body class="d-flex flex-column h-100">
    
        <!-- Sidebar -->
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark ms-auto fixed-top ">
                <div class="container">
                    <a class="navbar-brand" href="#">PUC AIRLINES</a>

                    <button 
                    class="navbar-toggler" 
                    type="button" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#navbarNav"
                    >
                    <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto p-2">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Log in</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#Registration">Registration</a>
                            </li>
                            <!-- Add more menu items as needed -->
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        

        
            <!-- Main Content -->
    <main class="flex-grow-1 d-flex">
         <!-- Sidebar -->
     


        <!-- Your main content goes here -->
        <div class="container-fluid " style="margin-top: 56px;">
            
                   

    <section class="bg-light text-dark p-4 text-center text-sm-start">
        <div class="container">
            <div class="row">
                <div class="d-sm-flex col-md-8 align-items-center justify-content-between mx-auto">
                    <div> <br><br> <br>
                        <h1>Fly Higher with us!</h1>
                        <h6>Welcome to PUC Airlines, your gateway to the skies! <br> Seamless and personalized flight booking experience.
                             </h6>
                    </div>
                    
                        <img class="img-fluid  w-50 ms-auto" src="img/bbard.png" >
                  
                        
                </div>
            </div>
            
        </div>
    </section>
    <section class=" text-center  p-6">
        <h1>
            search available fights
        </h1>

        
    <div class="container mt-5">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#">Search flights</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Manage booking / Check in</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">What's on your flight</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Flight status</a>
            </li>
        </ul>

        <div class="card p-3 mt-3">
            <form action="{{ route('flights.search') }}" method="GET">
                <label for="departing_airport">Departing Airport:</label>
                <input type="text" name="departing_airport" id="departing_airport">
                
                <label for="arriving_airport">Arriving Airport:</label>
                <input type="text" name="arriving_airport" id="arriving_airport">
                
                <label for="date">Date:</label>
                <input type="date" name="date" id="date">
            
                <label for="class">Class:</label>
                <select name="class" id="class">
                    <option value="economy">Economy</option>
                    <option value="business">Business</option>
                    <option value="first">First Class</option>
                </select>
                
                <button type="submit">Search</button>
            </form>
             
        </div>
    </div>

    <br><br>
    </section>





    <section class="p-5">
        <div class="container">
            <div class="row text-center g-4">
                <div class="col-md"><div class="card" style="width: 18rem;">
                    <img src="img/airlines.png" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                </div>
                <div class="col-md">
                    <div class="card" style="width: 18rem;">
                        <img src="img/airlines.png" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div>
                </div>
                <div class="col-md">
                    <div class="card" style="width: 18rem;">
                        <img src="img/airlines.png" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section>


    <section id= "more" class="p-5">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md">
                    <img src="img/airline.png" class="img-fluid" alt="">
                </div>
                <div class="col-md p-5">
                    <h2>Learn More About Us</h2>
                    <p class="lead">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Placeat consequuntur saepe sunt impedit voluptatum mollitia quod commodi dolor suscipit tenetur atque culpa quam vel, aliquid, sint quidem quaerat facere! Temporibus?
                    </p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur quod placeat, omnis aliquam iure assumenda aspernatur possimus neque quis, dolores inventore, alias laudantium. Debitis aut doloribus dicta error illo officiis.</p>
                    <a href="#" class="btn btn-dark mt-3">
                        Learn more
                    </a>
                </div>
            </div>
        </div>
    </section>
                </main>
            </div>
       


   
           
    <!-- Footer -->
    <footer class="footer bg-dark navbar-dark mt-auto position-relative">
        <div class="container-fluid col-md-9 text-light">
            <div class="row">
                <div class="col-md-4">
                    <h5>Contact Us</h5>
                    <p>Email: info@yourairlinesystem.com</p>
                    <p>Phone: +1 (555) 123-4567</p>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Where We Fly</a></li>
                        <li><a href="#">User Experience</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Connect with Us</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" target="_blank">Facebook</a></li>
                        <li><a href="#" target="_blank">Twitter</a></li>
                        <li><a href="#" target="_blank">Instagram</a></li>
                    </ul>
                </div>
           
    </footer>
    
</body>
</html>
