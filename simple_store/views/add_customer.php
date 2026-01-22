<h2>إضافة عميل جديد</h2>

<div class="actions-bar">
    <a href="index.php?page=customers" class="btn btn-secondary">عودة للقائمة</a>
</div>

<form action="index.php?action=store_customer" method="POST">
    <div class="form-group">
        <label for="name">اسم العميل:</label>
        <input type="text" id="name" name="name" required>
    </div>

    <div class="form-group">
        <label for="email">البريد الإلكتروني:</label>
        <input type="email" id="email" name="email" required>
    </div>

    <button type="submit" class="btn">حفظ العميل</button>
</form>
