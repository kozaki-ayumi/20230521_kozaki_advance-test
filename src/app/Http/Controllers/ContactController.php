<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
  {
    return view('index');
  }
  
   public function confirm(ContactRequest $request)
  { 
    $contact = $request->only(['first-name','last-name','gender','email','postcode','address', 'building_name','opinion']);

    return view('confirm', ['contact' => $contact]);
  }

  public function store (Request $request)
  {
    $contact_2 = $request->only(['fullname','gender','email','postcode','address', 'building_name','opinion']);
      Contact::create($contact_2);

      return view('thanks');
  }

   public function management()
  {
    $contacts = Contact::Paginate(10);
    return view('management', compact('contacts'));
  }

  public function destroy(Request $request)
  { 
    
    Contact::find($request->id)->delete();
    return redirect('/contacts/management');
  }
  
   public function search(Request $request)
  {
    $contacts = Contact::NameEqual($request->searchfullname)->
                         GenderEqual($request->searchgender)->
                         EmailEqual($request->searchemail)->
                         FromDateEqual($request->formdate)->
                         UntilDateEqual($request->untildate)->
                        get();

    $contacts = Contact::NameEqual($request->searchfullname)->
                         GenderEqual($request->searchgender)->
                         EmailEqual($request->searchemail)->
                         FromDateEqual($request->formdate)->
                         UntilDateEqual($request->untildate)->
                         paginate(10);

    return view('management',compact('contacts'));

}
}