$("#fileUpload").on('change', function () {

    //Get count of selected files
    var countFiles = $(this)[0].files.length;

    var imgPath = $(this)[0].value;
    var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
    var image_holder = $("#image-holder");
    image_holder.empty();

    if (extn === "gif" || extn === "png" || extn === "jpg" || extn === "jpeg") {
        if (typeof (FileReader) !== "undefined") {

            //loop for each file selected for uploaded.
            for (var i = 0; i < countFiles; i++) {

                var reader = new FileReader();
                reader.onload = function (e) {
                    $("<img />", {
                        "src": e.target.result,
                        "class": "thumb-image"
                    }).appendTo(image_holder);
                };

                image_holder.show();
                reader.readAsDataURL($(this)[0].files[i]);
            }

        } else {
            alert("Trình duyệt không hỗ trợ xem trước ảnh !");
        }
    } else {
        alert("File tải lên không hợp lệ!\n Hãy chắc chắn file tải lên là ảnh!");
    }
});