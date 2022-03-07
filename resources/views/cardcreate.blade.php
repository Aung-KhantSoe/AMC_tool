@include('templates.header')
@include('templates.navbar')
<div class="container-fluid" id="main" style="height: 100vh">
    <span style="font-size:30px;cursor:pointer;padding-bottom:50px;margin-left:0;" onclick="openNav()">&#9776;</span>
    <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <form action="{{route('addcard')}}" method="POST">
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
                      <label>Card Title</label>
                      <input name="card_title" class="form-control" type="text" placeholder="Card title" >
                      <input name="flow_id" type="text" hidden="true" value="{{$flow_id}}">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="mb-3">
                      <label>Card color</label>
                      <select class="form-select" aria-label="Choose color" name="color"  onchange="colorchange(event)" id="color_select">
                        <option value="">Choose color</option>
                        <option class="btn-primary"value="primary">primary</option>
                        <option class="btn-secondary"value="secondary">secondary</option>
                        <option class="btn-success"value="success">success</option>
                        <option class="btn-danger"value="danger">danger</option>
                        <option class="btn-warning"value="warning">warning</option>
                        <option class="btn-info"value="info">info</option>
                        <option class="btn-light"value="light">light</option>
                        <option class="btn-dark"value="dark">dark</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="text-end">
                        <button type="submit" class="btn btn-secondary me-3" >Add</button>
                        <a href="{{route('cards',$flow_id)}}"><button type="button" class="btn btn-danger" >Cancel</button></a>
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