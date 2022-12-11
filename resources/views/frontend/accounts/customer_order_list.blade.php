@extends('layouts.frontend.app')
@section('content-frontend')
    <!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--start breadcrumb-->
				<section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
					<div class="container">
						<div class="page-breadcrumb d-flex align-items-center">
							<h3 class="breadcrumb-title pe-3">My Orders</h3>
							<div class="ms-auto">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
										</li>
										<li class="breadcrumb-item"><a href="javascript:;">Account</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">My Orders</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
				</section>
				<!--end breadcrumb-->
				<!--start shop cart-->
				<section class="py-4">
					<div class="container">
						<h3 class="d-none">Account</h3>
						<div class="card">
							<div class="card-body">
								<div class="row">
									@include('frontend.accounts.das_menu')
									<div class="col-lg-8">
										<div class="card shadow-none mb-0">
											<div class="card-body">
												<div class="table-responsive">
													<table class="table">
														<thead class="table-light">
															<tr>
																<th>#</th>
																<th>Date</th>
																<th>Status</th>
																<th>Total</th>
																<th>Actions</th>
															</tr>
														</thead>
														<tbody>
                                                            @foreach ($orders as $key=>$order)
                                                            <tr>
																<td>{{ $key+1 }}</td>
																<td>{{ $order->created_at }}</td>
																<td>
																	<div class="badge rounded-pill bg-success w-100">Pending</div>
																</td>
																<td>&#2547; {{ $order->total }} for <span>{{ $order->OrderProductDetails->count() }}</span> item</td>
																<td>
																	<div class="d-flex gap-2">	<a href="javascript:;" class="btn btn-dark btn-sm rounded-0">View</a>
																	</div>
																</td>
															</tr>
                                                            @endforeach
															
															
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!--end row-->
							</div>
						</div>
					</div>
				</section>
				<!--end shop cart-->
			</div>
		</div>
		<!--end page wrapper -->
@endsection