<!-- login administrator -->
<div class="w3-container loginBox">
    <div class="w3-card-4 w3-col m3">
        <div class="w3-container w3-light-gray">
            <h1>Login</h1>
            <form action="<?=BASE_URL ?>/login" class="w3-container w3-padding-16" method="POST">
                <label>E-mail:</label>
                <input class="w3-input" type="email" name="email" required/>
                <label>Senha:</label>
                <input class="w3-input" type="password" name="password" required/>
                <label>Code:</label>
                <input class="w3-input" name="code" required/>
                <input class="w3-btn w3-purple submitButton" type="submit" value="Fazer login">               
            </form>
        </div>
    </div>
</div>

