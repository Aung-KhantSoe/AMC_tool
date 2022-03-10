@include('templates.header')
<div class="container-fluid p-0"> 
    <div class="row m-0">
      <div class="col-12 p-0">    
        <div class="login-card">
          <form class="theme-form login-form" method="POST" action="{{ route('register') }}">
            @csrf
            <h4>Create your account</h4>
            <h6>Enter your personal details to create account</h6>
            <div class="form-group">
              <label>Your Name</label>
                <div class="input-group"><span class="input-group-text"><i class="icon-user"></i></span>
                  <input class="form-control @error('name') is-invalid @enderror" type="text"  placeholder="Name" id="name"  id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
            </div>
            <div class="form-group">
              <label>Email Address</label>
              <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                <input class="form-control @error('name') is-invalid @enderror" type="email" placeholder="Test@gmail.com"  id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            </div>
            <div class="form-group">
              <label>Password</label>
              <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                <input class="form-control @error('password') is-invalid @enderror" type="password"  placeholder="*********" id="password" name="password" required autocomplete="new-password">
                <div class="show-hide"><span class="show"></span></div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
            
            <div class="form-group">
              <button class="btn btn-primary btn-block" type="submit">Register</button>
            </div>
            <div class="login-social-title">                
              <h5>Sign in</h5>
            </div>
            
            <p>Already have an account?<a class="ms-2" href="{{route('login')}}">Sign in</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
