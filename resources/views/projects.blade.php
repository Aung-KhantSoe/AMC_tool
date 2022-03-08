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
                    {{-- @php
                    $projects = DB::table('projects')->where('project_id', $user_has_projects->project_id)->get();
                    @endphp --}}
                    @if (count($user_has_projects) > 0)
                    <div class="row">
                        @foreach ($user_has_projects as $user_has_project)
                        @php
                            $project = DB::table('projects')->where('id', $user_has_project->project_id)->first();
                            $project_has_flows = DB::table('project_has_flows')->where('project_id', $user_has_project->project_id)->get();
                        @endphp
                        <div class="col-xxl-4 col-lg-6">
                            <div class="project-box shadow p-3 mb-5 bg-body rounded"><span class="badge badge-primary">Doing</span>
                                <h6>{{$project->name}}</h6>
                                    <div class="media"><img class="img-20 me-2 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                        <div class="media-body">
                                            <p>{{Auth::user()->name}}</p>
                                        </div>
                                    </div>                       
                                <div class="row details">
                                    <div class="col-6"><span>Created</span></div>
                                    <div class="col-6 font-primary">{{$project->created_at}} </div>
                                    <div class="col-6"><span>End Date</span></div>
                                    <div class="col-6 font-primary">{{$project->end_date_time}} </div>
                                </div>
                                <a href="{{route('flowcreate',Crypt::encrypt($project->id))}}"><button type="button" class="btn btn-primary mt-2">Create new flow</button></a>
                                @foreach ($project_has_flows as $project_has_flow) 
                                @php
                                    $flow = DB::table('flows')->where('id', $project_has_flow->flow_id)->first();
                                @endphp                              
                                <a href="{{route('cards',Crypt::encrypt($flow->id))}}" class="btn btn-primary mt-2">{{$flow->name}}</a>
                                @endforeach
                            
                            </div>
                        </div>
                        
                        @endforeach
                    </div> 
                    @else
                    <div class="row"><h6 class="txt-secondary mb-4" style="text-align:center">No Project yet...</h6></div> 
                    @endif
                </div>
                
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@include('templates.footer')       
       