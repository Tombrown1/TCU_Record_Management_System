@extends('layouts.admin')
@section('title', 'Members')
@section('user-name', Auth::user()->name)

@section('content')

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">Probation Members</h5>
			</div>
			<div class="card-body">
			<div class="card">
								<div class="card-header">
									<h5 class="card-title">Basic Table</h5>
									<h6 class="card-subtitle text-muted">Using the most basic table markup, here’s how .table-based tables look in Bootstrap.
									</h6>
								</div>
								<table class="table">
									<thead>
										<tr>
											<th>Name</th>
											<th>Email</th>
											<th>Phone</th>
											<!-- <th class="">Gender</th>
											<th class="">Address</th> -->
											<th class="">Date registered</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										@foreach($members as $member)
											<tr>
												<td>{{ $member->firstname. ' '. $member->lastname}}</td>
												<td>{{$member->email}}</td>
												<td class="">{{ $member->work_phone}}</td>
												<td class="">{{ $member->created_at}}</td>
												<td class="table-action">
													<a class="btn btn-xs btn-success" data-bs-target="#view{{$member->id}}" data-bs-toggle="modal" href="#"><i class="text-white align-middle fas fa-fw fa-eye"></i></a>
													<a class="btn btn-xs btn-primary" href="{{route('edit_member',['id' => $member->id])}}"><i class="text-white align-middle fas fa-fw fa-pen"></i></a>
													<a class="btn btn-xs btn-danger" href="#"><i class="text-white align-middle fas fa-fw fa-trash"></i></a>
												</td>
											</tr>
											<div class="modal fade" id="view{{$member->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">Member Details</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<div class="row mb-3">
																<div class="col-md-6">
																	<div class="">
																		<label for="inputUsername">First Name</label>
																		<input readonly type="text" class="form-control" value="{{$member->firstname}}">
																	</div>
																</div>
																<div class="col-md-6">
																	<label for="lastname">Last Name</label>
																	<input type="text" readonly class="form-control" value="{{ $member->lastname}}">
																</div>
															</div>
															<div class="row mb-3">
																<div class="col-md-6">
																	<div class="">
																		<label for="inputUsername">Gender</label>
																		<input readonly type="text" class="form-control" value="{{$member->gender}}">
																	</div>
																</div>
																<div class="col-md-6">
																	<label for="lastname">E-mail</label>
																	<input type="text" readonly class="form-control" value="{{ $member->email}}">
																</div>
															</div>
															<div class="row mb-3">
																<div class="col-md-6">
																	<div class="">
																		<label for="inputUsername">Work Phone</label>
																		<input readonly type="text" class="form-control" value="{{$member->work_phone}}">
																	</div>
																</div>
																<div class="col-md-6">
																	<label for="lastname">Home Phone</label>
																	<input type="text" readonly class="form-control" value="{{ $member->home_phone}}">
																</div>
															</div>
															<div class="row mb-3">
																<div class="col-md-6">
																	<div class="">
																		<label for="inputUsername">Date of Birth</label>
																		<input readonly type="text" class="form-control" value="{{$member->dob}}">
																	</div>
																</div>
																<div class="col-md-6">
																	<label for="lastname">Place of Birth</label>
																	<input type="text" readonly class="form-control" value="{{ $member->pob}}">
																</div>
															</div>
															<div class="row mb-3">
																<div class="col-md-6">
																	<div class="">
																		<label for="inputUsername">Marital Status</label>
																		<input readonly type="text" class="form-control" value="{{$member->marital_status}}">
																	</div>
																</div>
																<div class="col-md-6">
																	<label for="lastname">Residential Address</label>
																	<input type="text" readonly class="form-control" value="{{ $member->resident_address}}">
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