@extends('layouts.admin')
@section('title', 'Members')
@section('user-name', Auth::user()->name)

@section('content')

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">Technical Unit Members</h5>
			</div>
			<div class="card-body">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title"> Unit Members basic Information</h5>
					<h6 class="card-subtitle text-muted">
					</h6>
				</div>
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>subunits</th>
								<th>Status</th>
							<!--<th class="">Address</th> -->
							<!-- <th class="">Date registered</th> -->
							<th>Actions</th>
						</tr>
						</thead>
						<tbody>
							
							@foreach($members as $member)
								<tr>
									<td>{{ $loop->index +1}}</td>
									<td>{{ $member->firstname. ' '. $member->lastname}}</td>
									<td>{{$member->email}}</td>
									<td class="">{{$member->work_phone}}</td>
									<td class="">
										{{ $member->subunit->name }}
									</td>
									<td>{{ $member->category}}</td>
									
									<td class="table-action">
										<a class="btn btn-xs btn-success" data-bs-target="#view{{$member->id}}" data-bs-toggle="modal" href="#"><i class="text-white align-middle fas fa-fw fa-eye"></i></a>
										<a class="btn btn-xs btn-primary" href="{{route('edit_member',['id' => $member->id])}}"><i class="text-white align-middle fas fa-fw fa-pen"></i></a>
										<!-- <a class="btn btn-xs btn-danger" href="{{route('deleteMember',['id'=> $member->id])}}"><i class="text-white align-middle fas fa-fw fa-trash"></i></a> -->
										<a href="#" class="btn btn-xs btn-danger" onclick="event.preventDefault(); document.getElementById('delete{{$member->id}}').submit();" class="text-red"><i class="text-white align-middle fas fa-fw fa-trash"></i></a>

										<form id="delete{{ $member->id }}" action="{{ route('deleteMember', ['id'=> $member->id]) }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                        {{ Method_field('DELETE') }}
										</form>
									</td>
								</tr>    
								<div class="modal fade " id="view{{$member->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Member Personal Details</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											
											<div class="modal-body">
												<div class="row">
													<div class="col-md-4 mt-1">
														<div class="card text-center sidebar">
															<div class="card-body">
																@if($member->image == null)
																	<img src="{{asset('avartar/avartar_default.png')}}" alt="Member Passport" class="rounded-circle" width="150">
																@else
																<img src="storage/{{$member->image}}" alt="Member Passport" class="rounded-circle" width="150">
																@endif
															</div>
														</div>
													</div>
													<div class="col-md-8">
														<div class="card mt-3 content">
															<h3 class="m-3 pt-3">Member Details</h3>
															<div class="card-body">
																<div class="row">
																	<div class="col-md-3">
																		<h5>Full Name</h5>
																	</div>
																	<div class="col-md-9 text-secondary">
																		{{$member->firstname.' '.$member->lastname }}
																	</div>
																</div>
																<div class="row">
																	<div class="col-md-3">
																		<h5>Email Address</h5>
																	</div>
																	<div class="col-md-9 text-secondary">
																		{{$member->email}}</
																	</div>
																</div>
																<div class="row">
																	<div class="col-md-3">
																		<h5>Gender</h5>
																	</div>
																	<div class="col-md-9 text-secondary">
																		{{$member->gender}}
																	</div>
																</div>
																<div class="row">
																	<div class="col-md-3">
																		<h5>Date of Birth</h5>
																	</div>
																	<div class="col-md-9 text-secondary">
																		{{$member->dob}}
																	</div>
																</div>
																<div class="row">
																	<div class="col-md-3">
																		<h5>Place of Birth</h5>
																	</div>
																	<div class="col-md-9 text-secondary">
																		{{$member->pob}}
																	</div>
																</div>
																<div class="row">
																	<div class="col-md-3">
																		<h5>Marital Status</h5>
																	</div>
																	<div class="col-md-9 text-secondary">
																		{{$member->marital_status}}
																	</div>
																</div>
																<div class="card mb-3 content">
																	<h3 class="m-3">Profession/Studio Related Skills</h3>
																</div>
															</div>
														</div>
													</div>
												</div>
												
															<hr>
															<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Next of Kin Info</h5>		
														</div>
														<div class="row mb-3">
																<div class="col-md-6">
																	<div class="">
																		<label for="inputUsername">First Name</label>
																		<input readonly type="text" class="form-control" value="{{$member->fname_next_of_kin}}">
																	</div>
																</div>
																<div class="col-md-6">
																	<label for="lastname">Last Name</label>
																	<input type="text" readonly class="form-control" value="{{ $member->lname_next_of_kin}}">
																</div>
															</div>
															<div class="row mb-3">
																<div class="col-md-6">
																	<div class="">
																		<label for="inputUsername">Phone No</label>
																		<input readonly type="text" class="form-control" value="{{$member->phone_next_of_kin}}">
																	</div>
																</div>
																<div class="col-md-6">
																	<label for="lastname">Relationship</label>
																	<input type="text" readonly class="form-control" value="{{ $member->relate_next_of_kin}}">
																</div>
															</div>
															<div class="row mb-3">
																<div class="col-md-6">
																	<div class="">
																		<label for="inputUsername">Gender</label>
																		<input readonly type="text" class="form-control" value="{{$member->gender_next_of_kin}}">
																	</div>
																</div>
																<div class="col-md-6">
																	<label for="lastname">Residential Address</label>
																	<input type="text" readonly class="form-control" value="{{ $member->address_next_of_kin}}">
																</div>
															</div>
															
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
														</div>
													</div>
												</div>
											</div>
										
										@endforeach
									</tbody>
								</table>
							</div>
			</div>
		</div>
	</div>
</div>

@endsection