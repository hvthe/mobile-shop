var pageLink = document.querySelectorAll('a.page-link');
console.log(pageLink[2]);
for(var i = 0; i < pageLink.length; i++){
  pageLink.onclick = function (){
    var xmlHttp;
          xmlHttp = new XMLHttpRequest();
          xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
  // tiep nhan du lieu
      xmlHttp.onreadystatechange = function(){
          if(xmlHttp.readyState == 4){
              document.getElementById('featured__product').innerHTML = xmlHttp.responseText;
          }
      }
  // gui yeu cau
      xmlHttp.open('GET', pageLink[i].href,true);
      xmlHttp.send(null);
  }
}