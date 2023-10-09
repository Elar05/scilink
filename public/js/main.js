import { urlBase } from "./exports.js";

document.addEventListener("DOMContentLoaded", function () {
  const filterByCategory = document.querySelectorAll(".categories");
  filterByCategory.forEach(function (element) {
    element.addEventListener("click", filterProjects);
  });

  const filterByName = document.getElementById("search_projects");
  filterByName.addEventListener("click", filterProjects);
});

function filterProjects() {
  const categories = getCheckedValue();
  const name = document.getElementById("name").value;

  const data = new FormData();
  data.append("name", name);
  for (const category of categories) {
    data.append("category[]", category);
  }

  let url = window.location.href;
  let last = url.split("/").pop();

  fetch(`${urlBase}${last}/getLastProjects`, {
    method: "POST",
    body: data,
  })
    .then(function (response) {
      if (response.ok) {
        return response.json();
      } else {
        throw new Error("Error en la solicitud");
      }
    })
    .then(function (data) {
      const projects = document.getElementById("contentProjects");
      projects.innerHTML = "";

      if (data.length > 0) {
        data.forEach(function (project) {
          let img =
            project.url != null
              ? `<img src="${urlBase}${project.url}" alt="Project Image" class="card-img-top">`
              : "";
          projects.innerHTML += `<div class="col">
            <div class="card">
              ${img}
              <div class="card-body">
                <h5 class="card-title">${project.name}</h5>
                
                <div class="d-flex justify-content-between my-3">
                  <span>Likes: ${project.likes}</span>
                  <span>Comments: ${project.comments}</span>
                  <span>Members: ${project.participants}</span>
                </div>

                <p class="text-card">Category: <span class="badge bg-secondary text-decoration-none link-light text-uppercase">Science</span></p>

                <div class="d-grid pt-2">
                  <a class="btn button-project text-uppercase" href="${urlBase}${last}/show/${project.slug}">Details</a>
                </div>
              </div>
            </div>
          </div>`;
        });
      }
    })
    .catch(function (error) {
      console.error(error);
    });
}

function getCheckedValue() {
  const checkboxes = document.querySelectorAll(
    `input[name='categories']:checked`
  );
  const array = Array.from(checkboxes).map(function (checkbox) {
    return checkbox.value;
  });
  return array;
}
