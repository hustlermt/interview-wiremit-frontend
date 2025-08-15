<script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>

<script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
<script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>

<script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
<script src="{{ asset('assets/js/tables-datatables-advanced.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/dropzone/dropzone.js') }}"></script>
<script src="{{ asset('assets/js/forms-file-upload.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#usersTable').DataTable();
    });
    $(document).ready(function() {
  $('.select2').select2();
});

</script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

{{-- <script src="{{ asset('assets/js/app-user-list.js') }}"></script> --}}


<script>
document.querySelector('form').addEventListener('submit', function(e) {
    const email = document.getElementById('recipient-email').value;
    const account = document.getElementById('account-number').value;

    // Email validation (if provided)
    if(email && !/^\S+@\S+\.\S+$/.test(email)){
        alert('Please enter a valid email address');
        e.preventDefault();
        return;
    }

    // Account number validation
    if(!/^\d{10}$/.test(account)){
        alert('Account number must be exactly 10 digits');
        e.preventDefault();
        return;
    }
});
</script>
<script>

let fxRates = {}; // no default

// Fetch FX rates from API
fetch('https://68976304250b078c2041c7fc.mockapi.io/api/wiremit/InterviewAPIS')
    .then(res => res.json())
    .then(data => {
        data.forEach(rate => {
            if (rate.GBP) fxRates.GBP = rate.GBP;
            if (rate.ZAR) fxRates.ZAR = rate.ZAR;
        });
    })
    .catch(err => {
        console.error('FX Rates API error:', err);
        alert('Unable to fetch FX rates. Please try again later.');
    });

// Function to calculate fee and final amount
function calculateAmounts() {
    const country = document.getElementById('recipient-country').value;
    const amount = parseFloat(document.getElementById('amount-usd').value);

    // Clear previous errors
    document.getElementById('amount-error').innerText = '';
    
    // Validate min/max
    if (isNaN(amount) || amount < 5 || amount > 500) {
        document.getElementById('amount-error').innerText = 'Amount must be between $5 and $500';
        document.getElementById('transaction-fee').value = '';
        document.getElementById('final-amount').value = '';
        return;
    }

    // Validate country selection
    if (!country) return;

    // Ensure FX rate exists
    if (!fxRates[country]) {
        alert('FX rate for ' + country + ' is unavailable. Please try again later.');
        document.getElementById('transaction-fee').value = '';
        document.getElementById('final-amount').value = '';
        return;
    }

    // Determine fee %
    let feePercent = 0;
    if (country === 'GBP') feePercent = 0.10;
    if (country === 'ZAR') feePercent = 0.20;

    const fee = Math.ceil(amount * feePercent);
    const fxRate = fxRates[country];
    const finalAmount = Math.ceil((amount - fee) * fxRate);

    document.getElementById('transaction-fee').value = fee.toFixed(2);
    
    document.getElementById('final-amount').value = Math.ceil((amount - fee) * fxRate);
    document.getElementById('final-amount-display').innerText = country;

}

document.getElementById('amount-usd').addEventListener('blur', calculateAmounts);
document.getElementById('recipient-country').addEventListener('change', calculateAmounts);
</script>