@extends('layouts.admin')
@section('title', 'Members')
@section('user-name', Auth::user()->name)

@section('content')

<div class="row">
<div class="col-12 col-lg-12 col-xxl-12 d-flex">
			<div class="card flex-fill">
				<div class="card-header">
					<div class="card-actions float-end">
						<a href="#" class="me-1">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw align-middle"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg>
						</a>
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
					<h4 class="card-title mb-0"><strong>Camera Subunit</strong></h4>
				</div>

				<div id="datatables-dashboard-projects_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
					<div class="row">
						<div class="col-sm-12 col-md-6"></div>
						<div class="col-sm-12 col-md-6"></div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<table id="datatables-dashboard-projects" class="table table-striped my-0 dataTable " aria-describedby="datatables-dashboard-projects_info">
							<thead>
								<tr>
									<th class="sorting" tabindex="0" aria-controls="datatables-dashboard-projects" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Name</th>						
									<th class="d-none d-xl-table-cell sorting sorting_asc" tabindex="0" aria-controls="datatables-dashboard-projects" rowspan="1" colspan="1" aria-label="Start Date: activate to sort column descending" aria-sort="ascending">Start Date</th>

									<th class="d-none d-xl-table-cell sorting" tabindex="0" aria-controls="datatables-dashboard-projects" rowspan="1" colspan="1" aria-label="End Date: activate to sort column ascending">End Date</th>
									<th class="sorting" tabindex="0" aria-controls="datatables-dashboard-projects" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Status</th>
									<th class="d-none d-md-table-cell sorting" tabindex="0" aria-controls="datatables-dashboard-projects" rowspan="1" colspan="1" aria-label="Assignee: activate to sort column ascending">Assignee</th>
								</tr>
							</thead>
						<tbody>					
								<tr class="odd">
										<td class="">Project Apollo</td>
										<td class="d-none d-xl-table-cell sorting_1">01/01/2021</td>
										<td class="d-none d-xl-table-cell">31/06/2021</td>
										<td><span class="badge bg-success">Done</span></td>
										<td class="d-none d-md-table-cell">Carl Jenkins</td>
								</tr>
						</tbody>
				</table>
			</div>
		</div>
		
		</div>
		</div>
		</div>
			</div>
		</div>
						<!-- <div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Camera Subnit</h5>
								</div>
								<div class="card-body">
									<div class="my-5">&nbsp;</div>
								</div>
							</div>
						</div> -->
					</div>

@endsection