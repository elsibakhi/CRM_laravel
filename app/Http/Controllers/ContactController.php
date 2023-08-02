<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $contacts=Contact::all()->paginate(5);
    
    

        return view("contacts.index",compact("contacts,contacts_numbers"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("contacts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        $validated=$request->validated();
    $validated["user_id"]=Auth::id();

    if ($request->hasFile("cover_path")) {

        $file = $request->file("cover_path");


        $path = Contact::uploadCoverImage($file);


        // solution 1 to replace img 
        //$name = $classroom->cover_img_path ?? (Str::random(40).".".$file->getClientOriginalExtension());
        //   $path=$file->storeAs("/",$name,"public"); 


        $validated["cover_path"]=$path;
            
       

  
    }

      Contact::create($validated);

      return  back()->with("success","Contact stored");
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view("contacts.edit",compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        $validated=$request->validated();

  if($request->cover_path==null){
    unset($validated['cover_path']);
  }
  if ($request->hasFile("cover_path")) {

    $file = $request->file("cover_path");


    $path = Contact::uploadCoverImage($file);




    $validated["cover_path"]=$path;
        
   

    if ($contact->cover_path) { // to ensure that img is exist
        // solution 2 to replace img 
        Contact::deleteCoverImage($contact->cover_path);
    }
}

        $contact->update($validated);
    

    
          return  back()->with("success","Contact updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();


            if ($contact->cover_img_path) { // to ensure that img is exist
                // solution 2 to replace img 
                Contact::deleteCoverImage($contact->cover_path);
            }
        


        return  back()->with("success","Contact deleted");

    }

public function search(Request $request){

$request->validate([
    "name"=>['required','string', 'max:255']
]);

$contacts=Contact::where("name",$request->name)->paginate(5);



return view("contacts.index",compact('contacts'));

}


}
