<h2>إضافة منتج جديد</h2>

<div class="actions-bar">
    <a href="index.php?page=products" class="btn btn-secondary">عودة للقائمة</a>
</div>

<form action="index.php?action=store_product" method="POST">
    <div class="form-group">
        <label for="name">اسم المنتج:</label>
        <input type="text" id="name" name="name" required>
    </div>

    <div class="form-group">
        <label for="price">السعر:</label>
        <input type="number" id="price" name="price" step="0.01" required>
    </div>

    <div class="form-group">
        <label for="stock">الكمية:</label>
        <input type="number" id="stock" name="stock" required>
    </div>

    <div class="form-group">
        <label for="discount">الخصم (%):</label>
        <input type="number" id="discount" name="discount" value="0" min="0" max="100">
    </div>

    <button type="submit" class="btn">حفظ المنتج</button>
</form>
