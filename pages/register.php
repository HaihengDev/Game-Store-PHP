<form mehtod="POST">
  <section>
    <label for="username">Username</label>
    <input type="text" name="username" id="username" placeholder="eg. John Doe" required>
  </section>

  <section>
    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="johndoe@gmail.com" required>
  </section>

  <section>
    <label for="password">Password</label>
    <div>
      <input type="password" name="password" id="password" placeholder="********" required>
      <button>👁️</button>
    </div>
  </section>

  <section>
    <label for="confirm">Confirm Password</label>
    <div>
      <input type="password" name="confirm" id="confirm" placeholder="********" required>
      <button>👁️</button>
    </div>
  </section>

  <section class="btn-register-wrapper">
    <button type="reset">Reset</button>
    <button type="submit">Register</button>
  </section>
</form>