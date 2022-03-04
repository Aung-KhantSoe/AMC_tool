@include('templates.header')
@include('templates.navbar')
<div class="container-fluid" id="main" style="height: 100vh">
    <span style="font-size:30px;cursor:pointer;padding-bottom:50px;margin-left:0;" onclick="openNav()">&#9776;</span>
    <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <form action="{{route('addcarditem')}}" method="POST">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col">
                    <div class="mb-3">
                        <label>Parent Card</label>
                        <select class="form-select" aria-label="Choose Card" name="card_id">
                            <option value="">Choose Card you want to add</option>
                            @foreach ($cards as $card)
                            <option value="{{$card->id}}">{{$card->title}}</option>    
                            @endforeach
                        </select>
                    </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="mb-3">
                      <label>Card Item Name</label>
                      <input name="name" class="form-control" type="text" placeholder="Card Item Name" >
                    </div>
                  </div>
                </div>
                
                <div class="row">
                    <div class="col">
                    <div class="mb-3">
                        <label>Card Item Type</label>
                        <select class="form-select" aria-label="Choose type" name="type" onchange="add_dropdown_selected(event)" id="card_item_type">
                            <option value="">Choose type</option>
                            <option value="Input type">Input type</option>
                            <option value="Dropdown type" >Dropdown type</option>
                            <option value="Compound type" >Compound type</option>
                        </select>
                    </div>
                    </div>
                </div>
                
                {{--dropdown hidden --}}
                <div class="row " style="display: none" id="add_dropdown_value">
                    <div class="col-sm-6">
                        <div class="mb-3" id="dropdown_field">         
                            <label>Dropdown values</label>
                            <div>
                                <input name="1" class="form-control" type="text" placeholder="Dropdown value" > 
                                <input name="total" style="display: none" class="form-control" type="text" id="hidden_div" value="0" >                      
                            </div>                  
                        </div>
                        <div class="col-sm-6">
                            <button type="button" onclick="add_dropdown_value(event)" class="btn btn-success me-3" >Plus</button>
                        </div>                  
                    </div>
                </div>
                {{--input hidden --}}
                <div class="row " style="display: none" id="add_input_value">
                  <div class="col-sm-6">
                      <div class="mb-3" id="input_field">         
                          <label>Input values</label>
                          <div>
                              <input name="input1" class="form-control" type="text" placeholder="Input Label" > 
                              <input name="input_total" style="display: none" class="form-control" type="text" id="hidden_input_div" value="0">                     
                          </div>                  
                      </div>
                      <div class="col-sm-6">
                          <button type="button" onclick="add_input_value(event)" class="btn btn-success me-3" >Plus</button>
                      </div>                  
                  </div>
                </div>
                {{--compound hidden --}}
                <div class="row " style="display: none" id="add_compound_value">
                  <div class="col-sm-6">
                      <div class="mb-3" id="compound_input_field1">         
                          <label>Compound values</label>
                          <div>
                              <input name="compound_input1" class="form-control" type="text" placeholder="Input Label" > 
                          </div>                  
                      </div>                     
                      <div class="mb-3" id="compound_dropdown_field">         
                          <div>
                              <input name="compound1" class="form-control" type="text" placeholder="Dropdown value" > 
                              <input name="compound_total" style="display: none" class="form-control" type="text" id="compound_hidden_div" value="0" >                      
                          </div>                  
                      </div>
                      <div class="col-sm-6">
                          <button type="button" onclick="compound_add_dropdown_value(event)" class="btn btn-success me-3" >Plus</button>
                      </div> 
                      <div class="mb-3 mt-3" id="compound_input_field2">         
                        <div>
                            <input name="compound_input2" class="form-control" type="text" placeholder="Input Label" > 
                        </div>                  
                      </div>                      
                                 
                  </div>
                </div>


                <div class="row">
                  <div class="col">
                    <div class="text-end">
                        <button type="submit" class="btn btn-secondary me-3" >Add</button>
                        <a href="{{route('home')}}"><button type="button" class="btn btn-danger" >Cancel</button></a>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
</div>

@include('templates.footer')