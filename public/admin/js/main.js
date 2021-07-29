
    var input = document.getElementById('upload');
if(input){
 input.onchange = function showImage() {
    var fileSelected = document.getElementById('upload').files; //Lấy danh sách file đã up
    // console.log(fileSelected)
    if (fileSelected.length > 0) {
        var file = fileSelected[0]; //chọn file cần đọc gán vào biến file
        // console.log(file)
        var fileReader = new FileReader(); // Khởi tạo đối tượng FileReader
        // console.log(fileReader)
        fileReader.onload = function() {
            var url = fileReader.result;  // trả về nội dung file dưới dạng mã hoá base64
            document.getElementById('img_upload').src = url;
        }
        fileReader.readAsDataURL(file); //phương thức. biến ở trên url chứa dữ liệu file dưới dạng link
    }
}
}

var closeMessage = document.querySelector('.message')
if(closeMessage){
    console.log(6546);
// for(var i = 0; i < $closeMessage.length; i++){
    closeMessage.onclick = function close(){
        closeMessage.style.display  = 'none';
    }
// }
}
