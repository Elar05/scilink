import { initializeApp } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-app.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-analytics.js";
import {
  getAuth,
  signInWithPopup,
  GoogleAuthProvider,
} from "https://www.gstatic.com/firebasejs/10.4.0/firebase-auth.js";

const firebaseConfig = {
  apiKey: "AIzaSyA6PPi4AJ1pgu4RFdF3KUwZK1hExl63Dyg",
  authDomain: "genial-reporter-400512.firebaseapp.com",
  projectId: "genial-reporter-400512",
  storageBucket: "genial-reporter-400512.appspot.com",
  messagingSenderId: "423346644923",
  appId: "1:423346644923:web:cb864e25f37bb46e45869e",
  measurementId: "G-FKRNS3L78H",
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);

// Initialize Firebase Authentication and get a reference to the service
const auth = getAuth(app);

document.getElementById("google").addEventListener("click", function (e) {
  e.preventDefault();
  const provider = new GoogleAuthProvider();
  signInWithPopup(auth, provider)
    .then((result) => {
      const user = result.user;
      const { email, displayName, photoURL, providerId } = user.providerData[0];
      authSocialNetwork(email, displayName, photoURL, providerId);
    })
    .catch((error) => {
      // Handle Errors here.
      const errorCode = error.code;
      const errorMessage = error.message;
      // The email of the user's account used.
      const email = error.customData.email;
      // The AuthCredential type that was used.
      const credential = GoogleAuthProvider.credentialFromError(error);
      console.log(error);
    });
});

function authSocialNetwork(email, displayName, photoURL, provider) {
  let data = new FormData();
  data.append("email", email);
  data.append("names", displayName);
  data.append("picture", photoURL);
  data.append("provider", provider);

  fetch("login/authSocialNetwork", {
    method: "POST",
    body: data,
  })
    .then((data) => {
      console.log("Respuesta POST:", data);
      window.location.href = data.url;
    })
    .catch((error) => {
      console.error("Error POST:", error);
    });
}

document.addEventListener("DOMContentLoaded", function () {
  var inputElements = document.querySelectorAll(".input100");

  inputElements.forEach(function (input) {
    input.addEventListener("blur", function () {
      if (input.value.trim() !== "") {
        input.classList.add("has-val");
      } else {
        input.classList.remove("has-val");
      }
    });
  });

  var form = document.querySelector(".validate-form");
  var inputs = form.querySelectorAll(".input100");

  form.addEventListener("submit", function (event) {
    var check = true;

    inputs.forEach(function (input) {
      if (!validate(input)) {
        showValidate(input);
        check = false;
      }
    });

    if (!check) {
      event.preventDefault();
    }
  });

  inputs.forEach(function (input) {
    input.addEventListener("focus", function () {
      hideValidate(input);
    });
  });

  function validate(input) {
    if (
      input.getAttribute("type") === "email" ||
      input.getAttribute("name") === "email"
    ) {
      if (
        !input.value
          .trim()
          .match(
            /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/
          )
      ) {
        return false;
      }
    } else {
      if (input.value.trim() === "") {
        return false;
      }
    }
    return true;
  }

  function showValidate(input) {
    var thisAlert = input.parentElement;
    thisAlert.classList.add("alert-validate");
  }

  function hideValidate(input) {
    var thisAlert = input.parentElement;
    thisAlert.classList.remove("alert-validate");
  }
});
