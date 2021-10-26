@extends('layouts.admin')
@section('title', 'Members')
@section('user-name', Auth::user()->name)

@section('content')
<div class="row">
	<div class="col-12 col-lg-12 col-xxl-12 d-flex">
			<div class="card flex-fill">
				<div class="card-header">
						<div class="card-actions float-end">
							<div class="d-inline-block dropdown show">
									<a href="#" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false" class="">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical align-middle"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
									</a>

									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item" href="#">All Camera Members</a>
										<a class="dropdown-item" href="#">Full Member</a>
										<a class="dropdown-item" href="#">Probation Member</a>
									</div>
								</div>
						</div>					
					<h4 class="card-title mb-0"><strong>Cable Network Subunit</strong></h4>
				</div>
				<div id="datatables-dashboard-projects_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
					<div class="row">
						<div class="col-sm-12 col-md-6"></div>
						<div class="col-sm-12 col-md-6"></div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<table id="datatables-dashboard-projects" class="table table-striped my-0 dataTable no-footer" aria-describedby="datatables-dashboard-projects_info">
					<thead>
						<tr>
						<th class="sorting" tabindex="0" aria-controls="datatables-dashboard-projects" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">ID</th>

							<th class="sorting" tabindex="0" aria-controls="datatables-dashboard-projects" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Name</th>						
							<th class="d-none d-xl-table-cell sorting sorting_asc" tabindex="0" aria-controls="datatables-dashboard-projects" rowspan="1" colspan="1" aria-label="Start Date: activate to sort column descending" aria-sort="ascending">Phone</th>

							<th class="d-none d-xl-table-cell sorting sorting_asc" tabindex="0" aria-controls="datatables-dashboard-projects" rowspan="1" colspan="1" aria-label="Start Date: activate to sort column descending" aria-sort="ascending">Gender</th>

							<th class="d-none d-xl-table-cell sorting sorting_asc" tabindex="0" aria-controls="datatables-dashboard-projects" rowspan="1" colspan="1" aria-label="Start Date: activate to sort column descending" aria-sort="ascending">Marital Status</th>

							<th class="d-none d-xl-table-cell sorting" tabindex="0" aria-controls="datatables-dashboard-projects" rowspan="1" colspan="1" aria-label="End Date: activate to sort column ascending">Unit Status</th>
							<th class="sorting" tabindex="0" aria-controls="datatables-dashboard-projects" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Date Posted</th>
							<th class="d-none d-md-table-cell sorting" tabindex="0" aria-controls="datatables-dashboard-projects" rowspan="1" colspan="1" aria-label="Assignee: activate to sort column ascending">Posted By	</th>
						</tr>
					</thead>
					<tbody>
						@foreach($members as $member)
							<tr>
								<td>{{$loop->index +1}}</td>
								<td>{{ $member->firstname . ' ' .$member->lastname }}</td>
								<td>{{ $member->work_phone }}</td>
								<td>{{ $member->gender }}</td>
								<td>{{ $member->marital_status }}</td>
								<td>{{ $member->category }}</td>
								<td>{{ $member->created_at }}</td>
							</tr>
						@endforeach
					</tbody>
	</table>
		</div>
	</div>
</div>

@endsection