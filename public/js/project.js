// Add new project
const formProject = document.querySelector("#form_project");

formProject.addEventListener("submit", function (e) {
  e.preventDefault();
  e.stopPropagation();

  let form = this;
  if (form.checkValidity()) {
    let data = new FormData(form);

    fetch(form.action, {
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
        form.reset();

        if ("success" in data) {
          console.log("Éxito, " + data.success);
          window.location.href = "http://localhost/scilink/project";
        } else {
          console.log("Error, " + data.error);
        }
      })
      .catch((error) => {
        console.error("Fetch error:", error);
      });
  }

  form.classList.add("was-validated");
});
