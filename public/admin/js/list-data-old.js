var pageItems = document.querySelectorAll('li.page-item');
document.querySelector('.disabled').classList.remove('disabled');
    for(var i = 0; i < pageItems.length; i++){
        var pageLink = pageItems[i].querySelector('a.page-link');

        if( pageLink != null && i == 0 ){
            pageLink.onclick = function (event){
                event.preventDefault();
                if(!this.parentElement.nextElementSibling.classList.contains('active')){
                    var LiActive = document.querySelector('.page-item.active');
                    LiActive.classList.remove('active');
                    LiActive.previousElementSibling.classList.add('active');
                }
            }
        }
        if(pageLink != null && i != 0 && i != pageItems.length-1){
            pageLink.onclick = function (event){
                event.preventDefault();
                document.querySelector('.page-item.active').classList.remove('active');
                this.parentElement.classList.add('active');
                
                // var link = this.href
                // console.log(link);
                // var xmlHttp;
                //     xmlHttp = new XMLHttpRequest();
                //     // tiep nhan du lieu
                //     xmlHttp.onreadystatechange = function(){
                //         if(xmlHttp.readyState == 4){
                //             document.getElementById('list-data').innerHTML = xmlHttp.responseText;
                //         }
                //     }
                //     // gui yeu cau
                //     xmlHttp.open('GET', link,true);
                //     xmlHttp.send(null);
            }
        }
        if( i == pageItems.length-1){
            pageLink.onclick = function (event){
                event.preventDefault();
                if(!this.parentElement.previousElementSibling.classList.contains('active')){
                    var LiActive = document.querySelector('.page-item.active');
                    LiActive.classList.remove('active');
                    LiActive.nextElementSibling.classList.add('active');
                }
            }
        }
    }
    