$(".master").removeClass("active");
$("#admin").addClass("active");

$("#open-modal").click(function (e) {
  e.preventDefault();
  $("#modal-form").modal("toggle");
});
$("#modal-form").modal("toggle");
