const email = document.querySelector(".email");
const response = document.querySelector(".response");

const fetchEmail = async (body) => {
  const bodyUrlencode = new URLSearchParams(body).toString();

  const res = await fetch("./server/check_email.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: bodyUrlencode,
  });
  const data = await res.json();
  if (data.status == "error") {
    response.innerText = `Email không tồn tại`;
    response.classList.add("error");
  } else {
    response.innerText = `Email tồn tại`;
    response.classList.add("success");
  }
};

email.addEventListener("change", (e) => {
  const emailVal = e.target.value;
  if (emailVal.trim().length) {
    fetchEmail({
      //    name: "Hoàng An",
      email: emailVal,
    });
  } else {
    response.innerText = "Vui lòng nhập email";
    response.classList.add("error");
  }
});
