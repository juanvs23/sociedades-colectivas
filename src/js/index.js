const selectSearchColectiveSociety = document.getElementById(
  "search-colective-society"
);
const formSociety = document.getElementById("form-colective-society");
const formSocietyAction = document.getElementById("action");
const formSocietySecurity = document.getElementById("action");
const societyLoader = document.getElementById("society-loader");
const infoContent = document.getElementById("info-content");

if (selectSearchColectiveSociety) {
  selectSearchColectiveSociety.addEventListener("change", () => {
    document.getElementById("send").click();
  });
  formSociety.addEventListener("submit", (e) => {
    e.preventDefault();
    const url = asipi_colective_society_ajax.admin_ajax;
    if (document.querySelector(".info-alert")) {
      document.querySelector(".info-alert").remove();
    }
    if (document.querySelector(".info-success")) {
      document.querySelector(".info-success").remove();
    }
    societyLoader.style.display = "block";

    const formData = new FormData();
    formData.append("country", selectSearchColectiveSociety.value);
    formData.append("security", formSocietySecurity.value);
    formData.append("action", formSocietyAction.value);

    /*  for (let [name, value] of formData) {
      alert(`${name} = ${value}`); // key1 = value1, luego key2 = value2
    } */

    fetch(url, {
      method: "POST",
      body: formData,
    })
      .then((res) => res.json())
      .then((res) => {
        societyLoader.style.display = "none";
        console.log(res);
        if (res.error == true) {
          infoContent.innerHTML = `<div class="info-alert"><h3>${res.message}</h3></div>`;
        } else {
          const { societies, term } = res;

          let information = '<ol class="societies">';
          let societiesHTML = societies.map((society) => {
            return `<li class="society"><a href="${society.link}">${society.title}</a></li>`;
          });
          information += societiesHTML;
          information += "</ol>";
          infoContent.innerHTML = `<div class="info-success"><h3>${term.name}</h3>${information}</div>`;
        }
      })
      .catch((err) => {
        console.log(err);
      });
  });
}
document.addEventListener("DOMContentLoaded", () => {});
