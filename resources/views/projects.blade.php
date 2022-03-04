@include('templates.header')
@include('templates.navbar')
<!-- Container-fluid starts-->
<div class="container-fluid" id="main" style="height: 100vh">
    <span style="font-size:30px;cursor:pointer;padding-bottom:50px;margin-left:0;" onclick="openNav()">&#9776;</span>
    <div class="row project-cards">
        <div class="col-md-12 project-list">
        <div class="card">
            <div class="row">
            <div class="col-md-6 p-0">
                <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="true"><i data-feather="target"></i>All</a></li>
                <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false"><i data-feather="info"></i>Doing</a></li>
                <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false"><i data-feather="check-circle"></i>Done</a></li>
                </ul>
            </div>
            <div class="col-md-6 p-0">                    
                <div class="form-group mb-0 me-0"></div><a class="btn btn-primary" href="{{route('projectcreate')}}"> <i data-feather="plus-square"> </i>Create New Project</a>
            </div>
            </div>
        </div>
        </div>
        <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
            <div class="tab-content" id="top-tabContent">
                <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                    <div class="row">
                        <div class="col-xxl-4 col-lg-6">
                            <div class="project-box"><span class="badge badge-primary">Doing</span>
                                <h6>Target Audience Generator</h6>
                                    <div class="media"><img class="img-20 me-2 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                        <div class="media-body">
                                            <p>{{Auth::user()->name}}</p>
                                        </div>
                                    </div>                       
                                <div class="row details">
                                    <div class="col-6"><span>Cards </span></div>
                                    <div class="col-6 font-primary">12 </div>
                                    <div class="col-6"><span>Card Items</span></div>
                                    <div class="col-6 font-primary">12 </div>
                                </div>        
                            </div>
                        </div>
                    </div>  
                </div>
                
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@include('templates.footer')       
       