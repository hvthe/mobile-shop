
// Toast function
function toast() {
    const main = document.getElementById("toast");
      const toast = document.createElement("div");
  
      // Auto remove toast
      const autoRemoveId = setTimeout(function () {
        main.removeChild(toast);
      }, 3000);
  
      // Remove toast when clicked
      toast.onclick = function (e) {
        if (e.target.closest(".toast__close")) {
          main.removeChild(toast);
          clearTimeout(autoRemoveId);
        }
      };
      const delay = (3000 / 1000).toFixed(2);
  
      toast.classList.add("toast", `toast--success`);
      toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;
  
      toast.innerHTML = `
                          <div class="toast__body">
                            <p class="toast__msg">Thêm giỏ hàng thành công</p>
                          </div>
                          <div class="toast__close">
                            <button class="btn btn-link">X</button>
                          </div>
                        `;
      main.appendChild(toast);
    }
  