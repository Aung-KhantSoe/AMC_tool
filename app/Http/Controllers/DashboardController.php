<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use App\CardItem;
use App\DropdownValue;
use App\InputValue;
use App\Project;
use App\User;
use App\UserHasProject;
use Auth;


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

    public function cardcreate(){
        return view('cardcreate');
    }

    public function projects(){
        $user = Auth::user();
        $user_has_projects = UserHasProject::where('user_id',$user->id)->get();
        return view('projects',compact('user_has_projects'));
    }

    public function projectcreate(){
        return view('projectcreate');
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
        $incount = $req->input_total;
        $comcount = $req->compound_total;
        if ($count > 0) {
            for ($i=0; $i < $count; $i++) {              
                $dropdownvalue = new DropdownValue;
                $dropdownvalue->name = $req->input($i+1);
                $carditem->dropdownvalues()->save($dropdownvalue);
            }
        } else if($incount > 0){
            for ($i=0; $i < $incount; $i++) { 
                $inputvalue = new InputValue;
                $index = $i+1;
                $inputvalue->name = $req->input("input$index");
                $carditem->inputvalues()->save($inputvalue);
            }
        }else if($comcount > 0){
            $inputvalue1 = new InputValue;
            $inputvalue1->name = $req->input("compound_input1");
            $carditem->inputvalues()->save($inputvalue1);
            $inputvalue2 = new InputValue;
            $inputvalue2->name = $req->input("compound_input2");
            $carditem->inputvalues()->save($inputvalue2);
            for ($i=0; $i < $comcount; $i++) {              
                $dropdownvalue = new DropdownValue;
                $index = $i+1;
                $dropdownvalue->name = $req->input("compound$index");
                $carditem->dropdownvalues()->save($dropdownvalue);
            }

        }
        
            
            
            
        return redirect()->route('cards');
    }

    public function deletecard($id){
        $card = Card::where('id',$id)->first();
        $carditems = CardItem::where('card_id',$id)->get();
        foreach($carditems as $carditem){
            $dropdownvalues = DropdownValue::where('card_item_id',$carditem->id)->get();
            foreach ($dropdownvalues as $dropdownvalue) {
                $dropdownvalue->delete();
            }
            $inputvalues = InputValue::where('card_item_id',$carditem->id)->get();
            foreach ($inputvalues as $inputvalue) {
                $inputvalue->delete();
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
        $inputvalues = InputValue::where('card_item_id',$carditem->id)->get();
        foreach ($inputvalues as $inputvalue) {
            $inputvalue->delete();
        }
        $carditem->delete();

        return redirect()->route('home');
    }

    public function addproject(Request $req){
        $validated = $req->validate([
            'name' => 'required',
            'end_date_time' => 'required',
        ],
        [
            'name.required' => 'Project Name is required.',
            'end_date_time.required' => 'End date is required.',
        ]
        );

        $user_has_projects = new UserHasProject;

        $project = new Project;
        $project->name = $req->name;
        $project->photo = $req->photo;
        $project->status = $req->status;
        $project->end_date_time = $req->end_date_time;
        $project->save();

        $user = Auth::user();
        
        $user_has_projects->user_id = $user->id;
        $user_has_projects->project_id = $project->id;
        $user_has_projects->save();
        return redirect()->route('projects');
    }
}
