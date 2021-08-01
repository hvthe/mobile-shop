var pageLinks = document.querySelectorAll('.page-link');
console.log(pageLinks[2].innerHTML)
for(var i = 0; i < pageLinks.length; i++){
      var pageLink = pageLinks[i];
      pageLink.onclick = function (event){
        event.preventDefault();
        document.querySelector('.page-item.active').classList.remove('active');
        this.parentElement.classList.add('active');
        page = this.href.split('page=')[1];
        $.ajax({
          url: "/product?page="+page,
          success: function(data)
          {
            document.querySelector('#list-data').innerHTML = data
          }
        })
      } 
}
    