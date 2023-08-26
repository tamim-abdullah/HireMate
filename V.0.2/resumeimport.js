// Import CSV page js start
const form = document.querySelector("form"),
  fileInput = document.querySelector(".file-input"),
  progressArea = document.querySelector(".progress-area"),
  uploadedArea = document.querySelector(".uploaded-area");

// form click event
form.addEventListener("click", () => {
  fileInput.click();
});

fileInput.onchange = ({ target }) => {
  let file = target.files[0]; //getting file [0] this means if user has selected multiple files then get first one only
  if (file) {
    let fileName = file.name; //getting file name
    if (fileName.length >= 12) {
      //if file name length is greater than 12 then split it and add ...
      let splitName = fileName.split(".");
      fileName = splitName[0].substring(0, 13) + "... ." + splitName[1];
    }
    uploadFile(file, fileName); //calling uploadFile with passing file and fileName as arguments
  }
};

// file upload function
function uploadFile(file, fileName) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "/ats/resume_file.php");

  xhr.upload.addEventListener("progress", ({ loaded, total }) => {
    let fileLoaded = Math.floor((loaded / total) * 100);
    let fileTotal = Math.floor(total / 1000);
    let fileSize;
    fileTotal < 1024
      ? (fileSize = fileTotal + " KB")
      : (fileSize = (loaded / (1024 * 1024)).toFixed(2) + " MB");
    let progressHTML = `<li class="row">
                          <i class="fas fa-file-alt"></i>
                          <div class="content">
                            <div class="details">
                              <span class="name">${fileName} • Uploading</span>
                              <span class="percent">${fileLoaded}%</span>
                            </div>
                            <div class="progress-bar">
                              <div class="progress" style="width: ${fileLoaded}%"></div>
                            </div>
                          </div>
                        </li>`;
    uploadedArea.classList.add("onprogress");
    progressArea.innerHTML = progressHTML;
  });

  xhr.addEventListener("load", () => {
    if (xhr.status === 200) {
      const resumeURL =
        "https://hiremate.webdevxio.com/ats/uploads/" +
        xhr.responseText.replace(/ /g, "%20");

      // Get the file URL from the response

      let fileTotal = Math.floor(file.size / 1000);
      let fileSize;
      fileTotal < 1024
        ? (fileSize = fileTotal + " KB")
        : (fileSize = (file.size / (1024 * 1024)).toFixed(2) + " MB");

      progressArea.innerHTML = "";
      let uploadedHTML = `<li class="row">
                            <div class="content upload">
                              <i class="fas fa-file-alt"></i>
                              <div class="details">
                                <span class="name">${fileName} • Uploaded</span>
                                <span class="size">${fileSize}</span>
                              </div>
                            </div>
                            <i class="fas fa-check"></i>
                          </li>`;
      uploadedArea.classList.remove("onprogress");
      uploadedArea.insertAdjacentHTML("afterbegin", uploadedHTML);

      // Call the external API for parsing the resume
      console.log(resumeURL);
      parseResume(resumeURL);
    } else {
      // Handle any errors here
      console.error("Error uploading the file.");
    }
  });

  let data = new FormData();
  data.append("file", file); // Add the file to the FormData
  xhr.send(data);
}

function parseResume(url) {
  const apiKey = "bKUc1f9WQxLSRgT3bpObNb9u4Q5lpG1T";
  const apiEndpoint = `https://api.apilayer.com/resume_parser/url?url=${encodeURIComponent(
    url
  )}`;

  const requestOptions = {
    method: "GET",
    redirect: "follow",
    headers: {
      apikey: apiKey,
    },
  };

  fetch(apiEndpoint, requestOptions)
    .then((response) => response.json())
    .then((result) => {
      console.log(result);
      // Send the data to a PHP script using AJAX
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "/ats/resumeinsert.php");
      xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
      xhr.onload = function () {
        if (xhr.status === 200) {
          console.log(xhr.responseText);
        }
      };
      xhr.send(JSON.stringify(result));
    })
    .catch((error) => console.log("error", error));
}
