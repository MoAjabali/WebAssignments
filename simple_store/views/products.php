<h2>قائمة المنتجات</h2>
<div class="actions-bar">
    <a href="index.php?page=add_product" class="btn">إضافة منتج جديد</a>
</div>
<table>
    <thead>
        <tr>
            <th>الاسم</th>
            <th>السعر الأصلي</th>
            <th>الخصم</th>
            <th>السعر النهائي</th>
            <th>المخزون</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
        <tr>
            <td><?php echo $product->name; ?></td>
            <td><?php echo $product->price; ?> ر.س</td>
            <td>
                <?php if ($product->discount > 0): ?>
                    <span class="badge badge-discount"><?php echo $product->discount; ?>%</span>
                <?php else: ?>
                    -
                <?php endif; ?>
            </td>
            <td><strong><?php echo $product->getFinalPrice(); ?> ر.س</strong></td>
            <td><?php echo $product->stock; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
