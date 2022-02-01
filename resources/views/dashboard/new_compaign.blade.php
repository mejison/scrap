{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
            <!-- row -->
			<div class="container-fluid">
				<div class="form-head d-flex mb-2 mb-sm-3 mb-lg-5 align-items-center">
					<div class="mr-auto d-none d-lg-block">
						<h2 class="text-black font-w600">New Campaign</h2>
						<div>
							<a href="javascript:void(0);" class="fs-18 text-primary font-w600">Campaign / </a>
							<a href="javascript:void(0);" class="fs-18">Add new campaign</a>
						</div>
					</div>
					<div>
						<a href="javascript:void(0);" class="btn btn-outline-primary">PREVIEW</a>
						<a href="javascript:void(0);" class="btn btn-primary ml-3">PUBLISH</a>
					</div>
				</div>	
                <div class="row">
					<div class="col-xl-9 col-xxl-8 col-lg-8">
						<div class="row">
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header pb-0 border-0">
										<h3 class="fs-20 text-black">Describe your campaign bellow</h3>
									</div>
									<div class="card-body">
										<form>
											<div class="form-row">
												<div class="form-group col-xl-12">
													<label class="text-black font-w500 mb-3">Ad Name</label><span class="text-danger ml-1">*</span>
													<input type="text" class="form-control" placeholder="Promotion Ads">
												</div>
												<div class="form-group col-xl-12">
													<label class="text-black font-w500 mb-3">Ad Title</label><span class="text-danger ml-1">*</span>
													<input type="text" class="form-control" placeholder="Get 70% OFF Discount from Westoreid">
												</div>
												<div class="form-group col-xl-12">
													<label class="text-black font-w500 mb-3">Description</label><span class="text-danger ml-1">*</span>
													<textarea class="form-control" rows="13">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
													Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum 
													</textarea>
												</div>	
												<div class="form-group col-xl-12">
													<label class="text-black font-w500 mb-3">Tags</label><span class="text-danger ml-1">*</span>
													<input type="text" class="form-control tags_input" value="html,css,bootstrap,photoshop"/>
												</div>	
												<div class="form-group col-xl-12">
													<div class="row">
														<div class="col-lg-6 mb-4">
															<label class="text-black font-w500 mb-3">Set Daily Budget</label><span class="text-danger ml-1">*</span>
															<input type="text" class="form-control fs-24 text-center text-black mb-3" placeholder="" value="1000">
															<div class="btn-group budget-check" data-toggle="buttons">
																<label class="btn btn-outline-primary light btn-sm">
																	<input type="radio" class="position-absolute invisible" name="options" id="option5"> $200
																</label>
																<label class="btn btn-outline-primary light btn-sm">
																	<input type="radio" class="position-absolute invisible" name="options" id="option1" checked="">$500
																</label>
																<label class="btn btn-outline-primary light btn-sm active">
																	<input type="radio" class="position-absolute invisible" name="options" id="option2"> $1,000
																</label>
																<label class="btn btn-outline-primary light btn-sm">
																	<input type="radio" class="position-absolute invisible" name="options" id="option3"> $2000
																</label>
																<label class="btn btn-outline-primary light btn-sm">
																	<input type="radio" class="position-absolute invisible" name="options" id="option4"> $5000
																</label>
															</div>
														</div>
														<div class="col-lg-6">
															<label class="text-black font-w500 mb-3">Total Budget</label><span class="text-danger ml-1">*</span>
															<div class="input-element">
																<div class="inputs mb-4">
																	<input class="form-control fs-24 text-center text-black" type="number" min="-20" max="40" step="1" id="input-number">
																</div>
																<div id="html5"></div>
																<div class="d-flex align-items-center justify-content-between text-black">
																	<span>$0</span>
																	<span>$100</span>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div class="col-xl-12">
								<div class="card">
									<div class="card-body pb-0">
										<div class="row">
											<div class="col-xl-6">
												<div class="form-group col-xl-12 p-0">
													<label class="text-black font-w500 mb-3">Date Start</label>
													<input type="date" class="form-control">
												</div>
											</div>
											<div class="col-xl-6">
												<div class="form-group col-xl-12 p-0">
													<label class="text-black font-w500 mb-3">Date End</label>
													<input type="date" class="form-control">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-4 col-lg-4">
						<div class="row">
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h3 class="text-black fs-20">Images</h3>
										<a class="btn btn-link fs-18 pr-0" href="javascript:void(0);">+Upload</a>
									</div>
									<div class="card-body">
										<div class="bgl-primary p-3 text-black rounded">
											Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h3 class="text-black fs-20">Social Media Stream</h3>
										<a class="btn btn-link text-dark fs-18 pr-0" href="javascript:void(0);">Clear</a>
									</div>
									<div class="card-body">
										<div class="d-flex mb-3 align-items-center justify-content-between">
											<div class="d-flex">
												<div class="custom-control custom-checkbox mr-2">
													<input type="checkbox" class="custom-control-input" id="customCheckBox7" required="">
													<label class="custom-control-label" for="customCheckBox7"></label>
												</div>
												<span class="text-black font-w600">Instagram</span>
											</div>
											<i class="lab la-instagram social-icon bg-secondary text-white"></i>
										</div>
										<div class="d-flex mb-3 align-items-center justify-content-between">
											<div class="d-flex">
												<div class="custom-control custom-checkbox mr-2">
													<input type="checkbox" class="custom-control-input" id="customCheckBox71" required="">
													<label class="custom-control-label" for="customCheckBox71"></label>
												</div>
												<span class="text-black font-w600">Facebook</span>
											</div>
											<i class="lab la-facebook-f social-icon bg-info text-white"></i>
										</div>
										<div class="d-flex mb-3 align-items-center justify-content-between">
											<div class="d-flex">
												<div class="custom-control custom-checkbox mr-2">
													<input type="checkbox" class="custom-control-input" id="customCheckBox72" required="">
													<label class="custom-control-label" for="customCheckBox72"></label>
												</div>
												<span class="text-black font-w600">Twitter</span>
											</div>
											<i class="lab la-twitter social-icon bg-success text-white"></i>
										</div>
										<div class="d-flex align-items-center justify-content-between">
											<div class="d-flex">
												<div class="custom-control custom-checkbox mr-2">
													<input type="checkbox" class="custom-control-input" id="customCheckBox73" required="">
													<label class="custom-control-label" for="customCheckBox73"></label>
												</div>
												<span class="text-black font-w600">Youtube</span>
											</div>
											<i class="lab la-youtube social-icon bg-danger text-white"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
			
@endsection			