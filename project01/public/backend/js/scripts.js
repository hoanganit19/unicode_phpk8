/*!
 * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
 * Copyright 2013-2023 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
 */
//
// Scripts
//

import { toSlug } from "./functions.js";

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

  //Test slug
  const titleNode = document.querySelector(".title");
  const slugNode = document.querySelector(".slug");

  if (titleNode !== null && slugNode !== null) {
    let title = titleNode.value;

    titleNode.addEventListener("change", (e) => {
      title = e.target.value;
      const slug = toSlug(title);
      if (slug.length && !slugNode.value.length) {
        slugNode.value = slug;
      }
    });

    slugNode.addEventListener("change", (e) => {
      if (title.length && !e.target.value.length) {
        const slug = toSlug(title);
        slugNode.value = slug;
      }
    });
  }

  const path = window.location.pathname;

  if (path.indexOf("add") !== -1 || path.indexOf("edit") !== -1) {
    document.body.onbeforeunload = function () {
      return "Ok";
    };
  }

  //Xử lý ckfinder
  const ckfinderGroup = document.querySelectorAll(".ckfinder-group");
  if (ckfinderGroup.length) {
    ckfinderGroup.forEach((group) => {
      group.addEventListener("click", (e) => {
        const inputEl = group.querySelector(".ckfinder-url");
        const previewEl = group.querySelector(".ckfinder-preview");
        if (e.target.classList.contains("ckfinder-choose")) {
          CKFinder.modal({
            chooseFiles: true,
            width: 800,
            height: 600,
            onInit: function (finder) {
              finder.on("files:choose", function (evt) {
                const file = evt.data.files.first();
                const url = file.getUrl();
                if (inputEl !== null) {
                  inputEl.value = url;
                }

                if (previewEl !== null) {
                  previewEl.innerHTML = `<img src="${url}" style="max-width: 100%;"/>`;
                }
              });

              finder.on("file:choose:resizedImage", function (evt) {
                const url = evt.data.resizedUrl;
                if (inputEl !== null) {
                  inputEl.value = url;
                }
                if (previewEl !== null) {
                  previewEl.innerHTML = `<img src="${url}" style="max-width: 100%;"/>`;
                }
              });
            },
          });
        }

        inputEl.addEventListener("change", (e) => {
          const url = e.target.value;
          if (!url) {
            previewEl.innerText = "";
          } else {
            previewEl.innerHTML = `<img src="${url}" style="max-width: 100%;"/>`;
          }
        });
      });
    });
  }
});
