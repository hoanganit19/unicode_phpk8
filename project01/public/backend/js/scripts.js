/*!
 * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
 * Copyright 2013-2023 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
 */
//
// Scripts
//

window.addEventListener("DOMContentLoaded", (event) => {
  // Toggle the side navigation
  const sidebarToggle = document.body.querySelector("#sidebarToggle");
  if (sidebarToggle) {
    // Uncomment Below to persist sidebar toggle between refreshes
    // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
    //     document.body.classList.toggle('sb-sidenav-toggled');
    // }
    sidebarToggle.addEventListener("click", (event) => {
      event.preventDefault();
      document.body.classList.toggle("sb-sidenav-toggled");
      localStorage.setItem(
        "sb|sidebar-toggle",
        document.body.classList.contains("sb-sidenav-toggled")
      );
    });
  }

  const back = document.querySelector(".back");
  if (back !== null) {
    back.addEventListener("click", (e) => {
      e.preventDefault();
      window.history.back();
    });
  }

  const deleteActions = document.querySelectorAll(".delete-action");
  if (deleteActions.length) {
    deleteActions.forEach((item) => {
      item.addEventListener("click", (e) => {
        e.preventDefault();

        const action = e.target.href;
        Swal.fire({
          title: "Bạn có muốn xóa?",
          text: "Nếu xóa không thể khôi phục!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!",
        }).then((result) => {
          if (result.isConfirmed) {
            const deleteForm = document.querySelector(".delete-form");
            if (deleteForm !== null) {
              deleteForm.action = action;
              deleteForm.submit();
            }
          }
        });
      });
    });
  }

  //Xử lý xóa nhiều
  const deleteItems = document.querySelectorAll(".check-item");
  const deleteBtn = document.querySelector(".deletes");
  if (deleteItems.length && deleteBtn !== null) {
    let deleteCount = 0;
    let ids = [];
    deleteItems.forEach((checkbox) => {
      checkbox.addEventListener("change", (e) => {
        const idChecked = parseInt(e.target.value);
        if (e.target.checked) {
          deleteCount++;
          ids.push(idChecked);
        } else {
          deleteCount--;
          ids = ids.filter((id) => id !== idChecked);
        }

        deleteBtn.querySelector("span").innerText = deleteCount;
        if (deleteCount > 0) {
          deleteBtn.classList.remove("disabled");
        } else {
          deleteBtn.classList.add("disabled");
        }

        //Thêm id vào input ẩn
        const deleteIds = document.querySelector(".delete_ids");
        deleteIds.value = ids.join(",");
      });
    });
  }

  const deletsForm = document.querySelector(".deletes_form");
  if (deletsForm !== null) {
    deletsForm.addEventListener("submit", (e) => {
      e.preventDefault();
      Swal.fire({
        title: "Bạn có muốn xóa?",
        text: "Nếu xóa không thể khôi phục!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
          e.target.submit();
        }
      });
    });
  }
});
