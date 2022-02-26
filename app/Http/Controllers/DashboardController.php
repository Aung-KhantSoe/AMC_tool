<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use App\CardItem;
use App\DropdownValue;

class DashboardController extends Controller
{
    //
    public function index(){
        $cards = Card::all();       
        return view('welcome',compact('cards'));
    }
    
    public function dashboard(){
        return view('admindashboard');
    }

    public function addcard(Request $req){
        $validated = $req->validate([
            'card_title' => 'required',
            'color' => 'required',
        ]);

        $card = new Card;
        $card->title = $req->card_title;
        $card->color = $req->color;
        $card->save();

        return redirect()->route('dashboard');
    }

    public function carditemcreate(){
        $cards = Card::all();
        return view('carditemcreate',compact('cards'));
    }

    public function addcarditem(Request $req){
        $validated = $req->validate([
            'card_id' => 'required',
            'name' => 'required',
            'type' => 'required',
        ],
        [
            'card_id.required' => 'Parent Card name is required.',
            'name.required' => 'Card Item Name is required.',
            'type.required' => 'Card Item Type is required.',
        ]
    );

        $carditem = new CardItem;
        $carditem->name = $req->name;
        $carditem->type = $req->type;
        $carditem->card_id = $req->card_id;
        $carditem->save();

        
        $count = $req->total;
        for ($i=0; $i < $count; $i++) { 
               
            $dropdownvalue = new DropdownValue;
            $dropdownvalue->name = $req->input($i+1);
            $carditem->dropdownvalues()->save($dropdownvalue);
        }

        return redirect()->route('home');
    }

    public function deletecard($id){
        $card = Card::where('id',$id)->first();
        $carditems = CardItem::where('card_id',$id)->get();
        foreach($carditems as $carditem){
            $dropdownvalues = DropdownValue::where('card_item_id',$carditem->id)->get();
            foreach ($dropdownvalues as $dropdownvalue) {
                $dropdownvalue->delete();
            }
            $carditem->delete();
        }
        
        $card->delete();
        return redirect()->route('home');
    }

    public function deletecarditem($id){
        
        $carditem = CardItem::where('id',$id)->first();       
        $dropdownvalues = DropdownValue::where('card_item_id',$id)->get();
        foreach ($dropdownvalues as $dropdownvalue) {
            $dropdownvalue->delete();
        }
        $carditem->delete();

        return redirect()->route('home');
    }
}
