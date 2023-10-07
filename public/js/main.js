import { urlBase } from "./exports.js";

document.addEventListener("DOMContentLoaded", function () {
  const filterByCategory = document.querySelectorAll(".categories");
  filterByCategory.forEach(function (element) {
    element.addEventListener("click", filterProjects);
  });

  const filterByName = document.getElementById("name");
  filterByName.addEventListener("input", filterProjects);
});

function filterProjects() {
  const categories = getCheckedValue();
  const name = document.getElementById("name").value;

  const data = new FormData();
  data.append("name", name);
  for (const category of categories) {
    data.append("category[]", category);
  }

  fetch(`${urlBase}project/getLastProjects`, {
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
          projects.innerHTML += `<div class="col">
            <div class="card">
              <img src="${urlBase}/${project.url}" alt="Project Image" class="card-img-top">
              <div class="card-body">
                <h5 class="card-title">${project.name}</h5>
                <p class="card-text">Likes: ${project.likes} - Comments: ${project.comments}</p>
                <p class="card-text"><span class="badge bg-secondary text-decoration-none link-light">${project.category}</span></p>
                <a class="btn btn-info" href="${urlBase}/project/show/${project.slug}">Details <i class="fas fa-share"></i></a>
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
