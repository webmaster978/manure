<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/form-editor.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:28:43 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Blogs</title>

        <!-- Common Plugins -->
        <link href="assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		
        <!-- Wysihtml5 and Summernote -->
        <link href="assets/lib/wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet">
        <link href="assets/lib/summernote/summernote.css" rel="stylesheet">
		
        <!-- Custom Css-->
        <link href="assets/scss/style.css" rel="stylesheet">
		
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

			<!-- ============================================================== -->
			<!-- 						Topbar Start 							-->
			<!-- ============================================================== -->
			<div class="top-bar primary-top-bar">
			<div class="container-fluid">
				<?php include'partials/_head.php'; ?>
			</div>
		</div>
		<!-- ============================================================== -->
		<!--                        Topbar End                              -->
		<!-- ============================================================== -->
		
		
		<!-- ============================================================== -->
		<!--                        Right Side Start                        -->
		<!-- ============================================================== -->
		
		<!-- ============================================================== -->
		<!--                        Right Side End                          -->
		<!-- ============================================================== -->
		

        <!-- ============================================================== -->
		<!-- 						Navigation Start 						-->
		<!-- ============================================================== -->
        <div class="main-sidebar-nav default-navigation">
            <div class="nano">
                <?php include 'partials/_nav.php'; ?>
            </div>
        </div>
        <!-- ============================================================== -->
		<!-- 						Navigation End	 						-->
		<!-- ============================================================== -->


        <!-- ============================================================== -->
		<!-- 						Content Start	 						-->
		<!-- ============================================================== -->
		           
        <div class="row page-header">
			<div class="col-lg-6 align-self-center ">
			    <h2>Text Editor</h2>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Form</a></li>
					<li class="breadcrumb-item active">Text Editor</li>		
				</ol>
			</div>
		</div>

        <section class="main-content">
            

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header card-default">
                            Summernote Standard editor
                        </div>
                        <div class="card-body">
                        	<textarea class="summernote" rows="" cols=""></textarea>
                            
                        </div>
                    </div>
                </div>
            </div>
           
			
            

            <footer class="footer">
                <span>Copyright &copy; 2018 FixedPlus</span>
            </footer>


        </section>
        <!-- ============================================================== -->
		<!-- 						Content End		 						-->
		<!-- ============================================================== -->



        <!--Common plugins-->
        <script src="assets/lib/jquery/dist/jquery.min.js"></script>
		<script src="assets/lib/bootstrap/js/popper.min.js"></script>
        <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>		
        <script src="assets/lib/pace/pace.min.js"></script>
        <script src="assets/lib/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
        <script src="assets/lib/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/lib/nano-scroll/jquery.nanoscroller.min.js"></script>
        <script src="assets/lib/metisMenu/metisMenu.min.js"></script>
        <script src="assets/js/custom.js"></script>
      
		<!-- Wysihtml5 and Summernote -->
        <script src="assets/lib/wysihtml5/wysihtml5-0.3.0.js"></script>
        <script src="assets/lib/wysihtml5/bootstrap-wysihtml5.js"></script>
		
        <script src="assets/lib/summernote/summernote.js"></script>
		
        <script>
            $(document).ready(function () {
                //wysihtml5
                $('#textarea').wysihtml5({
					height:'500px',
				});

                //summernote
                $(function () {

					$('.summernote').summernote({
						height:'400px',
					});
					
                    $('.summernote1').summernote({
						height:'400px',
                        toolbar: [
                            ['headline', ['style']],
                            ['style', ['bold', 'italic', 'underline', 'superscript', 'subscript', 'strikethrough', 'clear']],
                            ['textsize', ['fontsize']],
                            ['alignment', ['ul', 'ol', 'paragraph', 'lineheight']]
                        ]
                    });

                    $('.summernote2').summernote({
                        airMode: true,
                    });

                });

            });
        </script>

    </body>

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/form-editor.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:28:44 GMT -->
</html>