<?php
include 'header.php';
?>

<!-- login -->
<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6 text-center mb-5">
				<h2 class="heading-section">Login</h2>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-12 col-lg-10">
				<div class="wrap d-md-flex">
					<div class="img" style="background-image: url(images/bg-1.jpg);">
					</div>
					<div class="login-wrap p-4 p-md-5">
						<div class="d-flex">
							<div class="w-100">
								<h3 class="mb-4">Sign In</h3>
							</div>
							<div class="w-100">
								<p class="social-media d-flex justify-content-end">
									<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
									<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
								</p>
							</div>
						</div>
						<form action="../proses.php?id=login" class="signin-form" method="post">
							<div class="form-group mb-3">
								<label class="label" for="name">Username</label>
								<input type="text" class="form-control" placeholder="Username" required name="user">
							</div>
							<div class="form-group mb-3">
								<label class="label" for="password">Password</label>
								<input type="password" class="form-control" placeholder="Password" required name="pass">
							</div>
							<div class="form-group">
								<button type="submit" class="form-control btn bg-success rounded submit px-3 text-white">Sign In</button>

							</div>

						</form>
						<a href="../index.php" class="btn btn-danger fa fa-chevron-left"></a>
						<p class="text-center">Not a member? <a data-toggle="modal" data-target="#modelId" class="btn">Sign Up</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- registrasi -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Daftar Pengguna</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="../proses.php?id=daftar">
					<div class="form-group">
						<label for="">Username</label>
						<input type="text" name="user" id="" class="form-control" required placeholder="" aria-describedby="helpId">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="password" name="pass" id="" class="form-control" required placeholder="" aria-describedby="helpId">
					</div>
			</div>
			<div class="modal-footer">
				<a class="btn btn-secondary text-white" data-dismiss="modal">Close</a>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
			</form>
		</div>
	</div>
</div>



<?php
include 'footer.php';
?>