<h2>إنشاء طلب جديد</h2>
<form action="index.php?action=save_order" method="POST">
    <div class="form-group">
        <label>اختر العميل:</label>
        <select name="customer_id" required>
            <?php foreach ($customers as $customer): ?>
                <option value="<?php echo $customer->id; ?>"><?php echo $customer->name; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <h3>المنتجات:</h3>
    <?php foreach ($products as $product): ?>
    <div class="form-group" style="display: flex; align-items: center; gap: 10px;">
        <input type="checkbox" name="products[<?php echo $product->id; ?>]" value="1" style="width: auto;">
        <span><?php echo $product->name; ?> (<?php echo $product->getFinalPrice(); ?> ر.س)</span>
        <input type="number" name="qty[<?php echo $product->id; ?>]" value="1" min="1" style="width: 60px;">
    </div>
    <?php endforeach; ?>

    <button type="submit" class="btn">تأكيد الطلب</button>
</form>
