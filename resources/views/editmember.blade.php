@extends('layouts.admin')
@section('title', 'Members')
@section('user-name', Auth::user()->name)

@section('content')
<div class="row">
	<div class="col-md-3 col-xl-2">

	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">Create Member</h5>
		</div>

		<div class="list-group list-group-flush" role="tablist">
			<a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#account" role="tab">
				Personal Info
			</a>
			<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#next_of_kin" role="tab">
				Next of Kin Info
			</a>
			<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#education" role="tab">
				Education Background
			</a>
			<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#skill" role="tab">
				Profession/Skills
			</a>
			<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#church_membership" role="tab">
				Church Membership
			</a>
			<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#homecell" role="tab">
				Homecell Info
			</a>
		
			<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#" role="tab">
				Disable account
			</a>
		</div>
	</div>
	</div>

	<div class="col-md-9 col-xl-10">
	@if($errors->any())
		<div class="alert alert-danger" role="alert">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        <p class="text-center">{{ session()->get('success') }}</p>
    </div>
	@endif

	<div class="tab-content">
		<div class="tab-pane fade show active" id="account" role="tabpanel">

			<div class="card">
				<div class="card-header">
					<div class="card-actions float-end">
						<a href="#" class="me-1">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw align-middle"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg>
						</a>
						<div class="d-inline-block dropdown show">
							<a href="#" data-bs-toggle="dropdown" data-bs-display="static">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical align-middle"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
							</a>

							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<a class="dropdown-item" href="#">Something else here</a>
							</div>
						</div>
					</div>
					<h5 class="card-title mb-0">Edit Member info</h5>
				</div>
				<div class="card-body">
					<form action="{{ route('edit.info', ['id' => $member->id])}}" method="post" enctype="multipart/form-data">
					<input type="hidden" name="_method" value="PUT">
					{{ method_field('PUT') }}
						@csrf
						<div class="row">
							<div class="col-md-8">
								<div class="mb-3">
									<label for="inputUsername">First Name</label>
									<input type="text" class="form-control" name="firstname" id="firstname" value="{{$member->firstname}}">
								</div>
								<div class="mb-3">
									<label for="lastname">Last Name</label>
									<input type="text" class="form-control" name="lastname" id="lastname" value="{{$member->lastname}}">
								</div>								
								
								<!-- <div class="mb-3">
									<label for="inputUsername">Biography</label>
									<textarea rows="2" class="form-control" id="inputBio" placeholder="Tell something about yourself"></textarea>
								</div> -->
							</div>
							<div class="col-md-4">
								<div class="text-center">
									<!-- <img alt="Chris Wood" src="img/avatars/avatar.jpg" class="rounded-circle img-responsive mt-2" width="128" height="128"> -->
									<div class="mt-2">
										<span class="btn btn-primary"><i class="fas fa-upload"></i> <input type="file" name="image"> </span>
									</div>
									<small>For best results, use an image at least 128px by 128px in .jpg
										format</small>
								</div>
							</div>
						</div>
						<div class="row">
						<div class="mb-3 col-md-6">
									<label for="email">Email</label>
									<input type="email" class="form-control" name="email" id="email" value="{{$member->email}}">
								</div>
								<div class="mb-3 col-md-6">
									<label for="work_phone">Work Phone Number</label>
									<input type="text" class="form-control" name="work_phone" id="work_phone" value="{{$member->work_phone}}">
								</div>
						</div>
						<div class="row">
						<div class="mb-3 col-md-6">
									<label for="resident_address">Residential Address</label>
									<input type="text" class="form-control" name="resident_address" id="email" value="{{$member->resident_address}}">
								</div>
								<div class="mb-3 col-md-6">
									<label for="home_phone">Home Phone Number</label>
									<input type="text" class="form-control" name="home_phone" id="home_phone" value="{{$member->home_phone}}" >
								</div>
						</div>
						<div class="row">
							<div class="mb-3 col-md-6">
									<label for="gender">Select Gender</label>
									<select name="gender" id="gender" class="form-control">
										<option selected>{{$member->gender}}</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
										<option value="Other">Other</option>
									</select>
									<!-- <input type="email" class="form-control" name="email" id="email" placeholder="Email"> -->
								</div>
								<div class="mb-3 col-md-6">
									<label for="dob">Date of Birth</label>
									<input type="date" class="form-control" name="dob" id="dob" value="{{$member->dob}}">
								</div>
						</div>
						<div class="row">
							<div class="mb-3 col-md-6">
									<label for="pob">Place of Birth</label>
									<input type="text" class="form-control" name="pob" id="pob" value="{{$member->pob}}">
								</div>
								<div class="mb-3 col-md-6">
								<label for="marital_status">Select Marital Status</label>
									<select name="marital_status" id="marital_status" class="form-control">
										<option  selected>{{$member->marital_status}}</option>
										<option value="Single">Single</option>
										<option value="Engaged">Engaged</option>
										<option value="Married">Married</option>
										<option value="Seperated">Seperated</option>
										<option value="Divorced">Divorced</option>
										<option value="Widowed">Widowed</option>
									</select>
								</div>								
						</div>
						<div class="row">
						<div class="mb-3 col-md-6">
										<label for="subunit_id">Subunit</label>
										<select name="subunit_id" id="" class="form-control">
										 <option>Select Subunit</option>
											<!--<option value="Probation">Probation</option>
											<option value="Full Member">Full Member</option> -->
											@foreach($subunits as $subunit)
												<option value="{{ $subunit->id }}" {{ $member->subunit_id == $subunit->id ? 'selected': '' }} >{{$subunit->name}}</option>
											@endforeach
										</select>
									</div>

									<div class="mb-3 col-md-6">
										<label for="category">Member Category</label>
										<select name="category" id="" class="form-control">
										<option selected>{{$member->category }}</option>
											<option value="Probation">Probation</option>
											<option value="Full Member">Full Member</option>
										</select>
									</div>									
						 </div>										

						<button type="submit" class="btn btn-primary">Save changes</button>
					</form>

				</div>
			</div>

			<!-- <div class="card">
				<div class="card-header">
					<div class="card-actions float-end">
						<a href="#" class="me-1">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw align-middle"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg>
						</a>
						<div class="d-inline-block dropdown show">
							<a href="#" data-bs-toggle="dropdown" data-bs-display="static">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical align-middle"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
							</a>

							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<a class="dropdown-item" href="#">Something else here</a>
							</div>
						</div>
					</div>
					<h5 class="card-title mb-0">Private info</h5>
				</div>
				<div class="card-body">
					<form>
						<div class="row">
							<div class="mb-3 col-md-6">
								<label for="inputFirstName">First name</label>
								<input type="text" class="form-control" id="inputFirstName" placeholder="First name">
							</div>
							<div class="mb-3 col-md-6">
								<label for="inputLastName">Last name</label>
								<input type="text" class="form-control" id="inputLastName" placeholder="Last name">
							</div>
						</div>
						<div class="mb-3">
							<label for="inputEmail4">Email</label>
							<input type="email" class="form-control" id="inputEmail4" placeholder="Email">
						</div>
						<div class="mb-3">
							<label for="inputAddress">Address</label>
							<input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
						</div>
						<div class="mb-3">
							<label for="inputAddress2">Address 2</label>
							<input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
						</div>
						<div class="row">
							<div class="mb-3 col-md-6">
								<label for="inputCity">City</label>
								<input type="text" class="form-control" id="inputCity">
							</div>
							<div class="mb-3 col-md-4">
								<label for="inputState">State</label>
								<select id="inputState" class="form-control">
									<option selected="">Choose...</option>
									<option>...</option>
								</select>
							</div>
							<div class="mb-3 col-md-2">
								<label for="inputZip">Zip</label>
								<input type="text" class="form-control" id="inputZip">
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</form>

				</div>
			</div> -->

		</div>
		<div class="tab-pane fade" id="next_of_kin" role="tabpanel">
			<div class="card">
					<div class="card-header">
						Next of Kin Info
					</div>
				<div class="card-body">
					<form action="{{ route('nextofKin', ['id'=> $member->id])}}" method="post">
						<input type="hidden" name="_method" value="PUT">
						{{ method_field('PUT') }}
						@csrf
					<div class="row">
						<div class="mb-3 col-md-6">
									<label for="fname_next_of_kin">First Name</label>
									<input type="text" class="form-control" name="fname_next_of_kin" id="fname_next_of_kin" value="{{ $member->fname_next_of_kin }}">
								</div>
								<div class="mb-3 col-md-6">
									<label for="lname_next_of_kin">Last Name</label>
									<input type="text" class="form-control" name="lname_next_of_kin" id="lname_next_of_kin" value="{{$member->lname_next_of_kin}}">
								</div>
						</div>
						<div class="row">
						<div class="mb-3 col-md-6">
									<label for="phone_next_of_kin">Phone</label>
									<input type="text" class="form-control" name="phone_next_of_kin" id="phone_next_of_kin" value="{{$member->phone_next_of_kin}}">
								</div>
								<div class="mb-3 col-md-6">
									<label for="relate_next_of_kin">Relationship</label>
									<input type="text" class="form-control" name="relate_next_of_kin" id="relate_next_of_kin" value="{{$member->relate_next_of_kin}}">
								</div>
						</div>
						<div class="row">
						<div class="mb-3 col-md-6">
						<label for="gender">Select Gender</label>
									<select name="gender_next_of_kin" id="gender_next_of_kin" class="form-control">
										<option>{{$member->gender_next_of_kin}}</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
										<option value="Other">Other</option>
									</select>
								</div>
								<div class="mb-3 col-md-6">
									<label for="address_next_of_kin">Address</label>
									<input type="text" class="form-control" name="address_next_of_kin" id="address_next_of_kin" value="{{$member->address_next_of_kin}}">
								</div>
						</div>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</form>

				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="education" role="tabpanel">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Password</h5>

					<form>
						<div class="mb-3">
							<label for="inputPasswordCurrent">Current password</label>
							<input type="password" class="form-control" id="inputPasswordCurrent">
							<small><a href="#">Forgot your password?</a></small>
						</div>
						<div class="mb-3">
							<label for="inputPasswordNew">New password</label>
							<input type="password" class="form-control" id="inputPasswordNew">
						</div>
						<div class="mb-3">
							<label for="inputPasswordNew2">Verify password</label>
							<input type="password" class="form-control" id="inputPasswordNew2">
						</div>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</form>

				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="skill" role="tabpanel">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Password</h5>

					<form>
						<div class="mb-3">
							<label for="inputPasswordCurrent">Current password</label>
							<input type="password" class="form-control" id="inputPasswordCurrent">
							<small><a href="#">Forgot your password?</a></small>
						</div>
						<div class="mb-3">
							<label for="inputPasswordNew">New password</label>
							<input type="password" class="form-control" id="inputPasswordNew">
						</div>
						<div class="mb-3">
							<label for="inputPasswordNew2">Verify password</label>
							<input type="password" class="form-control" id="inputPasswordNew2">
						</div>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</form>

				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="church_membership" role="tabpanel">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Password</h5>

					<form>
						<div class="mb-3">
							<label for="inputPasswordCurrent">Current password</label>
							<input type="password" class="form-control" id="inputPasswordCurrent">
							<small><a href="#">Forgot your password?</a></small>
						</div>
						<div class="mb-3">
							<label for="inputPasswordNew">New password</label>
							<input type="password" class="form-control" id="inputPasswordNew">
						</div>
						<div class="mb-3">
							<label for="inputPasswordNew2">Verify password</label>
							<input type="password" class="form-control" id="inputPasswordNew2">
						</div>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</form>

				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="homecell" role="tabpanel">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Password</h5>

					<form>
						<div class="mb-3">
							<label for="inputPasswordCurrent">Current password</label>
							<input type="password" class="form-control" id="inputPasswordCurrent">
							<small><a href="#">Forgot your password?</a></small>
						</div>
						<div class="mb-3">
							<label for="inputPasswordNew">New password</label>
							<input type="password" class="form-control" id="inputPasswordNew">
						</div>
						<div class="mb-3">
							<label for="inputPasswordNew2">Verify password</label>
							<input type="password" class="form-control" id="inputPasswordNew2">
						</div>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</form>

				</div>
			</div>
		</div>
	</div>
	</div>
	</div>  
@endsection