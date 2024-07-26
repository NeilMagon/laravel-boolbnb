@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Checkout</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form id="payment-form" action="{{ route('admin.payment.process') }}" method="post">
                        @csrf

                        <div id="dropin-container"></div>

                        <input type="hidden" name="payment_method_nonce">

                        <hr class="mb-4">
                        <div class="text-center">
                            <button class="btn btn-primary btn-lg" type="submit">Paga</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://js.braintreegateway.com/web/dropin/1.30.0/js/dropin.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('#payment-form');
        const clientToken = "{{ $clientToken }}";

        braintree.dropin.create({
            authorization: clientToken,
            container: '#dropin-container'
        }, function (createErr, instance) {
            if (createErr) {
                console.error(createErr);
                return;
            }

            form.addEventListener('submit', function (event) {
                event.preventDefault();

                instance.requestPaymentMethod(function (err, payload) {
                    if (err) {
                        console.error(err);
                        return;
                    }

                    document.querySelector('input[name="payment_method_nonce"]').value = payload.nonce;
                    form.submit();
                });
            });
        });
    });
</script>
@endsection
