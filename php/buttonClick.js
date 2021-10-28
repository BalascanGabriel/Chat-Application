setInterval(function(){ getMessages(); }, 3000);
window.onload=()=>{
    let myDiv = document.getElementById("messages");
    myDiv.scrollTop = myDiv.scrollHeight;
}
function getMessages()
{
    $.ajax({
        type: "GET",
        url: 'getMessages.php',
        cache: false,
        data: {message:"message"},
        dataType:'JSON',
        success: function (response) {
            console.log("am primit ceva");
            var myDiv = document.getElementById("messages");
            while (myDiv.firstChild) {
                myDiv.removeChild(myDiv.lastChild);
              }
            response.messages.map((el)=>
            {
                var h5=document.createElement('h5');
                h5.innerText=el;
                h5.style.backgroundColor="grey";
                h5.style.color="white";
                myDiv.appendChild(h5);
            });
            myDiv = document.getElementById("messages");
            myDiv.scrollTop = myDiv.scrollHeight;
         },
     });
}
function send()
{
    console.log("se trimite");
    let val=document.getElementById("inputMessage").value;
    $.ajax({
        type: "POST",
        cache: false,
        url: 'insertMessage.php',
        data: {message:val,data:new Date()},
        dataType:'JSON',
        success: function (response) {
            console.log(response);
            console.log("am primit ceva");
            // You will get response from your PHP page (what you echo or print)
         },
        
     });
     getMessages();
     document.getElementById("inputMessage").value='';
    
}