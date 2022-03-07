@include('templates.header')
@include('templates.navbar')
<div class="container-fluid" id="main" style="height: 100vh">
    <span style="font-size:30px;cursor:pointer;padding-bottom:50px;margin-left:0;" onclick="openNav()">&#9776;</span>
    <div class="row">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <form action="{{route('addproject')}}" method="POST">
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
              <div class="form theme-form">
                <div class="row">
                  <div class="col">
                    <div class="mb-3">
                      <label>Project Title</label>
                      <input class="form-control" type="text" placeholder="Project name *" name="name">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="mb-3">
                      <label>Project Flow</label>
                      <select class="form-select">
                        <option value="Target Audience Generator">Target Audience Generator </option>
                        <option value="Content Strategy Creator">Content Strategy Creator</option>
                        <option value="Copywriting Workflow">Copywriting Workflow</option>
                      </select>
                    </div>
                  </div>
                  
                  <div class="col-sm-4">
                    <div class="mb-3">
                      <label>Ending date</label>
                      <input class="form-control" type="date" data-language="en" name="end_date_time">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="text-end"><button type="submit" class="btn btn-secondary me-3">Add</button><a class="btn btn-danger" href="{{route('cards')}}">Cancel</a></div>
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