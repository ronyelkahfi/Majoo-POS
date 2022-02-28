$("#datatable").DataTable({
  serverside: true,
});
$(".select2").select2({
  placeholder: "Select a customer",
  initSelection: function (element, callback) {},
});
// tinymce.init({
//   selector: "#description",
// });

ClassicEditor.create(document.querySelector("#description"))
  .then((editor) => {
    console.log(editor);
  })
  .catch((error) => {
    console.error(error);
  });
function submitProduct() {
  //   alert();
  var formData = new FormData("#frm-product");
}
$("#frm-product").submit(function (e) {
  e.preventDefault();
  var formData = new FormData(this);
  console.log(formData);
  $.ajax({
    type: "POST",
    url: url + "product/create",
    data: formData, //$("#frm-product").serialize() + "&image=" + $("#fileimage").val(),
    success: function (res) {
      var result = jQuery.parseJSON(res);
      console.log(result);
      if (result.success == false) {
        $("#message").html('<div class="alert alert-danger" role="alert">' + result.message + "</div>");
      } else {
        $("#message").html('<div class="alert alert-success" role="alert">Add Product Success</div>');
        $("#product-name").val("");
        $("#category").removeClass("select2");
        $("#category").val("");
        $("#category").addClass("select2");
        $("#price").val("");
        $("#fileimage").val("");
        $("#description").html("");
      }
    },
    xhr: function () {
      var xhr = new window.XMLHttpRequest();
      xhr.upload.addEventListener(
        "progress",
        function (evt) {
          if (evt.lengthComputable) {
            var percentComplete = evt.loaded / evt.total;
            percentComplete = parseInt(percentComplete * 100);
            $("#image-progress").text(percentComplete + "%");
            $("#image-progress").css("width", percentComplete + "%");
          }
        },
        false
      );
      return xhr;
    },
    cache: false,
    contentType: false,
    processData: false,
  });
  //   $.ajax({
  //     url: window.location.pathname,
  //     type: "POST",
  //     data: formData,
  //     success: function (data) {
  //       alert(data);
  //     },
  //     cache: false,
  //     contentType: false,
  //     processData: false,
  //   });
});

function clearForm() {
  //   $("#frm-product").reset();
  document.getElementById("frm-product").reset();
  //   $("#product-name").val("");
  $("#category").select2("val", "");

  //   $("#category").val("");
  //   $("#category").addClass("form-control select2");
  //   $("#price").val("");
  //   $("#fileimage").val("");
  //   $("#description").html("");
}
