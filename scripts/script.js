function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }
function PromenaBoje(DiskusijaID)
{
  $.post( "like.php", { did: DiskusijaID} );
  let srce=document.getElementById("srce"+DiskusijaID);
  srce.src="slike/lajk1.jpg";
  let broj=document.getElementById("broj"+DiskusijaID);
  broj.innerText=parseInt(broj.innerText)+1;
}
function PromenaBoje2(CommentID)
{
  $.post( "like.php", { cid: CommentID} );
  let srce=document.getElementById("broj"+CommentID);
  srce.innerText = parseInt(srce.innerText)+1;
  let broj = document.getElementById("srce"+CommentID);
  broj.src = "slike/lajk1.jpg";
}