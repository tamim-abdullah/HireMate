(function ($) {
  "use strict";

  $('[data-toggle="tooltip"]').tooltip();
})(jQuery);

// Add Candidates Modal Ajax
$(document).on("submit", "#addCandidate", function (e) {
  e.preventDefault();

  var formData = new FormData(this);
  formData.append("add_candidate", true);

  $.ajax({
    type: "POST",
    url: "update.php",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      var res = jQuery.parseJSON(response);
      if (res.status == 422) {
        alertify.set("notifier", "position", "top-right");
        alertify.error(res.message);
      } else if (res.status == 200) {
        $("#addCandidateModal").modal("hide");
        $("#addCandidate")[0].reset();

        alertify.set("notifier", "position", "top-right");
        alertify.success(res.message);

        $("#myTable").load(location.href + " #myTable");
      } else if (res.status == 500) {
        alertify.set("notifier", "position", "top-right");
        alertify.error(res.message);
      }
    },
  });
});

// Full size Modal Ajax Edit update next prev

var currentStudentId = null;

function resetModal() {
  console.log("resetModal called");
  // Reset the input fields to their original values
  $("#view_first_name").html($("#view_first_name").data("orig-value"));
  $("#view_last_name").html($("#view_last_name").data("orig-value"));
  $("#view_email").html($("#view_email").data("orig-value"));
  $("#view_tags").html($("#view_tags").data("orig-value"));
  $("#view_linkedin").html($("#view_linkedin").data("orig-value"));
  $("#view_image").html($("#view_image").data("orig-value"));
  // Change the button text and ID back to "Edit"
  $(".editStudentBtn")
    .text("Edit")
    .attr("id", "editStudentBtn")
    .attr("data-student-id", student_id);
  $(".editStudentBtn").removeClass("btn-primary").addClass("btn-info");

  // Reset the form's validation state and error message
  $("#updateStudent")[0].reset();
  $("#errorMessageUpdate").addClass("d-none");
}

//Update modal data from server
function updateModal() {
  resetModal();
  $.ajax({
    type: "GET",
    url: "update.php?student_id=" + currentStudentId,
    success: function (response) {
      var res = jQuery.parseJSON(response);
      if (res.status == 404) {
        alert(res.message);
      } else if (res.status == 200) {
        $("#view_first_name").text(res.data.first_name);
        $("#view_last_name").text(res.data.last_name);
        $("#view_job_title").text(res.data.title);
        $("#view_email").text(res.data.email);
        $("#view_phone").text(res.data.phone);
        $("#view_tags").text(res.data.tags);
        $("#view_linkedin").html(
          "<a href='" +
            res.data.linkedin +
            "' target='_blank'><i class='bx bxl-linkedin-square' style='font-size: 2em'></i></a>"
        );
        $("#view_image").attr("src", res.data.image);
      }
    },
  });
}

$(document).on("click", ".img, .email", function () {
  var student_id = $(this).data("student-id");
  currentStudentId = student_id; // Store the current student ID

  $.ajax({
    type: "GET",
    url: "update.php?student_id=" + student_id,
    success: function (response) {
      var res = jQuery.parseJSON(response);
      if (res.status == 404) {
        alert(res.message);
      } else if (res.status == 200) {
        $("#view_first_name").text(res.data.first_name);
        $("#view_last_name").text(res.data.last_name);
        $("#view_job_title").text(res.data.title);
        $("#view_email").text(res.data.email);
        $("#view_phone").text(res.data.phone);
        $("#view_tags").text(res.data.tags);
        $("#view_linkedin").html(
          "<a href='" +
            res.data.linkedin +
            "' target='_blank'><i class='bx bxl-linkedin-square' style='font-size: 2em'></i></a>"
        );
        $("#view_image").attr("src", res.data.image);
        $("#fullSizeModal").modal("show");
        // Set the data-student-id attribute of the editStudentBtn button
        $(".editStudentBtn").attr("data-student-id", currentStudentId);
      }
    },
  });
});

// Click event handler for the Next button
$(document).on("click", "#nextButton", function () {
  var nextStudentId = currentStudentId + 1;
  resetModal();
  $.ajax({
    type: "GET",
    url: "update.php?student_id=" + nextStudentId,
    success: function (response) {
      var res = jQuery.parseJSON(response);
      if (res.status == 404) {
        alert(res.message);
      } else if (res.status == 200) {
        $("#view_first_name").text(res.data.first_name);
        $("#view_last_name").text(res.data.last_name);
        $("#view_job_title").text(res.data.title);
        $("#view_email").text(res.data.email);
        $("#view_phone").text(res.data.phone);
        $("#view_tags").text(res.data.tags);
        $("#view_linkedin").html(
          "<a href='" +
            res.data.linkedin +
            "' target='_blank'><i class='bx bxl-linkedin-square' style='font-size: 2em'></i></a>"
        );
        $("#view_image").attr("src", res.data.image);
        currentStudentId = nextStudentId; // Update the current student ID
      }
    },
  });
});

// Click event handler for the Prev button
$(document).on("click", "#prevButton", function () {
  var prevStudentId = currentStudentId - 1;
  resetModal();
  $.ajax({
    type: "GET",
    url: "update.php?student_id=" + prevStudentId,
    success: function (response) {
      var res = jQuery.parseJSON(response);
      if (res.status == 404) {
        alert(res.message);
      } else if (res.status == 200) {
        $("#view_first_name").text(res.data.first_name);
        $("#view_last_name").text(res.data.last_name);
        $("#view_job_title").text(res.data.title);
        $("#view_email").text(res.data.email);
        $("#view_phone").text(res.data.phone);
        $("#view_tags").text(res.data.tags);
        $("#view_linkedin").html(
          "<a href='" +
            res.data.linkedin +
            "' target='_blank'><i class='bx bxl-linkedin-square' style='font-size: 2em'></i></a>"
        );
        $("#view_image").attr("src", res.data.image);
        currentStudentId = prevStudentId; // Update the current student ID
      }
    },
  });
});

$(document).on("click", ".editStudentBtn", function () {
  var student_id = currentStudentId;
  console.log("Button clicked");
  console.log(student_id);

  $.ajax({
    type: "GET",
    url: "update.php?student_id=" + student_id,
    success: function (response) {
      var res = jQuery.parseJSON(response);
      if (res.status == 404) {
        alert(res.message);
      } else if (res.status == 200) {
        $("#view_first_name").html(
          "<input type='text' id='edit_first_name' class='form-control' value='" +
            res.data.first_name +
            "'/>"
        );
        $("#view_last_name").html(
          "<input type='text' id='edit_last_name' class='form-control' value='" +
            res.data.last_name +
            "'/>"
        );
        $("#view_email").html(
          "<input type='text' id='edit_email' class='form-control' value='" +
            res.data.email +
            "'/>"
        );
        $("#view_tags").html(
          "<input type='text' id='edit_tags' class='form-control' value='" +
            res.data.tags +
            "'/>"
        );
        $("#view_linkedin").html(
          "<input type='text' id='edit_linkedin' class='form-control' value='" +
            res.data.linkedin +
            "'/>"
        );

        $(".editStudentBtn")
          .text("Update")
          .attr("id", "updateStudent")
          .attr("data-student-id", student_id);

        $(".editStudentBtn").removeClass("btn-info").addClass("btn-primary");

        $("#fullSizeModal").on("hidden.bs.modal", function () {
          resetModal();
        });
      }
    },
  });
});

$(document).on("click", "#updateStudent", function () {
  var student_id = currentStudentId;
  var first_name = $("#edit_first_name").val();
  var last_name = $("#edit_last_name").val();
  var email = $("#edit_email").val();
  var tags = $("#edit_tags").val();
  var linkedin = $("#edit_linkedin").val();

  $.ajax({
    type: "POST",
    url: "update.php",
    data: {
      update_student: true,
      student_id: student_id,
      first_name: first_name,
      last_name: last_name,
      email: email,
      tags: tags,
      linkedin: linkedin,
    },
    success: function (response) {
      var res = jQuery.parseJSON(response);
      if (res.status == 404) {
        alert(res.message);
      } else if (res.status == 422) {
        $("#errorMessageUpdate").removeClass("d-none");
        $("#errorMessageUpdate").text(res.message);
      } else if (res.status == 200) {
        $("#errorMessageUpdate").addClass("d-none");

        alertify.set("notifier", "position", "top-left");
        alertify.success(res.message);

        $("#view_first_name").text(res.data.first_name);
        $("#view_last_name").text(res.data.last_name);
        $("#view_job_title").text(res.data.title);
        $("#view_email").text(res.data.email);
        $("#view_phone").text(res.data.phone);
        $("#view_tags").text(res.data.tags);
        $("#view_linkedin").html(
          "<a href='" +
            res.data.linkedin +
            "' target='_blank'><i class='bx bxl-linkedin-square' style='font-size: 2em'></i></a>"
        );
        $("#view_image").attr("src", res.data.image);

        $("#fullSizeModal").on("hidden.bs.modal", function () {
          resetModal();
        });

        // Reload the table and fullSizeModal
        $("#myTable").load(location.href + " #myTable");

        // Change the text of the button back to "Edit" and its ID back to "editStudentBtn"
        var editStudentBtn = $(".editStudentBtn");
        if (editStudentBtn.length) {
          editStudentBtn
            .text("Edit")
            .attr("id", "editStudentBtn")
            .attr("data-student-id", student_id);
          editStudentBtn.removeClass("btn-primary");
          editStudentBtn.addClass("btn-info");
        }
      } else if (res.status == 500) {
        alert(res.message);
      }
    },
  });
});
//New Image Upload

$(document).on("change", "#Upload_new_image", function () {
  console.log("File Selected");
  var file_data = $("#Upload_new_image").prop("files")[0];
  var form_data = new FormData();
  form_data.append("image", file_data);
  form_data.append("student_id", currentStudentId);

  $.ajax({
    url: "update.php",
    dataType: "text",
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,
    type: "post",
    success: function (res) {
      var data = JSON.parse(res);
      if (data.status == 200) {
        alertify.set("notifier", "position", "top-right");
        alertify.success(data.message);

        updateModal();
        $("#view_image").attr("src", data.image_url);
        $("#fullSizeModal").on("hidden.bs.modal", function () {
          resetModal();
        });

        // Reload the table and fullSizeModal
        $("#myTable").load(location.href + " #myTable");
      } else if (data.status == 422) {
        alertify.set("notifier", "position", "top-right");
        alertify.error(data.message);
      } else if (data.status == 500) {
        alertify.set("notifier", "position", "top-right");
        alertify.error(data.message);
      }
    },
    error: function () {
      alertify.set("notifier", "position", "top-right");
      alertify.error("Error Occured, please try again!");
    },
  });
});

// End Full size Modal Ajax Edit update next prev

// Bind click event of "Select All" checkbox for dynamically added content

$(document).on("click", "#selectAll", function () {
  console.log("selectAll Clicked");
  var checkbox = $('table tbody input[type="checkbox"]');
  if (this.checked) {
    checkbox.each(function () {
      this.checked = true;
    });
  } else {
    checkbox.each(function () {
      this.checked = false;
    });
  }
});

// Delete Data Single

$(document).on("click", "#deleteStudentBtn", function (e) {
  var student_id = $(this).val();

  $.ajax({
    type: "POST",
    url: "update.php",
    data: {
      delete_student: true,
      student_id: student_id,
    },
    success: function (response) {
      var res = jQuery.parseJSON(response);
      if (res.status == 500) {
        alert(res.message);
      } else {
        alertify.set("notifier", "position", "top-right");
        alertify.success(res.message);

        $("#fullbody").load(location.href + " #fullbody");
      }
    },
  });
});

// Delete Data Multiple with checkbox

$(document).on("click", "#deleteMultipleBtn", function () {
  var all_ids = $('input[name="stud_delete_id[]"]:checked')
    .map(function () {
      return $(this).val();
    })
    .get();

  if (all_ids.length > 0) {
    $.ajax({
      type: "POST",
      url: "update.php",
      data: {
        delete_multiple_students: true,
        student_ids: all_ids.join(","),
      },
      success: function (response) {
        var res = jQuery.parseJSON(response);
        if (res.status == 500) {
          alertify.error(res.message);
        } else {
          $("#fullbody").load(location.href + " #fullbody", function () {
            $("#deleteEmployeeModal").modal("hide");
            $("body").removeClass("modal-open");
            $(".modal-backdrop").remove();
          });
          alertify.success("Multiple Candidates Deleted successfully");
        }
      },
    });
  } else {
    alertify.error("Please select at least one record to delete.");
  }
});
