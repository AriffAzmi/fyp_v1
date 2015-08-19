$( window ).load(function() {

  $('#book_button').hide();

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

//function to check username availability  
//function to check availability  
  
 function check_availability(){
    
    var kelas  = $('#kelas').val();  
    var d_book = $('#tarikh').val();
    var s_time = $('#masamula').val();
    var e_time = $('#masahabis').val();
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1;
    var yyyy = today.getFullYear(); 
    if (dd<10) {
        dd='0'+dd;
    }
    if (mm<10) {
        mm='0'+mm;
    }
    today = yyyy+'-'+mm+'-'+dd;
    
    //Use nested if to check for input errors. If one of the field is not selected, show "Please fill in the form completely"
    if (d_book == "" || s_time == "" || e_time == "" || kelas == "" ) {
        alert("Please fill in the form completely");
        $("#bbok").hide();
        $("#avai").hide();
    }
    else {
        // if date is before today, show "Invalid date"
        if (d_book < today) {
            alert("Invalid date");
            $("#bbok").hide();
            $("#avai").hide();
            $("#box").hide();
        }
        // if start time is later or equal to end time, show "Invalid start time and end time"
        else if (s_time >= e_time) {
            alert("Invalid start time and end time");
            $("#bbok").hide();
            $("#avai").hide();
             $("#box").hide();
        }
        //if everything is ok, proceed with validate.php
        else { 
            $.post("validate.php", { klas: kelas, d_book: d_book, start_time: s_time, end_time: e_time }, function(result){  
                //if the result is 0, show that class is available  
                if(result == '0'){  
                    $('#avai').html('The class' + '\t' + kelas.bold() + '\t' + 'on' + '\t' + d_book.bold() + '\t\t' + 'at' + '\t' + s_time.bold() + '\t\t' + 'until' + '\t' + e_time.bold() + '\t\t' + ' is Available'.bold()).css("background-color","#53FA61");
                    $( "#bbok" ).show();
                    $("#avai").show();
                } 
                //else, not available
                else {
                    $(document).ready(function(){
                       alert("Currently not available. The room have been book by other user on the day and time that you have been choose");
                        $("#bbok").hide();
                        $("#avai").hide();
                    });
                }
            });
        }    
    }
} 
