<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div id="success">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Great!</strong> You are donate successfully!
        </div>
    </div>
    <div id="error">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <p> <strong> Sorry ! Something went wrong </strong> </p>
            <div id="message-error" > </div>
        </div>
    </div>
    <div class="popup-background">

    </div>
    <div class="container">
        <div class="row content">
            <div class="col-md-3 image">
            </div>
            <div class="col-md-9 info">
                <form id="from-donate" method="post" action="{{asset('/donate')}}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="required" for="firstname">FIRST NAME</label>
                            <input id="firstname" class="form-control input-group-lg reg_name" type="text" name="first_name"
                                title="Enter first name"
                                placeholder="First name"
                                required
                            />
                        </div>
                        <div class="form-group col-md-6">
                            <label class="required" for="lastname"> LAST NAME</label>
                            <input id="lastname" class="form-control input-group-lg reg_name" type="text" name="last_name"
                                title="Enter last name"
                                placeholder="Last name"
                                required
                            />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="required" for="email">EMAIL</label>
                            <input id="email" class="form-control input-group-lg reg_name" type="text" name="email"
                                title="Enter email"
                                placeholder="Email"
                                required
                            />
                        </div>
                        <div id="phonenumberVal" class="form-group col-md-6">
                            <label class="required" for="phonenumber">PHONE NUMBER</label>
                            <input id="phonenumber" class="form-control input-group-lg reg_name" type="text" name="phonenumber"
                                title="Enter Phonenumber"
                                placeholder="09-0909-0909"
                                required
                            />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="required" for="company">COMPANY</label>
                            <input id="company" class="form-control input-group-lg reg_name" type="text" name="company"
                                title="Enter company"
                                placeholder="Company"
                                required
                            />
                        </div>
                        <div class="form-group col-md-6">
                            <label class="required" for="gender">GENDER</label>
                            <div class="select">
                                <select id="gender" class="form-select form-control" name="gender">
                                    <option value="0">Male</option>
                                    <option value="1">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-6">
                            <label class="required" for="">PAYEMNT MODE</label>
                            <div id="paymethod" class="">
                                <div class="form-check form-check-inline">
                                    <input id="paymethod" class="form-check-input credit_method" type="radio" name="credit_method" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">Visa</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input id="paymethod2" class="form-check-input credit_method" type="radio" name="credit_method" id="inlineRadio2" value="2">
                                    <label class="form-check-label" for="inlineRadio2">Mastercard</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input id="paymethod3" class="form-check-input credit_method" type="radio" name="credit_method" id="inlineRadio2" value="3">
                                    <label class="form-check-label" for="inlineRadio2">Amex</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="required" for="card-number">CARD NUMBER</label>
                            <input id="card-number" class="form-control input-group-lg reg_name" type="text" name="card_number"
                                title="Enter Card Number"
                                placeholder="1111-1111-1111-1111"
                                onkeyup="formatCreditCard()"
                                maxlength="19"
                            />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="required" for="expiration">EXPIRATION</label>
                            <div id="expiration" class="expiration">
                                <div id="expirationdate" class="col-md-4 pl-0">
                                    <input id="expiration-date" class="form-control input-group-lg reg_name" type="text" name="expiration_date"
                                        title="Enter Expiration Date"
                                        placeholder="20"
                                        maxlength="2"
                                    />
                                </div>
                                <span class="expiration_span">/</span>
                                <div id="expirationyear" class="col-md-6">
                                    <input id="expiration-year" class="form-control input-group-lg reg_name" type="text" name="expiration_year"
                                        title="Enter Expiration Year"
                                        placeholder="2030"
                                        maxlength="4"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="required" for="cvn">CVN</label>
                            <input id="cvn" class="form-control input-group-lg reg_name" type="password" name="cvn"
                                title="Enter Cvn"
                                maxlength="3" 
                            />
                        </div>
                    </div>
                    <div class="row col-md-12 range-wrap">
                        <div class="range-value" id="rangeV"></div>
                        <input name="amount" id="range" type="range" min="01" max="1000" value="500" step="1">
                    </div>
                    <div class="row col-md-4 float-right button-custom mt-5">
                        <button type="button" onclick="formControl()" class="btn btn-success mr-1">Success</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        const
        range = document.getElementById('range'),
        rangeV = document.getElementById('rangeV'),
        setValue = ()=>{
            const
            newValue = Number( (range.value - range.min) * 100 / (range.max - range.min) ),
            newPosition = 40 - (newValue  * 0.9);
            rangeV.innerHTML = `<span>$${range.value}</span>`;
            rangeV.style.left = `calc(${newValue}% + (${newPosition}px))`;
        };
        document.addEventListener("DOMContentLoaded", setValue);
        range.addEventListener('input', setValue);
        document.getElementById("range").oninput = function() {
            var value = (this.value-this.min)/(this.max-this.min)*100
            this.style.background = 'linear-gradient(to right, #33c020 0%, #82CFD0 ' + value + '%, #fff ' + value + '%, white 100%)'
        };
    </script>
</body>
</html>