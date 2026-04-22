<link rel="stylesheet" href="../style/register.css" />
<link rel="stylesheet" href="../style/global.css" />

<body>
  <form id="registerForm">
    <h2>Register</h2>
    <section class="username-wrapper">
      <label for="username">Username</label>
      <input type="text" name="username" id="username" placeholder="eg. John Doe" required>
    </section>

    <section class="email-wrapper">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" placeholder="johndoe@gmail.com" required>
    </section>

    <section class="password-wrapper">
      <label for="password">Password</label>
      <div>
        <input type="password" name="password" id="password" placeholder="********" required>
        <button type="button" id="see-password">😳</button>
      </div>
    </section>

    <section class="confirm-wrapper">
      <label for="confirm">Confirm Password</label>
      <div>
        <input type="password" name="confirm" id="confirm" placeholder="********" required>
        <button type="button" id="see-confirm">😳</button>
      </div>
    </section>

    <section class="btn-register-wrapper">
      <button type="reset">Reset</button>
      <button type="submit">Register</button>
    </section>

    <p id="message" style="text-align: center;"></p>
  </form>

  <script>
    const seePassword = document.getElementById('see-password');
    const seeConfirm = document.getElementById('see-confirm');
    const password = document.getElementById('password');
    const confirm = document.getElementById('confirm');
    const form = document.getElementById('registerForm');
    const message = document.getElementById('message');

    seePassword.addEventListener('click', (e) => {
      e.preventDefault();
      if (password.type === "text") {
        password.type = "password";
        seePassword.textContent = "😳";
      } else {
        password.type = "text";
        seePassword.textContent = "😣";
      }
    });

    seeConfirm.addEventListener('click', (e) => {
      e.preventDefault();
      if (confirm.type === "text") {
        confirm.type = "password";
        seeConfirm.textContent = "😳";
      } else {
        confirm.type = "text";
        seeConfirm.textContent = "😣";
      }
    });

    form.addEventListener('submit', async (e) => {
      e.preventDefault();

      const formData = new FormData(form);

      await fetch("../auth/register.php", {
        method: "POST",
        body: formData
      }).then(res => res.json()).then(data => {
        if (data.status === "success") {
          window.location.href = data.redirect;
        } else {
          console.log(data.message);
        }
      });

      const data = await res.json();
      message.textContent = data.message;
      message.style.color = data.status === "success" ? "green" : "red";

      if (data.status === "success") {
        form.reset();
      }
    });
  </script>
</body>