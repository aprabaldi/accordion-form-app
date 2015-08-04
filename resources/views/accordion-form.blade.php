<!DOCTYPE html>
<html>
<head>
    <script type='text/javascript' src="jquery/jquery.min.js"></script>
    <script type='text/javascript' src="bootstrap/js/bootstrap.min.js"></script>
    <script type='text/javascript' src="bootstrap/js/collapse.js"></script>
    <script type='text/javascript' src="http://cdn.jsdelivr.net/jquery.validation/1.14.0/jquery.validate.min.js"></script>
    <script type='text/javascript' src="jquery-ui/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="jquery-ui/jquery-ui.min.css">
    <title>Registration</title>
</head>
<body>
<form role="form" id="reg_form">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                        Step 1: Your Details
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="firstname" class="control-label">First Name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname">
                            </div>
                            <div class="col-md-3">
                                <label for="surname" class="control-label">Surname</label>
                                <input type="text" class="form-control" id="surname" name="surname">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="email" class="control-label">Email Address</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                        </div>
                    </div>
                    <button type="button" id="btn_1" class="btn next_button">
                        Next >
                    </button>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                        Step 2: More Comments
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="phone" class="control-label">Telephone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone">
                            </div>
                            <div class="col-md-3">
                                <label for="birthday" class="control-label">Date of Birth</label>
                                <input type="text" class="form-control" id="birthday" name="birthday">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="gender" class="control-label">Gender</label>
                                <select id="gender" name="gender">
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="btn_2" class="btn next_button">
                        Next >
                    </button>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                        Step 3: Final Comments
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="comments" class="control-label">Comments</label>
                        <textarea class="form-control" id="comments" name="comments"></textarea>
                    </div>
                    <button type="button" id="btn_3" class="btn next_button">
                        Next >
                    </button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
</form>
</body>
<script type="text/javascript">
    $(function() {
        $("#birthday").datepicker();

        //Validation
        var validator = $("#reg_form").validate({
            rules: {
                firstname: {
                    required: true
                },
                surname: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    number: true
                },
                birthday: {
                    required: true,
                    date: true
                },
                gender: {
                    required: true
                },
                comments: {
                    required: true
                }
            }
        });

        //1st step validation and collapses
        $('#btn_1').click(function(){
            if( validator.element("#firstname") && validator.element("#surname") && validator.element("#email") ){
                $("#collapseOne").collapse('hide');
                $("#collapseTwo").collapse('show');
            }
        });

        //2nd step validation and collapses
        $('#btn_2').click(function(){
            if( validator.element("#phone") && validator.element("#gender") && validator.element("#birthday") ){
                $("#collapseTwo").collapse('hide');
                $("#collapseThree").collapse('show');            }
        });

        //3rd step validation and POST request to server, then redirect to /thanks
        $('#btn_3').click(function(){
            if( validator.element("#comments") ){
                $.post('/form', $( "#reg_form" ).serialize() , function(jsondata) {
                    if(jsondata.error == true){
                        alert("Server Error!");
                    }
                    else{
                        window.location.replace('/thanks');
                    }
                }, 'json');
            }
        });
    });
</script>
</html>
