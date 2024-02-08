<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style>
		.successfully_sms_box{
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			gap: 20px;
		}


		  .resized-image {
       
           width: 100%;
       margin-bottom: 10px;
       border-radius: 10px;
       margin-bottom: 20px;
    object-fit: fill;
  }
  .successfully_sms{
      font-size: 20px;
      line-height: 24px;
      color: rgb(255, 0, 0);
      font-weight: 400;

  }


	</style>
</head>
<body>
	   <div class="successfully_sms_box">
	   <div class="img_box">
	   		<img src="{{ asset('public/logo.png') }}" class="resized-image">
	   </div>
	    <h2 class=" successfully_sms">Your Password has been updated successfully!</h2><P>Thank you </P>
	   </div>

</body>
</html>