<style type="text/css">
	.message.error{
		width: 30%;
		display: table;
		float: none;
		margin: 0 auto;
		padding: 10px 30px;
		background-color: #f1f1f1;
		font-size: 14px;
		font-family: arial;
		color: #333;
	}
	.users-login{
		width: 30%;
		float: none;
		display: table;
		margin: 0 auto;
		padding: 50px 30px 30px 30px;
		background-color: #f2f2f2;
		border-radius: 5px;
		margin-top:150px;
	}
	.users-login form{
		width: 100%;
		float: left;
		margin: 0;
	}
	.users-login form div[class*="input"]{
		width: 100%;
		float: left;
		margin-bottom: 15px;
	}
	.users-login form div[class*="input"] label{
		width: 100%;
		float: left;
		margin-bottom: 11px;
		font-size: 16px;
		font-family: arial;
	}
	.users-login form div[class*="input"] input[type="text"],
	.users-login form div[class*="input"] input[type="password"]{
		width: 100%;
		height: 40px;
		padding: 7px 11px;
		font-size: 14px;
		font-family: arial;
		color: #333;
		border:1px solid #ddd;
		border-radius:50px;
	}
	.users-login form button[type="submit"]{
		border: none;
		background: none;
		font-size: 16px;
		color: #fff;
		text-transform: uppercase;
		float: right;
		background-color: #67c9e0;
		padding: 14px 30px;
		border-radius: 50px;
		cursor: pointer;
		margin-top:15px;
	}
</style>
<div class="users-login">
    <?= $this->Form->create() ?>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('password');
        ?>
		<?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
