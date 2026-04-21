<link rel="stylesheet" href="../style/register.css" />
<link rel="styleheet" href="../style/global.css" />

<body>
  <form mehthod="POST">
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
        <button id="see-password">😳</button>
      </div>
    </section>

    <section class="confirm-wrapper">
      <label for="confirm">Confirm Password</label>
      <div>
        <input type="password" name="confirm" id="confirm" placeholder="********" required>
        <button id="see-confirm">😳</button>
      </div>
    </section>

    <section class="btn-register-wrapper">
      <button type="reset">Reset</button>
      <button type="submit">Register</button>
    </section>
  </form>

  <script>
    const seePassword = document.getElementById('see-password');
    const seeConfirm = document.getElementById('see-confirm');
    const password = document.getElementById('password');
    const confirm = document.getElementById('confirm');

    seePassword.addEventListener('click', () => {
      if (password.type === "text") {
        password.type = "password";
        seePassword.textContent = "😳";
      } else {
        password.type = "text";
        seePassword.textContent = "😣";
      }
    });

    seeConfirm.addEventListener('click', () => {
      if (confirm.type === "text") {
        confirm.type = "password";
        seeConfirm.textContent = "😳";
      } else {
        confirm.type = "text";
        seeConfirm.textContent = "😣";
      }
    });
  </script>
</body>