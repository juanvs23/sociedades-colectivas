const selectSearchColectiveSociety = document.getElementById(
  "search-colective-society"
);
const formSociety = document.getElementById("form-colective-society");
const formSocietyAction = document.getElementById("action");
const formSocietySecurity = document.getElementById("action");
const societyLoader = document.getElementById("society-loader");
const infoContent = document.getElementById("info-content");

async function getMap(
  title = "",
  colorCountry = "#009e4a",
  zoom = "2.47",
  position = { lat: -60, lng: -10.4807975 }
) {
  const mapData = await fetch(
    "https://code.highcharts.com/mapdata/custom/world.topo.json"
  ).then((response) => response.json());
  Highcharts.mapChart("asipiMAp", {
    title: {
      text: `<b style="color:${colorCountry}">${title}</b>`,
      useHTML: true,
      margin: 0,
      style: { color: colorCountry, fontSize: "30px" },
    },
    legend: {
      enabled: false,
      borderWidth: 0,
      borderRadius: 7,
    },
    plotOptions: {
      series: {
        point: {
          events: {
            select: function () {
              // console.log(this);
              selectSearchColectiveSociety.value = this.code2;
              document.getElementById("send").click();
              // console.log(selectSearchColectiveSociety);
            },
          },
        },
      },
    },
    mapNavigation: {
      enabled: true,
      buttonOptions: {
        verticalAlign: "bottom",
      },
    },
    chart: {
      height: 600,
    },
    mapView: {
      projection: {
        name: "WebMercator",
      },
      center: [parseFloat(position.lat), parseFloat(position.lng)],
      zoom: zoom != null ? parseFloat(zoom) : 2.47,
    },

    series: [
      {
        type: "map",
        tooltip: {
          headerFormat: "",
          pointFormat: `${leyendtitles.countryLabel}: <b>{point.name}</b><br> ${leyendtitles.societyLabel}: <b>{point.value}</b>`,
        },
        data,
        mapData,
        color: "#009e4a",
        allowPointSelect: true,
        cursor: "pointer",
        joinBy: ["iso-a2", "code", "name"],
        states: {
          hover: {
            color: "#a4edba",
          },
        },
      },
    ],
  });
}

if (selectSearchColectiveSociety) {
  selectSearchColectiveSociety.addEventListener("change", () => {
    document.getElementById("send").click();
  });
  formSociety.addEventListener("submit", (e) => {
    e.preventDefault();
    if (selectSearchColectiveSociety.value == "clear") {
      if (document.querySelector(".info-alert")) {
        document.querySelector(".info-alert").remove();
      }
      if (document.querySelector(".info-success")) {
        document.querySelector(".info-success").remove();
      }
      getMap();
      jQuery("#description").fadeIn();
    } else {
      const url = asipi_colective_society_ajax.admin_ajax;
      if (document.querySelector(".info-alert")) {
        document.querySelector(".info-alert").remove();
      }
      if (document.querySelector(".info-success")) {
        document.querySelector(".info-success").remove();
      }
      jQuery("#description").fadeOut();
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
            const { message, term, country_color, lat_country, lng_country } =
              res;
            infoContent.innerHTML = `<div class="info-alert"><h3>${message}</h3></div>`;
            getMap(term.name, country_color);
          } else {
            const {
              societies,
              term,
              country_color,
              lat_country,
              lng_country,
              text_list,
            } = res;

            getMap(term.name, country_color);
            let information = '<ol class="societies">';
            let societiesHTML = societies.map((society) => {
              return `<li class="society"><a target="_blank" href="${society.link}">${society.title}</a></li>`;
            });
            information += societiesHTML;
            information += "</ol>";
            infoContent.innerHTML = `<div class="info-success"><h3 style="text-align:left;color:${country_color};">${text_list} ${term.name}</h3>${information}</div>`;
          }
        })
        .catch((err) => {
          console.log(err);
        });
    }
  });
}
document.addEventListener("DOMContentLoaded", () => {
  if (document.getElementById("asipiMAp")) {
    getMap();
  }
});
