function validateRegistration(){
    let Username=document.getElementById("Username").value;
    let Email=document.getElementById("Email").value;
    let Password=document.getElementById("Password").value;
    let Password2=document.getElementById("Password2").value;
    if(Username=="" || Email=="" || Password=="" || Password2=="")
        return false;
    if(Password != Password2)
        return false;
    return true;
}

function validateLogin(){
    let Email=document.getElementById("Email").value;
    let Password=document.getElementById("Password").value;
    if(Email=="" || Password=="")
        return false;
    return true;
}
function validateDiscussion()
{
    let Naslov=document.getElementById("Naslov").value;
    let Tekst=document.getElementById("Tekst").value;
    if(Tekst=="" || Naslov=="")
    return false;
    return true;
}