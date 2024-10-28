@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-8">
            <form id="regForm" action="{{ route('admin.leads.save') }}" method="post">
                @csrf <!-- Add CSRF token for form security -->
                <h1 id="register">Survey Form</h1>
                <div class="all-steps" id="all-steps">
                    <span class="step"><i class="fa fa-user"></i></span>
                    <span class="step"><i class="fa fa-map-marker"></i></span>
                    <span class="step"><i class="fa fa-map-marker"></i></span>
                </div>

                <!-- Tab 1 -->
                <div class="tab">
                    <h6>What's your name?</h6>
                    <p>
                        <input placeholder="Name..." oninput="this.className = ''" name="name" required>
                    </p>
                </div>

                <!-- Tab 2 -->
                <div class="tab">
                    <h6>Number</h6>
                    <p><input placeholder="Phone Number" oninput="this.className = ''" name="phone" required></p>
                </div>

                <!-- Tab 3 -->
                <div class="tab">
                    <h6>Multiple adds</h6>
                    <div class="table-responsive">
                        <table id="faqs" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Product</th>
                                    <th>Sale</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" class="form-control" name="title[]" placeholder="User name"></td>
                                    <td><input type="text" placeholder="Product name" name="quantity[]" class="form-control"></td>
                                    <td class="mt-10"><button type="button" class="badge badge-danger"><i class="fa fa-trash"></i> Delete</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <button type="button" onclick="addfaqs();" class="badge badge-success">
                            <i class="fa fa-plus"></i> ADD NEW
                        </button>
                    </div>
                </div>

                <!-- Navigation buttons -->
                <div style="overflow:auto;" id="nextprevious">
                    <div style="float:right;">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)"><i class="fa fa-angle-double-left"></i></button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)"><i class="fa fa-angle-double-right"></i></button>
                    </div>
                    <button type="submit" id="submitBtn" style="display: none;">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var faqs_row = 0;
    function addfaqs() {
        // Create a new row with a unique ID
        var html = '<tr id="faqs-row' + faqs_row + '">';
        html += '<td><input type="text" class="form-control" name="title[]" placeholder="User name"></td>';
        html += '<td><input type="text" placeholder="Product name" name="quantity[]" class="form-control"></td>';
        html += '<td class="mt-10"><button type="button" class="badge badge-danger" onclick="$(\'#faqs-row' + faqs_row + '\').remove();"><i class="fa fa-trash"></i> Delete</button></td>';
        html += '</tr>';

        $('#faqs tbody').append(html);
        faqs_row++;
    }

    var currentTab = 0;
    document.addEventListener("DOMContentLoaded", function (event) {
        showTab(currentTab);
    });

    function showTab(n) {
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        document.getElementById("prevBtn").style.display = n == 0 ? "none" : "inline";
        document.getElementById("nextBtn").style.display = n == (x.length - 1) ? "none" : "inline";
        document.getElementById("submitBtn").style.display = n == (x.length - 1) ? "inline" : "none";
        fixStepIndicator(n);
    }

    function nextPrev(n) {
        var x = document.getElementsByClassName("tab");
        if (n == 1 && !validateForm()) return false; // Don't proceed if the form is invalid
        x[currentTab].style.display = "none"; // Hide current tab
        currentTab = currentTab + n; // Change tab index
        if (currentTab >= x.length) {
            document.getElementById("regForm").submit(); // Submit form if last tab
            return false;
        }
        showTab(currentTab); // Show the correct tab
    }

    function validateForm() {
        var valid = true;
        var x = document.getElementsByClassName("tab")[currentTab].getElementsByTagName("input");
        for (let i = 0; i < x.length; i++) {
            if (x[i].value == "") {
                x[i].className += " invalid";
                valid = false;
            }
        }
        if (valid) document.getElementsByClassName("step")[currentTab].className += " finish";
        return valid;
    }

    function fixStepIndicator(n) {
        var steps = document.getElementsByClassName("step");
        for (var i = 0; i < steps.length; i++) steps[i].className = steps[i].className.replace(" active", "");
        steps[n].className += " active";
    }
</script>

<style>
   

    @media (max-width:991.98px) {
        .padding {
            padding: 1.5rem
        }
    }

    @media (max-width:767.98px) {
        .padding {
            padding: 1rem
        }
    }

    .padding {
        padding: 5rem
    }

   

    .pl-3,
    .px-3 {
        padding-left: 1rem !important
    }

 

    .table-responsive {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        -ms-overflow-style: -ms-autohiding-scrollbar
    }

    .table,
    .jsgrid .jsgrid-table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 1rem;
        background-color: transparent
    }

    .table thead th,
    .jsgrid .jsgrid-table thead th {
        border-top: 0;
        border-bottom-width: 1px;
        font-weight: 500;
        font-size: .875rem;
        text-transform: uppercase
    }

    .table td,
    .jsgrid .jsgrid-table td {
        font-size: 0.875rem;
        padding: .475rem 0.4375rem
    }

    .mt-10 {
        padding: 0.875rem 0.3375rem !important
    }

    button {
        outline: 0 !important
    }

    .form-control:focus {
        box-shadow: 0 0 0 0rem rgba(0, 123, 255, .25) !important
    }

    .badge {
        border-radius: 0;
        font-size: 12px;
        line-height: 1;
        padding: .375rem .5625rem;
        font-weight: normal;
        border: none
    }

    #regForm {
        background-color: #ffffff;
        margin: 0px auto;
        font-family: Raleway;
        padding: 40px;
        border-radius: 10px
    }

    #register {

        color: #6A1B9A;
    }

    h1 {
        text-align: center
    }

    input {
        padding: 10px;
        width: 100%;
        font-size: 17px;
        font-family: Raleway;
        border: 1px solid #aaaaaa;
        border-radius: 10px;
        -webkit-appearance: none;
    }

    .tab input:focus {

        border: 1px solid #6a1b9a !important;
        outline: none;
    }

    input.invalid {

        border: 1px solid #e03a0666;
    }

    .tab {
        display: none
    }

    button {
        background-color: #6A1B9A;
        color: #ffffff;
        border: none;
        border-radius: 50%;
        padding: 10px 20px;
        font-size: 17px;
        font-family: Raleway;
        cursor: pointer
    }

    button:hover {
        opacity: 0.8
    }

    button:focus {

        outline: none !important;
    }

    #prevBtn {
        background-color: #bbbbbb
    }

    .all-steps {
        text-align: center;
        margin-top: 30px;
        margin-bottom: 30px;
        width: 100%;
        display: inline-flex;
        justify-content: center;
    }

    .step {
        height: 40px;
        width: 40px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 15px;
        color: #6a1b9a;
        opacity: 0.5;
    }

    .step.active {
        opacity: 1
    }


    .step.finish {
        color: #fff;
        background: #6a1b9a;
        opacity: 1;

    }

    .all-steps {
        text-align: center;
        margin-top: 30px;
        margin-bottom: 30px
    }

    .thanks-message {
        display: none
    }
</style>
@endsection