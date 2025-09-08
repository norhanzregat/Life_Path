user-select: none;

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: #f5f9fc;
            min-height: 100vh;
            position: relative;
        }
        /* Watermark / Decorative Icon */
        .payment-watermark {
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.07;
            z-index: 0;
            pointer-events: none;
            font-size: 420px;
            color: #0077b6;
        }
        .payment-card {
            border-radius: 15px;
            background: #fff;
            box-shadow: 0 8px 32px rgba(0,119,182,0.07);
            padding: 2.5rem 2rem 2rem 2rem;
            max-width: 900px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }
        .payment-option {
            cursor: pointer;
            transition: 0.3s;
            border: 2px solid #f5f9fc;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            position: relative;
            overflow: hidden;
            min-height: 170px;
        }
        .payment-option.selected, .payment-option:hover {
            background: #e9f3ff;
            border-color: #0077b6;
            box-shadow: 0 4px 16px rgba(0,119,182,0.08);
        }
        .hidden { display: none; }
        .clinic-brand { color: #0077b6; font-weight: bold; }
        .icon-stack {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 60px;
            margin-bottom: 10px;
        }
        .icon-stack .fa-circle {
            color: #f5f9fc;
            font-size: 60px;
            position: absolute;
            left: 0; top: 0;
            z-index: 1;
        }
        .icon-stack .fa {
            position: absolute;
            left: 0; top: 0;
            width: 60px; height: 60px;
            line-height: 60px;
            text-align: center;
            z-index: 2;
            font-size: 32px;
        }
        .attach-label {
            font-weight: 500;
            margin-bottom: 5px;
        }
        .custom-file-input {
            display: none;
        }
        .custom-file-label {
            border: 1px solid #ced4da;
            border-radius: .25rem;
            padding: .375rem .75rem;
            display: inline-block;
            width: 100%;
            cursor: pointer;
            background: #fff;
            color: #495057;
            transition: background 0.2s, color 0.2s, border 0.2s;
        }
        .custom-file-label.selected {
            background: #e9f3ff;
            color: #0077b6;
            border-color: #0077b6;
        }
        .receipt-note {
            display: flex;
            align-items: center;
            gap: 8px;
            background: #e9f3ff;
            color: #0077b6;
            border-radius: 6px;
            padding: 7px 12px;
            font-size: 0.97rem;
            margin-bottom: 10px;
        }
        @media (max-width: 991px) {
            .payment-card { padding: 1.5rem 0.5rem; }
        }
    </style>
</head>
<body>
    <div class="payment-watermark">
        <i class="fa-solid fa-shield-heart"></i>
    </div>

    <div class="container my-5">
        <div class="payment-card">
            <div class="text-center mb-4">
                <h2 class="clinic-brand">Psychology Clinic - Payment</h2>
                <p>Please choose your preferred payment method</p>
            </div>

            <div class="row g-4">
                <!-- Credit/Debit Card -->
                <div class="col-md-3 col-6">
                    <div class="card p-3 payment-option" onclick="selectPayment('card', this)">
                        <span class="icon-stack">
                            <i class="fa-solid fa-circle text-primary"></i>
                            <i class="fa-solid fa-credit-card text-white" style="color:#0077b6;"></i>
                        </span>
                        <h5>Credit/Debit Card</h5>
                        <p class="text-muted small">Visa, MasterCard, Mada</p>
                        <div class="d-flex gap-2 justify-content-center">
                            <i class="fa-brands fa-cc-visa fa-lg text-primary"></i>
                            <i class="fa-brands fa-cc-mastercard fa-lg text-danger"></i>
                            <i class="fa-brands fa-cc-amex fa-lg text-info"></i>
                            <i class="fa-solid fa-credit-card fa-lg text-secondary"></i>
                        </div>
                    </div>
                </div>
                <!-- PayPal -->
                <div class="col-md-3 col-6">
                    <div class="card p-3 payment-option" onclick="selectPayment('paypal', this)">
                        <span class="icon-stack">
                            <i class="fa-solid fa-circle text-info"></i>
                            <i class="fa-brands fa-paypal text-white" style="color:#003087;"></i>
                        </span>
                        <h5>PayPal</h5>
                        <p class="text-muted small">Pay easily with PayPal</p>
                        <div class="d-flex gap-2 justify-content-center">
                            <i class="fa-brands fa-paypal fa-lg text-info"></i>
                        </div>
                    </div>
                </div>
                <!-- E-Wallet / Bank -->
                <div class="col-md-3 col-6">
                    <div class="card p-3 payment-option" onclick="selectPayment('wallet', this)">
                        <span class="icon-stack">
                            <i class="fa-solid fa-circle text-success"></i>
                            <i class="fa-solid fa-wallet text-white" style="color:#198754;"></i>
                        </span>
                        <h5>E-Wallet / Bank</h5>
                        <p class="text-muted small">Mobile wallet or bank transfer</p>
                        <div class="d-flex gap-2 justify-content-center">
                            <i class="fa-solid fa-building-columns fa-lg text-success"></i>
                            <i class="fa-solid fa-mobile-screen fa-lg text-secondary"></i>
                        </div>
                    </div>
                </div>
                <!-- Cash at Clinic -->
                <div class="col-md-3 col-6">
                    <div class="card p-3 payment-option" onclick="selectPayment('cash', this)">
                        <span class="icon-stack">
                            <i class="fa-solid fa-circle text-warning"></i>
                            <i class="fa-solid fa-money-bill-wave text-white" style="color:#ffc107;"></i>
                        </span>
                        <h5>Cash at Clinic</h5>
                        <p class="text-muted small">Pay at reception</p>
                        <div class="d-flex gap-2 justify-content-center">
                            <i class="fa-solid fa-coins fa-lg text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Forms -->
            <div class="mt-5">

                <!-- Card Payment -->
                <div id="cardForm" class="hidden">
                    <h4 class="mb-3"><i class="fa-solid fa-credit-card text-primary"></i> Pay with Credit/Debit Card</h4>
                    <form id="formCard">
                        <div class="mb-3">
                            <label class="form-label">Card Number</label>
                            <input type="text" class="form-control" placeholder="1234 5678 9012 3456" required pattern="\d{4} \d{4} \d{4} \d{4}">
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Expiry Date</label>
                                <input type="text" class="form-control" placeholder="MM/YY" required pattern="\d{2}/\d{2}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">CVV</label>
                                <input type="password" class="form-control" placeholder="123" required pattern="\d{3,4}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="receipt-note">
                                <i class="fa-solid fa-file-arrow-up"></i>
                                <span>Attach a payment receipt if available (optional)</span>
                            </div>
                            <label class="attach-label">Attach Payment Receipt</label>
                            <label class="custom-file-label" id="labelCardReceipt" for="cardReceipt">
                                <i class="fa-solid fa-file"></i> Choose file...
                            </label>
                            <input type="file" class="custom-file-input" id="cardReceipt" name="cardReceipt" accept="image/*,application/pdf">
                        </div>
                        <button type="submit" class="btn btn-primary w-100"><i class="fa-solid fa-lock"></i> Confirm Payment</button>
                    </form>
                </div>

                <!-- PayPal -->
                <div id="paypalForm" class="hidden">
                    <h4 class="mb-3"><i class="fa-brands fa-paypal text-info"></i> Pay with PayPal</h4>
                    <form id="formPaypal">
                        <div class="mb-3">
                            <label class="form-label">PayPal Email</label>
                            <input type="email" class="form-control" placeholder="you@example.com" required>
                        </div>
                        <div class="mb-3">
                            <div class="receipt-note">
                                <i class="fa-solid fa-file-arrow-up"></i>
                                <span>Attach a payment receipt if available (optional)</span>
                            </div>
                            <label class="attach-label">Attach Payment Receipt</label>
                            <label class="custom-file-label" id="labelPaypalReceipt" for="paypalReceipt">
                                <i class="fa-solid fa-file"></i> Choose file...
                            </label>
                            <input type="file" class="custom-file-input" id="paypalReceipt" name="paypalReceipt" accept="image/*,application/pdf">
                        </div>
                        <button type="submit" class="btn btn-info w-100"><i class="fa-brands fa-paypal"></i> Proceed to PayPal</button>
                    </form>
                </div>

                <!-- Wallet/Bank -->
                <div id="walletForm" class="hidden">
                    <h4 class="mb-3"><i class="fa-solid fa-wallet text-success"></i> Pay via E-Wallet / Bank Transfer</h4>
                    <p class="text-muted">Please transfer to the following account:</p>
                    <ul>
                        <li><b>Bank:</b> Arab Bank</li>
                        <li><b>Account Name:</b> Psychology Clinic</li>
                        <li><b>Account Number:</b> 123-456-789</li>
                        <li><b>Mobile Wallet:</b> +962 7 9000 1234</li>
                    </ul>
                    <form id="formWallet">
                        <div class="mb-3">
                            <label class="form-label">Transaction ID</label>
                            <input type="text" class="form-control" placeholder="Enter your payment reference" required>
                        </div>
                        <div class="mb-3">
                            <div class="receipt-note">
                                <i class="fa-solid fa-file-arrow-up"></i>
                                <span>Receipt is required for bank/wallet transfer</span>
                            </div>
                            <label class="attach-label">Attach Payment Receipt</label>
                            <label class="custom-file-label" id="labelWalletReceipt" for="walletReceipt">
                                <i class="fa-solid fa-file"></i> Choose file...
                            </label>
                            <input type="file" class="custom-file-input" id="walletReceipt" name="walletReceipt" accept="image/*,application/pdf" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100"><i class="fa-solid fa-check"></i> Confirm Transfer</button>
                    </form>
                </div>

                <!-- Cash -->
                <div id="cashForm" class="hidden">
                    <h4 class="mb-3"><i class="fa-solid fa-money-bill-wave text-warning"></i> Cash at Clinic</h4>
                    <p>You have chosen to pay at the clinic. Please visit our reception to complete the payment process.</p>
                    <button class="btn btn-warning w-100" onclick="alert('Cash payment selected! Please pay at the clinic.')"><i class="fa-solid fa-hand-holding-dollar"></i> Confirm</button>
                </div>
            </div>
        </div>
    </div>

<script>
    function hideAllForms() {
        document.getElementById('cardForm').classList.add('hidden');
        document.getElementById('paypalForm').classList.add('hidden');
        document.getElementById('walletForm').classList.add('hidden');
        document.getElementById('cashForm').classList.add('hidden');
        document.querySelectorAll('.payment-option').forEach(opt => opt.classList.remove('selected'));
    }

    function selectPayment(type, el) {
        hideAllForms();
        if (type === 'card') document.getElementById('cardForm').classList.remove('hidden');
        if (type === 'paypal') document.getElementById('paypalForm').classList.remove('hidden');
        if (type === 'wallet') document.getElementById('walletForm').classList.remove('hidden');
        if (type === 'cash') document.getElementById('cashForm').classList.remove('hidden');
        if (el) el.classList.add('selected');
    }

    // File input label update
    function updateFileLabel(inputId, labelId) {
        document.getElementById(inputId).addEventListener('change', function(){
            let fileName = this.files[0] ? this.files[0].name : "Choose file...";
            let label = document.getElementById(labelId);
            label.innerHTML = '<i class="fa-solid fa-file"></i> ' + fileName;
            if (this.files[0]) label.classList.add('selected');
            else label.classList.remove('selected');
        });
    }
    updateFileLabel('cardReceipt', 'labelCardReceipt');
    updateFileLabel('paypalReceipt', 'labelPaypalReceipt');
    updateFileLabel('walletReceipt', 'labelWalletReceipt');

    // Payment forms submit
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function(e){
            e.preventDefault();
            alert("Payment submitted successfully!");
            form.reset();
            // Reset file label
            let fileLabel = form.querySelector('.custom-file-label');
            if(fileLabel) {
                fileLabel.innerHTML = '<i class="fa-solid fa-file"></i> Choose file...';
                fileLabel.classList.remove('selected');
            }
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
