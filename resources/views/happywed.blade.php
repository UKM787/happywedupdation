	@extends('layouts.host')
	@section('content')
		<!-- Modal -->

	<div class="modal fade my-account-bx" id="signup" tabindex="-1" role="dialog" aria-labelledby="signup" aria-hidden="true">

		<button type="button" class="close" data-dismiss="modal" aria-label="Close">

			<span aria-hidden="true">&times;</span>

		</button>

		<div class="modal-dialog" role="document">

			<div class="modal-content">

				<h2 class="title">Sign Up Your Account</h2>

				<form action="my-account/">

					<div class="form-group">

						<input type="email" class="form-control" placeholder="Email Address">

					</div>

					<div class="form-group">

						<input type="password" class="form-control" placeholder="Password">

					</div>

					<div class="form-group">

						<button type="submit" class="btn btn-block gradient">Sign up</button>

					</div>

					<div class="form-group">

						<a href="my-account/" class="btn facebook btn-block"><i class="fa fa-facebook m-r10"></i>Continue with Facebook</a>

					</div>

					<div class="form-group">

						<a href="my-account/" class="btn google-plus btn-block"><i class="fa fa-google m-r10"></i>Continue with Google</a>

					</div>

					<div class="sign-text">

						<span class="">"Already have a Happy wed Account?" <a href="#">LOGIN</a></span>

					</div>

				</form>

			</div>

		</div>

	</div>

	<div class="modal fade my-account-bx" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">

		<button type="button" class="close" data-dismiss="modal" aria-label="Close">

			<span aria-hidden="true">&times;</span>

		</button>

		<div class="modal-dialog" role="document">

			<div class="modal-content">

				<h2 class="title">Login Your Account</h2>

				<form action="my-account/">

					<div class="form-group">

						<input type="email" class="form-control" placeholder="Email Address">

					</div>

					<div class="form-group">

						<input type="password" class="form-control" placeholder="Password">

						<div class="reset-password">

							<a class="btn-link collapsed" data-toggle="collapse" href="#reset-password" role="button" aria-expanded="false" aria-controls="reset-password">Reset password?</a>

						</div>

					</div>

					<div class="form-group">

						<button type="submit" class="btn btn-block gradient">Login</button>

					</div>

					<div class="form-group">

						<a href="my-account/" class="btn facebook btn-block"><i class="fa fa-facebook m-r10"></i> Log in with Facebook</a>

					</div>

					<div class="form-group">

						<a href="my-account/" class="btn google-plus btn-block"><i class="fa fa-google m-r10"></i>Log in with Google</a>

					</div>

					<div class="sign-text">

						<span class="">Don't have a Happy wed account? <a href="#">Sign up</a></span>

					</div>

				</form>

			</div>

			<div class="modal-content collapse reset-password" id="reset-password">

				<h2 class="title">Reset password?</h2>

				<form>

					<div class="form-group password-icon-bx">

						<i class="fa fa-lock"></i>

						<p>Enter your email address associated with your account, and we'll email you a link to reset your password...</p>

					</div>

					<div class="form-group">

						<input type="email" class="form-control" placeholder="Enter email address">

					</div>

					<div class="form-group">

						<button type="submit" class="btn btn-block gradient">Send reset link</button>

					</div>

					<div class="sign-text">

						<span class=""><a data-toggle="collapse" href="#reset-password" role="button" aria-expanded="false" aria-controls="reset-password">Back</a></span>

					</div>

				</form>

			</div>

		</div>

	</div>

	<!-- Modal End -->

    <!-- Content -->

    <div class="page-content bg-white">

        <!-- Section Banner -->

		<div class="dlab-bnr-inr text-center home-banner dlab-bnr-inr-sm overlay-black-dark" id="app-banner" style="background-image:url(images/banner/bnr1.jpg); background-size: cover;">

            <div class="container">

                <div class="dlab-bnr-inr-entry align-m">

					<div class="bnr-content">

						<div class="icon-bx">

							<img src="images/icon/icon3/icon1.png" alt="">

						</div>

						<h2 class="title">Your Free Happy wed App</h2>

						<a href="#" class="btn btn-md gradient radius-xl" data-toggle="modal" data-target="#login"><img src="images/icon/icon3/icon2.png" class="m-r5"  alt=""> Plan Your Wedding</a>

					</div>

				</div>

            </div>

        </div>

		<!-- Section Banner END -->

		<!-- Manager Tools -->

		<div class="section-full bg-gray content-inner" style="background-image: url(images/background/bg1.png); background-size: cover; background-position: right bottom;">

			<div class="container">

				<div class="section-head text-center">

					<h2 class="box-title text-italic">Happy wed Tools</h2>

				</div>

				<div class="row">

					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6  wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">

						<div class="planning-tools style1 text-center m-b30">

							<div class="icon-bx">

								<img alt="" src="images/icon/icon2/icon3.png">

							</div>

							<div class="content-bx">

								<h5 class="title text-black">Guestlists</h5>

								<p>Easily track invitations, RSVPs, and guest info all in one place.</p>

								<a href="planner-guest-list/" class="btn gradient radius-xl">Read More</a>

							</div>

						</div>

					</div>

					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">

						<div class="planning-tools style1 text-center m-b30">

							<div class="icon-bx">

								<img alt="" src="images/icon/icon2/icon4.png">

							</div>

							<div class="content-bx">

								<h5 class="title text-black">Checklist</h5>

								<p>Easily track invitations, RSVPs, and guest info all in one place.</p>

								<a href="planner-checklist-select-date/" class="btn gradient radius-xl">Read More</a>

							</div>

						</div>

					</div>

					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.6s">

						<div class="planning-tools style1 text-center m-b30">

							<div class="icon-bx">

								<img alt="" src="images/icon/icon2/icon5.png">

							</div>

							<div class="content-bx">

								<h5 class="title text-black">Budget</h5>

								<p>Easily track invitations, RSVPs, and guest info all in one place.</p>

								<a href="planner-budget-select/" class="btn gradient radius-xl">Read More</a>

							</div>

						</div>

					</div>

					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.8s">

						<div class="planning-tools style1 text-center m-b30">

							<div class="icon-bx">

								<img alt="" src="images/icon/icon2/icon6.png">

							</div>

							<div class="content-bx">

								<h5 class="title text-black">Shortlist</h5>

								<p>Easily track invitations, RSVPs, and guest info all in one place.</p>

								<a href="planner-shortlist/" class="btn gradient radius-xl">Read More</a>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

		<!-- Manager Tools End -->

		<!-- Venue Search Box -->

		<div class="section-full bg-gray content-inner overlay-black-dark wow fadeIn" id="app-search" data-wow-duration="2s" data-wow-delay="0.3s" style="background-image: url(images/background/bg4.jpg); background-size: cover; background-position: right bottom;">

			<div class="container">

				<div class="row">

					<div class="col-lg-12">

						<div class="section-head venue-search-title text-center">

							<h2 class="box-title text-italic">Search the INDIA`s favourite wedding suppliers by category, location or name</h2>

						</div>

					</div>

					<div class="col-lg-12">

						<!-- Search Filter -->

						<div class="search-filter style1">

							<div class="container">

								<form class="filter-form" action="wedding-venues-search/">

									<div class="row sp10">

										<div class="col-lg-4 col-md-6 col-sm-6">

											<input type="text" class="form-control" placeholder="We’re looking for">

										</div>

										<div class="col-lg-3 col-md-6 col-sm-6">

											<input type="text" class="form-control" placeholder="Near">

										</div>

										<div class="col-lg-3 col-md-6 col-sm-6">

											<input type="text" class="form-control" placeholder="Or Called">

										</div>

										<div class="col-lg-2 col-md-6 col-sm-6 d-flex">

											<button class="btn btn-block radius-xl text-uppercase"> Search</button>

										</div>

									</div>

								</form>

							</div>

						</div>

						<!-- Search Filter END -->

					</div>

				</div>

				<div class="section-head venue-search-list-title text-center">

					<div class="separate gradient"></div>

					<h2 class="box-title text-gradient">Popular venue searches</h2>

				</div>

				<div class="row venue-search-list">

					<div class="col-lg-3 col-md-3 col-6">

						<ul>

							<li><a href="wedding-venues-search/">Essex</a></li>

							<li><a href="wedding-venues-search/">Kent</a></li>

							<li><a href="wedding-venues-search/">Surrey</a></li>

							<li><a href="wedding-venues-search/">Hampshire</a></li>

						</ul>

					</div>

					<div class="col-lg-3 col-md-3 col-6">

						<ul>

							<li><a href="wedding-venues-search/">Hertfordshire</a></li>

							<li><a href="wedding-venues-search/">Yorkshire</a></li>

							<li><a href="wedding-venues-search/">Buckinghamshire</a></li>

							<li><a href="wedding-venues-search/">Lancashire</a></li>

						</ul>

					</div>

					<div class="col-lg-3 col-md-3 col-6">

						<ul>

							<li><a href="wedding-venues-search/">West Midlands</a></li>

							<li><a href="wedding-venues-search/">Leicestershire</a></li>

							<li><a href="wedding-venues-search/">Northamtonshire</a></li>

							<li><a href="wedding-venues-search/">Oxfordshire</a></li>

						</ul>

					</div>

					<div class="col-lg-3 col-md-3 col-6">

						<ul>

							<li><a href="wedding-venues-search/">London</a></li>

							<li><a href="wedding-venues-search/">Scotland</a></li>

							<li><a href="wedding-venues-search/">Northern Ireland</a></li>

							<li><a href="wedding-venues-search/">Wales</a></li>

						</ul>

					</div>

				</div>

			</div>

		</div>

		<!-- Venue Search End -->

		<!-- Testimonials Box -->

		<div class="section-full bg-gray content-inner-2 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.3s" style="background-image: url(images/background/bg5.jpg); background-size: cover; background-position: right bottom;">

			<div class="container-fluid testimonials-section">

				<div class="row">

					<div class="col-lg-12">

						<div class="section-head text-center">

							<h2 class="box-title text-black text-italic"> The easiest way to plan <br/>your wedding</h2>

						</div>

					</div>

				</div>

				<div class="testimonials-carousel owl-carousel owl-theme">

					<div class="testimonials-box">

						<p>When I first started my Happy wed, I had no idea where to begin! But by using Happy wed I have been able to search for all of my suppliers, as well as organise my guestlist, checklist and budget. I now feel so much more relaxed about the wedding!</p>

						<h5 class="testimonials-name">- Alexia L. & Sam</h5>

						<div class="quote">

							<img src="images/quote.png" alt="">

						</div>

					</div>

					<div class="testimonials-box">

						<p>When I first started my Happy wed, I had no idea where to begin! But by using Happy wed I have been able to search for all of my suppliers, as well as organise my guestlist, checklist and budget. I now feel so much more relaxed about the wedding!</p>

						<h5 class="testimonials-name">- Alexia L. & Sam</h5>

						<div class="quote">

							<img src="images/quote.png" alt="">

						</div>

					</div>

					<div class="testimonials-box">

						<p>When I first started my Happy wed, I had no idea where to begin! But by using Happy wed I have been able to search for all of my suppliers, as well as organise my guestlist, checklist and budget. I now feel so much more relaxed about the wedding!</p>

						<h5 class="testimonials-name">- Alexia L. & Sam</h5>

						<div class="quote">

							<img src="images/quote.png" alt="">

						</div>

					</div>

				</div>

			</div>

		</div>

		<!-- Testimonials End -->

		<!-- Insightful Inspiration -->

		<div class="section-full bg-gray content-inner-2" style="background-image: url(images/background/bg3.jpg); background-size: cover; background-position: right bottom;">

			<div class="container">

				<div class="row">

					<div class="col-lg-6 col-md-6 d-flex wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.4s">

						<div class="inspiration-box align-self-center">

							<h2 class="title text-black">Insightful inspiration</h2>

							<p>Whether you're a fan of dreamy white weddings or care-free bohemian celebrations, you'll find tips, tricks, and inspiration to guide you through every stage of your Happy wed. Who better to guide you than some of our illustrious experts like Mary Berry and Bobbi Brown?</p>

							<a href="wedding-ideas-inspiration/" class="btn gradient btn-md radius-xl">Discover endless inspiration</a>

						</div>

					</div>

					<div class="col-lg-6 col-md-6 d-flex wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.8s">

						<div class="align-self-center">

							<img alt="" src="images/pic4.png" class="out-img img-wave" >

						</div>

					</div>

				</div>

			</div>

		</div>

		<!-- Insightful Inspiration End -->

		<!-- Apps Store -->

		<div class="section-full content-inner-1 apps-box overlay-black-dark" id="app-mobile" style="background-image: url(images/background/bg2.jpg); background-size: cover;">

			<div class="container">

				<div class="row col-md-revers">

					<div class="col-lg-6 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.3s">

						<img src="images/pic3.png" alt="">

					</div>

					<div class="col-lg-6 d-flex wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.6s">

						<div class="align-self-center p-a30 app-info text-white">

							<h2 class="title">Plan anywhere, anytime</h2>

							<p>Happy wed app is designed with busy modern couples like you in mind. You can now both simultaneously plan your wedding on the go, wherever that might be! Never lose track of your planning again with Happy wed.</p>

							<a href="#" class="m-r10 m-b10"><img src="images/app1.png" alt=""></a>

							<a href="#"><img src="images/app2.png" alt=""></a>

						</div>

					</div>

				</div>

			</div>

		</div>

		<!-- Apps Store End -->

		<!-- Expert Advice -->

		<div class="section-full bg-white content-inner expert-advice" style="background-image:url(images/background/bg6.jpg); background-size: cover; background-position: left bottom;">

			<div class="container">

				<div class="row">

					<div class="col-lg-6 col-md-12 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.3s">

						<div class="section-head">

							<h2 class="box-title text-gradient">Wedding Ideas and Expert Advice</h2>

							<p>Get inspired with creative ideas, expert advice and amazing real weddings</p>

							<div class="separate gradient"></div>

						</div>

						<ul class="expert-advice-list">

							<li>Expert Tips from a trusted team of pros...serious professionals like Bobbi Brown, Mary Berry, Jimmy Choo, Bodyism, La Perla, Harrods and more!</li>

							<li>Real Weddings to help you get some ideas (and related supplier links) for your own wedding</li>

							<li>‘How To’ Tips as your wedding guide so you feel confident in picking suppliers and choosing wedding details</li>

						</ul>

					</div>

					<div class="col-lg-6 col-md-12 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.6s">

						<img src="images/pic2.png" class="img-wave" alt="">

					</div>

				</div>

			</div>

		</div>

		<!-- Expert Advice End -->

		<!-- Call To Action -->

		<div class="section-full content-inner-2 overlay-black-dark bg-img-fix" id="app-today" style="background-image: url(images/background/bg1.jpg); background-size: cover;">

			<div class="container">

				<div class="row">

					<div class="col-lg-12 text-center">

						<a href="javascript:void(0)" class="btn btn-md gradient radius-xl">Start today, it's free</a>

					</div>

				</div>

			</div>

		</div>

		<!-- Call To Action End -->

		<!-- Weddings Services Box End -->

		<div class="section-full bg-gray content-inner">

			<div class="container">

				<div class="row">

					<div class="col-lg-3 col-md-6 col-sm-6 col-6 m-b30 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">

						<div class="wedding-services">

							<div class="icon-bx">

								<img src="images/icon/icon2/icon1.png" alt="">

							</div>

							<div class="content-bx">

								<a class="title" href="wedding-venues-search/">Search</a>

							</div>

						</div>

					</div>

					<div class="col-lg-3 col-md-6 col-sm-6 col-6 m-b30 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">

						<div class="wedding-services">

							<div class="icon-bx">

								<img src="images/icon/icon2/icon2.png" alt="">

							</div>

							<div class="content-bx">

								<a class="title" href="wedding-planning-tools/">Manager Tools</a>

							</div>

						</div>

					</div>

					<div class="col-lg-3 col-md-6 col-sm-6 col-6 m-b30 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.6s">

						<div class="wedding-services">

							<div class="icon-bx">

								<img src="images/icon/icon2/icon3.png" alt="">

							</div>

							<div class="content-bx">

								<a class="title" href="planner-guest-list/">Guestlist</a>

							</div>

						</div>

					</div>

					<div class="col-lg-3 col-md-6 col-sm-6 col-6 m-b30 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.8s">

						<div class="wedding-services">

							<div class="icon-bx">

								<img src="images/icon/icon2/icon4.png" alt="">

							</div>

							<div class="content-bx">

								<a class="title" href="planner-checklist-select-date/">Checklist</a>

							</div>

						</div>

					</div>

					<div class="col-lg-3 col-md-6 col-sm-6 col-6 m-b30 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">

						<div class="wedding-services">

							<div class="icon-bx">

								<img src="images/icon/icon2/icon5.png" alt="">

							</div>

							<div class="content-bx">

								<a class="title" href="planner-budget-select/">Budget</a>

							</div>

						</div>

					</div>

					<div class="col-lg-3 col-md-6 col-sm-6 col-6 m-b30 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">

						<div class="wedding-services">

							<div class="icon-bx">

								<img src="images/icon/icon2/icon6.png" alt="">

							</div>

							<div class="content-bx">

								<a class="title" href="planner-shortlist/">Shortlist</a>

							</div>

						</div>

					</div>

					<div class="col-lg-3 col-md-6 col-sm-6 col-6 m-b30 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.6s">

						<div class="wedding-services">

							<div class="icon-bx">

								<img src="images/icon/icon2/icon7.png" alt="">

							</div>

							<div class="content-bx">

								<a class="title" href="planner-advice/">Advice</a>

							</div>

						</div>

					</div>

					<div class="col-lg-3 col-md-6 col-sm-6 col-6 m-b30 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.8s">

						<div class="wedding-services">

							<div class="icon-bx">

								<img src="images/icon/icon2/icon8.png" alt="">

							</div>

							<div class="content-bx">

								<a class="title" href="wedding-gift-lists/">Gift Lists</a>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

		<!-- Manager Tools End -->

    </div>

    <!-- Content END-->
	@endsection
