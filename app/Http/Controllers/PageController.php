<?php
namespace App\Http\Controllers;
/**
* PageController
* @extends Controller
*/
class PageController extends Controller
{
  /**
  * Show Dog Vaccination
  */
  public function showDogVaccine() {
    return view('dogVaccine');
  }
  /**
  * Show Cat Vaccination
  */
  public function showCatVaccine() {
    return view('catVaccine');
  }
  /**
  * Show Pet Medicine comparison
  */
  public function showMedCompare() {
    return view('medCompare');
  }
  /**
  * Show Pet Medicine comparison
  */
  public function showPetAccessories() {
    return view('petAccessories');
  }
  /**
  * Show Pet Food
  */
  public function showPetFood() {
    return view('petFood');
  }
  /**
  * Show Pet Travel
  */
  public function showPetTravel() {
    return view('petTravel');
  }

}
