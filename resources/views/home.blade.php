@extends('layouts.app')

@section('title', 'Admin Page')
        

@section('content')     


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
            <form action="{{ route('airports.search') }}" method="GET">
                <label for="departing_airport">Departing Airport:</label>
                <input type="text" name="departing_airport" id="departing_airport" list="airport_suggestions">
                <datalist id="airport_suggestions"></datalist>
                
                <label for="arriving_airport">Arriving Airport:</label>
                <input type="text" name="arriving_airport" id="arriving_airport" list="airport_suggestions">
                <datalist id="airport_suggestions"></datalist>

                <script>
                    document.getElementById('departing_airport').addEventListener('input', function() {
                        fetchAirports(this.value, 'departing_airport');
                    });
                
                    document.getElementById('arriving_airport').addEventListener('input', function() {
                        fetchAirports(this.value, 'arriving_airport');
                    });
                
                    function fetchAirports(query, inputId) {
                        fetch('{{ route('airports.search') }}?query=' + query)
                            .then(response => response.json())
                            .then(data => {
                                const airportSuggestions = document.getElementById(inputId).list;
                                airportSuggestions.innerHTML = '';
                
                                data.forEach(airport => {
                                    const option = document.createElement('option');
                                    option.value = airport.name;
                                    airportSuggestions.appendChild(option);
                                });
                            })
                            .catch(error => console.error(error));
                    }
                </script>
                
                
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
       

            @endsection
   
        @php
            $hideNav = true;
        @endphp