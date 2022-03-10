@include('templates.header')
<div class="container-fluid p-0"> 
    <div class="row m-0">
      <div class="col-12 p-0">    
        <div class="login-card">              
          <div class="login-main"> 
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form class="theme-form login-form" method="POST" action="{{ route('password.email') }}">
              @csrf
              <h4 class="mb-3">Reset Your Password</h4>
              <div class="form-group">
                <label>Enter Your Email</label>
                <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                    <input class="form-control @error('email') is-invalid @enderror" type="email" required=""  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
              </div>
              <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Send Password Reset Link</button>
              </div>
              
              <p>Already have an password?<a class="ms-2" href="{{route('login')}}">Sign in</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>