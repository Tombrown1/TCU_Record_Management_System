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
			<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#skills" role="tab">
			Profession/Studio Related Skills
			</a>
			<!-- <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#skill" role="tab">
				Studio Related Skills
			</a> -->
			<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#church_membership" role="tab">
				Church Membership
			</a>
			<!-- <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#homecell" role="tab">
				Homecell Info
			</a>
		
			<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#" role="tab">
				Disable account
			</a> -->
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
		<div class="row justify-content-center">

			<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert">x</button>
				<strong>{{ session()->get('success') }}</strong>
			</div>
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
					<h5 class="card-title mb-0">Add Member info {{ session()->get('last_id') }}</h5>
				</div>
				<div class="card-body">
					<form action="{{ route('save.info')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-md-8">
								<div class="mb-3">
									<label for="inputUsername">First Name</label>
									<input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name">
								</div>
								<div class="mb-3">
									<label for="lastname">Last Name</label>
									<input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name">
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
										<span class="btn btn-primary"><input type="file" name="image"><i class="fas fa-upload"></i></span>
										<!-- <input type="file" name="image"> -->
									</div>
									<small>For best results, use an image at least 128px by 128px in .jpg
										format</small>
								</div>
							</div>
						</div>
						<div class="row">
						<div class="mb-3 col-md-6">
									<label for="email">Email</label>
									<input type="email" class="form-control" name="email" id="email" placeholder="Email">
								</div>
								<div class="mb-3 col-md-6">
									<label for="work_phone">Work Phone Number</label>
									<input type="text" class="form-control" name="work_phone" id="work_phone" placeholder="Phone Number	">
								</div>
						</div>
						<div class="row">
						<div class="mb-3 col-md-6">
									<label for="resident_address">Residential Address</label>
									<input type="text" class="form-control" name="resident_address" id="email" placeholder="Residential Address">
								</div>
								<div class="mb-3 col-md-6">
									<label for="home_phone">Home Phone Number</label>
									<input type="text" class="form-control" name="home_phone" id="home_phone" placeholder="Home Phone Number	">
								</div>
						</div>
						<div class="row">
							<div class="mb-3 col-md-6">
									<label for="gender">Select Gender</label>
									<select name="gender" id="gender" class="form-control">
										<option selected>Gender</option>
										<option value="gender">Male</option>
										<option value="gender">Female</option>
										<option value="other">Other</option>
									</select>
									<!-- <input type="email" class="form-control" name="email" id="email" placeholder="Email"> -->
								</div>
								<div class="mb-3 col-md-6">
									<label for="dob">Date of Birth</label>
									<input type="date" class="form-control" name="dob" id="dob" placeholder="Date of Birth">
								</div>
						</div>
						<div class="row">
							<div class="mb-3 col-md-6">
									<label for="pob">Place of Birth</label>
									<input type="text" class="form-control" name="pob" id="pob" placeholder="Place of Birth">
								</div>
								<div class="mb-3 col-md-6">
								<label for="marital_status">Select Marital Status</label>
									<select name="marital_status" id="marital_status" class="form-control">
										<option  selected>Marital Status</option>
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
												<option value="{{ $subunit->id }}">{{$subunit->name}}</option>
											@endforeach
										</select>
									</div>

									<div class="mb-3 col-md-6">
										<label for="category">Member Category</label>
										<select name="category" id="" class="form-control">
										<option value="probation">category</option>
											<option value="Probation">Probation</option>
											<option value="Full Member">Full Member</option>
										</select>
									</div>									
						 </div>					

						<button type="submit" class="btn btn-primary">Save changes</button>
					</form>

				</div>
			</div>


		</div>
		<div class="tab-pane fade" id="next_of_kin" role="tabpanel">
			<!-- @if(App\Models\Member::find(1)->marital_status == NUll) -->
			<!-- <div class="alert alert-warning" role="alert">
				<p class="text-center">Please you need to fill your personal info first</p>
			</div>
			@else -->
			<div class="card">
					<div class="card-header">
					<h5 class="card-title">Next of Kin Info</h5>

					</div>
				<div class="card-body">

					<form action="{{route('next_of_kin')}}" method="post">
						
						@csrf
					<div class="row">
						<div class="mb-3 col-md-6">
									<label for="fname_next_of_kin">First Name</label>
									<input type="text" class="form-control" name="fname_next_of_kin" id="fname_next_of_kin" placeholder="First Name">
								</div>
								<div class="mb-3 col-md-6">
									<label for="lname_next_of_kin">Last Name</label>
									<input type="text" class="form-control" name="lname_next_of_kin" id="lname_next_of_kin" placeholder="Last Name	">
								</div>
						</div>
						<div class="row">
						<div class="mb-3 col-md-6">
									<label for="phone_next_of_kin">Phone</label>
									<input type="text" class="form-control" name="phone_next_of_kin" id="phone_next_of_kin" placeholder="Phone Number">
								</div>
								<div class="mb-3 col-md-6">
									<label for="relate_next_of_kin">Relationship</label>
									<input type="text" class="form-control" name="relate_next_of_kin" id="relate_next_of_kin" placeholder="Last Name	">
								</div>
						</div>
						<div class="row">
						<div class="mb-3 col-md-6">
						<label for="gender">Select Gender</label>
									<select name="gender_next_of_kin" id="gender_next_of_kin" class="form-control">
										<option  selected>Gender</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
										<option value="Other">Other</option>
									</select>
								</div>
								<div class="mb-3 col-md-6">
									<label for="address_next_of_kin">Address</label>
									<input type="text" class="form-control" name="address_next_of_kin" id="address_next_of_kin" placeholder="Address">
								</div>
						</div>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</form>

				</div>
			</div>
			<!-- @endif -->
		</div>
		<div class="tab-pane fade" id="skills" role="tabpanel">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Profession/ Studio Related Skills</h5>

					<form action="{{route('profession_related_skill')}}" method="post">
						@csrf
						<div class="mb-3">
							<label for="profession">Profession/Discipline</label>
							<input type="text" name="profession" class="form-control" id="profession">
							<!-- <small><a href="#">Forgot your password?</a></small> -->
						</div>
						<div class="mb-3">
							<label for="skills[]">Check Studio Related Skills</label><br>
							@foreach($skills as $skill)					
							
							<input type="checkbox" name="skills[]" value="{{$skill->id}}"> {{$skill->name}} &nbsp;&nbsp;
							@endforeach
						</div>
						
						<button type="submit" class="btn btn-primary">Save changes</button>
					</form>

				</div>
			</div>
		</div>
		
		<div class="tab-pane fade" id="church_membership" role="tabpanel">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Church Membership Details</h5>

					<form>
					<div class="row">
						<div class="col-md-4 mb-3">						
							<div class="form-text"><h4>Are you born again, if yes when and where ?</h4>
						</div>
					</div>
						<div class="col-md-8">
							<div class="form-group">
								<input type="text" name="born_again" class="form-control" placeholder="Enter When you were born again">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 mb-3">						
							<div class="form-text"><h4>Date of Church Membership</h4>
						</div>
					</div>
						<div class="col-md-8">
							<div class="form-group">
								<input type="date" name="church_membership" class="form-control" placeholder="When did you join the church ">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 mb-3">						
							<div class="form-text"><h4>Date of Service Group Membership</h4>
						</div>
					</div>
						<div class="col-md-8">
							<div class="form-group">
								<input type="date" name="unit_membership" class="form-control" placeholder="When did you join the service group">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 mb-3">						
							<div class="form-text"><h4>Have you undergone believers foundation aand Membership class, if yes when and where ?</h4>
						</div>
					</div>
						<div class="col-md-8">
							<div class="form-group">
								<input type="text" name="believer_membership_class" class="form-control" placeholder="Have you undergo believer class">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 mb-3">						
							<div class="form-text"><h4>Have you been baptized in water by immersion, if yes when and where ?</h4>
						</div>
					</div>
						<div class="col-md-8">
							<div class="form-group">
								<input type="text" name="water_baptism" class="form-control" placeholder="Have you been baptize in water by immersion">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 mb-3">						
							<div class="form-text"><h4>Have you had Holy Ghost Baptism with the evidence of speaking in tongues, if yes when ?</h4>
						</div>
					</div>
						<div class="col-md-8">
							<div class="form-group">
								<input type="text" name="holyghost_baptism" class="form-control" placeholder="Have you had Holy Ghost Baptism">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 mb-3">						
							<div class="form-text"><h4>Have you had any WOFBI Attendance</h4>
						</div>
					</div>
						<div class="col-md-8">
							<div class="form-check">
								<input type="checkbox" name="holyghost_baptism" class="form-check-input" value="">
								<label class="form-check-label" for="flexCheckDefault">BCC</label>
							</div>
							<div class="form-check">
								<input type="checkbox" name="holyghost_baptism" class="form-check-input" value="">
								<label class="form-check-label" for="flexCheckDefault">LCC</label>
							</div>
							<div class="form-check">
								<input type="checkbox" name="holyghost_baptism" class="form-check-input" value="">
								<label class="form-check-label" for="flexCheckDefault">LDC</label>
							</div>
						</div>
					</div><br><br>
					<div class="row">
						<div class="col-md-4 mb-3">						
							<div class="form-text"><h4>Are you a tither ?, if yes what's you Tithe Booklet Number</h4>
							</div>
						</div>
						
						<div class="col-md-8">
							<div class="form-group">
								<input type="text" name="holyghost_baptism" class="form-control" placeholder="Tithe Booklet Number">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 mb-3">						
							<div class="form-text"><h4>Are you a Homecell Member ?, if yes what's your date of membership, Homecell Address, Your Zone and District No</h4>
							</div>
						</div>
						
						<div class="col-md-2">
							<div class="form-group">
								<input type="text" name="holyghost_baptism" class="form-control" placeholder="Date of Membership">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<input type="text" name="holyghost_baptism" class="form-control" placeholder="Homecell Address">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<input type="text" name="holyghost_baptism" class="form-control" placeholder="Zone and District No">
							</div>
						</div>
					</div>
					
						<button type="submit" class="btn btn-primary">Save changes</button>
					</form>

				</div>
			</div>
		</div>
		<!-- <div class="tab-pane fade" id="homecell" role="tabpanel">
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
		</div> -->
	</div>
	</div>
	</div>  
@endsection