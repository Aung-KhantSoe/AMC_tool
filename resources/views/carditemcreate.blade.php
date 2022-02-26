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
                        </select>
                    </div>
                    </div>
                </div>
                
                {{-- hidden --}}
                <div class="row " style="display: none" id="add_dropdown_value">
                    <div class="col-sm-6">
                        <div class="mb-3" id="dropdown_field">         
                            <label>Dropdown values</label>
                            <div>
                                <input name="1" class="form-control" type="text" placeholder="Dropdown value" >                      
                            </div>                  
                        </div>
                        <div class="col-sm-6">
                            <button type="button" onclick="add_dropdown_value(event)" class="btn btn-success me-3" >Plus</button>
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