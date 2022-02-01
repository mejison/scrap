{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
            <!-- row -->
			<div class="container-fluid">
				<div class="form-head d-flex mb-0 mb-lg-4 align-items-start">
					<div class="mr-auto d-none d-lg-block">
						<h2 class="text-black font-w600">Analytics</h2>
						<p class="mb-0">Current campaign list</p>
					</div>
					<div class="d-none d-lg-flex align-items-center">
						<div class="text-right">
							<h3 class="fs-20 text-black mb-0">09:62 AM</h3>
							<span class="fs-14">Monday, 3 Augusut 2020</span>
						</div>
						<a class="ml-4 text-black p-3 rounded border text-center width60" href="#">
							<i class="las la-cog scale5"></i>
						</a>
					</div>
				</div>	
                <div class="row">
					<div class="col-xl-6 col-xxl-12">
						<div class="row">
							<div class="col-xl-12 col-xxl-6">
								<div class="card" id="user-activity">
									<div class="card-header pb-0 d-block d-sm-flex border-0">
										<h3 class="fs-20 text-black mb-0">Click Summary</h3>
										<div class="card-action card-tabs mt-3 mt-sm-0">
											<ul class="nav nav-tabs" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" data-toggle="tab" href="#monthly" role="tab">
														Monthly
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#weekly" role="tab">
														Weekly
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#today" role="tab">
														Today
													</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="card-body">
										<div class="d-sm-flex mb-4 d-block justify-content-between align-items-center">
											<div class="">
												<h1 class=" mb-1 text-black font-w600">867,123k</h1>
												<svg class="mr-2" width="18" height="10" viewBox="0 0 26 13" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M26 13L13 5.68248e-07L0 13" fill="#52B141"/>
												</svg>
												<span class="text-primary fs-14">+9% from last month</span>
											</div>
											<a href="javascript:void(0);" class="text-primary btn border mt-sm-0 mt-3">Download CSV</a>
										</div>
										<div class="tab-content" id="myTabContent">
											<div class="tab-pane fade show active" id="user" role="tabpanel">
												<canvas id="activity" class="chartjs"></canvas>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-12 col-xxl-6">
								<div class="card" id="user-activity2">
									<div class="card-header pb-0 d-block d-sm-flex border-0">
										<h3 class="fs-20 text-black mb-0">Conversion Summary</h3>
										<div class="card-action card-tabs mt-3 mt-sm-0">
											<ul class="nav nav-tabs" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" data-toggle="tab" href="#monthly" role="tab">
														Monthly
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#weekly" role="tab">
														Weekly
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#today" role="tab">
														Today
													</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="card-body">
										<div class="d-sm-flex mb-4 d-block justify-content-between align-items-center">
											<div>
												<h1 class=" mb-0 text-black font-w600">951,123k</h1>
												<svg class="mr-2" width="18" height="10" viewBox="0 0 26 13" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M26 -1.1365e-06L13 13L0 0" fill="#F83737"/>
												</svg>
												<span class="text-danger fs-14">+9% from last month</span>
											</div>
											<a href="javascript:void(0);" class="text-primary btn border mt-sm-0 mt-3">Download CSV</a>
										</div>
										<div class="tab-content" id="myTabContent2">
											<div class="tab-pane fade show active" id="user1" role="tabpanel">
												<canvas id="activity2" class="chartjs"></canvas>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header border-0">
										<h3 class="fs-20 text-black mb-0">Goal Statistic</h3>
										<div class="dropdown ml-auto">
											<div class="btn-link" data-toggle="dropdown">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="12" cy="5" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="19" r="2"></circle></g></svg>
											</div>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item text-black" href="javascript:;">Info</a>
												<a class="dropdown-item text-black" href="javascript:;">Details</a>
											</div>
										</div>
									</div>
									<div class="card-body row">
										<div class="col-md-6">
											<div id="chartCircle"></div>
											<div id="chartratio"></div>
										</div>
										<div class="col-md-6">
											<div>
												<div class="d-flex align-items-center pb-3 mb-3 border-bottom">
													<i class="lab la-instagram gs-icon bgl-secondary text-secondary mr-3"></i>
													<span class="text-black fs-16 font-w600">Instagram</span>
												</div>
												<div class="fs-14 mb-4">
													<ul class="d-flex justify-content-between pb-2">
														<li class="font-w500 text-dark">Ad Campaign</li>
														<li>6,788/8,000</li>
													</ul>
													<ul class="d-flex justify-content-between pb-2">
														<li class="font-w500 text-dark">Comments</li>
														<li>452/800</li>
													</ul>
													<ul class="d-flex justify-content-between pb-2">
														<li class="font-w500 text-dark">Likes</li>
														<li>8,325/10,000</li>
													</ul>
													<ul class="d-flex justify-content-between pb-2">
														<li class="font-w500 text-dark">Bookmarked</li>
														<li>5,622/5,000</li>
													</ul>
												</div>
											</div>
											<div>
												<div class="d-flex align-items-center pb-3 mb-3 border-bottom">
													<i class="lab la-facebook-f gs-icon bgl-info text-info mr-3"></i>
													<span class="text-black fs-16 font-w600">Facebook</span>
												</div>
												<div class="fs-14 mb-4">
													<ul class="d-flex justify-content-between pb-2">
														<li class="font-w500 text-dark">Ad Campaign</li>
														<li>6,788/8,000</li>
													</ul>
													<ul class="d-flex justify-content-between pb-2">
														<li class="font-w500 text-dark">Comments</li>
														<li>452/800</li>
													</ul>
													<ul class="d-flex justify-content-between pb-2">
														<li class="font-w500 text-dark">Likes</li>
														<li>8,325/10,000</li>
													</ul>
													<ul class="d-flex justify-content-between pb-2">
														<li class="font-w500 text-dark">Bookmarked</li>
														<li>5,622/5,000</li>
													</ul>
												</div>
											</div>
											<div>
												<div class="d-flex align-items-center pb-3 mb-3 border-bottom">
													<i class="lab la-twitter gs-icon bgl-success text-success mr-3"></i>
													<span class="text-black fs-16 font-w600">Twitter</span>
												</div>
												<div class="fs-14 mb-4">
													<ul class="d-flex justify-content-between pb-2">
														<li class="font-w500 text-dark">Ad Campaign</li>
														<li>6,788/8,000</li>
													</ul>
													<ul class="d-flex justify-content-between pb-2">
														<li class="font-w500 text-dark">Comments</li>
														<li>452/800</li>
													</ul>
													<ul class="d-flex justify-content-between pb-2">
														<li class="font-w500 text-dark">Likes</li>
														<li>8,325/10,000</li>
													</ul>
													<ul class="d-flex justify-content-between pb-2">
														<li class="font-w500 text-dark">Bookmarked</li>
														<li>5,622/5,000</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-xxl-12">
						<div class="row">
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header border-0">
										<h3 class="fs-20 text-black mb-0">ðŸ”¥ Most Performed Ads</h3>
										<div class="dropdown ml-auto">
											<div class="btn-link" data-toggle="dropdown">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="12" cy="5" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="19" r="2"></circle></g></svg>
											</div>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item text-black" href="javascript:;">Info</a>
												<a class="dropdown-item text-black" href="javascript:;">Details</a>
											</div>
										</div>
									</div>
									<div class="card-body pb-0 d-block">
										<div class="row mb-4 border-bottom sp10 align-items-center">
											<div class="mb-4 col-md-7 col-sm-6 col-xxl-5">
												<p class="text-primary mb-1">#ADS001245</p>
												<h3 class="fs-18 mb-2 text-ov"><a class="text-black" href="{!! url('/social-network-campaign'); !!}">50% OFF Floor Lamp Get it Now!</a></h3>
												<a href="javascript:;" class="lab la-facebook-f text-info mr-4"></a>
												<a href="javascript:;" class="lab la-instagram text-secondary scale5"></a>
											</div>
											<div class="d-flex col-md-5 col-sm-6 col-xxl-7 align-items-center justify-content-between">
												<div class="d-flex mb-4 align-items-center">
													<svg class="mr-3 mw-28" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M7.875 15.75H2.625C2.14175 15.75 1.75 16.1418 1.75 16.625V25.375C1.75 25.8582 2.14175 26.25 2.625 26.25H7.875C8.35825 26.25 8.75 25.8582 8.75 25.375V16.625C8.75 16.1418 8.35825 15.75 7.875 15.75Z" fill="#C6A564"/>
														<path d="M25.375 8.75H20.125C19.6418 8.75 19.25 9.14175 19.25 9.625V25.375C19.25 25.8582 19.6418 26.25 20.125 26.25H25.375C25.8582 26.25 26.25 25.8582 26.25 25.375V9.625C26.25 9.14175 25.8582 8.75 25.375 8.75Z" fill="#C6A564"/>
														<path d="M16.625 1.75H11.375C10.8918 1.75 10.5 2.14175 10.5 2.625V25.375C10.5 25.8582 10.8918 26.25 11.375 26.25H16.625C17.1082 26.25 17.5 25.8582 17.5 25.375V2.625C17.5 2.14175 17.1082 1.75 16.625 1.75Z" fill="#C6A564"/>
													</svg>
													<div>
														<h3 class="fs-20 text-black mb-0">$63.04</h3>
														<span class="fs-14">Conversion</span>
													</div>
												</div>
												<div class="d-flex mb-4 align-items-center">
													<svg class="mr-3 mw-28" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
														<g clip-path="url(#clip1)">
														<path d="M14.0001 18.3131C16.3808 18.3131 18.3108 16.3831 18.3108 14.0024C18.3108 11.6217 16.3808 9.69177 14.0001 9.69177C11.6194 9.69177 9.68945 11.6217 9.68945 14.0024C9.68945 16.3831 11.6194 18.3131 14.0001 18.3131Z" fill="#46A985"/>
														<path d="M27.5705 12.8083C24.257 8.80427 19.2413 4.95001 14.0001 4.95001C8.75776 4.95001 3.74086 8.80697 0.429583 12.8083C-0.143194 13.5002 -0.143194 14.5046 0.429583 15.1964C1.26208 16.2024 3.00735 18.1444 5.33834 19.8412C11.2089 24.1147 16.7783 24.1242 22.6618 19.8412C24.9928 18.1444 26.738 16.2024 27.5705 15.1964C28.1416 14.5059 28.1446 13.5025 27.5705 12.8083ZM14.0001 7.96747C17.3279 7.96747 20.035 10.6746 20.035 14.0024C20.035 17.3302 17.3279 20.0373 14.0001 20.0373C10.6722 20.0373 7.96514 17.3302 7.96514 14.0024C7.96514 10.6746 10.6722 7.96747 14.0001 7.96747Z" fill="#46A985"/>
														</g>
														<defs>
														<clipPath id="clip1">
														<rect width="28" height="28" fill="white"/>
														</clipPath>
														</defs>
													</svg>
													<div>
														<h3 class="fs-20 text-black mb-0">5,412k</h3>
														<span class="fs-14">Viewers</span>
													</div>
												</div>
											</div>
										</div>
										<div class="row mb-4 border-bottom sp10 align-items-center">
											<div class="mb-4 col-md-7 col-sm-6 col-xxl-5">
												<p class="text-primary mb-0">#ADS001245</p>
												<h3 class="fs-18 mb-3 text-ov"><a class="text-black" href="{!! url('/social-network-campaign'); !!}">$632 Target Gift Card on New Ye..</a></h3>
												<a href="javascript:;" class="lab la-facebook-f text-info mr-4"></a>
												<a href="javascript:;" class="lab la-instagram text-secondary scale5"></a>
											</div>
											<div class="d-flex col-md-5 col-sm-6 col-xxl-7 align-items-center justify-content-between">
												<div class="d-flex mb-4 align-items-center">
													<svg class="mr-3 mw-28" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M7.875 15.75H2.625C2.14175 15.75 1.75 16.1418 1.75 16.625V25.375C1.75 25.8582 2.14175 26.25 2.625 26.25H7.875C8.35825 26.25 8.75 25.8582 8.75 25.375V16.625C8.75 16.1418 8.35825 15.75 7.875 15.75Z" fill="#C6A564"/>
														<path d="M25.375 8.75H20.125C19.6418 8.75 19.25 9.14175 19.25 9.625V25.375C19.25 25.8582 19.6418 26.25 20.125 26.25H25.375C25.8582 26.25 26.25 25.8582 26.25 25.375V9.625C26.25 9.14175 25.8582 8.75 25.375 8.75Z" fill="#C6A564"/>
														<path d="M16.625 1.75H11.375C10.8918 1.75 10.5 2.14175 10.5 2.625V25.375C10.5 25.8582 10.8918 26.25 11.375 26.25H16.625C17.1082 26.25 17.5 25.8582 17.5 25.375V2.625C17.5 2.14175 17.1082 1.75 16.625 1.75Z" fill="#C6A564"/>
													</svg>
													<div>
														<h3 class="fs-20 text-black mb-0">$21.51</h3>
														<span class="fs-14">Conversion</span>
													</div>
												</div>
												<div class="d-flex mb-4 align-items-center">
													<svg class="mr-3 mw-28" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
														<g clip-path="url(#clip2)">
														<path d="M14.0001 18.3131C16.3808 18.3131 18.3108 16.3831 18.3108 14.0024C18.3108 11.6217 16.3808 9.69177 14.0001 9.69177C11.6194 9.69177 9.68945 11.6217 9.68945 14.0024C9.68945 16.3831 11.6194 18.3131 14.0001 18.3131Z" fill="#46A985"/>
														<path d="M27.5705 12.8083C24.257 8.80427 19.2413 4.95001 14.0001 4.95001C8.75776 4.95001 3.74086 8.80697 0.429583 12.8083C-0.143194 13.5002 -0.143194 14.5046 0.429583 15.1964C1.26208 16.2024 3.00735 18.1444 5.33834 19.8412C11.2089 24.1147 16.7783 24.1242 22.6618 19.8412C24.9928 18.1444 26.738 16.2024 27.5705 15.1964C28.1416 14.5059 28.1446 13.5025 27.5705 12.8083ZM14.0001 7.96747C17.3279 7.96747 20.035 10.6746 20.035 14.0024C20.035 17.3302 17.3279 20.0373 14.0001 20.0373C10.6722 20.0373 7.96514 17.3302 7.96514 14.0024C7.96514 10.6746 10.6722 7.96747 14.0001 7.96747Z" fill="#46A985"/>
														</g>
														<defs>
														<clipPath id="clip2">
														<rect width="28" height="28" fill="white"/>
														</clipPath>
														</defs>
													</svg>
													<div>
														<h3 class="fs-20 text-black mb-0">2,415k</h3>
														<span class="fs-14">Viewers</span>
													</div>
												</div>
											</div>
										</div>
										<div class="row mb-4 sp10 align-items-center">
											<div class="mb-4 col-md-7 col-sm-6 col-xxl-5">
												<p class="text-primary mb-0">#ADS001245</p>
												<h3 class="fs-18 mb-3 text-ov"><a class="text-black" href="{!! url('/social-network-campaign'); !!}">50% OFF Floor Lamp Get it Now!</a></h3>
												<a href="javascript:;" class="lab la-facebook-f text-info mr-4"></a>
												<a href="javascript:;" class="lab la-instagram text-secondary scale5"></a>
											</div>
											<div class="d-flex col-md-5 col-sm-6 col-xxl-7 align-items-center justify-content-between">
												<div class="d-flex mb-4 align-items-center">
													<svg class="mr-3 mw-28" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M7.875 15.75H2.625C2.14175 15.75 1.75 16.1418 1.75 16.625V25.375C1.75 25.8582 2.14175 26.25 2.625 26.25H7.875C8.35825 26.25 8.75 25.8582 8.75 25.375V16.625C8.75 16.1418 8.35825 15.75 7.875 15.75Z" fill="#C6A564"/>
														<path d="M25.375 8.75H20.125C19.6418 8.75 19.25 9.14175 19.25 9.625V25.375C19.25 25.8582 19.6418 26.25 20.125 26.25H25.375C25.8582 26.25 26.25 25.8582 26.25 25.375V9.625C26.25 9.14175 25.8582 8.75 25.375 8.75Z" fill="#C6A564"/>
														<path d="M16.625 1.75H11.375C10.8918 1.75 10.5 2.14175 10.5 2.625V25.375C10.5 25.8582 10.8918 26.25 11.375 26.25H16.625C17.1082 26.25 17.5 25.8582 17.5 25.375V2.625C17.5 2.14175 17.1082 1.75 16.625 1.75Z" fill="#C6A564"/>
													</svg>
													<div>
														<h3 class="fs-20 text-black mb-0">$67.44</h3>
														<span class="fs-14">Conversion</span>
													</div>
												</div>
												<div class="d-flex mb-4 align-items-center">
													<svg class="mr-3 mw-28" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
														<g clip-path="url(#clip3)">
														<path d="M14.0001 18.3131C16.3808 18.3131 18.3108 16.3831 18.3108 14.0024C18.3108 11.6217 16.3808 9.69177 14.0001 9.69177C11.6194 9.69177 9.68945 11.6217 9.68945 14.0024C9.68945 16.3831 11.6194 18.3131 14.0001 18.3131Z" fill="#46A985"/>
														<path d="M27.5705 12.8083C24.257 8.80427 19.2413 4.95001 14.0001 4.95001C8.75776 4.95001 3.74086 8.80697 0.429583 12.8083C-0.143194 13.5002 -0.143194 14.5046 0.429583 15.1964C1.26208 16.2024 3.00735 18.1444 5.33834 19.8412C11.2089 24.1147 16.7783 24.1242 22.6618 19.8412C24.9928 18.1444 26.738 16.2024 27.5705 15.1964C28.1416 14.5059 28.1446 13.5025 27.5705 12.8083ZM14.0001 7.96747C17.3279 7.96747 20.035 10.6746 20.035 14.0024C20.035 17.3302 17.3279 20.0373 14.0001 20.0373C10.6722 20.0373 7.96514 17.3302 7.96514 14.0024C7.96514 10.6746 10.6722 7.96747 14.0001 7.96747Z" fill="#46A985"/>
														</g>
														<defs>
														<clipPath id="clip3">
														<rect width="28" height="28" fill="white"/>
														</clipPath>
														</defs>
													</svg>
													<div>
														<h3 class="fs-20 text-black mb-0">7,345k</h3>
														<span class="fs-14">Viewers</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h3 class="fs-20 text-black mb-0">Ads Engagement</h3>
										<div class="dropdown ml-auto">
											<div class="btn-link" data-toggle="dropdown">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="12" cy="5" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="19" r="2"></circle></g></svg>
											</div>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item text-black" href="javascript:;">Info</a>
												<a class="dropdown-item text-black" href="javascript:;">Details</a>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div id="columnChart"></div>	
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card widget-stat ">
									<div class="card-body p-4">
										<div class="media align-items-center">
											<div class="media-body">
												<p class="fs-18 mb-2 wspace-no">Total Campaign</p>
												<h1 class="fs-36 font-w600 text-black mb-0">67,124</h1>
											</div>
											<span class="ml-3 bg-primary text-white">
												<i class="flaticon-381-promotion"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card widget-stat">
									<div class="card-body p-4">
										<div class="media align-items-center">
											<div class="media-body">
												<p class="fs-18 mb-2 wspace-no">Total Audience</p>
												<h1 class="fs-36 font-w600 d-flex align-items-center text-black mb-0">412,531</h1>
											</div>
											<span class="ml-3 bg-primary text-white">
												<i class="flaticon-381-user-7"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card widget-stat">
									<div class="card-body p-4">
										<div class="media align-items-center">
											<div class="media-body">
												<p class="fs-18 mb-2 wspace-no">Spends Yesterday</p>
												<h1 class="fs-36 font-w600 text-black mb-0">$4,567</h1>
											</div>
											<span class="ml-3 bg-primary text-white">
												<i class="fa fa-usd"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card widget-stat">
									<div class="card-body p-4">
										<div class="media align-items-center">
											<div class="media-body">
												<p class="fs-18 mb-2 wspace-no">Spends Today</p>
												<h1 class="fs-36 font-w600 text-black mb-0">$5,245</h1>
											</div>
											<span class="ml-3 bg-primary text-white">
												<i class="flaticon-381-calendar-1"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-12">
								<div class="card widget-stat">
									<div class="card-header border-0">
										<h3 class="fs-20 text-black mb-0">Treding Ads</h3>
										<div class="dropdown ml-auto">
											<div class="btn-link" data-toggle="dropdown">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="12" cy="5" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="19" r="2"></circle></g></svg>
											</div>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item text-black" href="javascript:;">Info</a>
												<a class="dropdown-item text-black" href="javascript:;">Details</a>
											</div>
										</div>
									</div>
									<div class="card-body pb-0">
										<div class="row pb-4 mb-4 border-bottom align-items-center">
											<div class="col-6">
												<h4 class="fs-18 text-ov"><a class="text-black" href="{!! url('/social-network-campaign'); !!}">Game Online Vouchers 20% OFF</a></h4>
												<span class="fs-14 text-ov">Published on 5 June 2020</span>
											</div>
											<div class="col-6 d-flex align-items-center">
												<svg class="mr-3 ml-auto" width="89" height="46" viewBox="0 0 89 46" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M26.0681 24.5C15.8708 19.8496 4.32677 34.0099 2 40.8994L2.60932 46H87V2C70.2437 4.5 70.2437 13.5 56.534 29.5C43.9117 44.231 38.8148 30.313 26.0681 24.5Z" fill="#52B141" fill-opacity="0.33"/>
													<path d="M2 41C4.32677 34.0927 15.8708 19.8958 26.0681 24.5582C38.8148 30.3863 43.9117 44.3403 56.534 29.5711C70.2437 13.5297 70.2437 4.50647 87 2" stroke="#52B141" stroke-width="4" stroke-linecap="round"/>
												</svg>
												<div>
													<h4 class="fs-20 text-black">672k</h4>
													<span class="fs-14">Visitors</span>
												</div>
											</div>
										</div>
										<div class="row pb-4 mb-4 border-bottom align-items-center">
											<div class="col-6">
												<h4 class="fs-18 text-ov"><a class="text-black" href="{!! url('/social-network-campaign'); !!}">15% OFF Granite Stone</a></h4>
												<span class="fs-14 text-ov">Published on 5 June 2020</span>
											</div>
											<div class="col-6 d-flex align-items-center">
												<svg class="mr-3 ml-auto" width="89" height="46" viewBox="0 0 89 46" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M62.9319 24.5C73.1292 19.8496 84.6732 34.0099 87 40.8994L86.3907 46H2V2C18.7563 4.5 18.7563 13.5 32.466 29.5C45.0883 44.231 50.1852 30.313 62.9319 24.5Z" fill="#F83737" fill-opacity="0.11"/>
													<path d="M87 41C84.6732 34.0927 73.1292 19.8958 62.9319 24.5582C50.1852 30.3863 45.0883 44.3403 32.466 29.5711C18.7563 13.5297 18.7563 4.50647 2 2" stroke="#F83737" stroke-width="4" stroke-linecap="round"/>
												</svg>
												<div>
													<h4 class="fs-20 text-black">672k</h4>
													<span class="fs-14">Visitors</span>
												</div>
											</div>
										</div>
										<div class="row pb-4 border-bottom align-items-center">
											<div class="col-6">
												<h4 class="fs-18 text-ov"><a class="text-black" href="{!! url('/social-network-campaign'); !!}">50% OFF Floor Lamp Get it Now!</a></h4>
												<span class="fs-14 text-ov">Published on 5 June 2020</span>
											</div>
											<div class="col-6 d-flex align-items-center">
												<svg class="mr-3 ml-auto" width="89" height="46" viewBox="0 0 89 46" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M26.0681 24.5C15.8708 19.8496 4.32677 34.0099 2 40.8994L2.60932 46H87V2C70.2437 4.5 70.2437 13.5 56.534 29.5C43.9117 44.231 38.8148 30.313 26.0681 24.5Z" fill="#52B141" fill-opacity="0.33"/>
													<path d="M2 41C4.32677 34.0927 15.8708 19.8958 26.0681 24.5582C38.8148 30.3863 43.9117 44.3403 56.534 29.5711C70.2437 13.5297 70.2437 4.50647 87 2" stroke="#52B141" stroke-width="4" stroke-linecap="round"/>
												</svg>
												<div>
													<h4 class="fs-20 text-black">672k</h4>
													<span class="fs-14">Visitors</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
			
@endsection			