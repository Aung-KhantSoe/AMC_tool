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
use App\Flow;
use App\ProjectHasFlow;
use App\FlowHasUidata;
use Auth;
use Crypt;


class DashboardController extends Controller
{
   
    //
    // public function index(){       
    //     return view('home');
    // }
    
    public function cards($id){
        $flow_id = Crypt::decrypt($id);
        $flow = Flow::where('id',$flow_id)->first();
        $flow_name = $flow->name;
        $cards = Card::where('flow_id', $flow_id)->get();
        $uidatas = FlowHasUidata::where('flow_id', $flow_id)->first();       
        return view('welcome',compact('cards','flow_id','flow_name','uidatas'));
    }
    
    public function dashboard(){
        return view('admindashboard');
    }

    public function cardcreate($id){
        $flow_id = Crypt::decrypt($id);
        return view('cardcreate',compact('flow_id'));
    }

    public function projects(){
        $user = Auth::user();
        $user_has_projects = UserHasProject::where('user_id',$user->id)->get();
        return view('projects',compact('user_has_projects'));
    }

    public function projectcreate(){
        return view('projectcreate');
    }

    public function flowcreate($id){   
        $id = Crypt::decrypt($id); 
        return view('flowcreate',compact("id"));
    }

    public function addcard(Request $req){
        $validated = $req->validate([
            'card_title' => 'required',
            'color' => 'required',
        ]);

        $card = new Card;
        $card->title = $req->card_title;
        $card->color = $req->color;
        $card->flow_id = $req->flow_id;
        $card->save();

        $flow_id = $req->flow_id;
        $flow_id = Crypt::encrypt($flow_id);
        return redirect()->route('cards',$flow_id);
    }

    public function carditemcreate($id){
        $flow_id = Crypt::decrypt($id);
        $cards = Card::where('flow_id',$flow_id)->get();
        return view('carditemcreate',compact('cards','flow_id'));
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
        
        $flow_id = $req->flow_id;
        $flow_id = Crypt::encrypt($flow_id);
            
        return redirect()->route('cards',$flow_id);
    }

    public function deletecard($id){
        $id = Crypt::decrypt($id);
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
        return redirect()->back();
    }

    public function deletecarditem($id){
        $id = Crypt::decrypt($id);
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

        return redirect()->back();
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

    public function addflow(Request $req){
        $validated = $req->validate([
            'name' => 'required',
        ]);
        $flow = new Flow;
        $flow->name = $req->name;
        $flow->save();

        $project_has_flow = new ProjectHasFlow;
        $project_has_flow->flow_id = $flow->id;
        $project_has_flow->project_id = $req->project_id;
        $project_has_flow->save();

        return redirect()->route('projects');
    }

    public function adduidatas(Request $req){

        $count = $req->child_count;
        $array = array();
        $flow_id = $req->flow_id;

        for ($i=0; $i < $count; $i++) { 
            array_push($array,$req->input($i));  
        }
        $str = str_replace("'", "\'", json_encode($array));

        if (FlowHasUidata::where('flow_id',$flow_id)->first()) {
            FlowHasUidata::where('flow_id', $flow_id)->update(["written_content_data" => $str]);
        }else{
            $uidatas = new FlowHasUidata;
            $uidatas->written_content_data =  $str;
            $uidatas->flow_id = $flow_id;
            $uidatas->save();
        }

        
        
        return redirect()->back();
    }
}
