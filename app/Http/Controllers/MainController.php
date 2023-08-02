<?php

namespace App\Http\Controllers;

use DateInterval;
use DateTime;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
   public function index() {

    $base_contacts=Auth::user()->contacts();
    // i get clone to break referance between varibles

    $contacts_number= (clone $base_contacts)->get()->count();
    $male_contacts_number= (clone $base_contacts)->where("gender","male")->get()->count();
    $female_contacts_number=  (clone $base_contacts)->where("gender","female")->get()->count();
    $dateTime = new DateTime();

    // Subtract 7 days from the DateTime object
   $date= $dateTime->sub(new DateInterval('P7D'));
   $last_7_days_contacts_number= 0;
   foreach ((clone $base_contacts)->get() as $contact) {

    if($contact->created_at > $date ){
        $last_7_days_contacts_number++;
    }

   }


  


    $contacts= $base_contacts->paginate(5);
    
        return view('dashboard',compact("contacts","contacts_number","male_contacts_number","female_contacts_number","last_7_days_contacts_number"));
    }
}
