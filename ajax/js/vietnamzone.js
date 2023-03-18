document.addEventListener("DOMContentLoaded", () => {
  const province = document.querySelector("#province");
  const district = document.querySelector("#district");

  const getProvince = async () => {
    const res = await fetch("./data/tinh_tp.json");
    const provinceList = await res.json();
    const keys = Object.keys(provinceList);
    let options = `<option value="">Chọn tỉnh/thành phố</option>\n`;
    keys.forEach((key) => {
      const item = provinceList[key];
      options += `<option value="${item.code}">${item.name}</option>\n`;
    });

    province.innerHTML = options;
  };

  const getDistrict = async (provinceId) => {
    const res = await fetch("./data/quan_huyen.json");
    const districtList = await res.json();

    const keys = Object.keys(districtList);
    let options = `<option value="">Chọn quận/huyện</option>\n`;
    keys.forEach((key) => {
      const item = districtList[key];

      if (item.parent_code == provinceId) {
        options += `<option value="${item.code}">${item.name_with_type}</option>\n`;
      }
    });

    district.innerHTML = options;
  };

  getProvince();

  province.addEventListener("change", (e) => {
    const provinceId = e.target.value;
    getDistrict(provinceId);
  });
});
