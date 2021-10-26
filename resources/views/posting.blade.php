@extends('layouts.admin')
@section('title', 'Members')
@section('user-name', Auth::user()->name)

@section('content')

<!-- <div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Perform unit member Post</h5>
								</div>
								<div class="card-body">
									<div class="my-5">&nbsp;</div>
								</div>
							</div>
						</div>
</div> -->
<div class="row">
						<div class="col-md-3 col-xl-2">

							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Posting Category</h5>
								</div>

								<div class="list-group list-group-flush" role="tablist">
									<a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#account" role="tab">
										Probation
									</a>
									
								
									<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#full_member" role="tab">
										Full Member
									</a>

									
									<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#new_skill" role="tab">
										Add New Skill
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
				<div class="row justify-content-center">
					<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">x</button>
						{{ session()->get('success') }}
					</div>
				</div>
			@endif

						<div class="col-md-8 col-xl-10">
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
											<h5 class="card-title mb-0">Post Probation/Member</h5>		
										</div>
										<div class="card">
										<div class="card-body">
											<h5 class="card-title">Post Probation Member</h5>

											<form action="{{ route('posting')}}" method="post">
												@csrf
												<div class="mb-3">
													<label for="member_id">Select Member</label>
													<select name="member_id" id="fullname" class="form-control">
														@foreach($member_cat as $member)
														<option value="{{ $member->id }}">{{$member->firstname . ' ' . $member->lastname}}</option>
														@endforeach
													</select>
													</div>
												<div class="mb-3">
													<label for="subunit_id">Select Subunit</label>
													<select name="subunit_id" id="subunit_id" class="form-control">
														<option value="">select subunit</option>
														@foreach($subunits as $subunit)
														<option value="{{ $subunit->id }}">{{ $subunit->name }}</option>
														@endforeach
													</select>
													</div>
													<div class="mb-3">
													<label for="duration">Posting Duration</label>
													<input type="text" class="form-control" name="duration" id="post_duration">
												</div>
												<input type="hidden" name="posting_status" value="1">
												<div class="mb-3">
													<label for="start_date">Start Date</label>
													<input type="date" class="form-control" name="start_date" id="start_date">
												</div>
												<div class="mb-3">
													<label for="end_date">End Date</label>
													<input type="date" class="form-control" name="end_date" id="end_date">
												</div>
												<button type="submit" class="btn btn-primary btn-block float-md-right">Post</button>
											</form>

										</div>
									</div>
									
									</div>

								

								</div>
								<div class="tab-pane fade" id="full_member" role="tabpanel">
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">Post Full Member</h5>

											<form action="{{ route('posting')}}" method="post">
												@csrf
												<div class="mb-3">
													<label for="firstname">Select Member</label>
													<select name="member_id" id="fullname" class="form-control">
														@foreach($member_cat2 as $member)
														<option value="{{ $member->id }}">{{$member->firstname . ' ' . $member->lastname}}</option>
														@endforeach
													</select>
													</div>
												<div class="mb-3">
													<label for="firstname">Select Subunit</label>
													<select name="subunit_id" id="subunit_id" class="form-control">
														<option value="">select subunit</option>
														@foreach($subunits as $subunit)
														<option value="{{ $subunit->id }}">{{ $subunit->name }}</option>
														@endforeach
													</select>
													</div>
													<div class="mb-3">
													<label for="duration">Posting Duration</label>
													<input type="text" class="form-control" name="duration" id="post_duration">
													</div>
													<input type="hidden" name="posting_status" value="2">
												<div class="mb-3">
													<label for="start_date">Start Date</label>
													<input type="date" class="form-control" name="start_date" id="start_date">
												</div>
												<div class="mb-3">
													<label for="end_date">End Date</label>
													<input type="date" class="form-control" name="end_date" id="end_date">
												</div>
												<button type="submit" class="btn btn-primary btn-block float-md-right">Post</button>
											</form>


										</div>
									</div>
								</div>

								<div class="tab-pane fade" id="new_skill" role="tabpanel">
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">Studio Related Skill</h5>

											<form action="{{ route('add_skill')}}" method="post">
												@csrf												
													<div class="mb-3">
													<label for="skill_name">Add New Skill</label>
													<input type="text" class="form-control" name="skill_name" id="post_duration">
												</div>
												<button type="submit" class="btn btn-primary btn-block float-md-right">Add Skill</button>
											</form>


										</div>
									</div>
								</div>

							</div>
						</div>
					</div>  

@endsection