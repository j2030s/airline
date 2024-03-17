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
                        <b><i><h6>Welcome to PUC Airlines, your gateway to the skies!
                             </h6> </i></b>
                    </div>
                    
                        <img class="img-fluid  w-50 ms-auto" src="img/bbard.png" >
                  
                        
                </div>
            </div>
            
        </div>
    </section>



    <section class="p-6">
        

<div class="container mt-5">
    <ul class="nav nav-tabs p-3 mt-3 ml-6" style="max-width: 750px;">
        <li class="nav-item">
           <h3>Search flights</h3>
        </li>
    </ul>

    <div class="card p-3 mt-3 ml-6" style="max-width: 750px;">
        <form action="{{ route('flights.search') }}" method="GET">
            <div class="mb-3">
                    <select id="setectRole" name="departing_airport" class="form-select form-control"
                                        aria-label="Default select example">
                                        <option selected value="">Departing Airport</option>
                                        @foreach($departingAirports as $airport)
                                        <option value="{{ $airport->id }}">{{ $airport->name }}</option>
                                    @endforeach 
                                    </select>
            </div>

            <div class="mb-3">
                <select id="setectRole" name="arriving_airport" class="form-select form-control"
                                    aria-label="Default select example">
                                    <option selected value="">Arriving Airport</option>
                                    @foreach($departingAirports as $airport)
                                    <option value="{{ $airport->id }}">{{ $airport->name }}</option>
                                @endforeach 
                                </select>
        </div>

            <div class="mb-3">
                <label for="date" class="form-label">Departing Date:</label>
                <input type="date" name="date" id="date" class="form-control">
            </div>

            <div class="mb-3">
                <label for="class" class="form-label">Class:</label>
                <select name="class" id="class" class="form-select">
                    <option value="economy">Economy Class</option>
                    <option value="business">Business Class</option>
                    <option value="first">First Class</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
</div>
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