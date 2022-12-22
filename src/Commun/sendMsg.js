function sendMail(){
    var params ={
        name: document.getElementById("name").value,
        email: document.getElementById("emailAddress").value,
        message: document.getElementById("message").value,

    };
    const serviceID = "service_cftbtr7";
const templateID = "template_fleq90r";

emailjs.send(serviceID,templateID,params)
.then(
    res => {
        document.getElementById("name").value="";
        document.getElementById("emailAddress").value="";
        document.getElementById("message").value=""; 
        console.log(res);
        alert("Email Envoi du formulaire réussi!");

    }
).catch((err)=>console.log(err));
}
