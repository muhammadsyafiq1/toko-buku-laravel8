@extends('layouts.dashboard')

@section('title')
	User
@endsection

@section('content')
 <section class="section">
          <div class="section-header">
            <h1>Books</h1>
            <div class="section-header-button">
              <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#newBook">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">All Books</div>
            </div>
          </div>
          <div class="section-body">
            <!-- <h2 class="section-title">Books</h2> -->
            <p class="section-lead">
              You can manage all Books, such as editing, deleting and more.
            </p>

            <div class="row">
              <div class="col-12">
                <div class="card mb-0">
                  <div class="card-body">
                    <ul class="nav nav-pills" id="nav">
                      <li class="nav-item">
                        <a class="nav-link active" href="#">All <span class="badge badge-white">5</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Draft <span class="badge badge-primary">1</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Pending <span class="badge badge-primary">1</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Trash <span class="badge badge-primary">0</span></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                  @if(session('status'))
                      <div class="alert alert-info">
                        <b>Note!</b> {{session('status')}}
                      </div>
                    @endif
                    <div>
                      <form>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search">
                          <div class="input-group-append">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>

                    <div class="clearfix mb-3"></div>

                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Roles</th>
                          <th>Created At</th>
                          <th>Status</th>
                        </tr>
                        @foreach($users as $user)
                          <tr>
                          <td>{{$user->username}}
                              <div class="table-links">
                                <form action="{{route('user.destroy',$user->id)}}" class="d-inline" method="post">
                                  @csrf @method('delete')
                                  <a href="{{route('user.show',$user->id)}}"><i class="fa fa-eye text-white btn btn-sm btn-warning"></i></a>
                                  <div class="bullet"></div>
                                  <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are You Sure?')">
                                    <i class="fa fa-trash"></i>
                                  </button>
                                </form>
                              </div>
                            </td>
                            <td>
                              {{$user->email}}
                            </td>
                            <td>
                              @php 
                                $roles = json_decode($user->roles); 
                              @endphp

                                @foreach($roles as $role)
                                  &middot; {{$role}}
                                @endforeach
                            </td>
                            <td>{{\Carbon\Carbon::parse($user->created_at)->format('d/m/Y')}}</td>
                            <td>
                              @if($user->status == "active")
                              <div class="badge badge-primary">{{$user->status}}</div>
                              @else
                              <div class="badge badge-secondary">{{$user->status}}</div>
                              @endif
                            </td>
                        </tr>
                        @endforeach
                      </table>
                    </div>
                    <div class="float-right">
                      <nav>
                        <ul class="pagination">
                          <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                              <span aria-hidden="true">&laquo;</span>
                              <span class="sr-only">Previous</span>
                            </a>
                          </li>
                          <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                          </li>
                          <li class="page-item">
                            <a class="page-link" href="#">2</a>
                          </li>
                          <li class="page-item">
                            <a class="page-link" href="#">3</a>
                          </li>
                          <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                              <span aria-hidden="true">&raquo;</span>
                              <span class="sr-only">Next</span>
                            </a>
                          </li>
                        </ul>
                      </nav>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


      <!-- Modal -->
      <div class="modal fade" id="newBook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">New Book</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="card">
                  <div class="card-body">
                    <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="name">FullName</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
                          @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="username">Username</label>
                        <input type="username" name="username" id="username" class="form-control @error('username') is-invalid @enderror">
                          @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="phone">Phone</label>
                        <input type="phone" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror">
                          @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="address">Address</label>
                        <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" cols="7" rows="3"></textarea>
                          @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror">
                          @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                          @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="password_confirmation">Password Confirm</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                          @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label class="d-block">Roles</label>
                          <div class="form-check">
                            <input class="form-check-input @error('roles') is-invalid @enderror" type="checkbox" id="admin" name="roles[]" value="admin">
                            <label class="form-check-label" for="admin">
                              Admin
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input @error('roles') is-invalid @enderror" type="checkbox" id="staff" name="roles[]" value="staff">
                            <label class="form-check-label" for="staff">
                              Staff
                            </label>
                          </div>
                        </div>
                        <label>Avatar</label> <br>
                        <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror">
                          @error('avatar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form> 
              </div>
          </div>
        </div>
      </div>
@endsection


