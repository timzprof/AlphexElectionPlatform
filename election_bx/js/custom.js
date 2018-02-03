$(function() {

    $('#side-menu').metisMenu();

});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    var element = $('ul.nav a').filter(function() {
        return this.href == url || url.href.indexOf(this.href) == 0;
    }).addClass('active').parent().parent().addClass('in').parent();
    if (element.is('li')) {
        element.addClass('active');
    }
});

function voteSMS(recipient){
    $.ajax({
        url:'php/sms.php',
        method: 'POST',
        data: {recipient:recipient, voteSms:"voteSms"},
        success: function(){
            alert("Voting successfully completed!!")
        },
        error: function(){
            alert("Network Error!!")
        }
    })
}

$("#add_candidate").submit(function(e){
    e.preventDefault()
    var candidate_name = $("#name").val()
    var candidate_election = $("#candidate_election").val()
    var candidate_dob = $("#date").val()
    var candidate_party  = $("#party").val()
    var candidate_tenure = $("#candidate_tenure").val()
    if (candidate_election!="State") {
        var candidate_election_state = "Nigeria";
    }else{
        var candidate_election_state = $("#candidate_election_state").val()
    }
    $.ajax({
        url: "php/theelection.php",
        type: "POST",
        data: {candidate_election:candidate_election, candidate_name:candidate_name, candidate_dob:candidate_dob, candidate_party:candidate_party, candidate_tenure:candidate_tenure, candidate_election_state:candidate_election_state, created:"created"},
        success: function(res){
            if (res=="error") {
                $("#error_handler").removeClass('hide')
                $("#error_handler").css({"background-color":"red"})
                $("#error_handler").html("Something went wrong, Account Not Created")
            }else {
                $("#error_handler").removeClass('hide')
                $("#error_handler").css("background-color", "green")
                $("#error_handler").html("Candidate Successfully Registered!")
            }
        },
        error: function(){
            $("#error_handler").removeClass('hide')
            $("#error_handler").html("No Internet Connection")
        }
    })
})

function cSelect(sel) {
    if (sel=="State") {
        $("#stateselected").removeClass('hide')
    }else{
        $("#stateselected").addClass('hide')
    }
}

$("#set_election").submit(function(e){
    e.preventDefault()
    var election_type  = $("#election_type").val()
    var election_year = $("#election_year").val()
    if (election_type!="State") {
        var election_state = "Nigeria";
    }else{
        var election_state = $("#election_state").val()
    }
    $.ajax({
        url: "php/setelection.php",
        type: "POST",
        data: {election_type:election_type, election_year:election_year, election_state:election_state, setElection:"setElection"},
        success: function(res){
            if (res=="error") {
                $("#error_handler").removeClass('hide')
                $("#error_handler").css("background-color", "red")
                $("#error_handler").html("Election Not Set, An Error Occurred")
            }else if (res=="success") {
                $("#error_handler").removeClass('hide')
                $("#error_handler").css("background-color", "green")
                $("#error_handler").html("Election Set Successfully")
            }else if (res=="nothing") {
                alert("Nothing")
            }
        },
        error: function(){
            $("#error_handler").removeClass('hide')
            $("#error_handler").html("No Internet Connection")
        }
    })
})