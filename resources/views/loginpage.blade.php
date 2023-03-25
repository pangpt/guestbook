@extends('layouts-bootstrap.master-login')

@section('content')
<!-- CONTENT
    ================================================== -->
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-5 col-xl-4 my-5">
                        <!-- Heading -->
                        <div class="text-center">
                          <img src="/images/logo-lapaku.png" alt="..." class="img-fluid text-center" style="width:80%;margin-bottom:50px">
                      </div>
                      
                      <!-- Subheading -->
                      <p class="text-muted text-center mb-5">
                        Kelola buku tamu di e-Guest
                      </p>
      
                      <!-- Error -->
                      @if ($errors->any())
                          <div class="alert {{ $errors->has('success') ? 'bg-success alert-success' : 'bg-danger alert-danger'}} text-white">
                              @foreach ($errors->all() as $error)
                                  {{ $error }}
                              @endforeach
                          </div>
                      @endif
                      <!-- Form -->
                      <form action="{{ route('admin.authenticate') }}" method="POST">
                          @csrf
            
                        <!-- Email address -->
                        <div class="form-group">
            
                          <!-- Label -->
                          <label>NIP/Username</label>
            
                          <!-- Input -->
                        <input type="text" name="username" class="form-control" placeholder="Isikan dengan NIP atau Username" value="{{ old('username') }}" required>
            
                        </div>
            
                        <!-- Password -->
                        <div class="form-group">
            
                          <div class="row">
                            <div class="col">
                                  
                              <!-- Label -->
                              <label>Password</label>
            
                            </div>
                            {{-- <div class="col-auto">
                              
                              <!-- Help text -->
                              <a href="password-reset-cover.html" class="form-text small text-muted">
                                Forgot password?
                              </a>
            
                            </div> --}}
                          </div> <!-- / .row -->
            
                          <!-- Input group -->
                          <div class="input-group input-group-merge">
            
                            <!-- Input -->
                          <input type="password" name="password" class="form-control form-control-appended" value="{{ old('password') }}" placeholder="Enter your password"  required>
            
                            <!-- Icon -->
                            <div class="input-group-append">
                              <span class="input-group-text">
                                <i class="fe fe-eye"></i>
                              </span>
                            </div>
            
                          </div>
                        </div>
            
                        <!-- Submit -->
                        <button class="btn btn-lg btn-block btn-primary mb-3">
                          Sign in
                        </button>
            
                        <!-- Link -->
                        <p class="text-center mt-5">
                          <small class="text-muted text-center">
                            2023 &copy e-Guest by <a href="https://vantura.id">Panggih</a>.
                          </small>
                        </p>
                        
                      </form>
            </div> <!-- / .row -->
          </div>
@endsection