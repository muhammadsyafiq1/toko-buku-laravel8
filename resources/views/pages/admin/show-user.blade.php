@extends('layouts.dashboard')

@section('title')
	User Profile
@endsection

@section('content')
        <section class="section">
          <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Profile</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Hi, {{$user->username}}</h2>
            <p class="section-lead">
              Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                  <div class="profile-widget-header">
                    <img alt="image" src="{{asset('storage/'. $user->avatar)}}" class="rounded-circle profile-widget-picture" alt="{{$user->username}}">
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Posts</div>
                        <div class="profile-widget-item-value">187</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Followers</div>
                        <div class="profile-widget-item-value">6,8K</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Following</div>
                        <div class="profile-widget-item-value">2,1K</div>
                      </div>
                    </div>
                  </div>
                  <div class="profile-widget-description">
                    <div class="profile-widget-name">{{$user->username}} <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Web Developer</div></div>
                    Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.
                  </div>
                  <div class="card-footer text-center">
                    <div class="font-weight-bold mb-2">Follow {{$user->username}}</div>
                    <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                      <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-github mr-1">
                      <i class="fab fa-github"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-instagram">
                      <i class="fab fa-instagram"></i>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-7">
              	 @if(session('status'))
                      <div class="alert alert-info">
                        <b>Note!</b> {{session('status')}}
                      </div>
                    @endif
                <div class="card">
                  <form action="{{route('user.update',$user->id)}}" method="post" class="needs-validation" enctype="multipart/form-data">
                  	@csrf @method('put')
                    <div class="card-header">
                      <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label> Name</label>
                            <input type="text" class="form-control" value="{{old('name') ? old('name') : $user->name}}" required name="name">
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Username</label>
                            <input type="text" readonly name="username" class="form-control" value="{{old('username') ? old('username') : $user->username}}" required>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>Email</label>
                            <input type="email" readonly name="email" class="form-control" value="{{old('email') ? old('email') : $user->email}}" required>
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>Phone</label>
                            <input type="tel" name="phone" required class="form-control" value="{{old('phone') ? old('phone') : $user->phone}}">
                          </div>
                        </div>
                         <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>Avatar</label>
                            <input type="file" name="avatar" class="form-control">
                            <small><i>Kosongkan bila tak ingin dirubah.</i></small>
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" name="status">
                            	<option value="active" {{$user->status == 'active' ? 'selected' : ''}}>Active</option>
                            	<option value="inactive" {{$user->status == 'inactive' ? 'selected' : ''}}>Inactive</option>
                            </select>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-12">
                            <label>Address</label>
                            <textarea class="form-control summernote-simple" name="address">{{$user->address}}</textarea>
                          </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary" type="submit">Save Changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection