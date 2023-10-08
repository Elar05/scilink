import { urlBase } from "./exports.js";

// Add new project
const formProject = document.querySelector("#form_project");
if (formProject) {
  formProject.addEventListener("submit", function (e) {
    e.preventDefault();
    e.stopPropagation();

    if (formProject.checkValidity()) {
      let data = new FormData(formProject);

      fetch(formProject.action, {
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
          formProject.reset();

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
  });

  // Preview image project
  const image = document.getElementById("image");
  const imagePreview = document.getElementById("imagePreview");
  // Agrega un evento change al input para detectar cambios en la selección de archivos
  image.addEventListener("change", function () {
    console.log(1);
    // Verifica si se seleccionó una imagen
    if (image.files.length > 0) {
      // Obtén el archivo seleccionado
      const file = image.files[0];

      // Crea un objeto URL para la imagen seleccionada
      const imageUrl = URL.createObjectURL(file);

      // Establece la fuente de la imagen de vista previa con la URL generada
      imagePreview.src = imageUrl;

      // Muestra la imagen de vista previa
      imagePreview.classList.remove("d-none");
    } else {
      // Si no se seleccionó ninguna imagen, oculta la vista previa
      imagePreview.src = "";
      imagePreview.classList.add("d-none");
    }
  });
}

// Add participant to project
const applyProject = document.querySelector("#applyProject");
if (applyProject) {
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
          window.location.reload();
        } else {
          console.log("Error, " + data.error);
        }
      })
      .catch((error) => {
        console.error("Fetch error:", error);
      });
  });
}

// Add comment to project
const formComment = document.querySelector("#form_comment");
if (formComment) {
  formComment.addEventListener("submit", function (e) {
    e.preventDefault();
    e.stopPropagation();

    if (formComment.checkValidity()) {
      let data = new FormData(formComment);

      fetch(formComment.action, {
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
          // formComment.reset();

          if ("success" in data) {
            console.log("Éxito, " + data.success);
            window.location.reload();
          } else {
            console.log("Error, " + data.error);
          }
        })
        .catch((error) => {
          console.error("Fetch error:", error);
        });
    }
  });
}

// Add like to project
const like = document.querySelector("#like");
if (like) {
  like.addEventListener("click", function (e) {
    e.preventDefault();

    const data = new FormData();
    data.append("idproject", like.dataset.project);

    fetch(`${urlBase}/like/store`, {
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
        let likesSpan = document.querySelector("#likes");
        let likes = parseInt(likesSpan.textContent);
        if ("success" in data) {
          likes++;
        } else {
          likes--;
        }

        likesSpan.textContent = likes;
      })
      .catch((error) => {
        console.error("Fetch error:", error);
      });
  });
}
