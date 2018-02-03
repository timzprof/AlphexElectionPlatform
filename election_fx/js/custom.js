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
        success: function(res){
            alert(res)
        },
        error: function(){
            alert("Network Error!!")
        }
    })
}

$("#voters_login").submit(function(e){
    e.preventDefault()

    var username = $("#voters").val()
    var password = $("#password").val()

    $("#logintovote").attr("disabled","disabled")
    $("#logintovote").html("Loading...")

    $.ajax({
        url: "php/la4ga3na.php",
        type: "POST",
        data: {username:username, password:password, logged:"logged"},
        success: function(res){
            $("#logintovote").removeAttr("disabled","disabled")
            $("#logintovote").html("Login")
            if (res=="error1") {
                $("#error_handler").removeClass('hide')
                $("#error_handler").html("Voter does not exist")
            }else if (res=="error2") {
                $("#error_handler").removeClass('hide')
                $("#error_handler").html("Password does not match any voter")
            }else if (res=="loggedin") {
                $("#error_handler").addClass('hide')
                setTimeout(function(){window.location.href="index.php"}, 2000)
                $("#logintovote").attr("disabled","disabled")
                $("#logintovote").html("Logged In...")
            }
        },
        error: function(){
            $("#error_handler").removeClass('hide')
            $("#error_handler").html("No Internet Connection")
            $("#logintovote").removeAttr("disabled","disabled")
            $("#logintovote").html("Login")
        }
    })
})

$(".mugxs").click(function(){
    var id = $("#userId").val()
    var pg = $(this).attr("pgid")
    $("#single_election .loading").removeClass('hide')
    
    $.ajax({
        url: "php/theelection.php",
        type: "POST",
        data: {id:id, pg:pg, elect:"elect"},
        success: function(res){
            $("#single_election").removeClass('hide')
            $("#electiontype").html(pg+" Elections")
            $("#single_election .loading").addClass('hide')
            if (res=="error1") {
                $("#viewelection").html("No <b>ACTIVITIES</b> for the selected election ")
            }else if (res=="error2"){
                $("#viewelection").html("No <b>CANDIDATES</b> for the selected election ")
            }else{
                $("#viewelection").html(res)
            }
        },
        error: function(){}
    })
})

function votenow(vid){
    $(vid).attr("disabled","disabled")
    var id = $("#userId").val()
    var phn = $("#userId").attr("phn")
    var viod = $(vid).val()
    var vrid = $(vid).attr("vrid")
    var vvid = $(vid).attr("vvid")
    $.ajax({
        url: "php/theelection.php",
        type: "POST",
        data: {id:id, viod:viod, vrid:vrid, vvid:vvid, voted:"voted"},
        success: function(res){
            if (res=="error1") {}else if (res=="success") {
                $(".btnVote").attr("disabled","disabled")
                $(vid).attr("disabled","disabled")
                $(vid).html("You have successfully voted!")
                voteSMS(phn)
            }
        },
        error: function(){
            alert("Network Error!!")
        }
    })
}

$("#selectState").on('change', function(){
    var ssl = $(this).val()
    alert(ssl)
})

function selectState(ssl) {
    var id = $("#userId").val()
    $.ajax({
        url: "php/theelection.php",
        type: "POST",
        data: {id:id, ssl:ssl, statenow:"statenow"},
        success: function(res){
            if (res=="error1") {
                $("#stateorlga").html("No <b>ELECTION ACTIVITIES</b> for the selected state ")
            }else if (res=="error2") {
                $("#stateorlga").html("No <b>CANDIDATES</b> for the selected state ")
            }else{
                $("#stateorlga").html(res)
            }
        },
        error: function(){}
    })
}