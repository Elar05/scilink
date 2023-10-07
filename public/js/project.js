import { urlBase } from "./exports.js";

// Add new project
const formProject = document.querySelector("#form_project");
if (formProject) {
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
}

// Add participant to project
const applyProject = document.querySelector("#applyProject");

applyProject.addEventListener("click", function (e) {
  e.preventDefault();

  const data = new FormData();
  data.append("idproject", applyProject.dataset.project);

  fetch(`${urlBase}/participant/add`, {
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
      if ("success" in data) {
        console.log("Éxito, " + data.success);
      } else {
        console.log("Error, " + data.error);
      }
    })
    .catch((error) => {
      console.error("Fetch error:", error);
    });
});
