<!DOCTYPE html>
<html>
<head>
	<title></title>


<meta name="viewport" content="width=device-width, initial-scale=1" />


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->



   <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
	<h1>Make your payment</h1>

<div class="container">
	<div class="row">
		<div class="col-sm-6">
			<form action="{{url('/Payment')}}" method="post" id="payment-form">
				@csrf
			  <div class="form-row">
			    <label for="card-element">
			      Credit or debit card
			    </label>
			    <div id="card-element">
			      <!-- A Stripe Element will be inserted here. -->
			    </div>

			    <!-- Used to display Element errors. -->
			    <div id="card-errors" role="alert"></div>
			  </div>

			 	 <button>Submit Payment</button>
			</form>
		</div>
		
	</div>
	
</div>
<script >
	var stripe = Stripe('pk_test_rezab88ZMxjimxvQ6lvmcqRV00R823paNu');
    var elements = stripe.elements();


    var style = {
		  base: {
		    // Add your base input styles here. For example:
		    fontSize: '16px',
		    color: "#32325d",
		  }
		};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');


card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {

    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
    	
      // Inform the customer that there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
      
    } else {
      // Send the token to your server.
     
      stripeTokenHandler(result.token);
    }
  });
});


function stripeTokenHandler(token) {
  
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}

</script>
</body>
</html>