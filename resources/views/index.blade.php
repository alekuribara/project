@extends('layout')
@section('title', 'Welcome')
@section('content')
  <header>
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <img class="img-responsive" src="{{ asset('img/pettracker.png') }}" alt="">
                  <div class="intro-text">
                      <span class="name">Why Pet Tracker?</span>
                      <hr class="star-light">
                      <span class="skills">Track your Pet information with Pet Tracker!</span>
                  </div>
              </div>
          </div>
      </div>
  </header>
  <!-- Portfolio Grid Section -->
  <section id="portfolio">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 text-center">
                  <h2>Start to track your pet</h2>
                  <hr class="star-primary">
              </div>
          </div>
          <div class="row">
              <div class="col-sm-4 portfolio-item">
                  <a href="{{ asset('dogVaccine') }}" class="portfolio-link" data-toggle="modal">
                      <div class="caption">
                          <div class="caption-content">
                              Dog Vaccination Schedule
                          </div>
                      </div>
                      <img src="{{ asset('img/portfolio/dog.png') }}" class="img-responsive" alt="">
                  </a>
              </div>
              <div class="col-sm-4 portfolio-item">
                  <a href="{{ asset('catVaccine') }}" class="portfolio-link" data-toggle="modal">
                      <div class="caption">
                          <div class="caption-content">
                              Cat Vaccination Schedule
                          </div>
                      </div>
                      <img src="{{ asset('img/portfolio/cat.png') }}" class="img-responsive" alt="">
                  </a>
              </div>
              <div class="col-sm-4 portfolio-item">
                  <a href="{{ asset('medCompare') }}" class="portfolio-link" data-toggle="modal">
                      <div class="caption">
                          <div class="caption-content">
                              Medicine Comparison
                          </div>
                      </div>
                      <img src="{{ asset('img/portfolio/circus.png') }}" class="img-responsive" alt="">
                  </a>
              </div>
              <div class="col-sm-4 portfolio-item">
                  <a href="{{ asset('petAccessories') }}" class="portfolio-link" data-toggle="modal">
                      <div class="caption">
                          <div class="caption-content">
                              Pet accessories
                          </div>
                      </div>
                      <img src="{{ asset('img/portfolio/game.png') }}" class="img-responsive" alt="">
                  </a>
              </div>
              <div class="col-sm-4 portfolio-item">
                  <a href="{{ asset('petFood') }}" class="portfolio-link" data-toggle="modal">
                      <div class="caption">
                          <div class="caption-content">
                              Pet Food
                          </div>
                      </div>
                      <img src="{{ asset('img/portfolio/safe.png') }}" class="img-responsive" alt="">
                  </a>
              </div>
              <div class="col-sm-4 portfolio-item">
                  <a href="{{ asset('petTravel') }}" class="portfolio-link" data-toggle="modal">
                      <div class="caption">
                          <div class="caption-content">
                              Travelling with pet
                          </div>
                      </div>
                      <img src="{{ asset('img/portfolio/submarine.png') }}" class="img-responsive" alt="">
                  </a>
              </div>
          </div>
      </div>
  </section>
  <!-- About Section -->
  <section class="success" id="about">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 text-center">
                  <h2>About</h2>
                  <hr class="star-light">
              </div>
          </div>
          <div class="row">
              <div class="col-lg-4 col-lg-offset-2">
                  <p>Pet tracker is for owners concerned about their pet history health. It will let you read the pet id QRcode, with this information the you can access your pet health history. </p>
              </div>
              <div class="col-lg-4">
                  <p>Get Android App!! In Android App, you will receive reminders about next vet visitation or vaccination. The pet health history will keep vaccines and exams.</p>
              </div>
              <!-- <div class="col-lg-8 col-lg-offset-2 text-center">
                  <a href="#" class="btn btn-lg btn-outline">
                      <i class="fa fa-download"></i> Download Theme
                  </a>
              </div> -->
          </div>
      </div>
  </section>
@stop
