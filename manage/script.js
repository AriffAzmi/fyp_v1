$( window ).load(function() {

  $('#book_button').hide();
  $('#book_error').hide();
  $('#success').hide();
  $('#ajax').hide();

});

// remove error alert

$( "#error_alert" ).click(function() {
  $('#book_error').hide();
});

$( "#success_button" ).click(function() {
   $('#success').hide();
});


function doLogout() {
    var retVal = confirm("Do you want to logout ?");
    if (retVal){
        alert("Bye bye! Till see u again");
        window.location = "signout.php";
    }
    else{
        window.location.href = "#";
    }
} 

// ajax loading image when availability button clicked

    $(document).ready(function(){

        $('#avai_button').click(function() {
            
            $('#ajax').show();
        });

    });

// cancel update button

function cancel_update() {
    
    window.location.href = "home.php";
}

//function to check class availability  
  
 function check_availability(){
 
    
    var kelas  = $('#kelas').val();  
    var d_book = new Date($('#tarikh').val());
    var s_time = $('#stime').val();
    var e_time = $('#etime').val();


    // var today = new Date();
    // var dd = today.getDate();
    // var mm = today.getMonth()+1;
    // var yyyy = today.getFullYear(); 
    // if (dd<10) {
    //     dd='0'+dd;
    // }
    // if (mm<10) {
    //     mm='0'+mm;
    // }
    var today = new Date();
    
    //Use nested if to check for input errors. If one of the field is not selected, show "Please fill in the form completely"
    if (d_book == "" || s_time == "" || e_time == "" || kelas == "" ) {
        $('#ajax').delay(350).fadeOut('slow');
        $('#book_error').show();
        $('#error_msg').show();
        $('#error_msg').html("Please fill in the form completely");
        $("#book_button").hide();
        $("#avai").hide();
        $('#ajax').hide();
    }
    else {
        // if date is before today, show "Invalid date"
        if (d_book < today) {
            $('#ajax').fadeOut( "slow" );
            $('#book_error').show();
            $('#error_msg').show();
            $('#error_msg').html("Invalid date");
            $("#book_button").hide();
            $("#avai").hide();
            $("#box").hide();
        }
        // if start time is later or equal to end time, show "Invalid start time and end time"
        else if (s_time >= e_time) {
            $('#ajax').fadeOut( "slow" );
            $('#book_error').show();
            $('#error_msg').show();
            $('#error_msg').html("Invalid start time and end time");
            $("#book_button").hide();
            $("#avai").hide();
             $("#box").hide();
        }
        //if everything is ok, proceed with validate.php
        else { 
            $.post("validate.php", { klas: kelas, d_book: d_book, start_time: s_time, end_time: e_time }, function(result){  
                //if the result is 0, show that class is available  
                if(result == '1'){
                    $('#ajax').fadeOut( "slow" );
                    $('#book_error').show();
                    $('#error_msg').show();
                    $('#error_msg').html("Currently not available. The room have been book by other user on the day and time that you have been choose");
                    $("#book_button").hide();
                    $("#avai").hide();
                } 
                //else, not available
                else {
                    $('#ajax').fadeOut( "slow" );  
                    $('#success_msg').html('The class' + '\t' + kelas + '\t' + 'on' + '\t' + d_book + '\t\t' + 'at' + '\t' + s_time + '\t\t' + 'until' + '\t' + e_time + '\t\t' + ' is Available');
                    $( "#book_button" ).show();
                    $( "#book_error" ).hide();
                    $( "#error_msg" ).hide();
                    $('#success').show();
                    $('#error_msg').hide();
                }
            });
        }    
    }
}

// calendar plugin

$("#tarikh").datepicker({ 
    minDate: 0,
    dateFormat: 'yy-mm-dd'
});

