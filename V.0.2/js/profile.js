//New Image Upload

$(document).on("change", "#Upload_new_image", function () {
  console.log("File Selected");
  var file_data = $("#Upload_new_image").prop("files")[0];
  var form_data = new FormData();
  form_data.append("image", file_data);
  form_data.append("user_email", "<?php echo $_SESSION['email']; ?>");

  $.ajax({
    url: "updateuser_profile.php",
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

        $("#view_image").attr("src", "/ats/uploads/" + data.profile_image);

        // Reload the profile
        $("#profile").load(location.href + " #profile");
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

$(document).on("submit", "#profile-form", function (event) {
  // Prevent the default form submission behavior
  event.preventDefault();

  // Get the input field values
  var fullName = $("#inputFullName").val();
  var jobTitle = $("#inputJobTitle").val();
  var email = $("#inputEmailAddress").val();
  var companyName = $("#inputOrgName").val();
  var location = $("#inputLocation").val();
  var phoneNumber = $("#inputPhone").val();
  var dob = $("#inputBirthday").val();

  // Make an AJAX request to update the user data
  $.ajax({
    url: "updateuser_profile.php",
    type: "POST",
    data: {
      name: fullName,
      job_title: jobTitle,
      email: email,
      company_name: companyName,
      location: location,
      phone_number: phoneNumber,
      dob: dob,
    },
    success: function (res) {
      var data = JSON.parse(res);
      if (data.status == "success") {
        alertify.set("notifier", "position", "top-right");
        alertify.success(data.message);

        // Reload the profile
        $("#profile").load(location.href + " #profile");
      } else if (data.status == "error") {
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

$(document).on("click", "#changePasswordBtn", function () {
  var currentPassword = $("#currentPassword").val();
  var newPassword = $("#newPassword").val();
  var confirmPassword = $("#confirmPassword").val();

  if (newPassword !== confirmPassword) {
    alertify.set("notifier", "position", "top-right");
    alertify.error("Passwords do not match, please try again.");
    return false;
  }

  $.ajax({
    url: "updateuser_profile.php",
    type: "POST",
    data: {
      currentPassword: currentPassword,
      newPassword: newPassword,
    },
    success: function (res) {
      var data = JSON.parse(res);
      if (data.status == "success") {
        alertify.set("notifier", "position", "top-right");
        alertify.success(data.message);

        // Clear the input fields
        $("#currentPassword").val("");
        $("#newPassword").val("");
        $("#confirmPassword").val("");
      } else if (data.status == "error" || data.status == "422") {
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
