 document.querySelector("#pass").addEventListener("focusout", perfectPass, true);
  document.querySelector("#Rpass").addEventListener("keyup", matchPass, true);
  document.querySelector("#email").addEventListener("focusout", check, true);
   
    function perfectPass(){
      var perfectPassOK;
     valueofPass=document.querySelector("#pass").value;
      if (valueofPass.length<8) {
        perfectPassOK=false;
        document.getElementById("errorP").innerHTML="Must be atleast 8 char long";

        //return perfectPassOK;
      } else{

       perfectPassOK=true;
        document.getElementById("errorP").innerHTML="Password Accepted";

      }
       
      return perfectPassOK;
    }//END OF FUNCTION perfectPass


    function matchPass(){
      valueofRPass=document.querySelector("#Rpass").value;
      var matchPassOk;
      if (valueofPass===valueofRPass) {
         matchPassOk=true;
        document.getElementById("errorRp").innerHTML="Password Matched!";
      }
      else{
        matchPassOk=false;
         document.getElementById("errorRp").innerHTML="Password don't match";
       }
       return matchPassOk;
      }// End of match pass


    function check(){
      var httpObj=new XMLHttpRequest();
      var userE="checkEmail="+document.getElementById("email").value;
      var ache="false";
      httpObj.onreadystatechange=function(){
        if (httpObj.readyState==4 && httpObj.status=="200") {
         ache=httpObj.responseText;
        // alert("after DB "+ache);
          if (ache=="true") {
      document.getElementById("errorE").innerHTML="This Email Exists in out database";
          }
          //alert(ache);

        }
      }// End of check

      httpObj.open("POST","signupCheck.php",true);
      httpObj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      httpObj.setRequestHeader("Content-length", userE.length);
      httpObj.setRequestHeader("Connection", "close");
      httpObj.send(userE);

      return ache;
      }// End of check


    function validate(){
      if(perfectPass() && matchPass() && check()=="false"){
       // alert(check());
        return true;
      }
      alert("Please Fix The Errors Below");

      return false;
    }// End of validate
