document.getElementById("contactForm").addEventListener("submit", function(event) {
    
    event.preventDefault();

    var fullname = document.getElementById("fullname").value;
    var email = document.getElementById("email").value;
    var phoneNumber = document.getElementById("phoneNumber").value;
    var message = document.getElementById("subject").value;


    document.getElementById("userName").innerText = fullname;
    document.getElementById("userEmail").innerText = email;
    document.getElementById("userNumber").innerText = phoneNumber;
    document.getElementById("userMessage").innerText = message;

    document.getElementById("contactForm").reset();

    
     document.getElementById("userDetails").style.display = "block";
     


})

function editDetails() {
    var fullname = document.getElementById("userName").innerText;
    var email = document.getElementById("userEmail").innerText;
    var phoneNumber = document.getElementById("userNumber").innerText;
    var message = document.getElementById("userMessage").innerText;

    document.getElementById("fullname").value = fullname;
    document.getElementById("email").value = email;
    document.getElementById("phoneNumber").value = phoneNumber;
    document.getElementById("subject").value = message;

    document.getElementById("userDetails").style.display = "none";
}

function deleteDetails() {
    document.getElementById("userName").innerText = "";
    document.getElementById("userEmail").innerText = "";
    document.getElementById("userNumber").innerText = "";
    document.getElementById("userMessage").innerText = "";

    document.getElementById("userDetails").style.display = "none";
}