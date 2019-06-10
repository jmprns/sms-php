<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="dist/logo.svg">

    <title>SMS Gateway</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dist/style.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form id="sendForm" class="form-signin">
      <img class="mb-4" src="dist/logo.svg" alt="" width="100" height="100">
      <h1 class="h3 mb-3 font-weight-normal">SMS Gateway</h1>
      <input type="text" id="smsIp" class="form-control" placeholder="IP:PORT eg(192.168.1.1:8080)" required>
      <br>
      <input type="text" id="cp" class="form-control" placeholder="Phone Number" required>
      <br>
      <textarea id="mes" class="form-control" placeholder="Message"></textarea>
      <br>
      <button id="button-send" class="btn btn-lg btn-primary btn-block" type="submit">Send</button>
      <p class="mt-5 mb-3 text-muted">&copy; <?php echo date('Y', time()); ?> 박깅잭</p>
    </form>

	<script type="text/javascript" src="dist/jquery.js"></script>

	<script type="text/javascript">

		$(document).on('submit', '#sendForm', function(event) {

		event.preventDefault();
		
		var smsIp = $('#smsIp').val();
		var cp = $('#cp').val();
		var mes = $('#mes').val();
		

		$.ajax({
			url: "/send.php",
			type: 'POST',
			dataType: 'json',
			data:
			{
				'smsIp' : smsIp,
				'cp' : cp,
				'mes' : mes
			},

			success:function(Result)
			{
				if(Result.responseCode == 200){
					console.log(Result);
					$('#sendForm')[0].reset();
					alert("Successfully Send");
				}else{
					
				}
				

				
			},
	        error:function(xhr){
	            alert("Sending Failed");
	        },
	        beforeSend: function(){
	            var element = document.getElementById('button-send');
	            element.classList.add("disabled");
	            element.innerHTML = 'Sending...';
	        },
	        complete: function(){
	            var element = document.getElementById('button-send');
	            element.classList.remove("disabled");
	            element.innerHTML = 'Send';
	        }
		});

	});
	</script>



  </body>
</html>
