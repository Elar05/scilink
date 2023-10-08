// Update profile
const formProfile = document.querySelector("#form_profile");
formProfile.addEventListener("submit", function (e) {
  e.preventDefault();
  e.stopPropagation();

  if (formProfile.checkValidity()) {
    let data = new FormData(formProfile);

    fetch(formProfile.action, {
      method: "POST",
      body: data,
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.json();
      })
      .then((data) => {
        let alert = document.querySelector("#alertMessage");
        if ("success" in data) {
          alert.innerHTML = `<div class="alert alert-success" role="alert">
            <strong>${data.success}</strong>
          </div>`;
        } else {
          alert.innerHTML = `<div class="alert alert-success" role="alert">
            <strong>${data.success}</strong>
          </div>`;
        }

        setTimeout(() => {
          alert.innerHTML = "";
        }, 3000);
      })
      .catch((error) => {
        console.error("Fetch error:", error);
      });
  }
});
