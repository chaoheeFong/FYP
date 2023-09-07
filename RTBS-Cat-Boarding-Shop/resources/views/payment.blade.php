@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Payment</div>

                <div class="card-body">
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.min.js"></script>
                    
                    <ul class="nav nav-tabs" id="paymentTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="creditCardTab" data-toggle="tab" href="#creditCard" role="tab" aria-controls="creditCard" aria-selected="true">Credit Card</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="paypalTab" data-toggle="tab" href="#paypal" role="tab" aria-controls="paypal" aria-selected="false">PayPal</a>
                        </li>
                    </ul>
                    
                    <div class="tab-content" id="paymentTabsContent">
                        <!-- Credit Card Tab Content -->
                        <div class="tab-pane fade show active" id="creditCard" role="tabpanel" aria-labelledby="creditCardTab">
                            <div class="mt-4 mx-4">
                                <div class="text-center">
                                    <h5>Credit card</h5>
                                </div>
                                <div class="form mt-3">
                                    <div class="inputbox">
                                        <input type="text" name="name" class="form-control" required="required" placeholder="Enter your name">
                                    </div>
                                    <div class="inputbox">
                                        <br/>
                                    <input type="text" name="name" class="form-control" required="required" placeholder="Enter your card number">
                                    <br/>
                                        <i class="fa fa-eye"></i>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <div class="inputbox">
                                            <input type="text" name="name" min="1" max="999" class="form-control" required="required" placeholder="Expration date">
                                        </div>
                                        <div class="inputbox">
                                            <input type="text" name="name" min="1" max="999" class="form-control" required="required" placeholder="CVV">
                                            
                                        </div>
                                    </div>
                                    <div class="px-5 pay">
</br>
                                        <button id="finishPayButton" class="btn btn-primary btn-block">Finsh and Pay</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- PayPal Tab Content -->
                        <div class="tab-pane fade" id="paypal" role="tabpanel" aria-labelledby="paypalTab">
                            <div class="px-5 mt-5">
                                <div class="inputbox">
                                    <input type="text" name="name" class="form-control" required="required">
                                    <span>PayPal Email Address</span>
                                </div>
                                <div class="pay px-5">
                                    <button class="btn btn-primary btn-block">Add PayPal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('finishPayButton').addEventListener('click', function() {
    // Display an alert when the button is clicked
    alert('You are now a subscriber!');

    // Send a POST request to change the user's role
    $.post('{{ route("changeRole") }}', function() {
        window.location.href = '{{ route("home") }}';
    });
});

</script>
@endsection
