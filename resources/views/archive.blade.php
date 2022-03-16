@include('templates.header')
@include('templates.navbar')
<!-- Container-fluid starts-->
<div class="container-fluid" id="main" style="height: 100vh">
    <span style="font-size:30px;cursor:pointer;padding-bottom:50px;margin-left:0;" onclick="openNav()">&#9776;</span>
    <div class="row project-cards">
        <div class="col-md-3 project-list">
            <div class="card">
                <div class="row">
                <div class="col-md-6 p-0">
                    <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                    <li class="nav-item"><a class="nav-link active">Archived Projects</a></li>                   
                    </ul>
                </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                <div class="tab-content" id="top-tabContent">
                    <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                        
                        @if (count($user_has_projects) > 0)
                        <div class="row">
                            @foreach ($user_has_projects as $user_has_project)
                            @php
                                $project = DB::table('projects')->where('id', $user_has_project->project_id)->first();
                                $project_has_flows = DB::table('project_has_flows')->where('project_id', $user_has_project->project_id)->get();
                            @endphp
                            <div class="col-xxl-4 col-lg-6">
                                <div class="project-box shadow p-3 mb-5 bg-body rounded"><span class="badge badge-danger">Archived</span>
                                    
                                    <h6>{{$project->name}}</h6>
                                        <div class="media"><img class="img-20 me-2 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                            <div class="media-body">
                                                <p>{{Auth::user()->name}}</p>
                                                @php
                                                    $project_has_users = DB::table('user_has_projects')->where('project_id',$project->id)->get();
                                                @endphp
                                                <p>{{count($project_has_users)}} members  <i class="fa fa-chevron-down" onclick="toggleprojectuser(event)"></i></p>
                                                <div style="display: none" id="project_included_users">
                                                @foreach ($project_has_users as $project_has_user)
                                                    @php
                                                        $user = DB::table('users')->where('id',$project_has_user->user_id)->first();   
                                                    @endphp                           
                                                <p class="btn btn-dark">{{$user->name}}({{$user->user_roles}})</p><br>
                                                @endforeach
                                                </div>
                                            </div>
                                            @if (Auth::user()->user_roles == 'admin')
                                            <div class="row">                      
                                                <div class="col">
                                                    <a  onclick="return confirm('Are you sure to restore this project?')" href="{{route('restoreproject',Crypt::encrypt($project->id))}}"><i  class="txt-warning fa fa-refresh fa-2x pt-3" ></i></a>
                                                </div>
                                                <div class="col">
                                                    <a  onclick="return confirm('Are you sure to delete this project?')" href="{{route('forcedeleteproject',Crypt::encrypt($project->id))}}"><i  class="txt-danger fa fa-trash-o fa-2x pt-3" ></i></a>
                                                </div>
                                            </div>
                                            @endif
                                        </div>                       
                                    <div class="row details">
                                        <div class="col-6"><span>Created</span></div>
                                        <div class="col-6 font-primary">{{$project->created_at}} </div>
                                        <div class="col-6"><span>End Date</span></div>
                                        <div class="col-6 font-primary">{{$project->end_date_time}} </div>
                                    </div>
                                
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
@include('templates.footer')       
