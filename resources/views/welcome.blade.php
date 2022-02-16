@include('templates.header')
@include('templates.navbar')

    <!-- Container-fluid starts-->
    <div class="container-fluid" id="main" >
      <span style="font-size:30px;cursor:pointer;padding-bottom:50px;margin-left:0;" onclick="openNav()">&#9776;</span>
      <div class="lists" id="lists">
        <div class="list" id="1">
            {{-- header --}}
            <div class="list-item">
              <h4 id="Personal Info">Personal Info<i style="float:left;font-size:15px;" class="fa fa-eye" onclick="togglecard(event)" ></i></h4> 
              
            </div>
            {{-- age --}}
            <div class="list-item bg-primary 1" ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true" id="Age">                                
                <i style="float:left; padding-right:10px;" class="fa fa-eye" onclick="toggleview(event)" id="Age_eye"></i>
                <h5 id="Age_title">Age</h5>
                <i style="float: right" class="fa fa-chevron-down" onclick="toggledropdown(event)" id="Age_drop"></i>               
                <div class="dropdown-basic pb-1" id="Age_body">
                    <select class="form-select" aria-label="Choose Age" id="Age_choose_value">
                        <option value="">Your age</option>
                        <option value="Under-18">Under-18</option>
                        <option value="18-24">18-24</option>
                        <option value="25-34">25-34</option>
                    </select>
                </div>
            </div>
            {{-- gender --}}
            <div class="list-item bg-primary 1" ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true" id="Gender">
              <i style="float:left; padding-right:10px;" class="fa fa-eye" onclick="toggleview(event)" id="Gender_eye"></i>               
              <h5 id="Gender_title">Gender</h5>
              <i style="float: right" class="fa fa-chevron-down" onclick="toggledropdown(event)" id="Gender_drop"></i>
              <div class="dropdown-basic pb-1" id="Gender_body">
                  <select class="form-select" aria-label="Choose Gender" id="Gender_choose_value">
                      <option value="">Your Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                  </select>
              </div>
            </div>
            {{-- Marital status --}}   
            <div class="list-item bg-primary 1" ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true" id="Marital_status">                
              <i style="float:left; padding-right:10px;" class="fa fa-eye" onclick="toggleview(event)" id="Marital_status_eye"></i>               
              <h5 id="Marital_status_title">Marital status</h5>
              <i style="float: right" class="fa fa-chevron-down" onclick="toggledropdown(event)" id="Marital_status_drop"></i>          
              <div class="dropdown-basic pb-1" id="Marital_status_body">
                  <select class="form-select" aria-label="Choose Marital status" id="Marital_status_choose_value">
                      <option value="">Your marital status</option>
                      <option value="Single">Single</option>
                      <option value="Married">Married</option>
                  </select>
              </div>
            </div>
            {{-- Children --}} 
            <div class="list-item bg-primary 1" ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true" id="Children"> 
              <i style="float:left; padding-right:10px;" class="fa fa-eye" onclick="toggleview(event)" id="Children_eye"></i>                              
              <h5 id="Children_title">Children</h5>
              <i style="float: right" class="fa fa-chevron-down" onclick="toggledropdown(event)" id="Children_drop"></i>          
              <div class="dropdown-basic pb-1" id="Children_body">
                  <select class="form-select" aria-label="Choose Children" id="Children_choose_value">
                      <option value="">Your Children</option>
                      <option value="No Child">No Child</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4+">4+</option>
                  </select>
              </div>
            </div>
            {{-- Location --}} 
            <div class="list-item bg-primary 1" ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true" id="Location">                
              <i style="float:left; padding-right:10px;" class="fa fa-eye" onclick="toggleview(event)" id="Location_eye"></i>               
              <h5 id="Location_title">Location</h5>
              <i style="float: right" class="fa fa-chevron-down" onclick="toggledropdown(event)" id="Location_drop"></i>         
              <div class="dropdown-basic pb-1" id="Location_body">
                  <select class="form-select" aria-label="Choose Location" id="Location_choose_value">
                      <option value="">Your Location</option>
                      <option value="Urban">Urban</option>
                      <option value="Rual">Rual</option>
                  </select>
              </div>
            </div>
            {{-- Income --}} 
            <div class="list-item bg-primary 1" ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true" id="Income">                
              <i style="float:left; padding-right:10px;" class="fa fa-eye" onclick="toggleview(event)" id="Income_eye"></i>               
              <h5 id="Income_title">Income</h5>
              <i style="float: right" class="fa fa-chevron-down" onclick="toggledropdown(event)" id="Income_drop"></i>          
              <div class="dropdown-basic pb-1" id="Income_body">
                  <select class="form-select" aria-label="Choose Income" id="Income_choose_value">
                      <option value="">Your Income</option>
                      <option value="Low">Low</option>
                      <option value="Lower Middle">Lower Middle</option>
                      <option value="Middle">Middle</option>
                      <option value="Upper Middle">Upper Middle</option>
                      <option value="High">High</option>
                  </select>
              </div>
            </div>
            {{-- Education --}} 
            <div class="list-item bg-primary 1" ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true" id="Education">                
              <i style="float:left; padding-right:10px;" class="fa fa-eye" onclick="toggleview(event)" id="Education_eye"></i>               
              <h5 id="Education_title">Education</h5>
              <i style="float: right" class="fa fa-chevron-down" onclick="toggledropdown(event)" id="Education_drop"></i>        
              <div class="dropdown-basic pb-1" id="Education_body">
                  <select class="form-select" aria-label="Choose Education" id="Education_choose_value">
                      <option value="">Your Education</option>
                      <option value="Under Graduate">Under Graduate</option>
                      <option value="College">College</option>
                      <option value="Master">Master</option>
                  </select>
              </div>
            </div>
        </div>
        
        <div class="list" id="2">
            {{-- header --}}
            <div class="list-item">
              <h4 id="Professional Info">Professional Info<i style="float:left;font-size:15px;" class="fa fa-eye" onclick="togglecard(event)" ></i></h4> 
            </div>
            {{-- Company --}}          
              <div class="list-item bg-warning 2" ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true" id="Company">                
                <i style="float:left; padding-right:10px;" class="fa fa-eye" onclick="toggleview(event)" id="Company_eye"></i>               
                <h5 id="Company_title">Company</h5>
                <i style="float: right" class="fa fa-chevron-down" onclick="toggledropdown(event)" id="Company_drop"></i>                
                <div class="custom_input" id="Company_body">              
                    <input class="form-control" id="Company_input_value" type="text" placeholder="company name">                                
                </div>
              </div>       
        </div>  
        
        <div class="list" id="3">
          {{-- header --}}
          <div class="list-item">
            <h4 id="Goals & Challenges">Goals & Challenges<i style="float:left;font-size:15px;" class="fa fa-eye" onclick="togglecard(event)" ></i></h4> 
          </div>
          {{-- Personal Goal --}}           
          <div class="list-item bg-secondary 3" ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true" id="Personal Goal">            
            <i style="float:left; padding-right:10px;" class="fa fa-eye" onclick="toggleview(event)" id="Personal Goal_eye"></i>               
            <h5 id="Personal Goal_title">Personal Goal</h5>
            <i style="float: right" class="fa fa-chevron-down" onclick="toggledropdown(event)" id="Personal Goal_drop"></i>
            <div class="custom_input" id="Personal Goal_body">              
                <input class="form-control" id="Personal Goal_input_value" type="text" placeholder="Personal Goal">                                
            </div>
          </div>            
        </div>

        <div class="list" id="4">
          {{-- header --}}
          <div class="list-item">
            <h4 id="Values & Fears">Values & Fears<i style="float:left;font-size:15px;" class="fa fa-eye" onclick="togglecard(event)" ></i></h4> 
          </div>
          {{-- Objections --}} 
          <div class="list-item bg-danger 4" ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true" id="Objections">                
            <i style="float:left; padding-right:10px;" class="fa fa-eye" onclick="toggleview(event)" id="Objections_eye"></i>               
            <h5 id="Objections_title">Objections</h5>
            <i style="float: right" class="fa fa-chevron-down" onclick="toggledropdown(event)" id="Objections_drop"></i>          
            <div class="dropdown-basic pb-1" id="Objections_body">
                <select class="form-select" aria-label="Choose Objections" id="Objections_choose_value">
                    <option value="">Your Objections</option>
                    <option value="Expensive">Expensive</option>
                    <option value="I don't need it">I don't need it</option>
                    <option value="I have similar one">I have similar one</option>
                    <option value="Low Quality">Low Quality</option>
                    <option value="Difficult to use">Difficult to use</option>
                </select>
            </div>
          </div>         
        </div>

        <div class="list" id="5">
          {{-- header --}}
          <div class="list-item">
            <h4 id="Where Are They">Where Are They<i style="float:left;font-size:15px;" class="fa fa-eye" onclick="togglecard(event)" ></i></h4> 
          </div> 
          {{-- Hobbies --}}           
          <div class="list-item bg-info 5" ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true" id="Hobbies">            
            <i style="float:left; padding-right:10px;" class="fa fa-eye" onclick="toggleview(event)" id="Hobbies_eye"></i>               
            <h5 id="Hobbies_title">Hobbies</h5>
            <i style="float: right" class="fa fa-chevron-down" onclick="toggledropdown(event)" id="Hobbies_drop"></i>
            <div class="custom_input" id="Hobbies_body">              
                <input class="form-control" id="Hobbies_input_value" type="text" placeholder="Hobbies">                                
            </div>
          </div>           
        </div> 
        
        <div class="list" id="6">
          {{-- header --}}
          <div class="list-item">
            <h4 id="Others">Others<i style="float:left;font-size:15px;" class="fa fa-eye" onclick="togglecard(event)" ></i></h4> 
          </div> 
          {{-- AIDA --}}           
          <div class="list-item bg-dark 6" ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true" id="AIDA">            
            <i style="float:left; padding-right:10px;" class="fa fa-eye" onclick="toggleview(event)" id="AIDA_eye"></i>               
            <h5 id="AIDA_title">AIDA</h5>
            <i style="float: right" class="fa fa-chevron-down" onclick="toggledropdown(event)" id="AIDA_drop"></i>
            <div class="custom_input" id="AIDA_body">              
                <input class="form-control" id="AIDA_input_value" type="text" placeholder="Attention">
                <input class="form-control" id="AIDA_input_value" type="text" placeholder="Interest">
                <input class="form-control" id="AIDA_input_value" type="text" placeholder="Desire">
                <input class="form-control" id="AIDA_input_value" type="text" placeholder="Action">                                
            </div>
          </div>  
        </div>
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