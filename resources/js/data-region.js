const provinceSelect = document.getElementById("province_code");
const citySelect = document.getElementById("city_code");
const districtSelect = document.getElementById("district_code");

if (provinceSelect && citySelect) {
  provinceSelect.addEventListener("change", function () {
    const provinceCode = this.value;

    // Reset Kecamatan
    if (districtSelect) {
      districtSelect.innerHTML = `
        <option value="" disabled selected>
          Select Kecamatan
        </option>
      `;

      districtSelect.disabled = true;
    }

    // Reset Kabupaten/Kota
    citySelect.innerHTML = `
      <option value="" disabled selected>
        Loading...
      </option>
    `;

    citySelect.disabled = true;

    const url = citySelect.dataset.url.replace(":provinceCode", provinceCode);

    fetch(url)
      .then((response) => response.json())
      .then((cities) => {
        citySelect.innerHTML = `
          <option value="" disabled selected>
            Select Kabupaten/Kota
          </option>
        `;

        cities.forEach((city) => {
          citySelect.innerHTML += `
            <option value="${city.code}">
              ${city.code} - ${city.name}
            </option>
          `;
        });

        citySelect.disabled = false;
      })
      .catch((error) => {
        console.error("Error:", error);

        citySelect.innerHTML = `
          <option value="" disabled selected>
            Gagal mengambil Kabupaten/Kota
          </option>
        `;
      });
  });
}

if (citySelect && districtSelect) {
  citySelect.addEventListener("change", function () {
    const cityCode = this.value;

    districtSelect.innerHTML = `
      <option value="" disabled selected>
        Loading...
      </option>
    `;

    districtSelect.disabled = true;

    const url = districtSelect.dataset.url.replace(":cityCode", cityCode);

    fetch(url)
      .then((response) => response.json())
      .then((districts) => {
        districtSelect.innerHTML = `
          <option value="" disabled selected>
            Select Kecamatan
          </option>
        `;

        districts.forEach((district) => {
          districtSelect.innerHTML += `
            <option value="${district.code}">
              ${district.code} - ${district.name}
            </option>
          `;
        });

        districtSelect.disabled = false;
      })
      .catch((error) => {
        console.error("Error:", error);

        districtSelect.innerHTML = `
          <option value="" disabled selected>
            Gagal mengambil Kecamatan
          </option>
        `;
      });
  });
}
