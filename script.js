// Jquery Document
alert("Wait for the confirmation message");
$(document).ready(function(){
  
  $("#submitmsg").click(function(){ // When the user hit #submitmessage then..
   // alert(x);
    /*takes the value of the chat box and the message or the value in the clientmsg variable. */
        var clientmsg = $("#usermsg").val();
        //alert(clientmsg);
    // JQuery makes a post request and sends the client message to the post.php page. 
        $.post("post.php", {text: clientmsg, location:x}); 

    // After the user sends the message makes the text box empty. So they can re write .
        $("#usermsg").attr("value", "");
        return false;
    });


function loadLog(){  
        //Scroll height of #chatbod before the request. it saves it to a variable.
        var oldscrollHeight = $("#chatbox").attr("scrollHeight") ; 
       // alert("thisis old"+oldscrollHeight);

        //Makes the ajax request 
        $.ajax({
            url: "log.html",
            cache: false,
            success: function(html){        
                $("#chatbox").html(html); //Insert chat log into the #chatbox div   
                //var audio = new Audio('h.mp3');
                    //audio.play();
                //Auto-scroll           
                var newscrollHeight = $("#chatbox").attr("scrollHeight"); //Scroll height after the request
               // alert("This is new "+newscrollHeight);
                if(newscrollHeight > oldscrollHeight){
                    var audio = new Audio('h.mp3');
                    audio.play();
                    $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
                }               
            },
        });
    }

    // Checks the file if there is any new message.
    setInterval(loadLog, 1900);

});


function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } 
}

function showPosition(position) {
    mm( position.coords.latitude, position.coords.longitude);

}



    function mm(lat, lon){
        var str="http://maps.googleapis.com/maps/api/geocode/json?latlng="+lat+","+lon+"&sensor=true"
        var obj=new XMLHttpRequest();

        obj.onreadystatechange=function (){
            if (obj.readyState==4 && obj.status==200) {
                pro(obj.responseText);
            }
        }

        obj.open("GET", str, true);
        obj.send();
    }


    function pro(v){
        var jsobj=JSON.parse(v);
        x=jsobj.results[1].formatted_address;
        alert("Whole web site loaded! You may start chatting Now");
        //document.getElementById("showPosition").innerHTML="You are from "+jsobj.results[1].formatted_address;
        
    }
