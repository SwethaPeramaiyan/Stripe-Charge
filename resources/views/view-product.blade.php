

@include("layouts.header")
<body>    
    <div class="container">        
        <div class="row">                       
            <div class="col-4 mt-4">
                <div class="card shadow-lg p-2">
                    <div class="card-body">
                        <h4 class="card-title text-primary">{{$product->name}}</h4>
                        <p class="card-text">{{$product->description}}</p>
                        <h2 class="text-primary">₹ {{$product->price}}</h2>
                    </div>
                </div>
            </div>            
            <div class="col-8 mt-4">
                <form action="{{ route('stripe-payment') }}" method="post" id="cashier-stripe-form" class="card shadow-lg p-4">
                    @csrf 
                    <div class="row">
                        <div class="mb-2">
                            <label for="name-on-card" class="form-label">Name on Card</label>
                            <input type="text" class="form-control" id="name_on_card" name="name_on_card">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2">
                            <label for="card-number" class="form-label">Card Information</label>
                            <div id="card_number"  class="form-control"></div>
                            <div id="card-errors" role="alert"></div>
                        </div>
                    </div>                                        
                    <div class="row">
                        <label for="amount" class="form-label">Amount</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="amount">₹</span>
                            <input type="text" class="form-control" placeholder="Username" name="amount" value="{{$product->price}}" aria-describedby="amount" readonly>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="mb-2">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mt-4">                            
                            <button class="btn btn-primary" data-secret="{{ $intent->client_secret }}" id="submit-payment">Pay Now</button>
                        </div>
                    </div>
                </form>

            </div>                         
        </div>
    </div>
</body>

<script src="https://js.stripe.com/v3/"></script>
<script>
    
    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
    var elements = stripe.elements();
    
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };
    var card = elements.create('card', {hidePostalCode: true, style: style});
    card.mount('#card_number');
    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
        
    const cardHolderName = document.getElementById('name_on_card');
    const cardButton = document.getElementById('submit-payment');
    const clientSecret = cardButton.dataset.secret;
    cardButton.addEventListener('click', async (e) => {
        e.preventDefault();
        const { setupIntent, error } = await stripe.confirmCardSetup(
            clientSecret, {
                payment_method: {
                    card: card,
                    billing_details: { name: cardHolderName.value }
                }
            }
            );           
        if (error) {            
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = error.message;
        } else {
            getPaymentMethod(setupIntent.payment_method);
        }
    });

    function getPaymentMethod(payment_method) {
        var form = document.getElementById('cashier-stripe-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'payment_method');
        hiddenInput.setAttribute('value', payment_method);
        form.appendChild(hiddenInput);
        form.submit();
    }
</script>
@include("layouts.footer")

