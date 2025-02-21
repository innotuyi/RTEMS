@extends('layouts.layout')

@section('content')
<section class="donate fade-in">
    <!-- Header Section -->
    <div class="banner text-white" style="background: purple; padding: 50px; text-align: center;">
        <h1>Support Us in Building a Just and Inclusive Society</h1>
    </div>

    <!-- Donation Options Section -->
    <div class="container py-5">
        <div class="row">
            <!-- Suggested Donation Amounts -->
            <div class="col-md-4">
                <div class="card text-center" style="border: 1px solid #ccc; border-radius: 10px;">
                    <div class="card-body">
                        <h5 class="card-title">$10</h5>
                        <p class="card-text">Make a small but meaningful contribution.</p>
                        <button class="btn btn-success">Donate $10</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center" style="border: 1px solid #ccc; border-radius: 10px;">
                    <div class="card-body">
                        <h5 class="card-title">$50</h5>
                        <p class="card-text">Help us reach more communities.</p>
                        <button class="btn btn-success">Donate $50</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center" style="border: 1px solid #ccc; border-radius: 10px;">
                    <div class="card-body">
                        <h5 class="card-title">$100</h5>
                        <p class="card-text">Make a significant impact today.</p>
                        <button class="btn btn-success">Donate $100</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Custom Donation Amount -->
        <div class="mt-5">
            <form action="#" method="post">
                <div class="form-group">
                    <label for="customAmount" class="font-weight-bold">Enter a Custom Amount</label>
                    <input type="number" id="customAmount" name="amount" class="form-control" 
                        style="border: 2px solid lightblue; border-radius: 5px;" 
                        placeholder="Enter your donation amount">
                </div>
                <button type="submit" class="btn btn-success mt-3">Donate</button>
            </form>
        </div>
    </div>
</section>
@endsection
