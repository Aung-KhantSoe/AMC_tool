@include('templates.header')
@include('templates.navbar')
    <!-- Container-fluid starts-->
    <div class="container-fluid" id="main" >
      <span style="font-size:30px;cursor:pointer;padding-bottom:50px;margin-left:0;" onclick="openNav()">&#9776;</span>
      <div class="pt-3">
        <h4 style="font-weight: bold">{{$flow_name}}</h4>
      </div>
      <div class="pb-5">
        <a href="{{route('cardcreate',$flow_id)}}"><button type="button" class="btn btn-success" >Create New Card</button></a>
        <a href="{{route('carditemcreate',$flow_id)}}"><button type="button" class="btn btn-warning" >Create New Item</button></a>
      </div>
      <div class="lists" id="lists">
  
        @if (count($cards)>0)
          @foreach ($cards as $card)
          @php
            $items = DB::table('card_items')->where('card_id', $card->id)->get();
          @endphp
          
            <div class="list" id="{{$card->id}}">
              {{-- header --}}
              <div class="list-item">
                <h4 id="{{$card->title}}">{{$card->title}}<i style="float:left;font-size:15px;" class="fa fa-eye" onclick="togglecard(event)" ></i></h4> 
                <a  onclick="return confirm('Are you sure to delete this card?')" href="{{route('deletecard', ['id' => $card->id])}}"><i style="float:right;font-size:15px;" class="fa fa-trash-o" ></i></a>
              </div> 

              @foreach ($items as $item)
              @php
              $dropdown_values = DB::table('dropdown_values')->where('card_item_id', $item->id)->get();
              $input_values = DB::table('input_values')->where('card_item_id', $item->id)->get();
              @endphp
              
              <div class="list-item bg-{{$card->color}} {{$card->id}}" ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true" id="{{$item->name}}{{$item->id}}">            
                <a  onclick="return confirm('Are you sure to delete this item?')" href="{{route('deletecarditem', ['id' => $item->id])}}"><i style="float:left;font-size:15px;color:red;padding-right:10px;" class="fa fa-trash-o" ></i></a>
                <i style="float:left; padding-right:10px;" class="fa fa-eye" onclick="toggleview(event)" id="{{$item->name}}{{$item->id}}_eye'"></i>
                <h5 id="{{$item->name}}{{$item->id}}_title">{{$item->name}}</h5>
                <i style="float: right" class="fa fa-chevron-down" onclick="toggledropdown(event)" id="{{$item->name}}{{$item->id}}_drop"></i>
                @if ($item->type == "Input type")
                  <div class="custom_input input" id="{{$item->name}}{{$item->id}}_body">
                    @foreach ($input_values as $input_value)
                    <input class="form-control" id="{{$item->name}}{{$item->id}}_input_value" type="text" placeholder="{{$input_value->name}}">                                
                    @endforeach              
                  </div>
                @elseif ($item->type == "Dropdown type")
                  <div class="dropdown-basic pb-1 dropdown" id="{{$item->name}}{{$item->id}}_body">
                    <select class="form-select" aria-label="Choose {{$item->name}}" id="{{$item->name}}{{$item->id}}_choose_value">
                        <option value="">Your {{$item->name}}</option>
                        @foreach ($dropdown_values as $dropdown_value)
                        <option value="{{$dropdown_value->name}}">{{$dropdown_value->name}}</option>
                        @endforeach                    
                    </select>
                  </div>
                @elseif ($item->type == "Compound type")
                  <div class="dropdown-basic pb-1 compound" id="{{$item->name}}{{$item->id}}_body">
                    
                      <input class="form-control" id="{{$item->name}}{{$item->id}}_input_value1" type="text" placeholder="{{$input_values[0]->name}}">                                
                  
                    
                      <select class="form-select" aria-label="Choose {{$item->name}}" id="{{$item->name}}{{$item->id}}_choose_value">
                        <option value="">Your {{$item->name}}</option>
                        @foreach ($dropdown_values as $dropdown_value)
                        <option value="{{$dropdown_value->name}}">{{$dropdown_value->name}}</option>
                        @endforeach                    
                      </select>
                  
                    
                      <input class="form-control" id="{{$item->name}}{{$item->id}}_input_value2" type="number" min="1" max="100" onclick="changetype(event)" onblur="percentage(event)" placeholder="{{$input_values[1]->name}}">                                
                    
                  </div>
                @endif        
              </div>
              @endforeach           
                
            </div>
          @endforeach
        @else
          
            {{-- header --}}
            <div >
              <h4 class="txt-secondary" style="font-weight:600">No Card yet ...</h4> 
            </div> 
          
        @endif
        

        
      </div>

      </div>

      <div class="row" id="droprow">
        <div class="droptarget" id="droptarget" ondrop="drop(event)" ondragover="allowDrop(event)" ondragenter="dragenter(event)" ondragleave="dragleave(event)">
          <p class="center" id="drophere">Drop here!</p>
        </div>
        <div>
          <button type="button" class="btn btn-success" >Export</button>
        </div>
        
      </div>
      

      {{-- Modal --}}
      <div class="col-xl-2 modal" id="myModal" style="display: none">
        <div class="card modal-content">
          <div class="card-header pb-0">
            
          <h5 id="modal_title"></h5>
          </div>
          <div class="card-body dropdown-basic" id="modal_body">
              
          </div>
          <div class="row" style="height: auto;background-color:white;padding-left:50px"> 
            <div class="col align-self-start">            
              <button type="button" class="btn btn-danger " onclick="closeclick()">Close</button>
            </div>
            <div class="col align-self-end">
              <button type="button" class="btn btn-primary" onclick="modalokclick()">Save</button>
            </div>
          </div>
        </div>
      </div>
    </div>

  
@include('templates.footer')