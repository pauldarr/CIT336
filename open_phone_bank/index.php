<?php include 'view/header.php'; ?>
<h1>Welcome to Open Phone Bank</h1>
    <main>
        <p>Open Phone Bank is open source software designed for organizations who need a contact manager designed for getting volunteers in touch with voters.</p>
        <p>The administrator panel allows for full adding and editing of voters in the phone bank.</p>
        <p>The user panel is designed with volunteers in mind providing them a call list and the ability to update if a voter was contacted.</p>
        <p>To give Open Phone Bank a try, please select one of the panels below.</p>
    </main>
<div class="main">
    <div class="leftFlex">
    <form method="post" action="/open_phone_bank/admin_panel/">
        <button class="button big" type="submit">Administrator Panel</button>
    </form>
    </div>
    <div class="rightFlex">
    <form method="post" action="/open_phone_bank/user_panel/">
        <button class="button big" type="submit">User Panel</button>
    </form>
    </div>
</div>
<?php include 'view/footer.php'; ?>