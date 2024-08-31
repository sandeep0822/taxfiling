@extends('main.includes.web_page')
@section('content')
 <!-- Start login modal popup -->
 <div class="modal fade" id="forgetpassword" tabindex="-1" role="dialog" aria-labelledby="forgetpasswordLabel"
 aria-hidden="true">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title text-light font-weight-bold" id="forgetpasswordLabel">
                 <img src="{{ asset('images/logo-2.png') }}" width="200px"
                     alt="grand tax filers logo" />
             </h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <div class="modal-body">
             @if (session('forget_password_error'))
                 <div class="alert alert-danger">
                     {{ session('forget_password_error') }}
                 </div>
             @endif
             <form action="{{ route('reset.password.post') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group row">
                    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                    <div class="col-md-6">
                        <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                    <div class="col-md-6">
                        <input type="password" id="password" class="form-control" name="password" required autofocus>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                    <div class="col-md-6">
                        <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autofocus>
                        @if ($errors->has('password_confirmation'))
                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Reset Password
                    </button>
                </div>
            </form>
         </div>
     </div>
 </div>
</div>
		<!-- //footer -->
		<script src="js/jquery-3.5.1.min.js"></script>
		<script src="js/bootstrap.bundle.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/aos.js"></script>
		<script src="js/scripts.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
		<script>
			$(document).ready(function() {
				$("#testimonial-slider").owlCarousel({
					items: 2,
					itemsDesktop: [1000, 2],
					itemsDesktopSmall: [979, 2],
					itemsTablet: [768, 1],
					pagination: false,
					navigation: true,
					navigationText: ["", ""],
					autoPlay: true
				});
			});
		</script>
		<script>
			function aos_init() {
				AOS.init({
					duration: 1000,
					once: true
				});
			}
			$(window).on('load', function() {
				aos_init();
			});
		</script>
		<!-- table -->
		<script>
			$(document).ready(function() {
				$('tbody').scroll(function(e) {
					$('thead').css("left", -$("tbody").scrollLeft()); //fix the thead relative to the body scrolling
					$('thead th:nth-child(1)').css("left", $("tbody").scrollLeft()); //fix the first cell of the header
					$('tbody td:nth-child(1)').css("left", $("tbody").scrollLeft()); //fix the first column of tdbody
				});
			});
		</script>
		<script>
			$(window).on('load', function() {
				setTimeout(function() {
					$('#myModal').modal('show')
				}, 5000)
			});
		</script>
        <script>
            $('#forgetpassword').modal('show')
        </script>
@endsection
